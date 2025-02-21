<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentConfirmation;
use App\Mail\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * Display the appointments booking form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created appointment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        // Add more robust error logging
        try {
            // Validate form data
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => [
                    'required',
                    'string',
                    'max:20',
                    'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'
                ],
                'service_type' => 'required|string|in:individual_therapy,couples_therapy,teen_therapy,employee_therapy,psychiatry',
                'appointment_type' => 'required|string|in:teleconsultation,home_visit',
                'preferred_date' => 'required|date|after_or_equal:today',
                'preferred_time' => 'required|string|in:morning,afternoon,evening',
                'message' => 'nullable|string|max:1000',
                'has_insurance' => 'sometimes|boolean',
                'insurance_provider' => 'nullable|required_if:has_insurance,1|string|max:255',
                'insurance_member_id' => 'nullable|required_if:has_insurance,1|string|max:255',
                'consent' => 'required|accepted',
            ], [
                // Custom error messages
                'phone.regex' => 'Please enter a valid phone number.',
                'preferred_date.after_or_equal' => 'The date must be today or in the future.',
                'consent.accepted' => 'You must consent to be contacted.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::warning('Appointment booking validation failed', [
                'errors' => $e->errors(),
                'input' => $request->except(['_token'])
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Validation failed. Please check your input.',
                'errors' => $e->errors()
            ], 422);
        }

        // Prepare appointment data
        $appointmentData = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'service_type' => $validated['service_type'],
            'appointment_type' => $validated['appointment_type'],
            'preferred_date' => $validated['preferred_date'],
            'preferred_time' => $validated['preferred_time'],
            'message' => $validated['message'] ?? null,
            'ip_address' => $request->ip(),
            'status' => 'pending',
            'has_insurance' => $request->has('has_insurance') ? true : false,
            'insurance_provider' => $validated['insurance_provider'] ?? null,
            'insurance_member_id' => $validated['insurance_member_id'] ?? null,
        ];

        // Start database transaction
        DB::beginTransaction();

        try {
            // Check for existing appointments
            $existingAppointment = Appointment::where('email', $validated['email'])
                ->where('preferred_date', $validated['preferred_date'])
                ->where('status', '!=', 'cancelled')
                ->first();

            if ($existingAppointment) {
                DB::rollBack();
                Log::warning('Duplicate appointment attempt', [
                    'email' => $validated['email'],
                    'date' => $validated['preferred_date']
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'An appointment with this email already exists for the selected date.'
                ], 400);
            }

            // Create appointment
            $appointment = Appointment::create($appointmentData);

            // Send email to client
            try {
                Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment));
            } catch (\Exception $emailError) {
                Log::error('Failed to send client confirmation email', [
                    'appointment_id' => $appointment->id,
                    'email' => $appointment->email,
                    'error' => $emailError->getMessage()
                ]);
                // Continue processing even if email fails
            }

            // Send notification to admin
            try {
                Mail::to(config('app.admin_email'))->send(new AppointmentRequest($appointment));
            } catch (\Exception $adminEmailError) {
                Log::error('Failed to send admin notification email', [
                    'appointment_id' => $appointment->id,
                    'error' => $adminEmailError->getMessage()
                ]);
                // Continue processing even if admin email fails
            }

            // Commit transaction
            DB::commit();

            // Log successful appointment creation
            Log::info('Appointment created successfully', [
                'appointment_id' => $appointment->id,
                'email' => $appointment->email
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your appointment request has been received. We will contact you within 24 hours to confirm your appointment.',
                'appointment_id' => $appointment->id
            ]);

        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();

            // Log detailed error information
            Log::error('Appointment creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input_data' => $request->except(['_token'])
            ]);

            // Return generic error message
            return response()->json([
                'success' => false,
                'message' => 'There was a problem processing your appointment. Please try again or contact support.',
                // Only include detailed error in debug mode
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Thank you page after successful appointments booking.
     *
     * @return \Illuminate\View\View
     */
    public function thankYou()
    {
        return view('appointments.thank-you');
    }
}
