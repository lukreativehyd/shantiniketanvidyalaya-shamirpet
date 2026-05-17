# Production Deployment & SEO Checklist
**Domain:** https://shantiniketanvidyalaya.com/  
**Staging:** https://staging.shantiniketanvidyalaya.com/

---

## ✅ ALL PAGES MAPPED & READY

### Public Pages (11 pages)
| Page | URL | Status | Meta Description | Meta Tags |
|------|-----|--------|------------------|-----------|
| Home | `/` | ✅ Ready | "Welcome to Shantiniketan Vidyalaya - A leading CBSE residential school in Hyderabad, Shamirpet" | ✅ Present |
| The School | `/the-school` | ✅ Ready | Custom desc needed | Check needed |
| Advisory Council | `/advisory-council` | ✅ Ready | Custom desc needed | Check needed |
| Principal | `/principal` | ✅ Ready | Custom desc needed | Check needed |
| Infrastructure | `/infrastructure` | ✅ Ready | Custom desc needed | Check needed |
| Curriculum | `/curriculum` | ✅ Ready | Custom desc needed | Check needed |
| Activities | `/activities` | ✅ Ready | Custom desc needed | Check needed |
| Houses | `/houses` | ✅ Ready | Custom desc needed | Check needed |
| Videos | `/videos` | ✅ Ready | Custom desc needed | Check needed |
| Gallery | `/gallery` | ✅ Ready | Custom desc needed | Check needed |
| Admissions | `/admissions` | ✅ Ready | "Learn about our transparent and fair admission process. Apply now for Classes I-X at Shantiniketan Vidyalaya" | ✅ Present |
| Blog/News | `/blogs` | ✅ Ready | Custom desc needed | Check needed |
| Individual Blog Post | `/blog/[slug]` | ✅ Ready | Custom desc needed | Check needed |
| Contact | `/contact` | ✅ Ready | Custom desc needed | Check needed |
| Thank You (After Form) | `/thank-you` | ✅ Ready | N/A (Redirect only) | N/A |

### Admin Pages (Password Protected)
- `/admin/` - Dashboard
- `/admin/enquiries` - Enquiry Management
- `/admin/abandoned-entries` - Abandoned Forms
- `/admin/blogs` - Blog Management
- `/admin/manage-users` - User Management
- `/admin/change-password` - Password Management

---

## 🚨 CRITICAL SEO ISSUES TO FIX BEFORE PRODUCTION

### 1. **MISSING: sitemap.xml** ⚠️ HIGH PRIORITY
**Impact:** Google Search Console can't automatically discover all pages
**Solution:** Create and deploy `/sitemap.xml`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://shantiniketanvidyalaya.com/</loc>
        <lastmod>2026-05-18</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/the-school</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/admissions</loc>
        <changefreq>weekly</changefreq>
        <priority>0.95</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/infrastructure</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/curriculum</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/activities</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/advisory-council</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/principal</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/houses</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/videos</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/gallery</loc>
        <changefreq>weekly</changefreq>
        <priority>0.75</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/blogs</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>https://shantiniketanvidyalaya.com/contact</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
</urlset>
```

---

### 2. **MISSING: robots.txt** ⚠️ HIGH PRIORITY
**Impact:** Search engines might waste crawl budget on unnecessary pages
**Solution:** Create `/robots.txt`

```txt
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /process-enquiry
Disallow: /process-abandoned-entry
Disallow: /thank-you
Disallow: /debug-form.php
Disallow: /config.php

Sitemap: https://shantiniketanvidyalaya.com/sitemap.xml

# Block bad bots
User-agent: AhrefsBot
Disallow: /

User-agent: SemrushBot
Disallow: /

User-agent: MJ12bot
Disallow: /
```

---

### 3. **MISSING: Open Graph & Social Meta Tags** ⚠️ MEDIUM PRIORITY
**Impact:** Sharing on social media looks unprofessional
**Solution:** Add to `includes/header.php` and each page's `<head>`

```html
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://shantiniketanvidyalaya.com/">
<meta property="og:title" content="Home - Shantiniketan Vidyalaya">
<meta property="og:description" content="Welcome to Shantiniketan Vidyalaya - A leading CBSE residential school in Hyderabad, Shamirpet">
<meta property="og:image" content="https://shantiniketanvidyalaya.com/assets/images/og-image.jpg">
<meta property="og:site_name" content="Shantiniketan Vidyalaya">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://shantiniketanvidyalaya.com/">
<meta property="twitter:title" content="Home - Shantiniketan Vidyalaya">
<meta property="twitter:description" content="Welcome to Shantiniketan Vidyalaya - A leading CBSE residential school in Hyderabad, Shamirpet">
<meta property="twitter:image" content="https://shantiniketanvidyalaya.com/assets/images/og-image.jpg">
```

---

### 4. **MISSING: Structured Data (JSON-LD)** ⚠️ MEDIUM PRIORITY
**Impact:** Rich snippets not showing in Google Search
**Solution:** Add Organization schema to every page

```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "EducationalOrganization",
  "name": "Shantiniketan Vidyalaya",
  "description": "A leading CBSE residential school in Hyderabad, Shamirpet",
  "url": "https://shantiniketanvidyalaya.com",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Shamirpet",
    "addressRegion": "Telangana",
    "postalCode": "500100",
    "addressCountry": "IN"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "Admissions",
    "telephone": "+91-7671-003535",
    "email": "admissions@shantiniketanvidyalaya.com"
  },
  "sameAs": [
    "https://facebook.com/shantiniketanvidyalaya",
    "https://instagram.com/shantiniketanvidyalaya",
    "https://youtube.com/@shantiniketanvidyalaya"
  ]
}
</script>
```

---

### 5. **INCOMPLETE: Page Meta Descriptions** ⚠️ MEDIUM PRIORITY
**Currently:** Only Home (100/160 chars) and Admissions (123/160 chars) have descriptions
**Missing:** All other pages need unique, keyword-rich meta descriptions (50-160 characters)

#### Pages Needing Meta Descriptions:
- `/the-school` → "Discover our school's mission, vision, and values. Learn about CBSE education excellence at Shantiniketan Vidyalaya"
- `/advisory-council` → "Meet our distinguished advisory council members who guide Shantiniketan Vidyalaya's strategic direction"
- `/principal` → "Meet our Principal. Read about leadership philosophy and dedication to academic excellence at Shantiniketan Vidyalaya"
- `/infrastructure` → "Explore world-class infrastructure including smart classrooms, labs, sports facilities, and residential campus"
- `/curriculum` → "CBSE curriculum with emphasis on holistic development. Explore academics, co-curricular activities, and student support"
- `/activities` → "Discover enriching activities and programs that develop leadership, creativity, and character at our school"
- `/houses` → "Learn about our house system - a key element of our residential school experience building team spirit"
- `/videos` → "Watch videos from Shantiniketan Vidyalaya showcasing student life, academics, and campus activities"
- `/gallery` → "Photo gallery of school events, campus, student activities, and achievements at Shantiniketan Vidyalaya"
- `/blogs` → "Latest news and articles about education, student achievements, and school events at Shantiniketan Vidyalaya"
- `/contact` → "Contact Shantiniketan Vidyalaya for admissions, inquiries, and general information. Call +91-7671-003535"

---

### 6. **VERIFY: Canonical Tags** ⚠️ LOW PRIORITY (but important)
**Status:** Need to verify all pages have proper canonical tags pointing to production domain
**Impact:** Prevents duplicate content issues in Google Search

Each page should have:
```html
<link rel="canonical" href="https://shantiniketanvidyalaya.com/page-name">
```

---

## 📋 LINK VERIFICATION CHECKLIST

### Navigation Links
- ✅ Home → `/`
- ✅ About → Dropdown (The School, Advisory Council, Principal)
- ✅ Campus → Dropdown (Infrastructure, Curriculum, Activities, Houses, Videos, Gallery)
- ✅ Admissions → `/admissions`
- ✅ Blog → `/blogs`
- ✅ Contact → `/contact`

### Top Bar Links
- ✅ Brochure PDF → `/assets/documents/brochure.pdf`
- ✅ Calendar PDF → `/assets/documents/calender.pdf`
- ✅ T.C. PDF → `/assets/documents/tc.pdf`
- ✅ Mandatory Disclosure → `/assets/documents/MANDATORY_PUBLIC_DISCLOSRE-2021-22.pdf`
- ✅ List of Books PDF → `/assets/documents/list-books.pdf`

### Contact Links
- ✅ Phone → `tel:+917671003535`
- ✅ Email → `mailto:shantiniketan99@gmail.com`
- ✅ WhatsApp → WhatsApp API link to phone number

### Footer Links
**TODO:** Need to check footer.php for all footer links and verify they point to correct pages

---

## 🔒 Redirect Rules to Add to .htaccess

### Deprecated URLs (if old website had different URLs)
Add these lines to `.htaccess` BEFORE the current rewrite rules:

```apache
# Redirect old URLs to new ones (if applicable)
RedirectMatch 301 ^/old-page/?$ /new-page
RedirectMatch 301 ^/admissions.html$ /admissions
RedirectMatch 301 ^/contact.html$ /contact
```

---

## 🔍 Technical SEO Checklist

| Item | Status | Notes |
|------|--------|-------|
| HTTPS enabled | ✅ | Verified (https://) |
| Mobile responsive | ✅ | Viewport meta tag present |
| Page load speed | ⚠️ | Need to optimize images & minimize CSS/JS |
| 404 error page | ❓ | Need to verify custom 404 page |
| SSL certificate valid | ✅ | Verify on production day |
| CSS/JS minified | ⚠️ | Version numbers present but check compression |
| Gzip compression | ❓ | Need to enable in .htaccess |
| Image optimization | ⚠️ | Check WebP support and sizes |
| Alt text on images | ⚠️ | Verify all images have alt attributes |
| Internal linking | ✅ | Good structure, all pages linked |

---

## 📊 Google Search Console Setup

Before deploying to production, prepare these for Google Search Console:

1. **Add property:** https://shantiniketanvidyalaya.com
2. **Verify ownership:** DNS or HTML tag method
3. **Submit sitemap:** Upload `/sitemap.xml`
4. **Test robots.txt:** Validate `/robots.txt`
5. **Request indexing:** Submit homepage and key pages
6. **Monitor:** Track impressions, clicks, and CTR for all pages
7. **Fix issues:** Address any crawl errors reported

---

## 📧 Google Analytics & Search Console Domains

Make sure to set up:
- **Google Analytics 4** property for new domain
- **Google Search Console** property for https://shantiniketanvidyalaya.com
- Both www and non-www versions (if applicable)

---

## 🚀 Pre-Production Deployment Steps

### Day Before Deployment
- [ ] Final testing on staging site
- [ ] Verify all forms work (Enquiry, Contact, etc.)
- [ ] Test admin login and functionality
- [ ] Check all PDF links in top bar
- [ ] Verify WhatsApp integration

### Day of Deployment
- [ ] Update `config.php` with production details (if needed)
- [ ] Deploy all files to production server
- [ ] Verify all pages load without errors
- [ ] Check .htaccess rules working (clean URLs)
- [ ] Test admin panel access
- [ ] Verify database connection on production
- [ ] Check email notifications (if enabled)

### After Deployment
- [ ] Add Google Search Console property
- [ ] Submit sitemap.xml to GSC
- [ ] Verify robots.txt is accessible
- [ ] Test canonical tags point to production domain
- [ ] Set up Google Analytics on production domain
- [ ] Monitor server logs for 404 errors
- [ ] Test page load speed with Google PageSpeed Insights

---

## ⚠️ CRITICAL: Domain Configuration

### For Production Server
Ensure these are configured in your hosting control panel (cPanel/Hostinger):

1. **Primary Domain:** shantiniketanvidyalaya.com
2. **Document Root:** `/public_html/` (NOT `/public_html/staging/`)
3. **SSL Certificate:** Active and auto-renewing
4. **Database:** Different credentials from staging
5. **Email:** Point MX records to correct mail server
6. **Backups:** Enable automated daily backups

---

## 📌 Files to Create/Deploy

### Create New Files:
1. ✅ **sitemap.xml** - Dynamic or static (see template above)
2. ✅ **robots.txt** - (see template above)
3. ✅ **security.txt** - Optional but recommended

### Update Files:
1. **includes/header.php** - Add Open Graph & Twitter meta tags
2. **index.php** - Add JSON-LD schema
3. **the-school.php** - Add meta description & schema
4. **admissions.php** - Add schema (LocalBusinessEvent or EducationalOrganization)
5. **contact.php** - Add ContactPoint schema
6. **All other .php files** - Add meta descriptions
7. **.htaccess** - Verify all rules in place

### Verify Files:
1. **config.php** - Update with production values
2. **admin/db-config.php** - Verify production database credentials
3. **assets/** - Check all images, CSS, JS paths are correct

---

## ✅ Final Verification Checklist

- [ ] All 11 pages return 200 status code
- [ ] No 404 errors in Google Search Console
- [ ] sitemap.xml submittable to Google Search Console
- [ ] robots.txt is accessible and valid
- [ ] All internal links use clean URLs (without .php)
- [ ] Meta descriptions present on all pages
- [ ] og:image tags point to valid images
- [ ] Canonical tags point to production domain
- [ ] No mixed content warnings (all HTTPS)
- [ ] Mobile responsiveness verified
- [ ] Forms submission working
- [ ] Admin panel accessible with authentication
- [ ] Database queries working correctly
- [ ] Email notifications (if enabled) sending correctly
- [ ] No console errors on any page
- [ ] Page speed acceptable (< 3 seconds initial load)

---

## 🎯 SEO Priority Ranking (Do First)

1. **HIGH:** Create sitemap.xml and robots.txt
2. **HIGH:** Add meta descriptions to all pages
3. **MEDIUM:** Add Open Graph tags to all pages
4. **MEDIUM:** Add JSON-LD structured data
5. **MEDIUM:** Update config.php for production
6. **LOW:** Optimize images and CSS/JS compression
7. **LOW:** Set up Google Search Console and Analytics

---

## 📞 Support & Monitoring

After production deployment:
- Monitor Google Search Console daily for first 2 weeks
- Check server error logs for any issues
- Monitor form submissions and database integrity
- Track page performance with Google Analytics
- Watch for any ranking changes in Google Search

---

**Document Version:** 1.0  
**Last Updated:** 2026-05-18  
**Status:** Ready for Production Deployment
