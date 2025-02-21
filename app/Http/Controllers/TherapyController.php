<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TherapyController extends Controller
{

    /**
     * Display Individual Therapy page
     */
    public function individual(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $pageTitle = 'Individual Therapy';
        $metaDescription = 'Get professional support for emotional and behavioral health with our licensed therapists. Treatment begins within days of registration.';

        return view('therapy.individual', compact('pageTitle', 'metaDescription'));
    }

    /**
     * Display Couples Therapy page
     */
    public function couples(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $pageTitle = 'Couples Therapy';
        $metaDescription = 'Professional counseling services designed to help couples improve relationships, enhance communication, and work through challenges together.';

        return view('therapy.couples', compact('pageTitle', 'metaDescription'));
    }

    /**
     * Display Teen Therapy page
     */
    public function teen()
    {
        $pageTitle = 'Teen Therapy';
        $metaDescription = 'Specialized mental health support for teenagers, helping them navigate emotional challenges, stress, and personal development.';

        return view('therapy.teen', compact('pageTitle', 'metaDescription'));
    }

    /**
     * Display Employee Therapy page
     */


    public function employee()
    {
        $pageTitle = 'Employee Therapy';
        $metaDescription = 'Comprehensive mental health support programs designed for organizations to support their employees well-being and productivity';

        return view('therapy.employee', compact('pageTitle', 'metaDescription'));
    }


    public function therapy()
    {
        return view('services.therapy');
    }

}
