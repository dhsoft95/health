<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The appointments instance.
     *
     * @var \App\Models\Appointment
     */
    public $appointment;

    /**
     * Create a new message instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Appointment Request with MP Health',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.appointments.confirmation',
            with: [
                'firstName' => $this->appointment->first_name,
                'lastName' => $this->appointment->last_name,
                'date' => $this->appointment->preferred_date->format('l, F j, Y'),
                'time' => $this->getReadableTime($this->appointment->preferred_time),
                'serviceType' => $this->getReadableServiceType($this->appointment->service_type),
                'appointmentType' => $this->getReadableAppointmentType($this->appointment->appointment_type),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Get a human-readable time period.
     */
    private function getReadableTime(string $time): string
    {
        return match($time) {
            'morning' => 'Morning (8AM - 12PM)',
            'afternoon' => 'Afternoon (12PM - 4PM)',
            'evening' => 'Evening (4PM - 8PM)',
            default => $time,
        };
    }

    /**
     * Get a human-readable service type.
     */
    private function getReadableServiceType(string $serviceType): string
    {
        return match($serviceType) {
            'individual_therapy' => 'Individual Therapy',
            'couples_therapy' => 'Couples Therapy',
            'teen_therapy' => 'Teen Therapy',
            'employee_therapy' => 'Employee Therapy',
            'psychiatry' => 'Psychiatry',
            default => $serviceType,
        };
    }

    /**
     * Get a human-readable appointments type.
     */
    private function getReadableAppointmentType(string $appointmentType): string
    {
        return match($appointmentType) {
            'teleconsultation' => 'Teleconsultation',
            'home_visit' => 'Home Visit',
            default => $appointmentType,
        };
    }
}
