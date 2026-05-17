# 🚀 DEPLOYMENT GUIDE - Shamirpet Website to Hostinger

## Quick Start (3 Steps)

### Step 1️⃣ - Clean Up Local Files
```bash
bash cleanup-before-deploy.sh
```
This removes all test files, databases, and logs. You'll be prompted to confirm.

### Step 2️⃣ - Configure SSH Credentials
Edit `deploy-via-ssh.sh` and update:
```bash
SSH_USER="u723014502"              # Your Hostinger SSH username
SSH_HOST="185.27.134.10"           # Your server IP/hostname  
REMOTE_PATH="/home/u723014502/public_html"  # Your site path
```

### Step 3️⃣ - Deploy to Server
```bash
bash deploy-via-ssh.sh
```
This will:
- Backup your old site automatically
- Upload all new files via rsync
- Set proper permissions
- Show you next steps

---

## Getting Your SSH Credentials

### From Hostinger cPanel:
1. **Login** to Hostinger cPanel
2. **Find SSH Access:**
   - Look for "SSH Access" or "Advanced" → "SSH Access"
   - Or use "File Manager" → "Account Info"
3. **Note these values:**
   - **SSH Username** (usually something like `u723014502`)
   - **Server Hostname** (usually like `185.27.134.10` or `mail.yourdomain.com`)
   - **SSH Port** (usually 22, sometimes 2222)

### Example from Hostinger:
```
Connection: u723014502@185.27.134.10:22
Or for your domain: u723014502@mail.yourdomain.com:22
```

---

## Manual Deployment (If SSH Script Fails)

### Option A: Using SSH + Manual Commands

```bash
# Connect to server
ssh u723014502@185.27.134.10

# Go to your site directory
cd /home/u723014502/public_html

# Create backup
tar -czf backup-$(date +%Y%m%d).tar.gz *

# Exit SSH
exit
```

Then upload files:
```bash
# From your local machine
rsync -avz --delete \
  --exclude '.git' \
  --exclude '.DS_Store' \
  /Volumes/VIJAY/Shamirpet\ Website/ \
  u723014502@185.27.134.10:/home/u723014502/public_html/
```

### Option B: Using FTP (If SSH Unavailable)

1. **Get FTP credentials** from Hostinger cPanel
2. **Use FTP client** (FileZilla, Cyberduck, etc.):
   - Connect to: `ftp.yourdomain.com` or `185.27.134.10`
   - Upload entire folder to `public_html/`
   - Set `admin/uploads/` permissions to 755

### Option C: Using Hostinger File Manager

1. **Login to Hostinger cPanel**
2. **Go to File Manager**
3. **Create new folder** in `public_html/` (or clear existing)
4. **Upload files:**
   - You can drag-drop folders
   - Or use "Upload" button to select files
5. **Set permissions:**
   - Right-click `admin/uploads/` → Permissions → Set to 755

---

## After Deployment ✅

### Step 1: Initialize Database
Visit this URL (run ONCE only):
```
https://yourdomain.com/admin/database-setup.php
```

This will:
- Create database tables
- Setup admin user (credentials shown on page)
- Insert sample blog data

### Step 2: Delete Setup Files
After database-setup.php runs successfully, delete:
- `admin/database-setup.php`
- `admin/migrate-add-featured-image.php`
- `admin/migrate-add-slug.php`
- `admin/migrate-enquiry-table.php`

Via SSH:
```bash
ssh u723014502@185.27.134.10
cd /home/u723014502/public_html/admin
rm database-setup.php migrate-*.php
exit
```

Or via FTP: Just delete these files from `admin/` folder

### Step 3: Login to Admin Panel
```
https://yourdomain.com/admin/login.php
```

Use credentials from database-setup.php output

### Step 4: Test Everything
- ✅ Visit home page
- ✅ Check all pages load
- ✅ Submit test form (should show success)
- ✅ Check admin panel - view submissions
- ✅ Create/edit blogs
- ✅ Check contact form

---

## Troubleshooting

### "SSH Connection Failed"
```
❌ Make sure:
✓ SSH_USER is correct (check Hostinger cPanel)
✓ SSH_HOST is correct (could be hostname or IP)
✓ Port 22 is not blocked on your network
✓ SSH Access is enabled in Hostinger cPanel
```

Test SSH manually:
```bash
ssh -v u723014502@185.27.134.10
```

### "Permission Denied" on File Upload
```
Permissions issue. Two options:

Option 1: Via SSH (recommended)
ssh u723014502@185.27.134.10
chmod 755 /home/u723014502/public_html/admin/uploads
chmod 755 /home/u723014502/public_html/admin

Option 2: Via FTP
Right-click admin/uploads/ → Properties → Permissions → Set to 755
```

### "Database Connection Error"
```
✓ Make sure database-setup.php has been run
✓ Check MySQL database exists: u723014502_sn_admin_db
✓ Check MySQL user exists: u723014502_sn_admin_user
✓ Create them from Hostinger cPanel → MySQL/MariaDB

If not created yet:
1. Go to Hostinger cPanel → MySQL/MariaDB
2. Create database: u723014502_sn_admin_db
3. Create user: u723014502_sn_admin_user
4. Set password (same as in db-config.php)
5. Grant all privileges
6. Then run admin/database-setup.php
```

### "403 Forbidden on /admin/login.php"
```
Check .htaccess in /admin/ folder:
✓ Should exist and have proper rules
✓ Try adding to root .htaccess:
  RewriteEngine On
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
```

### "Forms Not Submitting / 500 Error"
```
Likely cause: Google Sheets API issue

Option 1: Disable Google Sheets (forms save to database only)
- Edit admin/db-config.php or process-enquiry.php
- Comment out Google Sheets code

Option 2: Setup Google Sheets API
- Create Google Service Account
- Download JSON credentials
- Update path in process-enquiry.php

For now, forms should save to database regardless.
```

---

## File Structure After Deployment

```
public_html/
├── index.php                 ← Homepage
├── blogs.php                 ← Blog listing
├── blog.php                  ← Single blog
├── contact.php               ← Contact form
├── admissions.php            ← Admissions page
├── the-school.php            ← School info
├── gallery.php               ← Gallery
├── infrastructure.php        ← Infrastructure
├── activities.php            ← Activities
├── advisory-council.php      ← Advisory council
├── curriculum.php            ← Curriculum
├── principal.php             ← Principal
├── thank-you.php             ← Form thank you page
├── process-enquiry.php       ← Form handler
├── process-abandoned-entry.php ← Abandoned form tracker
│
├── admin/                    ← Admin panel (protected by .htaccess)
│   ├── login.php             ← Admin login
│   ├── dashboard.php         ← Admin dashboard
│   ├── blogs.php             ← Manage blogs
│   ├── enquiries.php         ← View submissions
│   ├── abandoned-entries.php ← Abandoned forms
│   ├── uploads/              ← Blog images (writable)
│   ├── db-config.php         ← Database config (blocked by .htaccess)
│   ├── database-setup.php    ← Delete after running once
│   └── .htaccess             ← Security rules
│
├── assets/                   ← Static files
│   ├── css/
│   │   ├── style.css         ← Main styles
│   │   ├── responsive.css    ← Mobile responsive
│   │   ├── form-validation.css
│   │   └── variables.css
│   ├── js/
│   │   ├── form-validation.js
│   │   └── slider.js
│   └── images/               ← Images, logos, etc
│
├── includes/                 ← Shared components
│   ├── header.php
│   ├── footer.php
│   ├── enquiry-form.php      ← Admission form
│   ├── popup-enquiry-form.php ← Modal form
│   └── top-bar.php
│
├── config.php                ← Site configuration
├── router.php                ← Local dev only (delete if on server)
└── .htaccess                 ← URL rewriting rules
```

---

## Quick Commands Reference

```bash
# Cleanup test files
bash cleanup-before-deploy.sh

# Deploy via SSH
bash deploy-via-ssh.sh

# Manual SSH backup & deploy
ssh u723014502@185.27.134.10
cd /home/u723014502/public_html
tar -czf backup.tar.gz *
exit

# Upload via rsync
rsync -avz --delete /Volumes/VIJAY/Shamirpet\ Website/ \
  u723014502@185.27.134.10:/home/u723014502/public_html/

# Set permissions via SSH
ssh u723014502@185.27.134.10 "chmod 755 /home/u723014502/public_html/admin/uploads"

# Test SSH connection
ssh -v u723014502@185.27.134.10 "echo OK"
```

---

## Security Checklist

- [ ] Database credentials in db-config.php (protected by .htaccess)
- [ ] .htaccess file blocks direct access to php config files
- [ ] admin/uploads/ has 755 permissions (not 777)
- [ ] Database-setup.php deleted after initialization
- [ ] Default admin password changed
- [ ] All test files removed (test-*.php, *.db)
- [ ] Google Sheets credentials secure (if used)
- [ ] Form validation enabled in HTML
- [ ] HTTPS/SSL enabled on Hostinger (usually automatic)

---

## Support & Rollback

### If Something Goes Wrong
```bash
# Connect to server
ssh u723014502@185.27.134.10

# List backups
ls -la /home/u723014502/shamirpet-website-backup-*

# Restore from backup
tar -xzf shamirpet-website-backup-YYYYMMDD-HHMMSS.tar.gz -C /home/u723014502/

# Exit
exit
```

### Contact Hostinger Support
If you have SSH access issues:
1. Go to Hostinger Dashboard
2. Support → Live Chat
3. Ask about "SSH Access" or "Enable SSH"

---

**Last Updated:** May 2026
**Compatibility:** PHP 8+, MySQL 5.7+, Modern Browsers
