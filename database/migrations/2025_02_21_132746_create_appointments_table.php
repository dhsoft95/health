<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->enum('service_type', [
                'individual_therapy',
                'couples_therapy',
                'teen_therapy',
                'employee_therapy',
                'psychiatry'
            ]);
            $table->enum('appointment_type', ['teleconsultation', 'home_visit']);
            $table->date('preferred_date');
            $table->enum('preferred_time', ['morning', 'afternoon', 'evening']);
            $table->text('message')->nullable();
            $table->boolean('has_insurance')->default(false);
            $table->string('insurance_provider')->nullable();
            $table->string('insurance_member_id')->nullable();
            $table->enum('status', [
                'pending',
                'confirmed',
                'rescheduled',
                'cancelled',
                'completed'
            ])->default('pending');
            $table->dateTime('confirmed_at')->nullable();
            $table->foreignId('assigned_professional_id')->nullable();
            $table->dateTime('actual_appointment_time')->nullable();
            $table->text('admin_notes')->nullable();
            $table->boolean('consent')->default(true);
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
