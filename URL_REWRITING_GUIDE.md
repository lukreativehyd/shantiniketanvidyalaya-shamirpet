# URL Rewriting Configuration Guide

## Overview

The website now uses clean URLs without `.php` extensions, powered by Apache's URL rewriting rules in `.htaccess`.

### Examples

Before:
```
https://shantiniketanvidyalaya.com/index.php
https://shantiniketanvidyalaya.com/admin/login.php
https://shantiniketanvidyalaya.com/admissions.php
```

After:
```
https://shantiniketanvidyalaya.com/
https://shantiniketanvidyalaya.com/admin/login
https://shantiniketanvidyalaya.com/admissions
```

---

## How It Works

1. **User visits**: `https://shantiniketanvidyalaya.com/admissions`
2. **.htaccess rewrites to**: `admissions.php` (internally)
3. **Server loads**: `admissions.php` file
4. **Browser URL**: Stays clean (no `.php`)

---

## .htaccess Configuration

Location: `/public_html/.htaccess`

Key Rules:
```apache
# Enable URL rewriting
RewriteEngine On
RewriteBase /

# Skip directories and existing files
RewriteCond %{REQUEST_FILENAME} -d
RewriteCond %{REQUEST_FILENAME} -f
RewriteRule ^ - [L]

# Rewrite URLs to .php files
RewriteRule ^([a-zA-Z0-9/_-]+)/?$ $1.php [QSA,L]
RewriteRule ^admin/([a-zA-Z0-9/_-]+)/?$ admin/$1.php [QSA,L]
```

---

## Supported Clean URLs

### Public Pages
✅ `/` → index.php  
✅ `/the-school` → the-school.php  
✅ `/principal` → principal.php  
✅ `/advisory-council` → advisory-council.php  
✅ `/infrastructure` → infrastructure.php  
✅ `/curriculum` → curriculum.php  
✅ `/activities` → activities.php  
✅ `/gallery` → gallery.php  
✅ `/admissions` → admissions.php  
✅ `/contact` → contact.php  
✅ `/thank-you` → thank-you.php  

### Admin Pages
✅ `/admin/` or `/admin/login` → admin/login.php  
✅ `/admin/dashboard` → admin/dashboard.php  
✅ `/admin/enquiries` → admin/enquiries.php  
✅ `/admin/abandoned-entries` → admin/abandoned-entries.php  
✅ `/admin/blogs` → admin/blogs.php  
✅ `/admin/change-password` → admin/change-password.php  
✅ `/admin/logout` → admin/logout.php  

---

## Troubleshooting

### Issue: Getting 404 errors on clean URLs

**Solution 1**: Check .htaccess is in the right location
- Should be in: `/public_html/.htaccess`
- Not in: `/public_html/admin/.htaccess`

**Solution 2**: Verify mod_rewrite is enabled
- Contact Hostinger support to enable mod_rewrite
- It's usually enabled by default

**Solution 3**: Check file permissions
```
.htaccess permissions: 644
```

### Issue: Only `/index.php` works, other URLs don't

This usually means mod_rewrite is not enabled.  
Contact Hostinger support and ask to enable:
- **Apache mod_rewrite**
- **AllowOverride All** in htaccess

### Issue: Query strings not working

Example: `/admin/enquiries?status=new` shows 404

**Solution**: Clear browser cache - .htaccess handles query strings with the `[QSA]` flag (Query String Append)

---

## Important Notes

✅ **Backward compatible**: Old `.php` URLs still work  
- `/admissions.php` redirects automatically to `/admissions`
- Helps with SEO and old links

✅ **Query strings preserved**: `?id=123&status=new` work fine  

✅ **Security rules included**: SQL injection attempts are blocked  

✅ **Performance optimized**: Caching rules for images, CSS, JS  

---

## Deployment Changes Needed

The `.htaccess` file is automatically deployed by the deploy script.

No additional configuration needed on Hostinger!

---

## Developer Notes

### For Internal PHP Redirects (header())

Keep using `.php` extensions in `header()` calls:
```php
// ✅ Use this (server-side redirect)
header("Location: dashboard.php");

// ✅ Not this (user will see .php in URL after redirect)
header("Location: dashboard");
```

### For HTML Links and JavaScript

Use clean URLs without `.php`:
```html
<!-- ✅ Use this -->
<a href="/admissions">Admissions</a>

<!-- ✅ Not this -->
<a href="/admissions.php">Admissions</a>
```

---

## Testing URLs

Before deployment, test these URLs locally:

```bash
# Test with PHP built-in server (not suitable for final testing)
# Clean URLs won't work without Apache/mod_rewrite

# After Hostinger deployment:
curl -I https://shantiniketanvidyalaya.com/admissions
# Should return 200 OK

curl -I https://shantiniketanvidyalaya.com/admin/login
# Should return 200 OK or redirect to login page
```

---

## Rollback (If Issues Occur)

To disable clean URLs:

1. Rename `.htaccess` to `.htaccess.bak`
2. All old `.php` URLs will work again
3. Nothing breaks - files still exist as `.php`

---

## Performance Impact

**Positive**:
- ✅ URLs are search-engine friendly
- ✅ Professional appearance
- ✅ Security headers enabled

**Minimal overhead**:
- One extra rewrite per request (negligible)
- Caching rules improve overall performance

---

## SSL/HTTPS Redirect (Optional)

To force HTTPS (recommended), uncomment in `.htaccess`:

```apache
# Uncomment these lines:
RewriteCond %{HTTPS} !=on
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

Then:
1. Ensure SSL certificate is installed on Hostinger
2. Update all hardcoded `http://` links to use `//(protocol-relative)`
3. Test that everything redirects to HTTPS

---

Need more help? Check with Hostinger support about:
- Apache mod_rewrite status
- .htaccess override permissions
- SSL certificate installation
