<?php
/**
 * Centralized Enquiry Form Component
 * Used across multiple pages for lead collection
 * 
 * This form collects data and sends to:
 * 1. Local database (SQLite)
 * 2. Google Sheets (via Apps Script webhook)
 * 
 * Field mapping for Google Apps Script:
 * - parentName → parentName
 * - mobileNumber → mobileNumber
 * - email → email
 * - childName → childName
 * - age → age
 * - grade → grade
 * - message → userMessage (optional)
 */
?>

<section id="enquiry-form-section" class="section enquiry-section" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1f3b6b 100%); padding: 80px 0; position: relative; overflow: hidden;">
    <div class="container" style="position: relative; z-index: 1;">
        <div class="section-title" style="margin-bottom: 48px; text-align: center;">
            <h2 style="color: white; margin-bottom: 12px;">Admissions open for <span style="color: var(--accent-color);">2026-27</span></h2>
        </div>
    </div>

    <div class="enquiry-wrapper">
            <!-- Image Column -->
            <div class="enquiry-image-column">
                <img src="assets/images/Website/Robotics/UKP02173.jpg" alt="Admissions Enrollment Form" class="enquiry-image">
            </div>

            <!-- Form Column -->
            <div class="enquiry-form-column">
                <form id="enquiryForm" class="centralized-enquiry-form" method="POST" action="/process-enquiry.php">
                
                <h3 class="form-description" style="color: var(--primary-color); font-weight: 700; font-size: 1.5rem; margin-bottom: 32px; text-align: center;">Fill out the form below and we'll get back to you soon.</h3>

                <div id="formSuccess" class="form-success" style="display: none;">
                    Thank you for your enquiry! We will contact you soon.
                </div>

                <div id="formError" class="form-error" style="display: none;">
                    <span id="errorMessage"></span>
                </div>

                <!-- Parent/Guardian Information -->
                <div class="form-group">
                    <input type="text" id="parentName" name="parentName" placeholder="Parent/Guardian Name *" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="tel" id="mobileNumber" name="mobileNumber" placeholder="Mobile Number *" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email Address *" required>
                    </div>
                </div>

                <!-- Student Information -->
                <div class="form-group">
                    <input type="text" id="childName" name="childName" placeholder="Student Name *" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="number" id="age" name="age" placeholder="Student Age *" min="3" max="25" required>
                    </div>
                    <div class="form-group">
                        <select id="grade" name="grade" required>
                            <option value="">Select Grade *</option>
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2">Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                            <option value="Grade 5">Grade 5</option>
                            <option value="Grade 6">Grade 6</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                        </select>
                    </div>
                </div>

                <!-- Message -->
                <div class="form-group">
                    <textarea id="userMessage" name="userMessage" placeholder="Any additional message or questions (Optional)" rows="4"></textarea>
                </div>

                <!-- Consent -->
                <div class="form-group">
                    <label for="agree" class="checkbox-label">
                        <input type="checkbox" id="agree" name="agree" required>
                        <span>I agree to receive communications *</span>
                    </label>
                </div>

                <input type="hidden" name="formSource" value="Admission Enquiry Form">

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Enquiry</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>

<style>
.enquiry-section {
    padding: 80px 0;
}

.enquiry-section .section-title h2 {
    color: white;
}

.enquiry-section .section-title p {
    color: rgba(255, 255, 255, 0.95);
}

.enquiry-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
    align-items: stretch;
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    padding: 0;
    min-height: 520px;
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
}

.enquiry-image-column {
    display: flex;
    align-items: stretch;
    justify-content: center;
    background: #f0f0f0;
    border-radius: 16px 0 0 16px;
}

.enquiry-image {
    width: 100%;
    height: 100%;
    border-radius: 0;
    box-shadow: none;
    object-fit: cover;
}

.enquiry-form-column {
    display: flex;
    align-items: stretch;
    padding: 24px 32px;
    border-radius: 0 16px 16px 0;
}

.form-header {
    text-align: center;
    margin-bottom: 48px;
}

.form-header h3 {
    font-size: 2.2rem;
    color: var(--primary-color);
    font-weight: 900;
    margin-bottom: 12px;
}

.form-header p {
    color: var(--text-secondary);
    font-size: 1rem;
    line-height: 1.6;
}

.centralized-enquiry-form {
    background: transparent;
    padding: 24px 32px;
    border-radius: 0;
    box-shadow: none;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.95rem;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group input[type="number"],
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid #b0b8c5;
    border-radius: 8px;
    font-size: 1rem;
    font-family: inherit;
    transition: all 0.3s ease;
    background-color: #f9fafb;
    color: #333;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(41, 81, 146, 0.1);
}

.form-group textarea {
    resize: vertical;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    margin: 0;
}

.checkbox-label input[type="checkbox"] {
    width: 20px;
    height: 20px;
    margin-right: 12px;
    cursor: pointer;
}

.checkbox-label span {
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.text-center {
    text-align: center;
    margin-top: 32px;
}

.form-success {
    background: #d4edda;
    color: #155724;
    padding: 16px;
    border-radius: 8px;
    margin-bottom: 24px;
    border: 1px solid #c3e6cb;
}

.form-error {
    background: #f8d7da;
    color: #721c24;
    padding: 16px;
    border-radius: 8px;
    margin-bottom: 24px;
    border: 1px solid #f5c6cb;
}

/* Responsive */
@media (max-width: 768px) {
    .enquiry-wrapper {
        grid-template-columns: 1fr;
        gap: 0;
        min-height: auto;
        border-radius: 12px;
    }

    .enquiry-image-column {
        order: 1;
        min-height: 300px;
        border-radius: 12px 12px 0 0;
    }

    .enquiry-form-column {
        order: 2;
        padding: 32px 20px;
        border-radius: 0 0 12px 12px;
    }

    .form-row {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .centralized-enquiry-form {
        padding: 0;
        height: auto;
    }

    .section-title h2 {
        font-size: 2rem;
    }

    .form-description {
        font-size: 1.2rem !important;
        margin-bottom: 24px !important;
    }
}
</style>

<script>
// Form Data Persistence using localStorage
const FORM_STORAGE_KEY = 'enquiry_form_data';

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('enquiryForm');
    if (!form) return;

    // Set the form source based on current page
    const currentPage = window.location.pathname;
    const sourceInput = form.querySelector('input[name="formSource"]');
    
    if (currentPage.includes('index.php') || currentPage === '/') {
        sourceInput.value = 'home';
    } else if (currentPage.includes('admissions.php')) {
        sourceInput.value = 'admissions';
    } else if (currentPage.includes('contact.php')) {
        sourceInput.value = 'contact';
    } else {
        sourceInput.value = 'other';
    }

    // ========== RESTORE SAVED DATA ON PAGE LOAD ==========
    restoreSavedFormData(form);

    // ========== AUTO-SAVE FORM DATA ON INPUT ==========
    const formInputs = form.querySelectorAll('input, textarea, select');
    formInputs.forEach(input => {
        // Save on input change
        input.addEventListener('change', function() {
            saveFormData(form);
        });
        
        // Auto-save on keyup for better UX
        if (input.type !== 'checkbox') {
            input.addEventListener('keyup', function() {
                saveFormData(form);
            });
        }
    });

    // ========== DETECT ABANDONED ENTRIES ==========
    window.addEventListener('beforeunload', function(e) {
        const emailInput = form.querySelector('input[name="email"]');
        const phoneInput = form.querySelector('input[name="mobileNumber"]');
        
        const hasEmail = emailInput && emailInput.value.trim();
        const hasPhone = phoneInput && phoneInput.value.trim();
        
        // Only track if email or phone is filled
        if ((hasEmail || hasPhone) && form.dataset.submitted !== 'true') {
            // Build form data using FormData
            const formData = new FormData();
            formData.append('parentName', form.querySelector('input[name="parentName"]')?.value || '');
            formData.append('email', form.querySelector('input[name="email"]')?.value || '');
            formData.append('mobileNumber', form.querySelector('input[name="mobileNumber"]')?.value || '');
            formData.append('childName', form.querySelector('input[name="childName"]')?.value || '');
            formData.append('age', form.querySelector('input[name="age"]')?.value || '');
            formData.append('grade', form.querySelector('select[name="grade"]')?.value || '');
            formData.append('userMessage', form.querySelector('textarea[name="userMessage"]')?.value || '');
            formData.append('formSource', form.querySelector('input[name="formSource"]')?.value || 'unknown');
            
            console.log('Abandoned entry detected - attempting to save...');
            console.log('Email:', hasEmail, 'Phone:', hasPhone);
            
            // Use sendBeacon as primary method (most reliable for unload)
            // Fallback to fetch with keepalive if sendBeacon not available
            const blob = new Blob(
                [new URLSearchParams(Object.fromEntries(formData))],
                {type: 'application/x-www-form-urlencoded'}
            );
            
            if (navigator.sendBeacon) {
                const sent = navigator.sendBeacon('/process-abandoned-entry.php', blob);
                console.log('Abandoned entry sendBeacon result:', sent);
            } else {
                // Fallback for browsers without sendBeacon
                fetch('/process-abandoned-entry.php', {
                    method: 'POST',
                    body: formData,
                    keepalive: true
                }).catch(err => console.error('Abandoned entry fetch error:', err));
            }
        }
    });

    // Mark form as submitted when successfully submitted
    form.dataset.submitted = 'false';
    form.dataset.submitting = 'false';

    // ========== FORM SUBMISSION WITH VALIDATION ==========
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Prevent double submission
        if (form.dataset.submitting === 'true') {
            console.log('Form is already being submitted');
            return false;
        }

        // Hide error message initially
        document.getElementById('formError').style.display = 'none';
        document.getElementById('formSuccess').style.display = 'none';

        // Define validation rules
        const validationRules = {
            parentName: {type: 'text', required: true, displayName: 'Parent/Guardian Name'},
            mobileNumber: {type: 'phone', required: true, displayName: 'Mobile Number'},
            email: {type: 'email', required: true, displayName: 'Email Address'},
            childName: {type: 'text', required: true, displayName: 'Student Name'},
            age: {type: 'age', required: true, displayName: 'Student Age'},
            grade: {type: 'select', required: true, displayName: 'Grade'},
            agree: {type: 'checkbox', required: true, displayName: 'Agree to receive communications'}
        };

        // Validate form
        const validationResult = FormValidation.validateForm(form, validationRules);

        if (!validationResult.isValid) {
            // Show general error message
            document.getElementById('errorMessage').textContent = 'Please fix the errors above and try again.';
            document.getElementById('formError').style.display = 'block';
            
            // Scroll to error message
            document.getElementById('formError').scrollIntoView({ behavior: 'smooth' });
            return false;
        }

        // Mark form as submitting (prevent double submission)
        form.dataset.submitting = 'true';
        const submitButton = form.querySelector('button[type="submit"]');
        if (submitButton) {
            submitButton.disabled = true;
            submitButton.textContent = 'Submitting...';
        }

        // Collect form data
        const formData = new FormData(form);
        
        // Submit to server
        fetch('/process-enquiry.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Show success message
                document.getElementById('formSuccess').style.display = 'block';
                
                // CLEAR SAVED DATA ONLY ON SUCCESSFUL SUBMISSION
                clearSavedFormData();
                
                // Reset form
                form.reset();
                sourceInput.value = 'home';
                form.dataset.submitted = 'false';
                form.dataset.submitting = 'false';
                
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Submit Enquiry';
                }
                
                // Scroll to success message
                document.getElementById('formSuccess').scrollIntoView({ behavior: 'smooth' });
                
                // Redirect to thank you page with enquiry ID after 2 seconds
                setTimeout(() => {
                    window.location.href = 'thank-you.php?ref=' + (data.enquiry_id || 'submitted');
                }, 2000);
            } else {
                // Reset submitted flag on error
                form.dataset.submitting = 'false';
                
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Submit Enquiry';
                }
                
                // Show error message
                document.getElementById('errorMessage').textContent = data.error || 'An error occurred. Please try again.';
                document.getElementById('formError').style.display = 'block';
                
                // Scroll to error message
                document.getElementById('formError').scrollIntoView({ behavior: 'smooth' });
            }
        })
        .catch(error => {
            // Reset submitted flag on network error
            form.dataset.submitted = 'false';
            
            console.error('Error:', error);
            document.getElementById('errorMessage').textContent = 'Network error. Please try again.';
            document.getElementById('formError').style.display = 'block';
        });
    });
});

/**
 * Save form data to localStorage
 */
function saveFormData(form) {
    const formData = {
        parentName: form.querySelector('input[name="parentName"]')?.value || '',
        mobileNumber: form.querySelector('input[name="mobileNumber"]')?.value || '',
        email: form.querySelector('input[name="email"]')?.value || '',
        childName: form.querySelector('input[name="childName"]')?.value || '',
        age: form.querySelector('input[name="age"]')?.value || '',
        grade: form.querySelector('select[name="grade"]')?.value || '',
        userMessage: form.querySelector('textarea[name="userMessage"]')?.value || '',
        agree: form.querySelector('input[name="agree"]')?.checked || false,
        savedAt: new Date().toISOString()
    };
    
    try {
        localStorage.setItem(FORM_STORAGE_KEY, JSON.stringify(formData));
    } catch (e) {
        console.warn('Unable to save form data to localStorage:', e);
    }
}

/**
 * Restore form data from localStorage
 */
function restoreSavedFormData(form) {
    try {
        const savedData = localStorage.getItem(FORM_STORAGE_KEY);
        
        if (savedData) {
            const formData = JSON.parse(savedData);
            
            // Restore text inputs
            const parentNameInput = form.querySelector('input[name="parentName"]');
            if (parentNameInput && formData.parentName) {
                parentNameInput.value = formData.parentName;
            }
            
            const mobileNumberInput = form.querySelector('input[name="mobileNumber"]');
            if (mobileNumberInput && formData.mobileNumber) {
                mobileNumberInput.value = formData.mobileNumber;
            }
            
            const emailInput = form.querySelector('input[name="email"]');
            if (emailInput && formData.email) {
                emailInput.value = formData.email;
            }
            
            const childNameInput = form.querySelector('input[name="childName"]');
            if (childNameInput && formData.childName) {
                childNameInput.value = formData.childName;
            }
            
            const ageInput = form.querySelector('input[name="age"]');
            if (ageInput && formData.age) {
                ageInput.value = formData.age;
            }
            
            // Restore select
            const gradeSelect = form.querySelector('select[name="grade"]');
            if (gradeSelect && formData.grade) {
                gradeSelect.value = formData.grade;
            }
            
            // Restore textarea
            const messageTextarea = form.querySelector('textarea[name="userMessage"]');
            if (messageTextarea && formData.userMessage) {
                messageTextarea.value = formData.userMessage;
            }
            
            // Restore checkbox
            const agreeCheckbox = form.querySelector('input[name="agree"]');
            if (agreeCheckbox && formData.agree) {
                agreeCheckbox.checked = true;
            }
            
            // Show info message that data was restored
            showRestorationMessage(formData.savedAt);
        }
    } catch (e) {
        console.warn('Unable to restore form data from localStorage:', e);
    }
}

/**
 * Clear saved form data from localStorage
 */
function clearSavedFormData() {
    try {
        localStorage.removeItem(FORM_STORAGE_KEY);
    } catch (e) {
        console.warn('Unable to clear form data from localStorage:', e);
    }
}

/**
 * Show a message indicating when data was last saved
 */
function showRestorationMessage(savedTime) {
    const form = document.getElementById('enquiryForm');
    if (!form) return;
    
    // Only show if there's actually data
    const parentNameInput = form.querySelector('input[name="parentName"]');
    if (!parentNameInput || !parentNameInput.value) return;
    
    try {
        const savedDate = new Date(savedTime);
        const now = new Date();
        const diffMs = now - savedDate;
        const diffMins = Math.floor(diffMs / 60000);
        const diffHours = Math.floor(diffMs / 3600000);
        const diffDays = Math.floor(diffMs / 86400000);
        
        let timeStr = '';
        if (diffMins < 1) {
            timeStr = 'just now';
        } else if (diffMins < 60) {
            timeStr = `${diffMins} minute${diffMins > 1 ? 's' : ''} ago`;
        } else if (diffHours < 24) {
            timeStr = `${diffHours} hour${diffHours > 1 ? 's' : ''} ago`;
        } else {
            timeStr = `${diffDays} day${diffDays > 1 ? 's' : ''} ago`;
        }
        
        // Create restoration notice
        const notice = document.createElement('div');
        notice.style.cssText = `
            background: linear-gradient(135deg, rgba(52, 152, 219, 0.1), rgba(52, 152, 219, 0.05));
            border: 1px solid rgba(52, 152, 219, 0.3);
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            color: #2c3e50;
        `;
        
        notice.innerHTML = `
            <i class="fas fa-info-circle" style="color: #3498db; font-size: 1.1rem;"></i>
            <span><strong>Your form data from ${timeStr} has been restored.</strong> It will be cleared after successful submission.</span>
        `;
        
        const formHeader = form.querySelector('.form-header');
        if (formHeader && formHeader.parentNode) {
            formHeader.parentNode.insertBefore(notice, form);
        }
    } catch (e) {
        console.warn('Unable to show restoration message:', e);
    }
}
</script>
