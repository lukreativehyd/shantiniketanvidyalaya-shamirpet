# Form Validation System Documentation

## Overview

A comprehensive client-side form validation system has been implemented for both the main enquiry form (`includes/enquiry-form.php`) and the popup enquiry form (`includes/popup-enquiry-form.php`). This system validates user input before sending it to the server, providing immediate feedback and improving the user experience.

## Files Added

### 1. **assets/js/form-validation.js**
- Reusable form validation utilities
- Provides validation functions for common data types
- Handles field error display/clearing
- Validates entire forms with configurable rules

### 2. **assets/css/form-validation.css**
- Styling for validation error states
- Red border and background for fields with errors
- Error message styling
- Shake animation for invalid fields
- Mobile-responsive error styling

## Validation Features

### Supported Validation Types

The validation system supports the following data types:

1. **Text Fields**
   - Validates that field is not empty
   - Removes leading/trailing whitespace

2. **Email Fields**
   - Validates email format using regex pattern
   - Checks for @ symbol and domain extension

3. **Phone Numbers**
   - Validates phone format: 7+ characters with digits, spaces, hyphens, +, parentheses
   - Allows various international phone formats

4. **Age Fields**
   - Validates age is between 3 and 25
   - Ensures numeric value

5. **Select Dropdowns**
   - Validates that an option is selected
   - Rejects empty selections

6. **Checkboxes**
   - Validates that required checkboxes are checked

## Fields Validated

### Main Enquiry Form (includes/enquiry-form.php)

| Field | Type | Required | Validation |
|-------|------|----------|-----------|
| Parent/Guardian Name | Text | Yes | Not empty |
| Mobile Number | Phone | Yes | Valid phone format (7+ chars) |
| Email Address | Email | Yes | Valid email format |
| Student Name | Text | Yes | Not empty |
| Student Age | Age | Yes | Between 3-25 |
| Grade | Select | Yes | Option must be selected |
| Message | Text | No | Optional field |
| Agreement Checkbox | Checkbox | Yes | Must be checked |

### Popup Enquiry Form (includes/popup-enquiry-form.php)

Same fields as main form with identical validation rules.

## Error Messages

The system provides specific error messages for each validation failure:

- **Required field errors**: "{Field Name} is required"
- **Email format errors**: "Please enter a valid email address"
- **Phone format errors**: "Please enter a valid phone number"
- **Age range errors**: "Age must be between 3 and 25"
- **Select field errors**: "Please select a {Field Name}"
- **Checkbox errors**: "Please {Field Label}"
- **General form errors**: "Please fix the errors above and try again"

## Visual Feedback

### Error States

Fields with validation errors display:
- **Red border** around the input field
- **Light red background** (#fff5f5)
- **Error message** below the field in red text
- **Shake animation** to draw attention to the error

### Success States

After successful form submission:
- Green success message is displayed
- Form data is cleared
- User is redirected to thank-you page

## Implementation Details

### JavaScript API

The `FormValidation` object provides the following methods:

```javascript
// Validate email format
FormValidation.isValidEmail(email) // Returns boolean

// Validate phone number
FormValidation.isValidPhone(phone) // Returns boolean

// Validate age
FormValidation.isValidAge(age) // Returns boolean

// Validate text field
FormValidation.isValidText(value) // Returns boolean

// Validate select field
FormValidation.isValidSelect(value) // Returns boolean

// Check checkbox is checked
FormValidation.isChecked(isChecked) // Returns boolean

// Show error for field
FormValidation.showFieldError(inputElement, errorMessage) // Void

// Clear error for field
FormValidation.clearFieldError(inputElement) // Void

// Clear all errors for form
FormValidation.clearAllErrors(formElement) // Void

// Validate entire form
FormValidation.validateForm(formElement, validationRules) // Returns {isValid, errors}
```

### Form Submission Flow

1. User fills form and clicks submit
2. Form submission is prevented (e.preventDefault)
3. Client-side validation runs
4. If validation fails:
   - Errors are displayed on fields
   - General error message is shown
   - Form is not submitted
5. If validation passes:
   - Form data is sent to server via fetch
   - Double-submission is prevented via flag
   - Server-side validation occurs
6. On successful response:
   - Success message is displayed
   - Form is cleared
   - User is redirected after 2 seconds
7. On error response:
   - Error message is displayed
   - User can correct and resubmit

## Browser Compatibility

The form validation system works in all modern browsers:
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

JavaScript features used:
- ES6 classes and arrow functions
- Fetch API
- LocalStorage API
- DOM manipulation

## Mobile Responsiveness

The validation system is fully responsive:
- Error messages are styled appropriately on mobile
- Shake animation works on touch devices
- Form is accessible on small screens
- Messages scroll into view automatically

## Server-Side Validation

While this system provides client-side validation, **server-side validation in process-enquiry.php is still required** as a security measure. Client-side validation can be bypassed, so the server always validates:

- Required fields are not empty
- Email format is valid
- Phone format is valid
- Age is between 3 and 25
- All enum values match allowed choices

## Performance

The validation system is optimized for performance:
- Minimal DOM manipulation
- Efficient field state tracking
- No external dependencies
- Fast regex pattern matching
- ~2KB minified size

## Integration Points

### Pages Using the Forms

The form validation system is automatically included on all pages that use enquiry forms:

1. index.php
2. admissions.php
3. contact.php
4. infrastructure.php
5. curriculum.php
6. activities.php
7. advisory-council.php
8. the-school.php  
9. gallery.php
10. principal.php
11. thank-you.php

### CSS Include

All pages include: `<link rel="stylesheet" href="assets/css/form-validation.css">`

### JavaScript Include

All pages include: `<script src="assets/js/form-validation.js"></script>`

## Testing Recommendations

1. **Field-level validation**: Test each field type with invalid data
2. **Error display**: Verify error messages appear correctly
3. **Error clearing**: Ensure errors clear when field is corrected
4. **Full form validation**: Submit form with various error combinations
5. **Mobile testing**: Test on iOS Safari, Chrome Android
6. **Accessibility**: Test with keyboard navigation, screen readers
7. **Edge cases**: Test with special characters, very long inputs, copy-paste

## Future Enhancements

Potential improvements for future versions:

1. **Real-time validation**: Validate as user types (optional)
2. **Custom error messages**: Allow per-page customization
3. **Additional field types**: Add credit card, date, password validation
4. **Async validation**: Check username/email uniqueness
5. **Grouped error display**: Consolidate all errors at top
6. **Loading state**: Show spinner while form submits
7. **Internationalization**: Support multiple languages for error messages

## Troubleshooting

### Form not validating

- Ensure `form-validation.js` is loaded before form script
- Check browser console for JavaScript errors
- Verify form has correct ID ("enquiryForm" or "popupEnquiryForm")

### Errors not displaying

- Check that `form-validation.css` is loaded
- Verify CSS is not being overridden by other styles
- Check browser dev tools for CSS conflicts

### Server still rejecting valid data

- This is expected - server validation is independent
- Check process-enquiry.php validation rules
- Ensure server validation matches client-side rules

## Support

For issues or questions about the form validation system:
1. Check this documentation
2. Review form-validation.js comments
3. Check browser console for error messages
4. Verify all files are properly included on the page
