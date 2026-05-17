# Hostinger Admin Dashboard Setup Guide

Complete step-by-step instructions to deploy and configure the admin dashboard on Hostinger shared hosting.

---

## STEP 1: Create MySQL Database on Hostinger

1. **Login to Hostinger Client Portal**
   - Go to [https://hpanel.hostinger.com](https://hpanel.hostinger.com)
   - Enter your email and password

2. **Navigate to Database Management**
   - Click on your domain (e.g., shantiniketanvidyalaya.com)
   - Scroll down and click **"MySQL Database Manager"** or **"Databases"**

3. **Create New Database**
   - Click **"Create Database"** button
   - Database Name: `sn_admin_db` (or your preferred name)
   - Username: `sn_admin_user` (Hostinger may add a prefix)
   - Password: Use a strong password (save this!)
   - Click **"Create Database"**

4. **Note Your Database Credentials**
   ```
   Host: localhost (usually for Hostinger)
   Database: [your_database_name]
   Username: [your_username]
   Password: [your_password]
   ```

---

## STEP 2: Update Database Configuration

1. **Edit `admin/db-config.php`**

   Find this section (around line 28-33):
   ```php
   // PRODUCTION: Use MySQL (Hostinger)
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_mysql_username');
   define('DB_PASS', 'your_mysql_password');
   define('DB_NAME', 'your_database_name');
   ```

2. **Replace with your actual credentials:**
   ```php
   // PRODUCTION: Use MySQL (Hostinger)
   define('DB_HOST', 'localhost');
   define('DB_USER', 'u723014502_snuser');      // Your MySQL username
   define('DB_PASS', 'YourStrongPassword123');  // Your MySQL password
   define('DB_NAME', 'u723014502_sn_admin');    // Your database name
   ```

3. **Save the file**

---

## STEP 3: Create Database Tables

1. **Upload init file** via FTP/File Manager:
   - Go to Hostinger **File Manager**
   - Navigate to `public_html/admin/`
   - Upload `init-database.php` (if not already there)

2. **Run Database Initialization**
   - Open your browser and visit:
     ```
     https://shantiniketanvidyalaya.com/admin/init-database.php
     ```
   - You should see: **"Database initialized successfully!"**
   - ⚠️ **After this, delete `init-database.php` for security**

3. **Verify Tables Created**
   - Go back to Hostinger Client
   - Click **"phpMyAdmin"** in the Databases section
   - Select your database
   - You should see these tables:
     - `admins`
     - `enquiries`
     - `abandoned_entries`
     - `blogs`
     - `admin_logs`
     - `abandoned_entries_followup`

---

## STEP 4: Create Admin User

You have two options:

### Option A: Using phpMyAdmin (Recommended)

1. **Open phpMyAdmin**
   - From Hostinger Client: Databases → phpMyAdmin
   - Select your database

2. **Insert Admin User**
   - Click "SQL" tab at top
   - Paste this SQL:
   ```sql
   INSERT INTO admins (name, email, password, role, created_at) VALUES 
   ('Admin User', 'admin@shantiniketanvidyalaya.com', 'changeme123', 'admin', NOW());
   ```
   - ⚠️ **Change `admin@...` and `changeme123` to secure values**
   - Click "Go"

### Option B: Using Setup Script

1. Visit: `https://shantiniketanvidyalaya.com/admin/setup-local-db.php`
2. Fill in the admin details
3. Click "Create Admin"
4. ⚠️ **Then delete `setup-local-db.php` for security**

---

## STEP 5: Set File Permissions

1. **Via File Manager**
   - Go to File Manager → `public_html/admin/`
   - Right-click on folder → Properties
   - Set permissions: `755` (read/write/execute)

2. **Database file folder (if using SQLite for backup)**
   - Folder: `Admin/` → permissions `755`
   - Files: Permissions `644`

---

## STEP 6: Test Admin Dashboard

1. **Visit Admin Login**
   ```
   https://shantiniketanvidyalaya.com/admin/login.php
   ```

2. **Login with credentials**
   - Email: `admin@shantiniketanvidyalaya.com`
   - Password: `changeme123` (or what you set)

3. **You should see the Dashboard** with stats

---

## STEP 7: Security Configuration

### Password Change
1. After first login, go to **Change Password**
2. Set a strong admin password

### Database Backups
1. Hostinger automatically backs up databases
2. You can also use phpMyAdmin to export backups:
   - phpMyAdmin → your database → Export
   - Format: SQL
   - Click "Go"

### Protect Sensitive Files
Delete these files after setup:
- `admin/init-database.php`
- `admin/setup-local-db.php`
- `admin/database-setup.php`

---

## STEP 8: Remove .PHP Extensions (Optional but Recommended)

See the `.htaccess` configuration file in the root directory for URL rewriting rules.

After adding `.htaccess`:
- `https://shantiniketanvidyalaya.com/admin/login` (instead of `login.php`)
- `https://shantiniketanvidyalaya.com/admin/dashboard` (instead of `dashboard.php`)

---

## TROUBLESHOOTING

### Problem: "Connection failed: ..."
- **Check credentials** in `db-config.php`
- **Verify database exists** in phpMyAdmin
- **Check database user permissions** - may need to reset password

### Problem: "Table not found"
- Run `init-database.php` again
- Make sure database initialization completed successfully

### Problem: "Permission denied" on uploads
- Check folder permissions (should be 755)
- Contact Hostinger support if issues persist

### Problem: "Session not found" after login
- Check `admin/` folder has write permissions
- Hostinger needs to write session files

---

## ENVIRONMENT VARIABLES (Optional - For Extra Security)

Instead of hardcoding credentials in `db-config.php`, you can use Hostinger's environment variables:

1. **In Hostinger Client**
   - Settings → PHP Configuration
   - Add Environment Variables
   ```
   DB_HOST = localhost
   DB_USER = [your_user]
   DB_PASS = [your_password]
   DB_NAME = [your_database]
   ```

2. **Update `db-config.php`**
   ```php
   define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
   define('DB_USER', getenv('DB_USER') ?: 'your_mysql_username');
   define('DB_PASS', getenv('DB_PASS') ?: 'your_mysql_password');
   define('DB_NAME', getenv('DB_NAME') ?: 'your_database_name');
   ```

---

## IMPORTANT NOTES

✅ **The system automatically detects Hostinger** (not localhost) and uses MySQL  
✅ **No code changes needed** - just update credentials  
✅ **Abandoned entries and enquiries sync to database** automatically  
✅ **Google Sheets integration** still works with MySQL  

---

## NEXT STEPS

1. Deploy website files to Hostinger using the deploy script
2. Test all forms send data to the admin dashboard
3. Configure email notifications (optional)
4. Set up regular backups

For questions, check the README.md or contact Hostinger support.
