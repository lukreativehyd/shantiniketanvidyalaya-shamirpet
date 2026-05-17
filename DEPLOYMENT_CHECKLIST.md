# Admin System Deployment Checklist

Complete these steps in order to deploy the admin system to Hostinger.

---

## ✅ PRE-DEPLOYMENT (Do Before Uploading)

- [ ] Read `ADMIN_README.md` (quick overview)
- [ ] Read `ADMIN_DEPLOYMENT_GUIDE.md` (detailed guide)
- [ ] Have Hostinger cPanel credentials ready
- [ ] Know your database name/user/password

---

## ✅ STEP 1: Database Setup (Hostinger cPanel)

1. Login to cPanel at your Hostinger account
2. Find "MySQL Databases" section
3. **Create Database:**
   - [ ] Click "Create New Database"
   - [ ] Name: `shamirpet_admin` (or your choice)
   - [ ] Copy database name → save it
4. **Create Database User:**
   - [ ] Click "Create New User"
   - [ ] Username: `cpanel_username_appname` (usually auto-filled)
   - [ ] Set strong password
   - [ ] Copy username & password → **SAVE THESE**
5. **Add User to Database:**
   - [ ] Select database and user
   - [ ] Click "Add"
   - [ ] Check ALL PRIVILEGES
   - [ ] Click "Make Changes"

---

## ✅ STEP 2: Update Configuration File

1. Edit `admin/db-config.php` in your editor
2. Update these lines:
   ```php
   define('DB_HOST', 'localhost');           // Usually localhost
   define('DB_USER', 'YOUR_CPANEL_USER');    // From step 1
   define('DB_PASS', 'YOUR_PASSWORD');       // From step 1
   define('DB_NAME', 'YOUR_DATABASE_NAME');  // From step 1
   ```
3. Save the file
4. Verify changes are correct

---

## ✅ STEP 3: Upload Files to Hostinger

1. Connect via FTP (or use cPanel File Manager)
2. Navigate to `public_html` directory
3. Upload entire `admin` folder:
   - [ ] admin/db-config.php
   - [ ] admin/login.php
   - [ ] admin/dashboard.php
   - [ ] admin/enquiries.php
   - [ ] admin/blogs.php
   - [ ] admin/change-password.php
   - [ ] admin/logout.php
   - [ ] admin/database-setup.php
   - [ ] admin/.htaccess
   - [ ] admin/SETUP_GUIDE.md
   - [ ] admin/.gitignore

4. Create this folder in `admin/`:
   - [ ] `uploads/` (folder)
     - [ ] Inside, create: `blogs/` (subfolder)

5. Set File Permissions:
   - [ ] admin/*.php files → 644
   - [ ] admin/uploads/ → 755
   - [ ] admin/uploads/blogs/ → 755

---

## ✅ STEP 4: Initialize Database

1. Open browser
2. Visit: `http://yoursite.com/admin/database-setup.php`
3. Wait for page to load
4. Look for message: **"Database setup complete!"**
5. Check that you see: Tables created, default admin user set
6. **IMMEDIATELY delete database-setup.php:**
   - [ ] Via FTP/File Manager, delete: `admin/database-setup.php`
   - [ ] Confirm it's deleted

---

## ✅ STEP 5: Test Login

1. Open browser
2. Visit: `http://yoursite.com/admin/login.php`
3. Login with default credentials:
   - Username: `admin`
   - Password: `admin123`
4. Verify you see the Dashboard
5. Confirm statistics load (no errors)

---

## ✅ STEP 6: Change Default Password (CRITICAL!)

1. Click "Dashboard" menu
2. Click "Change Password"
3. Enter current password: `admin123`
4. Enter new strong password:
   - [ ] At least 8 characters
   - [ ] Mix of uppercase & lowercase
   - [ ] Include numbers & symbols if possible
   - [ ] Example: `MySchool@2024!`
5. Confirm new password
6. Click "Change Password"
7. Verify success message
8. **LOGOUT and LOGIN with new password**
9. Confirm login works

---

## ✅ STEP 7: Configure School Information

1. Edit `process-enquiry.php` (email notifications)
   - [ ] Find line with: `$to = 'shantiniketan99@gmail.com'`
   - [ ] Replace with your admin email
   - [ ] Save file

2. Edit `admin/enquiries.php` (WhatsApp phone)
   - [ ] Find line with: `wa.me/917671003535`
   - [ ] Replace with your school's WhatsApp number
   - [ ] Save file

3. Re-upload both files to Hostinger

---

## ✅ STEP 8: Test Enquiry Form

1. Navigate to your website's contact page
2. Fill out the enquiry form:
   - [ ] Name: Test User
   - [ ] Email: test@example.com
   - [ ] Phone: 9999999999
   - [ ] Subject: Test Enquiry
   - [ ] Message: This is a test
3. Submit the form
4. Check for success message
5. Login to admin panel
6. Go to Dashboard → Click "View Enquiries"
7. Verify your test enquiry appears in the list
8. Click to view details
9. Test status update → Change to "Read"
10. Test adding notes
11. Test WhatsApp share button

---

## ✅ STEP 9: Test Blog Management

1. Login to admin panel
2. Go to Dashboard → Click "New Blog" button
3. Create test blog:
   - [ ] Title: "Welcome to Our Blog"
   - [ ] Excerpt: "This is a test blog post"
   - [ ] Content: Type some text and format it (bold, italic, etc.)
   - [ ] Upload a featured image
   - [ ] Status: Draft
4. Click "Create Blog"
5. Verify success message
6. Go back to Blog section
7. Verify blog appears in list as "Draft"
8. Click Edit
9. Change status to "Published"
10. Click "Update Blog"
11. Verify it now shows as "Published"

---

## ✅ STEP 10: Test Excel Export

1. Go to Enquiries section
2. Scroll down, look for enquiries table
3. At top, click "Export Excel" button
4. **Option A:** If PhpSpreadsheet installed:
   - [ ] Download as .xlsx file
   - [ ] Open in Excel/Numbers
   - [ ] Verify all columns and data present
5. **Option B:** If not installed (fallback):
   - [ ] Download as .csv file
   - [ ] Open in Excel/Numbers
   - [ ] Verify all columns and data present

---

## ✅ STEP 11: Security Verification

1. Verify `.htaccess` is in `admin/` folder
   - [ ] Check via FTP/File Manager
2. Test that database-setup.php is deleted
   - [ ] Try to access: `http://yoursite.com/admin/database-setup.php`
   - [ ] Should show 404 Not Found error
3. Test login session security:
   - [ ] Open admin panel in one tab
   - [ ] Open different website in different tab
   - [ ] Verify you can't directly access admin URLs
4. Test logout:
   - [ ] Click logout button
   - [ ] Try to access admin/dashboard.php directly
   - [ ] Should redirect to login

---

## ✅ STEP 12: Final Verification

- [ ] Admin login works
- [ ] Dashboard loads without errors
- [ ] Enquiry form saves to database
- [ ] Enquiry appears in admin panel
- [ ] Can update enquiry status
- [ ] Can add enquiry notes
- [ ] Can export to Excel/CSV
- [ ] Can create blog post
- [ ] Can upload featured image
- [ ] Can edit blog post
- [ ] Can change publish status
- [ ] Can change admin password
- [ ] Can logout and login again
- [ ] WhatsApp link works
- [ ] All files uploaded correctly
- [ ] Permissions set correctly
- [ ] database-setup.php is deleted

---

## 🎉 DEPLOYMENT COMPLETE!

If all checkboxes above are checked, your admin system is **fully deployed and working!**

---

## 📞 Troubleshooting Quick Reference

| Issue | Solution |
|-------|----------|
| "Cannot connect to database" | Check DB credentials in db-config.php |
| "404 on login page" | Verify admin/ folder uploaded correctly |
| "Login fails with correct password" | Clear browser cache, try incognito window |
| "Enquiry doesn't save" | Check database user has proper privileges |
| "Image upload fails" | Create admin/uploads/blogs/ folder, set 755 |
| "TinyMCE editor blank" | Check browser console, internet required for CDN |
| "Excel export doesn't download" | Check browser pop-up blocker, verify file permissions |

---

## 📚 Documentation Files

After successful deployment, refer to:

1. **ADMIN_README.md** - Quick overview & features
2. **ADMIN_SYSTEM_SUMMARY.md** - Detailed system architecture
3. **ADMIN_DEPLOYMENT_GUIDE.md** - Comprehensive deployment guide
4. **admin/SETUP_GUIDE.md** - Database & setup instructions

---

## ⚠️ Important Reminders

1. **Change default password immediately**
2. **Delete database-setup.php after first run**
3. **Keep database backups regularly** (cPanel)
4. **Update school contact info** in configuration files
5. **Monitor admin logs** for security
6. **Test all features** before going live
7. **Inform staff** of new admin panel location

---

## ✅ Success Indicators

You'll know the system is working when:
- ✅ Dashboard loads with statistics
- ✅ Enquiries are saved to database
- ✅ Blogs can be created and published
- ✅ Excel/CSV export downloads files
- ✅ WhatsApp links generate correctly
- ✅ Admin logs show action history
- ✅ Password changes work
- ✅ Logout removes access

---

**Ready to deploy? Start with STEP 1 above!**

For detailed help, reference: **ADMIN_DEPLOYMENT_GUIDE.md**

Good luck! 🚀
