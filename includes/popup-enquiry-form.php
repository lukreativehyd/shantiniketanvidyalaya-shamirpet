<?php
/**
 * Popup Enquiry Form Component (Centralized)
 * Uses CENTRALIZED form structure wrapped in a modal
 * Shares same validation and submission logic as main enquiry form
 * 
 * Triggered by:
 * - Header "Enquire Now" button
 * - Footer "Schedule a Tour" button
 * - Sticky enquiry button
 * - Mobile action buttons
 */
?>

<!-- Enquiry Modal Wrapper -->
<div id="enquiryModal" class="enquiry-modal">
    <div class="enquiry-modal-overlay"></div>
    <div class="enquiry-modal-content">
        <!-- Blue Header Section -->
        <div class="enquiry-modal-header">
            <button type="button" class="enquiry-modal-close" aria-label="Close modal">
                <i class="fas fa-times"></i>
            </button>
            <h2>Enquire Now</h2>
            <p>Fill out the form below and we'll get back to you soon.</p>
        </div>
        
        <div class="enquiry-modal-body">

            <form id="popupEnquiryForm" class="centralized-enquiry-form" method="POST" action="/process-enquiry.php">
                
                <div id="popupFormSuccess" class="form-success" style="display: none;">
                    Thank you for your enquiry! We will contact you soon.
                </div>

                <div id="popupFormError" class="form-error" style="display: none;">
                    <span id="popupErrorMessage"></span>
                </div>

                <!-- Parent/Guardian Information -->
                <div class="form-group">
                    <input type="text" id="popupParentName" name="parentName" placeholder="Parent/Guardian Name *" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="tel" id="popupMobileNumber" name="mobileNumber" placeholder="Mobile Number *" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="popupEmail" name="email" placeholder="Email Address *" required>
                    </div>
                </div>

                <!-- Student Information -->
                <div class="form-group">
                    <input type="text" id="popupChildName" name="childName" placeholder="Student Name *" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="number" id="popupAge" name="age" placeholder="Student Age *" min="3" max="25" required>
                    </div>
                    <div class="form-group">
                        <select id="popupGrade" name="grade" required>
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
                    <textarea id="popupUserMessage" name="userMessage" placeholder="Any additional message or questions (Optional)" rows="4"></textarea>
                </div>

                <!-- Consent - EXACT SAME STYLING AS HOME PAGE -->
                <div class="form-group">
                    <label for="popupAgree" class="checkbox-label">
                        <input type="checkbox" id="popupAgree" name="agree" required>
                        <span>I agree to receive communications *</span>
                    </label>
                </div>

                <input type="hidden" name="formSource" value="Popup Modal - Enquire Now">

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Enquiry</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Enquiry Modal Styles */
.enquiry-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
}

.enquiry-modal.active {
    display: flex;
    align-items: center;
    justify-content: center;
}

.enquiry-modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(3px);
    animation: fadeIn 0.3s ease;
}

.enquiry-modal-content {
    position: relative;
    background: white;
    border-radius: 16px;
    max-width: 600px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    animation: slideUp 0.3s ease;
    z-index: 1001;
    padding: 0;
    display: flex;
    flex-direction: column;
}

/* Modal Header with Blue Background */
.enquiry-modal-header {
    background-color: var(--primary-color);
    color: white;
    padding: 30px 40px;
    border-radius: 16px 16px 0 0;
    text-align: center;
    position: relative;
}

.enquiry-modal-header h2 {
    color: white;
    margin: 0 0 8px 0;
    font-size: 32px;
    font-weight: 800;
}

.enquiry-modal-header p {
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
    font-size: 14px;
}

.enquiry-modal-close {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    font-size: 24px;
    color: white;
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.3s ease;
    z-index: 10;
}

.enquiry-modal-close:hover {
    background-color: rgba(255, 255, 255, 0.3);
    color: white;
}

.enquiry-modal-body {
    padding: 40px;
    flex: 1;
}

/* Modal form uses centralized form styling */
.enquiry-modal #popupEnquiryForm {
    background: transparent;
    padding: 0;
    box-shadow: none;
}

.enquiry-modal .form-group {
    margin-bottom: 24px;
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideUp {
    from {
        transform: translateY(50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.enquiry-modal.closing .enquiry-modal-content {
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        transform: translateY(0);
        opacity: 1;
    }
    to {
        transform: translateY(50px);
        opacity: 0;
    }
}

/* Responsive */
@media (max-width: 768px) {
    .enquiry-modal-content {
        width: 95%;
        max-height: 95vh;
    }
    
    .enquiry-modal-header {
        padding: 24px 30px;
    }
    
    .enquiry-modal-header h2 {
        font-size: 24px;
    }
    
    .enquiry-modal-body {
        padding: 30px;
    }
    
    .enquiry-modal-close {
        top: 12px;
        right: 12px;
    }
}

/* Prevent body scroll when modal is open */
body.modal-open {
    overflow: hidden;
}
</style>

<script>
// Popup Enquiry Form Handler
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('enquiryModal');
    const form = document.getElementById('popupEnquiryForm');
    
    if (!modal || !form) return;

    // ========== MODAL OPEN/CLOSE HANDLERS ==========
    
    function openModal() {
        modal.classList.add('active');
        document.body.classList.add('modal-open');
    }
    
    function closeModal() {
        modal.classList.add('closing');
        setTimeout(() => {
            modal.classList.remove('active', 'closing');
            document.body.classList.remove('modal-open');
        }, 300);
    }
    
    // Close button
    const closeBtn = document.querySelector('.enquiry-modal-close');
    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }
    
    // Click on overlay closes modal
    const overlay = document.querySelector('.enquiry-modal-overlay');
    if (overlay) {
        overlay.addEventListener('click', closeModal);
    }
    
    // Escape key closes modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });
    
    // ========== DETECT ABANDONED ENTRIES ==========
    window.addEventListener('beforeunload', function(e) {
        const emailInput = form.querySelector('input[name="email"]');
        const mobileInput = form.querySelector('input[name="mobileNumber"]');
        
        const hasEmail = emailInput && emailInput.value.trim();
        const hasMobile = mobileInput && mobileInput.value.trim();
        
        // Only track if email or phone is filled
        if ((hasEmail || hasMobile) && form.dataset.submitted !== 'true') {
            const formData = new FormData();
            formData.append('parentName', form.querySelector('input[name="parentName"]')?.value || '');
            formData.append('email', form.querySelector('input[name="email"]')?.value || '');
            formData.append('mobileNumber', form.querySelector('input[name="mobileNumber"]')?.value || '');
            formData.append('childName', form.querySelector('input[name="childName"]')?.value || '');
            formData.append('age', form.querySelector('input[name="age"]')?.value || '');
            formData.append('grade', form.querySelector('select[name="grade"]')?.value || '');
            formData.append('userMessage', form.querySelector('textarea[name="userMessage"]')?.value || '');
            formData.append('formSource', 'popup form - abandoned');
            
            const blob = new Blob(
                [new URLSearchParams(Object.fromEntries(formData))],
                {type: 'application/x-www-form-urlencoded'}
            );
            
            if (navigator.sendBeacon) {
                navigator.sendBeacon('/process-abandoned-entry.php', blob);
            }
        }
    });

    // Mark form state
    form.dataset.submitted = 'false';
    form.dataset.submitting = 'false';
    
    // ========== FORM SUBMISSION WITH VALIDATION ==========
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Prevent double submission
        if (form.dataset.submitting === 'true') {
            return false;
        }

        // Hide previous messages
        document.getElementById('popupFormError').style.display = 'none';
        document.getElementById('popupFormSuccess').style.display = 'none';

        // Define validation rules (SAME as main form)
        const validationRules = {
            parentName: {type: 'text', required: true, displayName: 'Parent/Guardian Name'},
            mobileNumber: {type: 'phone', required: true, displayName: 'Mobile Number'},
            email: {type: 'email', required: true, displayName: 'Email Address'},
            childName: {type: 'text', required: true, displayName: 'Student Name'},
            age: {type: 'age', required: true, displayName: 'Student Age'},
            grade: {type: 'select', required: true, displayName: 'Grade'},
            agree: {type: 'checkbox', required: true, displayName: 'Agree to receive communications'}
        };

        // Validate form using centralized validation
        const validationResult = FormValidation.validateForm(form, validationRules);

        if (!validationResult.isValid) {
            document.getElementById('popupErrorMessage').textContent = 'Please fix the errors above and try again.';
            document.getElementById('popupFormError').style.display = 'block';
            return false;
        }
        
        // Mark as submitting and disable button
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
                document.getElementById('popupFormSuccess').style.display = 'block';
                
                // Reset form
                form.reset();
                form.dataset.submitted = 'true';
                form.dataset.submitting = 'false';
                
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Submit Enquiry';
                }
                
                // Close modal and redirect after 2 seconds
                setTimeout(() => {
                    closeModal();
                    window.location.href = 'thank-you.php?ref=' + (data.enquiry_id || 'submitted');
                }, 2000);
            } else {
                // Re-enable button on error
                form.dataset.submitting = 'false';
                
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Submit Enquiry';
                }
                
                // Show error message
                document.getElementById('popupErrorMessage').textContent = data.error || 'An error occurred. Please try again.';
                document.getElementById('popupFormError').style.display = 'block';
            }
        })
        .catch(error => {
            // Re-enable button on error
            form.dataset.submitting = 'false';
            
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.textContent = 'Submit Enquiry';
            }
            
            console.error('Submission error:', error);
            document.getElementById('popupErrorMessage').textContent = 'Network error. Please try again.';
            document.getElementById('popupFormError').style.display = 'block';
        });
        
        return false;
    });
    
    // ========== BUTTON HANDLERS - OPEN MODAL ==========
    document.addEventListener('click', function(e) {
        if (e.target.closest('[data-open-enquiry-modal]')) {
            e.preventDefault();
            openModal();
        }
    });
});
</script>
