<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display therapy services page
     *
     * @return \Illuminate\View\View
     */
    public function therapy(): \Illuminate\View\View
    {
        $pageTitle = 'Therapy Services - MP Health';
        $metaDescription = 'Get access to therapy, medication management, and personalized treatment through teleconsultation and home visit appointments.';

        $therapyServices = [
            [
                'title' => 'Individual Therapy',
                'description' => 'One-on-one therapy sessions with licensed clinicians for emotional and behavioral health support.',
                'icon' => 'fas fa-user',
                'link' => route('therapy.individual')
            ],
            [
                'title' => 'Couples Therapy',
                'description' => 'Professional counseling services for couples seeking to improve their relationship.',
                'icon' => 'fas fa-users',
                'link' => route('therapy.couples')
            ],
            [
                'title' => 'Teen Therapy',
                'description' => 'Specialized mental health support tailored for teenagers.',
                'icon' => 'fas fa-user-graduate',
                'link' => route('therapy.teen')
            ],
            [
                'title' => 'Employee Therapy',
                'description' => 'Mental health support programs for organizations and their employees.',
                'icon' => 'fas fa-building',
                'link' => route('therapy.employee')
            ]
        ];

        return view('services.therapy', compact(
            'pageTitle',
            'metaDescription',
            'therapyServices'
        ));
    }

    /**
     * Display psychiatry services page
     *
     * @return \Illuminate\View\View
     */
    public function psychiatry()
    {
        $pageTitle = 'Psychiatry Services - MP Health';
        $metaDescription = 'Expert psychiatric assessment, prescription, and medication management provided by licensed medical professionals.';

        $conditions = [
            'Depression',
            'Anxiety',
            'Bipolar Disorder',
            'OCD',
            'PTSD',
            'ADHD'
        ];

        $medications = [
            'SSRIs',
            'SNRIs',
            'Wellbutrin',
            'Buspar',
            'Trazodone',
            'Abilify',
            'Strattera'
        ];

        $process = [
            [
                'step' => 1,
                'title' => 'Schedule Appointment',
                'description' => 'Schedule a teleconsultation or home visit with a licensed Consultant.',
                'icon' => 'fas fa-calendar-check'
            ],
            [
                'step' => 2,
                'title' => 'Receive Diagnosis',
                'description' => 'Get expert evaluation of your symptoms and appropriate prescription if needed.',
                'icon' => 'fas fa-clipboard-check'
            ],
            [
                'step' => 3,
                'title' => 'Begin Treatment',
                'description' => 'Start your prescribed treatment with ongoing support and follow-up care.',
                'icon' => 'fas fa-pills'
            ]
        ];

        return view('services.psychiatry', compact(
            'pageTitle',
            'metaDescription',
            'conditions',
            'medications',
            'process'
        ));
    }

    /**
     * Display self-guided programs page
     *
     * @return \Illuminate\View\View
     */
    public function selfGuided()
    {
        $pageTitle = 'Self-Guided Programs - MP Health';
        $metaDescription = 'Research-backed, self-guided programs designed to enhance emotional intelligence and well-being.';

        $programs = [
            [
                'title' => 'Stress Management',
                'description' => 'Learn effective techniques for managing daily stress and anxiety.',
                'duration' => '4 weeks',
                'level' => 'Beginner',
                'icon' => 'fas fa-leaf'
            ],
            [
                'title' => 'Mindfulness Basics',
                'description' => 'Develop mindfulness practices for better mental well-being.',
                'duration' => '6 weeks',
                'level' => 'All Levels',
                'icon' => 'fas fa-brain'
            ],
            [
                'title' => 'Emotional Intelligence',
                'description' => 'Enhance your emotional awareness and relationship skills.',
                'duration' => '8 weeks',
                'level' => 'Intermediate',
                'icon' => 'fas fa-heart'
            ],
            [
                'title' => 'Sleep Improvement',
                'description' => 'Develop better sleep habits and routines.',
                'duration' => '4 weeks',
                'level' => 'Beginner',
                'icon' => 'fas fa-moon'
            ]
        ];

        return view('services.self-guided', compact(
            'pageTitle',
            'metaDescription',
            'programs'
        ));
    }

    /**
     * Display service pricing page
     *
     * @return \Illuminate\View\View
     */
    public function pricing()
    {
        $pageTitle = 'Service Pricing - MP Health';
        $metaDescription = 'Transparent pricing for our mental health services including therapy, psychiatry, and self-guided programs.';

        $pricingPlans = [
            [
                'name' => 'Individual Therapy',
                'price' => '100',
                'interval' => 'per session',
                'features' => [
                    '50-minute session',
                    'Licensed therapist',
                    'Video or in-person',
                    'Flexible scheduling',
                    '24/7 messaging'
                ]
            ],
            [
                'name' => 'Psychiatry',
                'price' => '200',
                'interval' => 'initial consultation',
                'features' => [
                    '60-minute evaluation',
                    'Treatment planning',
                    'Prescription management',
                    'Follow-up sessions',
                    'Provider messaging'
                ]
            ],
            [
                'name' => 'Self-Guided',
                'price' => '50',
                'interval' => 'per month',
                'features' => [
                    'All programs access',
                    'Progress tracking',
                    'Resource library',
                    'Community support',
                    'Mobile access'
                ]
            ]
        ];

        return view('services.pricing', compact(
            'pageTitle',
            'metaDescription',
            'pricingPlans'
        ));
    }

    /**
     * Display FAQ page
     *
     * @return \Illuminate\View\View
     */
    public function faq()
    {
        $pageTitle = 'Frequently Asked Questions - MP Health';
        $metaDescription = 'Find answers to common questions about our mental health services, appointments, and treatments.';

        $faqs = [
            [
                'question' => 'How do I schedule an appointment?',
                'answer' => 'You can schedule either a teleconsultation or home visit with our licensed consultants through our online booking system or by calling our office.'
            ],
            [
                'question' => 'What conditions do you treat?',
                'answer' => 'We treat various mental health conditions including depression, anxiety, bipolar disorder, OCD, PTSD, and more.'
            ],
            // Add more FAQs as needed
        ];

        return view('services.faq', compact(
            'pageTitle',
            'metaDescription',
            'faqs'
        ));
    }
}
