<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Store a new newsletter subscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(Request $request)
    {
        // Validate the email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address.',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->input('email');

        // Check if the email already exists
        $existingSubscription = NewsletterSubscription::where('email', $email)->first();

        if ($existingSubscription) {
            if ($existingSubscription->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'You are already subscribed to our newsletter.',
                ]);
            } else {
                // Reactivate the subscription
                $existingSubscription->is_active = true;
                $existingSubscription->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Your subscription has been reactivated.',
                ]);
            }
        }

        try {
            // Create a new subscription
            $subscription = new NewsletterSubscription();
            $subscription->email = $email;
            $subscription->ip_address = $request->ip();
            $subscription->user_agent = $request->header('User-Agent');
            $subscription->save();

            // TODO: Send verification email or welcome email
            // For now, we'll just mark it as verified immediately for simplicity
            $subscription->verified_at = now();
            $subscription->save();

            // Log successful subscription
            Log::info('New newsletter subscription', [
                'email' => $email,
                'ip' => $request->ip()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing to our newsletter!',
            ]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Newsletter subscription failed', [
                'email' => $email,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'There was a problem processing your subscription. Please try again later.',
            ], 500);
        }
    }

    /**
     * Unsubscribe from the newsletter.
     *
     * @param  string  $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function unsubscribe(Request $request)
    {
        $email = $request->input('email');

        $subscription = NewsletterSubscription::where('email', $email)->first();

        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'Email address not found in our subscription list.',
            ]);
        }

        // Deactivate the subscription instead of deleting it
        $subscription->is_active = false;
        $subscription->save();

        return response()->json([
            'success' => true,
            'message' => 'You have been successfully unsubscribed from our newsletter.',
        ]);
    }
}
