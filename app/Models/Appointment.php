<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'service_type',
        'appointment_type',
        'preferred_date',
        'preferred_time',
        'message',
        'has_insurance',
        'insurance_provider',
        'insurance_member_id',
        'status',
        'consent',
        'ip_address'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'preferred_date' => 'date',
        'confirmed_at' => 'datetime',
        'actual_appointment_time' => 'datetime',
        'has_insurance' => 'boolean',
        'consent' => 'boolean',
    ];

    /**
     * Get the professional assigned to this appointments
     */
    public function professional()
    {
        return $this->belongsTo(User::class, 'assigned_professional_id');
    }

    /**
     * Get the full name of the client
     */
    public function getClientNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the service type as a readable string
     */
    public function getServiceTypeTextAttribute()
    {
        $types = [
            'individual_therapy' => 'Individual Therapy',
            'couples_therapy' => 'Couples Therapy',
            'teen_therapy' => 'Teen Therapy',
            'employee_therapy' => 'Employee Therapy',
            'psychiatry' => 'Psychiatry',
        ];

        return $types[$this->service_type] ?? $this->service_type;
    }

    /**
     * Get the appointments type as a readable string
     */
    public function getAppointmentTypeTextAttribute()
    {
        $types = [
            'teleconsultation' => 'Teleconsultation',
            'home_visit' => 'Home Visit',
        ];

        return $types[$this->appointment_type] ?? $this->appointment_type;
    }

    /**
     * Get the preferred time as a readable string
     */
    public function getPreferredTimeTextAttribute()
    {
        $times = [
            'morning' => 'Morning (8AM - 12PM)',
            'afternoon' => 'Afternoon (12PM - 4PM)',
            'evening' => 'Evening (4PM - 8PM)',
        ];

        return $times[$this->preferred_time] ?? $this->preferred_time;
    }

    /**
     * Get the status as a readable string
     */
    public function getStatusTextAttribute()
    {
        $statuses = [
            'pending' => 'Pending',
            'confirmed' => 'Confirmed',
            'rescheduled' => 'Rescheduled',
            'cancelled' => 'Cancelled',
            'completed' => 'Completed',
        ];

        return $statuses[$this->status] ?? $this->status;
    }

    /**
     * Scope a query to only include pending appointments.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include confirmed appointments.
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    /**
     * Scope a query to only include upcoming appointments.
     */
    public function scopeUpcoming($query)
    {
        return $query->whereIn('status', ['confirmed', 'rescheduled'])
            ->where('preferred_date', '>=', now()->format('Y-m-d'));
    }

    /**
     * Scope a query to only include completed appointments.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
