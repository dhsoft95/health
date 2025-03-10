<section class="appointment-area ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="appointment-content">
            <span class="sub-title">Book Appointment</span>
            <h2>We are here for you</h2>

            <!-- Alert messages container (for displaying success/error messages) -->
            <div id="appointment-alerts" class="mb-4" style="display: none;"></div>

            <form id="quick-appointment-form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-user"></i>
                            </div>
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter Your First Name" id="first_name" name="first_name" required>
                            <div class="invalid-feedback" id="first_name-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-user"></i>
                            </div>
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter Your Last Name" id="last_name" name="last_name" required>
                            <div class="invalid-feedback" id="last_name-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-envelope"></i>
                            </div>
                            <label for="email">Your Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email Address" id="email" name="email" required>
                            <div class="invalid-feedback" id="email-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-phone-call"></i>
                            </div>
                            <label for="phone">Your Phone</label>
                            <input type="text" class="form-control" placeholder="Enter Your Phone (e.g., 123-456-7890)" id="phone" name="phone" required>
                            <div class="invalid-feedback" id="phone-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-support"></i>
                            </div>
                            <label for="service_type">Select Service Type</label>
                            <select class="form-control" id="service_type" name="service_type" required>
                                <option value="">Select a service</option>
                                <option value="individual_therapy">Individual Therapy</option>
                                <option value="couples_therapy">Couples Therapy</option>
                                <option value="teen_therapy">Teen Therapy</option>
                                <option value="employee_therapy">Employee Therapy</option>
                                <option value="psychiatry">Psychiatry</option>
                            </select>
                            <div class="invalid-feedback" id="service_type-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-calendar"></i>
                            </div>
                            <label for="appointment_type">Appointment Type</label>
                            <select class="form-control" id="appointment_type" name="appointment_type" required>
                                <option value="">Select appointment type</option>
                                <option value="teleconsultation">Teleconsultation</option>
                                <option value="home_visit">Home Visit</option>
                            </select>
                            <div class="invalid-feedback" id="appointment_type-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-calendar"></i>
                            </div>
                            <label for="preferred_date">Preferred Date</label>
                            <input type="date" class="form-control" id="preferred_date" name="preferred_date" required min="">
                            <div class="invalid-feedback" id="preferred_date-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-clock"></i>
                            </div>
                            <label for="preferred_time">Preferred Time</label>
                            <input type="text" class="form-control" placeholder="Select time" id="preferred_time" name="preferred_time" required>
                            <div class="invalid-feedback" id="preferred_time-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-edit"></i>
                            </div>
                            <label for="message">Message (Optional)</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Any specific concerns or questions?"></textarea>
                            <div class="invalid-feedback" id="message-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="has_insurance" name="has_insurance" value="1">
                                <label class="form-check-label" for="has_insurance">
                                    I have insurance
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 insurance-fields" style="display: none;">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-shield"></i>
                            </div>
                            <label for="insurance_provider">Insurance Provider</label>
                            <input type="text" class="form-control" placeholder="Enter Provider Name" id="insurance_provider" name="insurance_provider">
                            <div class="invalid-feedback" id="insurance_provider-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 insurance-fields" style="display: none;">
                        <div class="form-group">
                            <div class="icon">
                                <i class="flaticon-id-card"></i>
                            </div>
                            <label for="insurance_member_id">Member ID</label>
                            <input type="text" class="form-control" placeholder="Enter Member ID" id="insurance_member_id" name="insurance_member_id">
                            <div class="invalid-feedback" id="insurance_member_id-error"></div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="consent" name="consent" value="1" required>
                                <label class="form-check-label" for="consent">
                                    I consent to the collection and processing of my personal information for the purpose of scheduling my appointment
                                </label>
                                <div class="invalid-feedback" id="consent-error"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="submit-btn">
                            <button type="submit" id="submit-btn" class="btn btn-primary">Make Appointment <i class="flaticon-right-chevron"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Loading Overlay -->
<div class="loading-overlay" id="loading-overlay">
    <div class="loading-container">
        <div class="loading-spinner">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        <h4>Processing Your Appointment</h4>
        <p>Please wait while we submit your request...</p>
    </div>
</div>

<style>
    /* Loading Overlay Styles */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s, visibility 0.3s;
    }

    .loading-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .loading-spinner {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .loading-container {
        background-color: white;
        border-radius: 12px;
        padding: 30px 40px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 90%;
        transform: translateY(20px);
        transition: transform 0.4s ease-out;
    }

    .loading-overlay.active .loading-container {
        transform: translateY(0);
    }

    .loading-container h4 {
        margin-top: 20px;
        margin-bottom: 5px;
        color: #333;
        font-weight: 600;
    }

    .loading-container p {
        color: #777;
        margin-bottom: 0;
    }

    .loading-spinner .dot {
        position: absolute;
        width: 13px;
        height: 13px;
        border-radius: 50%;
        background: var(--bs-primary, #007bff);
        animation: loading 1.2s linear infinite;
    }

    .loading-spinner .dot:nth-child(1) {
        animation-delay: 0s;
        top: 37px;
        left: 66px;
    }

    .loading-spinner .dot:nth-child(2) {
        animation-delay: -0.1s;
        top: 22px;
        left: 62px;
    }

    .loading-spinner .dot:nth-child(3) {
        animation-delay: -0.2s;
        top: 11px;
        left: 52px;
    }

    .loading-spinner .dot:nth-child(4) {
        animation-delay: -0.3s;
        top: 7px;
        left: 37px;
    }

    .loading-spinner .dot:nth-child(5) {
        animation-delay: -0.4s;
        top: 11px;
        left: 22px;
    }

    .loading-spinner .dot:nth-child(6) {
        animation-delay: -0.5s;
        top: 22px;
        left: 11px;
    }

    .loading-spinner .dot:nth-child(7) {
        animation-delay: -0.6s;
        top: 37px;
        left: 7px;
    }

    .loading-spinner .dot:nth-child(8) {
        animation-delay: -0.7s;
        top: 52px;
        left: 11px;
    }

    .loading-spinner .dot:nth-child(9) {
        animation-delay: -0.8s;
        top: 62px;
        left: 22px;
    }

    .loading-spinner .dot:nth-child(10) {
        animation-delay: -0.9s;
        top: 66px;
        left: 37px;
    }

    .loading-spinner .dot:nth-child(11) {
        animation-delay: -1s;
        top: 62px;
        left: 52px;
    }

    .loading-spinner .dot:nth-child(12) {
        animation-delay: -1.1s;
        top: 52px;
        left: 62px;
    }

    @keyframes loading {
        0%, 20%, 80%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.5);
        }
    }
</style>
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/plugins/confirmDate/confirmDate.min.css">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/plugins/confirmDate/confirmDate.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize form with native validation disabled
        const form = document.getElementById('quick-appointment-form');
        form.setAttribute('novalidate', true);

        // Date and time initialization
        const today = new Date();
        document.getElementById('preferred_date').min = today.toISOString().split('T')[0];

        // Flatpickr time picker - FIXED TIME FORMAT
        const timePicker = flatpickr('#preferred_time', {
            enableTime: true,
            noCalendar: true,
            dateFormat: "h:i A", // Changed from "h:i:S K" to "h:i A" to match validation regex
            minuteIncrement: 15,
            time_24hr: false,
            plugins: [new confirmDatePlugin({
                confirmIcon: "<i class='flaticon-checkmark'></i>",
                confirmText: "OK ",
                showAlways: true,
                theme: "light"
            })]
        });

        // Insurance fields toggle
        const hasInsuranceCheckbox = document.getElementById('has_insurance');
        const insuranceFields = document.querySelectorAll('.insurance-fields');

        function toggleInsuranceFields() {
            const isRequired = hasInsuranceCheckbox.checked;
            insuranceFields.forEach(field => {
                field.style.display = isRequired ? 'block' : 'none';
                field.querySelectorAll('input').forEach(input => {
                    input.required = isRequired;
                });
            });
        }
        hasInsuranceCheckbox.addEventListener('change', toggleInsuranceFields);
        toggleInsuranceFields();

        // Form elements
        const submitBtn = document.getElementById('submit-btn');
        const alertsContainer = document.getElementById('appointment-alerts');
        const loadingOverlay = document.getElementById('loading-overlay');

        // Validation functions
        function validateTime(timeString) {
            const timeRegex = /^(1[0-2]|0?[1-9]):[0-5][0-9] (AM|PM)$/i;
            return timeRegex.test(timeString);
        }

        function clearErrors() {
            alertsContainer.style.display = 'none';
            alertsContainer.innerHTML = '';
            document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        }

        function displayErrors(errors) {
            Object.entries(errors).forEach(([field, messages]) => {
                const input = document.querySelector(`[name="${field}"]`);
                const errorElement = document.getElementById(`${field}-error`);

                if (input && errorElement) {
                    input.classList.add('is-invalid');
                    errorElement.textContent = messages[0];
                }
            });
        }

        function validateForm() {
            let isValid = true;
            clearErrors();

            // Required fields validation
            const requiredFields = [
                'first_name', 'last_name', 'email', 'phone',
                'service_type', 'appointment_type', 'preferred_date',
                'preferred_time', 'consent'
            ];

            requiredFields.forEach(field => {
                const element = document.querySelector(`[name="${field}"]`);
                if (!element) return;

                if (element.type === 'checkbox' ? !element.checked : !element.value.trim()) {
                    isValid = false;
                    element.classList.add('is-invalid');
                    const errorElement = document.getElementById(`${field}-error`);
                    if (errorElement) {
                        errorElement.textContent = `Please provide ${element.labels?.[0]?.innerText.toLowerCase()}`;
                    }
                }
            });

            // Special validation for service_type
            const serviceType = document.getElementById('service_type');
            if (!serviceType.value) {
                isValid = false;
                serviceType.classList.add('is-invalid');
                document.getElementById('service_type-error').textContent = 'Please select a service type';
            }

            // Time format validation
            const timeInput = document.getElementById('preferred_time');
            if (timeInput.value && !validateTime(timeInput.value)) {
                isValid = false;
                timeInput.classList.add('is-invalid');
                document.getElementById('preferred_time-error').textContent = 'Please select a valid time (format: HH:MM AM/PM)';
            }

            return isValid;
        }

        // Loading state handling
        function showLoading() {
            loadingOverlay.classList.add('active');
            submitBtn.disabled = true;
        }

        function hideLoading() {
            loadingOverlay.classList.remove('active');
            submitBtn.disabled = false;
        }

        // Form submission handler
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            if (!validateForm()) {
                const firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalid.focus({ preventScroll: true });
                }
                return;
            }

            showLoading();

            try {
                const formData = new FormData(form);
                const response = await fetch("{{ route('appointments.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) throw data;

                // Success handling
                alertsContainer.innerHTML = `
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ${data.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
                alertsContainer.style.display = 'block';

                form.reset();
                timePicker.clear();

                setTimeout(() => {
                    window.location.href = "{{ route('appointments.thank-you') }}";
                }, 2000);

            } catch (error) {
                console.error('Submission error:', error);
                alertsContainer.innerHTML = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ${error.message || 'An error occurred. Please try again.'}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
                alertsContainer.style.display = 'block';

                if (error.errors) {
                    displayErrors(error.errors);
                }
            } finally {
                hideLoading();
            }
        });
    });
</script>

<style>
    /* Fix for select element visibility */
    select.form-control {
        opacity: 1 !important;
        position: relative !important;
        -webkit-appearance: menulist !important;
        -moz-appearance: menulist !important;
        appearance: menulist !important;
    }

    /* Ensure invalid fields are visible */
    .is-invalid {
        border-color: #dc3545 !important;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }
</style>
