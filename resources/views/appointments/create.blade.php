<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment - MP Health</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom styles using Tailwind classes -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                    },
                    fontFamily: {
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'shake': 'shake 0.5s cubic-bezier(.36,.07,.19,.97) both',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        shake: {
                            '10%, 90%': { transform: 'translate3d(-1px, 0, 0)' },
                            '20%, 80%': { transform: 'translate3d(2px, 0, 0)' },
                            '30%, 50%, 70%': { transform: 'translate3d(-4px, 0, 0)' },
                            '40%, 60%': { transform: 'translate3d(4px, 0, 0)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Smooth scroll and custom scrollbar */
        html {
            scroll-behavior: smooth;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #0284c7;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #0369a1;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
<!-- Header Section -->
<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                <i class="fas fa-calendar-check text-primary-600 mr-4"></i>
                Schedule Your Appointment
            </h1>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-[1.01]">
        <div class="md:flex">
            <!-- Left Column - Information -->
            <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white p-8 md:p-12 md:w-1/2 relative">
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white bg-opacity-10 rounded-full transform translate-x-1/2 -translate-y-1/2 rotate-45"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white bg-opacity-10 rounded-full transform -translate-x-1/2 translate-y-1/2 rotate-45"></div>

                <h2 class="text-2xl font-bold mb-6 relative z-10">Get Expert Mental Health Care</h2>

                <div class="space-y-6 mb-10 relative z-10">
                    <div class="flex items-start">
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4 transition-transform hover:scale-110">
                            <i class="fas fa-video"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Teleconsultation</h3>
                            <p class="text-primary-100">Connect with our experts from the comfort of your home via secure video sessions.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4 transition-transform hover:scale-110">
                            <i class="fas fa-home"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Home Visits</h3>
                            <p class="text-primary-100">Our professionals can visit you at home for personalized face-to-face sessions.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4 transition-transform hover:scale-110">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Confidential Care</h3>
                            <p class="text-primary-100">Your privacy is our priority with secure, HIPAA-compliant sessions.</p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-white border-opacity-20 pt-6 mb-8 relative z-10">
                    <h3 class="font-semibold text-lg mb-4">We Accept Insurance</h3>
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="bg-white p-2 rounded h-8 w-20 opacity-70 hover:opacity-100 transition-opacity"></div>
                        <div class="bg-white p-2 rounded h-8 w-20 opacity-70 hover:opacity-100 transition-opacity"></div>
                        <div class="bg-white p-2 rounded h-8 w-20 opacity-70 hover:opacity-100 transition-opacity"></div>
                    </div>
                </div>

                <div class="bg-white bg-opacity-10 rounded-lg p-6 relative z-10">
                    <div class="flex items-center text-sm mb-4">
                        <i class="fas fa-calendar-check mr-2"></i>
                        <span>Sessions begin within days of registration</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <i class="fas fa-clock mr-2"></i>
                        <span>Available 24/7 for emergencies</span>
                    </div>
                </div>
            </div>

            <!-- Right Column - Form -->
            <div class="p-8 md:p-12 md:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Book Your Session</h2>

                <!-- Success Message -->
                <div id="successAlert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 hidden animate-fade-in">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-2xl"></i>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Your appointment has been scheduled successfully!</p>
                            <p class="text-sm">We'll contact you shortly to confirm details.</p>
                        </div>
                    </div>
                </div>

                <!-- Error Message -->
                <div id="errorAlert" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 hidden animate-shake">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-2xl"></i>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Please correct the following errors:</p>
                            <ul class="mt-1 list-disc list-inside text-sm" id="errorList">
                            </ul>
                        </div>
                    </div>
                </div>

                <form id="appointmentForm" class="space-y-6">
                    <!-- Personal Information -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-800 mb-4 pb-2 border-b border-gray-200 flex items-center">
                            <i class="fas fa-user-circle mr-2 text-primary-600"></i>Personal Information
                        </h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text" id="first_name" name="first_name" class="pl-10 block w-full shadow-sm border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200" required>
                                </div>
                            </div>

                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text" id="last_name" name="last_name" class="pl-10 block w-full shadow-sm border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200" required>
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-gray-400"></i>
                                    </div>
                                    <input type="email" id="email" name="email" class="pl-10 block w-full shadow-sm border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200" required>
                                </div>
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-phone text-gray-400"></i>
                                    </div>
                                    <input type="tel" id="phone" name="phone" class="pl-10 block w-full shadow-sm border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service Information -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-800 mb-4 pb-2 border-b border-gray-200 flex items-center">
                            <i class="fas fa-hand-holding-heart mr-2 text-primary-600"></i>Service Information
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label for="service_type" class="block text-sm font-medium text-gray-700 mb-1">Service Type <span class="text-red-500">*</span></label>
                                <select id="service_type" name="service_type" class="block w-full shadow-sm border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200" required>
                                    <option value="" disabled selected>Select a service</option>
                                    <option value="individual_therapy">Individual Therapy</option>
                                    <option value="couples_therapy">Couples Therapy</option>
                                    <option value="teen_therapy">Teen Therapy</option>
                                    <option value="employee_therapy">Employee Therapy</option>
                                    <option value="psychiatry">Psychiatry</option>
                                </select>
                            </div>

                            <div>
                                <span class="block text-sm font-medium text-gray-700 mb-3">Appointment Type <span class="text-red-500">*</span></span>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="relative">
                                        <input type="radio" id="teleconsultation" name="appointment_type" value="teleconsultation" class="sr-only peer" required>
                                        <label for="teleconsultation" class="flex flex-col items-center justify-center p-4 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary-600 peer-checked:text-primary-600 hover:bg-gray-50 transition-all duration-200">
                                            <i class="fas fa-video mb-2 text-lg"></i>
                                            <span class="font-medium">Teleconsultation</span>
                                        </label>
                                    </div>

                                    <div class="relative">
                                        <input type="radio" id="home_visit" name="appointment_type" value="home_visit" class="sr-only peer">
                                        <label for="home_visit" class="flex flex-col items-center justify-center p-4 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary-600 peer-checked:text-primary-600 hover:bg-gray-50 transition-all duration-200">
                                            <i class="fas fa-home mb-2 text-lg"></i>
                                            <span class="font-medium">Home Visit</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Scheduling -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-800 mb-4 pb-2 border-b border-gray-200 flex items-center">
                            <i class="fas fa-calendar-alt mr-2 text-primary-600"></i>Preferred Schedule
                        </h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="preferred_date" class="block text-sm font-medium text-gray-700 mb-1">Preferred Date <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-calendar text-gray-400"></i>
                                    </div>
                                    <input type="date" id="preferred_date" name="preferred_date" class="pl-10 block w-full shadow-sm border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200" required>
                                </div>
                            </div>

                            <div>
                                <span class="block text-sm font-medium text-gray-700 mb-1">Preferred Time <span class="text-red-500">*</span></span>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="relative">
                                        <input type="radio" id="morning" name="preferred_time" value="morning" class="sr-only peer" required>
                                        <label for="morning" class="flex flex-col items-center justify-center p-2 text-xs text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary-600 peer-checked:text-primary-600 hover:bg-gray-50 transition-all duration-200">
                                            <i class="fas fa-sun mb-1"></i>
                                            <span>Morning</span>
                                            <span class="text-gray-400">(8AM-12PM)</span>
                                        </label>
                                    </div>

                                    <div class="relative">
                                        <input type="radio" id="afternoon" name="preferred_time" value="afternoon" class="sr-only peer">
                                        <label for="afternoon" class="flex flex-col items-center justify-center p-2 text-xs text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary-600 peer-checked:text-primary-600 hover:bg-gray-50 transition-all duration-200">
                                            <i class="fas fa-cloud-sun mb-1"></i>
                                            <span>Afternoon</span>
                                            <span class="text-gray-400">(12PM-4PM)</span>
                                        </label>
                                    </div>

                                    <div class="relative">
                                        <input type="radio" id="evening" name="preferred_time" value="evening" class="sr-only peer">
                                        <label for="evening" class="flex flex-col items-center justify-center p-2 text-xs text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary-600 peer-checked:text-primary-600 hover:bg-gray-50 transition-all duration-200">
                                            <i class="fas fa-moon mb-1"></i>
                                            <span>Evening</span>
                                            <span class="text-gray-400">(4PM-8PM)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-800 mb-4 pb-2 border-b border-gray-200 flex items-center">
                            <i class="fas fa-info-circle mr-2 text-primary-600"></i>Additional Information
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Additional Notes</label>
                                <textarea id="message" name="message" rows="3" class="block w-full shadow-sm border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200" placeholder="Tell us about any specific concerns or questions you have..."></textarea>
                            </div>

                            <div class="bg-white p-4 rounded-md shadow-sm">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="has_insurance" name="has_insurance" type="checkbox" class="h-4 w-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="has_insurance" class="font-medium text-gray-700">I would like to use insurance for my appointment</label>
                                    </div>
                                </div>

                                <div id="insurance_fields" class="mt-4 grid md:grid-cols-2 gap-4 hidden">
                                    <div>
                                        <label for="insurance_provider" class="block text-sm font-medium text-gray-700 mb-1">Insurance Provider</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-building text-gray-400"></i>
                                            </div>
                                            <input type="text" id="insurance_provider" name="insurance_provider" class="pl-10 block w-full shadow-sm border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="insurance_member_id" class="block text-sm font-medium text-gray-700 mb-1">Member ID</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-id-card text-gray-400"></i>
                                            </div>
                                            <input type="text" id="insurance_member_id" name="insurance_member_id" class="pl-10 block w-full shadow-sm border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="consent" name="consent" type="checkbox" class="h-4 w-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500" required>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="consent" class="font-medium text-gray-700">I consent to MP Health contacting me about my appointment request <span class="text-red-500">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-150 ease-in-out transform hover:scale-[1.02]">
                            <span>Request Appointment</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                        <p class="text-sm text-gray-500 text-center mt-2">We'll contact you within 24 hours to confirm your appointment</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<footer class="bg-gray-100 py-8 mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <div>
                <h4 class="text-lg font-semibold text-gray-800 mb-4">MP Health</h4>
                <p class="text-gray-600">Providing compassionate and professional mental health services tailored to your unique needs.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Services</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">About Us</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Contact</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Contact Info</h4>
                <div class="space-y-2 text-gray-600">
                    <p><i class="fas fa-phone mr-2 text-primary-600"></i>(555) 123-4567</p>
                    <p><i class="fas fa-envelope mr-2 text-primary-600"></i>support@mphealth.com</p>
                    <p><i class="fas fa-map-marker-alt mr-2 text-primary-600"></i>123 Wellness Ave, Health City</p>
                </div>
            </div>
        </div>
        <div class="mt-8 pt-6 border-t border-gray-200 text-center text-sm text-gray-600">
            © 2024 MP Health. All Rights Reserved.
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('preferred_date').min = today;

        // Toggle insurance fields
        const insuranceCheckbox = document.getElementById('has_insurance');
        const insuranceFields = document.getElementById('insurance_fields');

        insuranceCheckbox.addEventListener('change', function() {
            if (this.checked) {
                insuranceFields.classList.remove('hidden');
                insuranceFields.classList.add('animate-fade-in');
            } else {
                insuranceFields.classList.add('hidden');
                insuranceFields.classList.remove('animate-fade-in');
            }
        });

        // Form submission
        const form = document.getElementById('appointmentForm');
        const successAlert = document.getElementById('successAlert');
        const errorAlert = document.getElementById('errorAlert');
        const errorList = document.getElementById('errorList');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Clear previous messages
            successAlert.classList.add('hidden');
            errorAlert.classList.add('hidden');
            errorList.innerHTML = '';

            // Prepare form data
            const formData = new FormData(form);

            // Add has_insurance checkbox value manually
            formData.append('has_insurance', insuranceCheckbox.checked ? '1' : '0');

            // Ensure consent is checked
            const consentCheckbox = document.getElementById('consent');
            if (!consentCheckbox.checked) {
                errorAlert.classList.remove('hidden');
                const li = document.createElement('li');
                li.textContent = 'You must consent to be contacted';
                errorList.appendChild(li);
                return;
            }

            // Validate required fields
            const requiredFields = form.querySelectorAll('[required]');
            const errors = [];

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    errors.push(`${field.name.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase())} is required`);
                    field.classList.add('border-red-500');
                } else {
                    field.classList.remove('border-red-500');
                }
            });

            // Show errors if any
            if (errors.length > 0) {
                errorAlert.classList.remove('hidden');
                errors.forEach(error => {
                    const li = document.createElement('li');
                    li.textContent = error;
                    errorList.appendChild(li);
                });
                return;
            }

            // Submit form via AJAX
            fetch('{{ route('appointments.store') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        successAlert.classList.remove('hidden');
                        form.reset();

                        // Hide insurance fields
                        insuranceFields.classList.add('hidden');

                        // Scroll to top to show success message
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    } else {
                        // Show error message
                        errorAlert.classList.remove('hidden');
                        const li = document.createElement('li');
                        li.textContent = data.message || 'An error occurred. Please try again.';
                        errorList.appendChild(li);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    errorAlert.classList.remove('hidden');
                    const li = document.createElement('li');
                    li.textContent = 'Network error. Please try again.';
                    errorList.appendChild(li);
                });
        });
    });
</script>

<!-- Add this meta tag in the <head> section for CSRF protection -->
</body>
</html>
