<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // SEO metadata
        $pageTitle = 'MP Health - Mental Health Care From Anywhere';
        $metaDescription = 'Get mental health care from anywhere with MP Health. Access on-demand therapy, medication management, and personalized treatment through teleconsultation and home visits.';

        // Get featured services
        $services = [
            [
                'title' => 'Individual Therapy',
                'description' => 'One-on-one therapy sessions with licensed clinicians for emotional and behavioral health support.',
                'icon' => 'fas fa-user',
                'link' => route('therapy.individual')
            ],
            [
                'title' => 'Couples Therapy',
                'description' => 'Professional counseling services designed to help couples improve their relationships and communication.',
                'icon' => 'fas fa-users',
                'link' => route('therapy.couples')
            ],
            [
                'title' => 'Teen Therapy',
                'description' => 'Specialized mental health support tailored for teenagers and their unique challenges.',
                'icon' => 'fas fa-user-graduate',
                'link' => route('therapy.teen')
            ],
            [
                'title' => 'Employee Therapy',
                'description' => 'Mental health support programs designed for organizations and their employees.',
                'icon' => 'fas fa-building',
                'link' => route('therapy.employee')
            ]
        ];

        // Get hero slider content
        $sliderContent = [
            [
                'title' => 'Get Therapy & Medication in One Place',
                'subtitle' => 'Mental Health Care From Anywhere',
                'description' => 'Access on-demand, evidence-based mental health treatment designed to empower individuals. Connect with licensed therapists and psychiatric providers through teleconsultation or home visits.',
                'image' => 'assets/img/slider/slide1.jpg',
                'link' => route('appointments')
            ],
            [
                'title' => 'Expert Care for Your Mental Well-being',
                'subtitle' => 'Comprehensive Therapy Services',
                'description' => 'Choose from individual therapy, couples counseling, teen therapy, or employee assistance programs. Our licensed therapists are here to support your journey to better mental health.',
                'image' => 'assets/img/slider/slide2.jpg',
                'link' => route('services.therapy')
            ],
            [
                'title' => 'Professional Medication Management',
                'subtitle' => 'Psychiatric Care & Medication',
                'description' => 'Get expert psychiatric assessment and medication management for conditions like depression, anxiety, bipolar disorder, OCD, and PTSD. Our licensed providers ensure safe and effective treatment.',
                'image' => 'assets/img/slider/slide3.jpg',
                'link' => route('services.psychiatry')
            ]
        ];

        // Statistics
        $stats = [
            [
                'number' => '1000+',
                'label' => 'Clients Helped',
                'icon' => 'fas fa-users'
            ],
            [
                'number' => '50+',
                'label' => 'Licensed Therapists',
                'icon' => 'fas fa-user-md'
            ],
            [
                'number' => '24/7',
                'label' => 'Available Support',
                'icon' => 'fas fa-clock'
            ],
            [
                'number' => '95%',
                'label' => 'Client Satisfaction',
                'icon' => 'fas fa-heart'
            ]
        ];

        // Latest articles/resources
        $latestArticles = Articles::latest()->take(3)->get();

        return view('home', compact(
            'pageTitle',
            'metaDescription',
            'services',
            'sliderContent',
            'stats',
            'latestArticles'
        ));
    }

    /**
     * Handle appointments scheduling request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function scheduleAppointment(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'service_type' => 'required|string',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required|string',
            'message' => 'nullable|string|max:1000'
        ]);

        try {
            // Process appointments scheduling
            // Send confirmation email
            // Notify relevant staff

            return redirect()->back()->with('success', 'Your appointments has been scheduled successfully. We will contact you shortly to confirm.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'There was an issue scheduling your appointments. Please try again or contact us directly.')
                ->withInput();
        }
    }

    /**
     * Handle newsletter subscription
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribeNewsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscriptions'
        ]);

        try {
            // Process newsletter subscription
            // Send welcome email

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing to our newsletter!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'There was an issue with your subscription. Please try again.'
            ], 422);
        }
    }
}
