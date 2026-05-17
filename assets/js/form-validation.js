/**
 * Form Validation Utilities
 * Provides reusable validation functions for enquiry forms
 */

const FormValidation = {
    /**
     * Validate email format
     * @param {string} email
     * @returns {boolean}
     */
    isValidEmail: function(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    },

    /**
     * Validate phone number (7-20 characters, digits and common separators)
     * @param {string} phone
     * @returns {boolean}
     */
    isValidPhone: function(phone) {
        const phoneRegex = /^[0-9\s\-\+\(\)]{7,}$/;
        return phoneRegex.test(phone);
    },

    /**
     * Validate age (must be between 3 and 25)
     * @param {string|number} age
     * @returns {boolean}
     */
    isValidAge: function(age) {
        const ageNum = parseInt(age, 10);
        return !isNaN(ageNum) && ageNum >= 3 && ageNum <= 25;
    },

    /**
     * Validate text field (not empty)
     * @param {string} value
     * @returns {boolean}
     */
    isValidText: function(value) {
        return typeof value === 'string' && value.trim().length > 0;
    },

    /**
     * Validate select field (value must be selected)
     * @param {string} value
     * @returns {boolean}
     */
    isValidSelect: function(value) {
        return value && value.trim().length > 0;
    },

    /**
     * Validate checkbox is checked
     * @param {boolean} isChecked
     * @returns {boolean}
     */
    isChecked: function(isChecked) {
        return isChecked === true;
    },

    /**
     * Show error message for field
     * @param {HTMLElement} inputElement
     * @param {string} errorMessage
     */
    showFieldError: function(inputElement, errorMessage) {
        // Remove existing error if present
        this.clearFieldError(inputElement);

        // Add error class
        inputElement.classList.add('form-input-error');

        // Create and insert error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'form-field-error-message';
        errorDiv.textContent = errorMessage;
        errorDiv.style.cssText = `
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 4px;
            display: block;
        `;

        // Insert after input element
        inputElement.parentElement.appendChild(errorDiv);
    },

    /**
     * Clear error message for field
     * @param {HTMLElement} inputElement
     */
    clearFieldError: function(inputElement) {
        // Remove error class
        inputElement.classList.remove('form-input-error');

        // Remove error message
        const existingError = inputElement.parentElement.querySelector('.form-field-error-message');
        if (existingError) {
            existingError.remove();
        }
    },

    /**
     * Clear all form errors for a specific form
     * @param {HTMLElement} formElement
     */
    clearAllErrors: function(formElement) {
        const inputs = formElement.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            this.clearFieldError(input);
        });
    },

    /**
     * Validate entire form
     * @param {HTMLElement} formElement
     * @param {Object} validationRules - Object with field names as keys and validation config as values
     * @returns {Object} - {isValid: boolean, errors: {fieldName: errorMessage}}
     *
     * Example validationRules:
     * {
     *   parentName: {type: 'text', required: true, displayName: 'Parent/Guardian Name'},
     *   email: {type: 'email', required: true, displayName: 'Email Address'},
     *   mobileNumber: {type: 'phone', required: true, displayName: 'Mobile Number'},
     *   childName: {type: 'text', required: true, displayName: 'Student Name'},
     *   age: {type: 'age', required: true, displayName: 'Student Age'},
     *   grade: {type: 'select', required: true, displayName: 'Grade'},
     *   userMessage: {type: 'text', required: false, displayName: 'Message'},
     *   agree: {type: 'checkbox', required: true, displayName: 'Agreement'}
     * }
     */
    validateForm: function(formElement, validationRules) {
        const errors = {};
        let isValid = true;

        // Clear previous errors
        this.clearAllErrors(formElement);

        // Validate each field according to rules
        Object.keys(validationRules).forEach(fieldName => {
            const rule = validationRules[fieldName];
            const fieldElement = formElement.querySelector(`[name="${fieldName}"]`);

            if (!fieldElement) {
                console.warn(`Field element not found: ${fieldName}`);
                return;
            }

            let fieldValue = fieldElement.type === 'checkbox' 
                ? fieldElement.checked 
                : fieldElement.value.trim();

            let fieldError = null;

            // Check if field is required and empty
            if (rule.required && !fieldValue) {
                fieldError = `${rule.displayName} is required`;
            }
            // Only validate if field has a value or is required
            else if (fieldValue) {
                switch (rule.type) {
                    case 'email':
                        if (!this.isValidEmail(fieldValue)) {
                            fieldError = `Please enter a valid email address`;
                        }
                        break;
                    case 'phone':
                        if (!this.isValidPhone(fieldValue)) {
                            fieldError = `Please enter a valid phone number`;
                        }
                        break;
                    case 'age':
                        if (!this.isValidAge(fieldValue)) {
                            fieldError = `Age must be between 3 and 25`;
                        }
                        break;
                    case 'text':
                        if (!this.isValidText(fieldValue)) {
                            fieldError = `${rule.displayName} cannot be empty`;
                        }
                        break;
                    case 'select':
                        if (!this.isValidSelect(fieldValue)) {
                            fieldError = `Please select a ${rule.displayName}`;
                        }
                        break;
                    case 'checkbox':
                        if (!this.isChecked(fieldValue)) {
                            fieldError = `${rule.displayName}`;
                        }
                        break;
                }
            }
            // For checkbox: validate if required
            else if (rule.type === 'checkbox' && rule.required) {
                if (!fieldElement.checked) {
                    fieldError = `Please ${rule.displayName}`;
                }
            }

            // Store error
            if (fieldError) {
                errors[fieldName] = fieldError;
                this.showFieldError(fieldElement, fieldError);
                isValid = false;
            }
        });

        return {
            isValid: isValid,
            errors: errors
        };
    }
};
