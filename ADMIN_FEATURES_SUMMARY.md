# Admin Panel Features - Enquiries & Abandoned Entries Management

## Overview
The admin panel now includes two comprehensive management sections for handling student admission enquiries and tracking partially completed form submissions.

---

## 1. Enquiries Management (`/admin/enquiries.php`)

### Purpose
View, filter, manage, and respond to completed admission enquiry submissions.

### Key Features

#### 1.1 Enquiry Display
- **List View**: Shows all completed enquiries in card format
- **Fields Displayed**:
  - Contact name
  - Email address
  - Phone number
  - Subject line
  - Submission date/time
  - Current status badge

#### 1.2 Status Management
- **Status Options**: New | Contacted | Closed
- **Inline Status Update**: Dropdown selector on each entry for quick status changes
- **Persistent Status**: Updates saved to database immediately

#### 1.3 Filtering System
- **Date Range Filters**: 
  - From Date (default: 30 days back)
  - To Date (default: today)
  - Auto-filters entries within selected date range
- **Status Filter**: Filter by New, Contacted, or Closed status
- **Quick Filter Buttons**: Apply filters with single click

#### 1.4 Email Communication
- **Email Modal**: Built-in email composer
- **Features**:
  - Auto-populated recipient email
  - Customizable subject line
  - Pre-filled email template (acknowledgment message)
  - Edit template before sending
  - Opens system email client (mailto) for sending
- **Use Case**: Send acknowledgment, follow-up, or rejection emails to parents

#### 1.5 Copy Entry Feature
- **One-Click Copy**: Copy full entry details to clipboard
- **Format**: Structured text with all key information
- **Use Case**: Paste into CRM, notes, or external systems

#### 1.6 WhatsApp Integration
- **WhatsApp Share Button**: Direct link to WhatsApp
- **Functionality**: 
  - Opens WhatsApp with phone number pre-filled
  - Pre-formatted message about the enquiry
  - Works on desktop (opens web.whatsapp.com) and mobile (opens app)
- **Use Case**: Initiate direct messaging with parents

#### 1.7 CSV Export
- **Download Button**: "Download CSV" 
- **Exported Fields**:
  - ID, Name, Email, Phone, Subject, Message (excerpt), Status, Created At
- **File Naming**: `enquiries_YYYY-MM-DD_HHmmss.csv`
- **Filter Support**: Export respects applied date and status filters
- **Use Case**: External reporting, CRM imports, data analysis

#### 1.8 Delete Functionality
- **Permanent Delete**: Remove entries from database
- **Confirmation Dialog**: Prevents accidental deletion
- **Use Case**: Clean up test/duplicate entries

---

## 2. Abandoned Entries Management (`/admin/abandoned-entries.php`)

### Purpose
Track and recover leads from partially completed form submissions. Capture users who started filling the form but didn't complete it.

### How It Works

#### 2.1 Abandoned Entry Detection
- **Trigger**: When user navigates away from page with partial form data
- **Capture Condition**: Email OR Phone number must be filled (prevents capturing completely empty forms)
- **Detection Method**: Browser beforeunload event with sendBeacon API
- **Data Logged**:
  - Parent name
  - Email address
  - Phone number
  - Student name
  - Age
  - Grade
  - User message (if provided)
  - Timestamp when entry was abandoned

#### 2.2 Entry Display
- **List View**: Card-based layout with color-coded status borders
- **Status Badge Colors**:
  - Red border: New (not contacted)
  - Orange border: Contacted
  - Gray border: Closed
- **Information Shown**:
  - Parent/guardian name
  - Email and phone (key recovery info)
  - Student name and grade
  - Time abandoned
  - Current status

#### 2.3 Status Tracking
- **Status Options**: New | Contacted | Closed
- **Usage**:
  - **New**: Initial state for all abandoned entries
  - **Contacted**: Mark after reaching out to parent
  - **Closed**: Entry resolved or no longer relevant
- **Inline Update**: Dropdown selector with automatic save

#### 2.4 Filtering & Date Range
- **Date Range Filters**:
  - From Date (default: 30 days back)
  - To Date (default: today)
  - Filter entries by when they were abandoned
- **Status Filter**: View New, Contacted, or Closed entries only
- **Quick Apply**: Single "Filter" button applies all selected filters

#### 2.5 Email Communication
- **Email Modal**: Customizable email composer
- **Features**:
  - Auto-populated recipient email
  - Pre-filled subject: "We're Here to Help - Complete Your Admission Form"
  - Template message encouraging to complete the form
  - Highlight assistance availability and contact info
- **Template Text**:
  ```
  Dear Parent,
  
  We noticed you started filling out the admission form but didn't complete it. 
  We're here to help!
  
  If you have any questions or need assistance with the application, 
  please don't hesitate to reach out.
  
  Contact us:
  Phone: +91 7671003535
  Email: snis.shamirpet@gmail.com
  
  Best regards,
  Shantiniketan Vidyalaya
  ```

#### 2.6 Copy Entry Feature
- **One-Click Copy**: Copy structured entry data to clipboard
- **Format**: 
  ```
  Parent Name: [name]
  Email: [email]
  Phone: [phone]
  Student Name: [student]
  Age: [age]
  Grade: [grade]
  Message: [message if any]
  Abandoned At: [datetime]
  ```
- **Use Case**: Paste into spreadsheet, note systems, or CRM

#### 2.7 WhatsApp Integration
- **Direct WhatsApp Link**: Opens WhatsApp conversation
- **Message Template**: Pre-filled message about completing the form
- **Click-to-Message**: Instant outreach to parent's phone number
- **Use Case**: Quick follow-up when email contact not available

#### 2.8 CSV Export
- **Download Button**: "Download CSV" link
- **Exported Columns**:
  - ID, Parent Name, Email, Phone, Student Name, Age, Grade, Status, Abandoned At
- **File Format**: Standard CSV format
- **Filter Support**: Respects all applied date and status filters
- **File Naming**: `abandoned-entries_YYYY-MM-DD_HHmmss.csv`
- **Use Case**: 
  - Data analysis of conversion bottlenecks
  - External outreach campaigns
  - CRM imports
  - Lead scoring

#### 2.9 Delete Functionality
- **Remove Entries**: Permanently delete from database
- **Confirmation**: Prevent accidental deletion
- **Use Case**: Clean up old/irrelevant entries

---

## 3. Database Tables

### Enquiries Table
```
id              - TEXT PRIMARY KEY (SNSPXXXX format)
name            - VARCHAR(255) - Parent/Guardian name
email           - VARCHAR(255) - Parent email
phone           - VARCHAR(20) - Parent phone
subject         - TEXT - Enquiry subject
message         - LONGTEXT - Combined message with student details
source          - VARCHAR(50) - Form source (home, admissions, etc.)
status          - VARCHAR(50) - new | contacted | closed
notes           - TEXT - Admin notes
created_at      - DATETIME - Submission timestamp
updated_at      - DATETIME - Last modified timestamp
```

### Abandoned Entries Table
```
id              - VARCHAR(50) PRIMARY KEY
parent_name     - VARCHAR(255) - Parent/Guardian name
email           - VARCHAR(255) - Parent email
phone           - VARCHAR(20) - Parent phone
student_name    - VARCHAR(255) - Student name
age             - INT - Student age
grade           - VARCHAR(50) - Grade level
message         - LONGTEXT - Any message from form
source          - VARCHAR(50) - Form source
status          - VARCHAR(50) - new | contacted | closed (default: new)
abandoned_at    - DATETIME - When form was abandoned
created_at      - DATETIME - When record was created
updated_at      - DATETIME - Last modified timestamp
```

---

## 4. Workflow Examples

### Scenario 1: Completing a Partial Enquiry
1. Parent starts filling form on Home page
2. Gets distracted and navigates away
3. System captures abandoned entry (if email/phone filled)
4. Admin sees entry in "Abandoned Entries" section
5. Admin clicks WhatsApp to send quick reminder
6. Parent clicks link and completes the form
7. Enquiry now appears in "Enquiries" section
8. Admin updates status from "New" to "Contacted"

### Scenario 2: Bulk Communication Campaign
1. Admin opens "Abandoned Entries" for past 7 days
2. Filters for "New" status entries only
3. Downloads CSV with all contact info
4. Reviews entries and identifies target group
5. For each entry, clicks Email button to send personalized message
6. Uses WhatsApp for hot leads who didn't respond to email
7. Updates status to "Contacted" to track outreach

### Scenario 3: Admin Follow-up
1. Admin reviews "Enquiries" section
2. Identifies entries from one week ago with "New" status
3. Sends follow-up email to determine next steps
4. Updates status to "Contacted"
5. If parent confirms admission → update to "Closed"
6. If parent declines → update to "Closed"

---

## 5. Browser Compatibility

### Supported Features
- **Email Modal**: All modern browsers
- **Copy to Clipboard**: Chrome, Firefox, Safari, Edge (requires HTTPS in production)
- **WhatsApp Integration**: Works on both desktop and mobile
- **CSV Export**: All browsers
- **Status Updates**: All modern browsers

### Notes
- Email sending opens native email client (localhost limitation: no SMTP configured)
- In production, email will work automatically with proper server configuration
- WhatsApp requires phone numbers in valid format (07671003535 or +917671003535)

---

## 6. Admin Navigation

### Sidebar Menu
```
Dashboard          → Overview and statistics
↓
Enquiries          → Management of completed enquiries
↓
Abandoned Entries  → Recovery of incomplete form submissions
↓
Blogs              → Blog post management
↓
Change Password    → Update admin credentials
↓
Logout             → Exit admin panel
```

---

## 7. Key Differences

| Feature | Enquiries | Abandoned Entries |
|---------|-----------|------------------|
| **Trigger** | Complete form submission | Partial form + navigation away |
| **Capture Condition** | All required fields | Email OR Phone only |
| **ID Format** | SNSP1001, SNSP1002... | ABD_timestamp_random |
| **Status Options** | New, Contacted, Closed | New, Contacted, Closed |
| **Purpose** | Confirmed interest | Lead recovery |
| **Email Template** | Acknowledgment | Completion encouragement |
| **Usage Priority** | Process applications | Recover lost leads |

---

## 8. Front-end Integration

### Form Detection
- **Location**: `/includes/enquiry-form.php`
- **Abandoned Entry Capture**: beforeunload event listener
- **Data Transmission**: navigator.sendBeacon to `process-abandoned-entry.php`
- **Guarantee**: Sends data even if user closes tab/window

### Form Pages Using This System
1. Home Page (`index.php`)
2. Admissions Page (`admissions.php`)

---

## 9. Email Communication Notes

### Localhost Behavior
- Email modal opens but uses `mailto:` links
- Requires manual email client interaction
- Perfect for testing workflow

### Production Behavior
- SMTP configured on Hostinger
- Emails send automatically in background
- No user interaction required
- Can add email logging and tracking

### Future Enhancement
- Add email templates in admin panel
- Email sending status tracking
- Email log history
- Scheduled follow-up reminders

---

## 10. Contact Information

Default email for admin notifications: **snis.shamirpet@gmail.com**  
Default WhatsApp number: **+91 7671003535**

---

**Last Updated**: March 9, 2025
**Version**: 1.0
