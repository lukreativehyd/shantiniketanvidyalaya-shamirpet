# Quick Start Guide

## Getting Started in 5 Minutes

### Step 1: Upload Files to Server
Upload the entire `high-school-website` folder to your web host:
```bash
# Via FTP, SFTP, or your hosting control panel
```

### Step 2: Verify File Permissions
```bash
chmod -R 755 /path/to/high-school-website/
chmod -R 777 /path/to/high-school-website/logs/
mkdir -p /path/to/high-school-website/logs
```

### Step 3: Update Configuration
Edit `config.php` with your school information:
```php
define('SCHOOL_NAME', 'Your School Name');
define('SCHOOL_ADDRESS', 'Your Address');
define('SCHOOL_PHONE', 'Your Phone');
define('SCHOOL_EMAIL', 'your@email.com');
define('ADMISSIONS_EMAIL', 'admissions@email.com');
```

### Step 4: Add Your Images
Replace placeholder images in `assets/images/`:
- `logo.png` - Your school logo
- `slider-1.jpg`, `slider-2.jpg`, `slider-3.jpg` - Hero images
- `gallery-1.jpg` to `gallery-8.jpg` - Campus photos
- `about-school.jpg` - About section image
- `blog-1.jpg`, `blog-2.jpg`, `blog-3.jpg` - Blog thumbnails
- Affiliation logos: `cbse-logo.png`, `ib-logo.png`, `cambridge-logo.png`

### Step 5: Test in Browser
Navigate to your website:
```
https://your-domain.com/high-school-website/
```

## Essential Customizations

### Change Primary Color
Edit `assets/css/variables.css`:
```css
:root {
    --primary-color: #295192;      /* Change this */
    --primary-light: #3D66B4;      /* And this */
    --primary-dark: #1F3B6B;       /* And this */
}
```

### Update Contact Information
**Top Bar** - `includes/top-bar.php`:
```php
<a href="https://maps.google.com" target="_blank">Your Address Here</a>
<a href="tel:+91XXXXXXXXXX">Your Phone</a>
<a href="mailto:your@email.com">Your Email</a>
```

**Footer Left** - `includes/footer.php`:
```php
<p class="footer-description">
    Your school description here...
</p>
```

**Footer Right** - `includes/footer.php`:
```php
<span class="contact-value">Your Address</span>
<a href="tel:+91XXXXXXXXXX">(+91) Your Phone</a>
<a href="mailto:your@email.com">Your Email</a>
```

### Enable Email Notifications
Edit `process-enquiry.php`:
```php
// Line 10: Change to true to enable emails
define('SEND_EMAIL_ON_ENQUIRY', true);

// Line 11: Set valid email address
define('FORM_EMAIL', 'admissions@yourschool.com');
```

## Testing Checklist

- [ ] Website loads without errors
- [ ] Logo displays correctly
- [ ] Slider images show and auto-rotate
- [ ] Navigation menu works on mobile
- [ ] Gallery grid displays all 8 images
- [ ] Blog cards show 3 images
- [ ] Enquiry form submits successfully
- [ ] Footer links are correct
- [ ] Social media links work
- [ ] Mobile responsive on 480px, 768px, 1024px
- [ ] All colors match brand guidelines
- [ ] Typography is clear and readable

## Customization Tips

### Add More Features
1. Create new components in `includes/` folder
2. Include them in `index.php`
3. Follow the same structure and CSS classes

### Create Additional Pages
1. Duplicate `index.php` as `about.php`
2. Include the same header/footer
3. Modify content sections
4. Update navigation links

### Change Font Family
In `assets/css/variables.css`:
```css
--font-family-main: 'Your Font Name', sans-serif;
```

In `assets/css/style.css`:
```css
@import url('https://fonts.googleapis.com/css2?family=Your+Font:wght@400;500;600;700&display=swap');
```

### Adjust Spacing
In `assets/css/variables.css`:
```css
--spacing-sm: 1rem;      /* Increase for more space */
--spacing-md: 1.5rem;
--spacing-lg: 2rem;
```

## Common Tasks

### Add New Slider Slide
In `index.php`, inside `#heroSlider`:
```php
<div class="slider-slide" style="background-image: url('assets/images/slider-4.jpg');">
    <div class="slider-overlay"></div>
    <div class="slider-content">
        <h2>Your Heading</h2>
        <p>Your description</p>
        <a href="#enquiry" class="btn btn-accent btn-lg">Button Text</a>
    </div>
</div>
```

Also add a dot control:
```php
<span class="slider-dot"></span>
```

### Add New Feature Card
In `index.php`, inside `.features-grid`:
```php
<div class="feature-card">
    <div class="feature-icon">
        <i class="fas fa-icon-name"></i>
    </div>
    <h4>Feature Title</h4>
    <p>Feature description here...</p>
</div>
```

### Update Blog Posts
In `index.php`, inside `.blogs-grid`:
```php
<div class="blog-card">
    <img src="assets/images/blog-new.jpg" alt="Blog" class="blog-image">
    <div class="blog-content">
        <span class="blog-date">Feb 21, 2026</span>
        <h4 class="blog-title">Blog Title</h4>
        <p class="blog-excerpt">Blog summary...</p>
        <a href="#" class="blog-link">Read More →</a>
    </div>
</div>
```

## Troubleshooting

**Website won't load?**
- Check PHP is enabled on server
- Verify file permissions (755 for folders, 644 for files)
- Check error logs in `logs/` folder

**Images not showing?**
- Verify image file names match exactly (case-sensitive on Linux)
- Check image file format is JPG/PNG
- Ensure images are in `assets/images/` folder

**Form not working?**
- Check browser console for errors
- Verify `logs/enquiries.log` file is created
- Check PHP error logs on server

**Responsive design broken?**
- Clear browser cache
- Test in incognito/private mode
- Check CSS file is loading (see Network tab)

**Colors different from expected?**
- Check CSS variables values
- Clear browser cache
- Check for CSS conflicts
- Verify image color profiles

## Support Resources

- [PHP Documentation](https://www.php.net/manual/)
- [CSS Reference](https://developer.mozilla.org/en-US/docs/Web/CSS)
- [Font Awesome Icons](https://fontawesome.com/icons)
- [Web Accessibility](https://www.w3.org/WAI/)

## Next Steps

1. ✅ Deploy website
2. ✅ Set up SSL certificate (HTTPS)
3. ✅ Configure email for form
4. ✅ Add Google Analytics
5. ✅ Set up regular backups
6. ✅ Monitor website performance
7. ✅ Plan content updates
8. ✅ Consider Elementor conversion

## Performance Optimization

Before going live:

```bash
# Compress images
jpegoptim --max=85 assets/images/*.jpg
optipng -o7 assets/images/*.png

# Minify CSS (optional)
# Use online tool: https://cssminifier.com/

# Minify JS (optional)
# Use online tool: https://jsminifier.com/
```

## Security Checklist

- [ ] Update configuration credentials
- [ ] Set file permissions correctly
- [ ] Enable HTTPS/SSL
- [ ] Change form email to your address
- [ ] Test CSRF protection
- [ ] Enable rate limiting on forms
- [ ] Keep PHP version updated
- [ ] Set up error logging
- [ ] Regular backups configured
- [ ] Remove debug mode before launch

## Deployment Command

Quick deployment via SSH:
```bash
ssh user@yourserver.com
cd /var/www/html
git clone https://your-repo/high-school-website.git
cd high-school-website
chmod -R 755 .
chmod -R 777 logs/
# Edit config.php with your info
# Add images to assets/images/
```

---

**Need help?** Check the main [README.md](README.md) for detailed documentation.

**Ready to convert to Elementor?** See [ELEMENTOR_CONVERSION_GUIDE.md](ELEMENTOR_CONVERSION_GUIDE.md)

**Last Updated:** 2026-02-21
