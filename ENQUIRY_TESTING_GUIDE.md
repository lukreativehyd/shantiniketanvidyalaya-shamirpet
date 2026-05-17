# Enquiry Form Integration - Testing Guide

## What Was Fixed

### 1. **Field Mapping** ✅
Both forms now properly map to the enquiries database:

**Contact Form (contact.php)**
- Full Name → `name`
- Email → `email`
- Phone → `phone` (optional)
- Subject → `subject`
- Message → `message`
- Auto-set to → `source: 'contact'`

**Home Page Form (index.php)**
- Parent Name → `name`
- Email → `email`
- Phone → `phone` (optional)
- Student Info & Grade → `subject`
- All details → `message`
- Auto-set to → `source: 'home'`

### 2. **Form Submission** ✅
- **Contact Form**: Now uses AJAX to submit data
- **Home Form**: Updated AJAX handler
- Both show loading state while submitting
- Error handling for validation and network issues
- Success messages with reference number

### 3. **Thank You Page** ✅
Created `/thank-you.php` with:
- ✅ Success checkmark animation
- ✅ Reference number display
- ✅ Next steps explanation
- ✅ Back to Home button
- ✅ Contact Us button
- ✅ Phone support information

### 4. **Data Flow**
```
Home/Contact Form → process-enquiry.php → Enquiries Table
                                        ↓
                              Thank You Page (with ref)
                                        ↓
                              Admin Dashboard Display
```

---

## Testing Steps

### Test #1: Home Page Form
1. Go to: `http://localhost:8888/index.php`
2. Scroll to "Get in Touch" section
3. Fill in all fields:
   - Parent Name: "Test Parent"
   - Parent Email: "test@example.com"
   - Phone: "+919876543210"
   - Student First Name: "John"
   - Student Last Name: "Doe"
   - Student Age: 10
   - Grade: "Grade 6 - 8"
   - Message: "Interested in admission"
4. Click "Submit Enquiry"
5. **Expected**: Redirect to thank-you page with reference number

### Test #2: Contact Page Form
1. Go to: `http://localhost:8888/contact.php`
2. Scroll to contact form
3. Fill in all fields:
   - Full Name: "Jane Smith"
   - Email: "jane@example.com"
   - Phone: "+919123456789"
   - Subject: "Admission Inquiry"
   - Message: "I have questions about admission"
4. Click "Send Message"
5. **Expected**: Success message appears in green box + Reference number displayed

### Test #3: Admin Dashboard
1. Login to admin: `http://localhost:8888/admin/dashboard.php`
2. Username: `admin`
3. Password: `admin123`
4. Check "Recent Enquiries" widget
5. Go to **Enquiries** page
6. **Expected**: Your test submissions appear in the list

---

## Data Saved in Database

Each enquiry saves:
- ✅ ID (auto-generated: ENQ_XXXXX)
- ✅ Contact Name
- ✅ Email Address
- ✅ Phone Number
- ✅ Subject/Topic
- ✅ Full Message (with student info if from home page)
- ✅ Source (home or contact)
- ✅ Status (new, responded, in_progress)
- ✅ Created Date & Updated Date
- ✅ Admin Notes (optional)

---

## Features Live

✅ **Form Submission**: AJAX-based, no page reload needed  
✅ **Validation**: Email, required fields, phone format  
✅ **Database Integration**: SQLite (local) / MySQL (production)  
✅ **Admin Panel**: View all enquiries with filters  
✅ **Thank You Page**: Beautiful redirect with reference number  
✅ **Email Notifications**: Sent to `shantiniketan99@gmail.com` (optional)  
✅ **Source Tracking**: Know where each enquiry came from  
✅ **Status Management**: Track progress (new/responded/in-progress)  

---

## If Something Doesn't Work

### Forms not submitting?
- Check browser console (F12) for JavaScript errors
- Verify process-enquiry.php is accessible
- Check that database setup was run: `/admin/setup-local-db.php`

### Enquries not appearing on dashboard?
- Verify you're logged in as admin
- Check if test_database.db exists in `/admin/` folder
- Try refreshing the page

### Thank you page showing error?
- Make sure thank-you.php file exists
- Check Reference parameter is passed in URL
- Verify top-bar.php and footer.php are accessible

---

## Next Steps (Optional Enhancements)

- [ ] Add file attachments to enquiry form
- [ ] Export enquiries to Excel
- [ ] Send WhatsApp notifications to admins
- [ ] Auto-reply emails to enquirers
- [ ] Enquiry follow-up scheduling
- [ ] Add enquiry search and filters

---

**All systems ready for testing! 🚀**
