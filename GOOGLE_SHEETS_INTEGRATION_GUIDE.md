
# Google Sheets Integration Setup Guide

## Overview

The centralized enquiry form now collects student leads and can automatically send them to both:
1. **Local Database** (SQLite) - for admin management
2. **Google Sheets** - for real-time spreadsheet tracking

---

## Step-by-Step Setup Instructions

### Step 1: Create a Google Sheet

1. Go to [Google Sheets](https://sheets.google.com)
2. Create a new spreadsheet named "Shantiniketan Vidyalaya - Student Leads"
3. Create the following column headers in Row 1:

| A | B | C | D | E | F | G |
|---|---|---|---|---|---|---|
| **Timestamp** | **Parent Name** | **Mobile Number** | **Email** | **Student Name** | **Age** | **Grade** |

> **Important:** Match these column names exactly with the spreadsheet headers. You can add additional columns as needed, but these 7 are required.

### Step 2: Set Up Google Apps Script

1. In your Google Sheet, click **Extensions → Apps Script**
2. Delete any existing code in the script editor
3. Paste the following code:

```javascript
function doPost(e) {
  try {
    var sheet = SpreadsheetApp.getActiveSheet();
    
    // Parse JSON request body
    var data = JSON.parse(e.postData.contents);
    
    // Format timestamp
    var timestamp = new Date();
    
    // Extract parameters from the incoming data
    var parentName = data.parentName || '';
    var mobileNumber = data.mobileNumber || '';
    var email = data.email || '';
    var childName = data.childName || '';
    var age = data.age || '';
    var grade = data.grade || '';
    var message = data.message || '';
    
    // Append row to sheet (matches the form field order)
    sheet.appendRow([
      timestamp,
      parentName,
      mobileNumber,
      email,
      childName,
      age,
      grade
    ]);
    
    // Optional: Append message to a notes column if it exists
    if (message && sheet.getLastColumn() >= 8) {
      sheet.getRange(sheet.getLastRow(), 8).setValue(message);
    }
    
    // Return success response
    return ContentService.createTextOutput(JSON.stringify({
      status: 'success',
      message: 'Data saved to Google Sheets',
      timestamp: timestamp.toString()
    })).setMimeType(ContentService.MimeType.JSON);
    
  } catch(error) {
    // Return error response
    return ContentService.createTextOutput(JSON.stringify({
      status: 'error',
      message: error.toString()
    })).setMimeType(ContentService.MimeType.JSON);
  }
}
```

### Step 3: Deploy Apps Script as Web App

1. In the Apps Script editor, click **Deploy → New deployment**
2. Select **Type** → Click the dropdown and choose **Web app**
3. Configure as follows:
   - **Execute as:** Your Google account (the one that owns the spreadsheet)
   - **Who has access:** "Anyone" (or "Anyone with the link" if you need more security)
4. Click **Deploy**
5. You'll see a dialog with your deployment URL - **COPY THIS URL** (it will look like:)
   ```
   https://script.google.com/macros/d/{SCRIPT_ID}/usercontent
   ```

### Step 4: Add Webhook URL to Website

1. Open `process-enquiry.php` in your website code
2. Find this line near the top:
   ```php
   define('GOOGLE_SHEET_WEBHOOK_URL', '');
   ```
3. Replace it with:
   ```php
   define('GOOGLE_SHEET_WEBHOOK_URL', 'https://script.google.com/macros/d/{YOUR_SCRIPT_ID}/usercontent');
   ```
   > Replace `{YOUR_SCRIPT_ID}` with the ID from your deployment URL

### Step 5: Test the Integration

1. Go to your website's home page (http://localhost:8000)
2. Scroll to the "Get in Touch" form
3. Fill out the form with test data:
   - Parent/Guardian Name: "Test Parent"
   - Mobile Number: "9876543210"
   - Email: "test@example.com"
   - Student Name: "Test Student"
   - Age: "10"
   - Grade: "Grade 5"
   - Message: (optional)
   - Agreement: Check the box
4. Click "Submit Enquiry"
5. Check both places:
   - **Local Admin Panel:** http://localhost:8001/admin/enquiries.php
   - **Google Sheet:** Your spreadsheet should show the new row

---

## Form Field Mapping

The centralized form collects the following fields and maps them as shown:

| Form Field | Database Column | Google Sheets Column | Type |
|---|---|---|---|
| Parent/Guardian Name | `name` | B (Parent Name) | Text |
| Mobile Number | `phone` | C (Mobile Number) | Text |
| Email Address | `email` | D (Email) | Email |
| Student Name | `name` (part of) | E (Student Name) | Text |
| Student Age | `age` | F (Age) | Number |
| Grade | `grade` | G (Grade) | Text |
| Message | `message` | H (Optional) | Text |

---

## Using the Form on Multiple Pages

The centralized form is stored in `includes/enquiry-form.php` and can be used on any page by adding:

```php
<?php include 'includes/enquiry-form.php'; ?>
```

The form automatically detects which page it's being used on and sets the `formSource` field accordingly:
- `home` - Home/Index page
- `admissions` - Admissions page
- `contact` - Contact page
- `other` - Any other pages

You can see this in the form's JavaScript and in the admin panel where enquiries are filtered by source.

---

## Centralized Form Structure

The form component (`includes/enquiry-form.php`) includes:

### Features:
- ✅ Fully responsive design
- ✅ Client-side validation
- ✅ Server-side validation
- ✅ Error handling with user feedback
- ✅ Success message display
- ✅ Automatic form reset after submission
- ✅ Grade selection (Grade 1-10)
- ✅ Optional message field
- ✅ Consent checkbox
- ✅ Page source tracking

### Styling:
- Consistent with your school branding
- Parent/Guardian section
- Student Details section
- Professional form styling
- Mobile responsive

### JavaScript Features:
- Non-blocking form submission
- Real-time error display
- Success notification (5-second auto-hide)
- Form source auto-detection
- AJAX submission (no page reload)

---

## Data Flow Diagram

```
┌─────────────────────────┐
│   Website User Submits   │
│    Enquiry Form on      │
│   Home/Admissions Page  │
└───────────┬─────────────┘
            │
            ▼
┌──────────────────────────┐
│ process-enquiry.php      │
│ ├─ Validates input       │
│ ├─ Saves to Local DB     │
│ ├─ Sends to Google Sheet │
│ └─ Sends email           │
└───────────┬──────────────┘
            │
    ┌───────┴────────┐
    │                │
    ▼                ▼
┌────────────┐  ┌──────────────────┐
│ SQLite DB  │  │  Google Sheet    │
│ (Admin)    │  │  (Real-time)     │
└────────────┘  └──────────────────┘
```

---

## Database Storage

All submissions are saved locally in the SQLite database with:
- Unique Enquiry ID (ENQ-XXXXX)
- Timestamp
- All form fields
- Form source page
- Status (new/contacted/closed)

View and manage all enquiries in the admin panel: `/admin/enquiries.php`

---

## Email Notifications

Each submission triggers an email to: `shantiniketan99@gmail.com`

The email includes:
- Enquiry reference ID
- Parent/Guardian information
- Student information
- Message (if provided)
- Direct link to admin panel

---

## Troubleshooting

### Form not sending to Google Sheets
1. Check if `GOOGLE_SHEET_WEBHOOK_URL` is set correctly in `process-enquiry.php`
2. Verify the Apps Script is deployed as "Web app" with "Anyone" access
3. Check browser console for JavaScript errors
4. Data should still save to local database even if Google Sheets fails

### Google Sheets not receiving data
1. Verify your column headers match exactly:
   - `Timestamp`, `Parent Name`, `Mobile Number`, `Email`, `Student Name`, `Age`, `Grade`
2. Check Apps Script error logs: Extensions → Apps Script → Executions
3. Ensure the sheet is the "active" sheet (first tab)
4. Verify you're using the correct deployment URL

### Permission issues
- Make sure the Google account deploying the Apps Script owns the spreadsheet
- Deploy with "Execute as: [Your Account]"
- Set "Who has access: Anyone" for public form submissions

---

## Advanced: Adding More Columns

To add additional data columns to Google Sheets:

1. Add new columns to your spreadsheet (e.g., Column H for "Message")
2. Update the Apps Script `doPost` function to include the new field
3. Update the `process-enquiry.php` to pass additional data if needed

---

## Security Notes

1. **HTTPS:** When deploying to production, ensure your website uses HTTPS
2. **Google Sheets:** Consider limiting Google Sheet access to authorized staff only
3. **Admin Panel:** Password-protect your admin enquiry management panel
4. **Validation:** All input is validated both client-side and server-side
5. **Database:** Sensitive data is stored securely in your local database

---

## Support & Maintenance

- Keep Google Apps Script updated
- Monitor your Google Sheet for quota limits
- Regularly backup your database
- Review submissions in admin panel weekly
- Archive old records periodically

---

## File References

| File | Purpose |
|---|---|
| `includes/enquiry-form.php` | Centralized form component |
| `process-enquiry.php` | Form submission handler |
| `admin/db-config.php` | Database configuration |
| `admin/enquiries.php` | Admin panel for viewing enquiries |

---

**Version:** 1.0  
**Last Updated:** March 2026  
**Compatibility:** PHP 7.2+, SQLite, Google Sheets
