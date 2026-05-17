# High School Website - Home Page

A professional, fully responsive high school website built with PHP, CSS, and JavaScript. Designed with CSS variables for easy customization and Elementor-compatible structure.

## Features

✅ **Responsive Design** - Works seamlessly on desktop, tablet, and mobile devices
✅ **CSS Variables** - Easy to customize colors, fonts, and spacing
✅ **Modular Structure** - Reusable header, footer, and components
✅ **Modern Slider** - Smooth hero slider with keyboard and touch navigation
✅ **Contact Form** - Fully functional enquiry form with validation
✅ **Accessibility** - ARIA labels and semantic HTML
✅ **Performance Optimized** - Light and fast loading
✅ **SEO Friendly** - Proper meta tags and semantic markup
✅ **Elementor Ready** - Structure easily convertible to Elementor templates

## Project Structure

```
high-school-website/
├── index.php                    # Main homepage
├── process-enquiry.php          # Form submission handler
├── includes/
│   ├── header.php              # Header component (sticky)
│   ├── footer.php              # Footer component
│   └── top-bar.php             # Top bar component
├── assets/
│   ├── css/
│   │   ├── variables.css       # CSS custom properties
│   │   ├── style.css           # Global styles
│   │   └── responsive.css      # Component-specific styles
│   ├── js/
│   │   └── slider.js           # Hero slider functionality
│   └── images/                 # Image assets
└── README.md                    # This file
```

## Installation

1. **Copy files to your web server**
   ```bash
   cp -r high-school-website /var/www/html/
   ```

2. **Ensure proper permissions**
   ```bash
   chmod -R 755 /var/www/html/high-school-website/
   mkdir -p /var/www/html/high-school-website/logs
   chmod 777 /var/www/html/high-school-website/logs/
   ```

3. **Replace images**
   - Place your logo as `assets/images/logo.png`
   - Add slider images: `assets/images/slider-1.jpg`, `slider-2.jpg`, `slider-3.jpg`
   - Add gallery images: `assets/images/gallery-1.jpg` to `gallery-8.jpg`
   - Add blog images: `assets/images/blog-1.jpg` to `blog-3.jpg`
   - Add affiliation logos: `cbse-logo.png`, `ib-logo.png`, `cambridge-logo.png`
   - Add about section image: `about-school.jpg`

4. **Update contact information**
   - Edit `includes/top-bar.php` - Update address, phone, email
   - Edit `includes/footer.php` - Update contact details
   - Edit `process-enquiry.php` - Set your email for form submissions

5. **Enable email functionality** (optional)
   - Uncomment the `mail()` function in `process-enquiry.php`
   - Configure your server's email settings

## Customization

### Change Colors

Edit `assets/css/variables.css` and modify the CSS variables:

```css
:root {
    --primary-color: #295192;           /* Dark Blue */
    --primary-light: #3D66B4;
    --primary-dark: #1F3B6B;
    --accent-color: #FF6B35;            /* Orange */
    /* ... more colors ... */
}
```

### Change Fonts

Update the font family in `assets/css/variables.css`:

```css
:root {
    --font-family-main: 'Your Font Name', sans-serif;
    --font-family-heading: 'Your Font Name', sans-serif;
}
```

Then add the font import in `assets/css/style.css`:

```css
@import url('https://fonts.googleapis.com/css2?family=Your+Font+Name:wght@400;500;600;700&display=swap');
```

### Adjust Spacing

Modify spacing variables in `assets/css/variables.css`:

```css
:root {
    --spacing-sm: 1rem;
    --spacing-md: 1.5rem;
    --spacing-lg: 2rem;
    --spacing-xl: 3rem;
    /* ... more spacing ... */
}
```

## Components

### Header
- Sticky navigation with mobile toggle
- Logo on the left
- Centered navigation menu
- Affiliation logos on the right
- Active link indicator
- Mobile responsive menu

### Footer
- 3-column layout (About, Links, Contact)
- Social media links
- Contact information
- Copyright notice
- Dark blue background with white text

### Hero Slider
- Auto-play with 5-second intervals
- Previous/Next buttons
- Dot indicators
- Keyboard navigation (Arrow keys)
- Touch/Swipe support
- Pause on hover

### Features Grid
- 3-column layout (2 on tablet, 1 on mobile)
- Icon + text cards
- Hover effects with elevation

### Gallery
- 4-column grid (3 on tablet, 1-2 on mobile)
- Image overlay on hover
- Lightbox ready (can integrate Lightbox.js)

### Blogs Section
- 3-column card layout
- Date badge, title, excerpt
- Read more links
- Hover effects

### Enquiry Form
- Multiple input types
- Form validation
- Success message display
- AJAX submission support

### CTA Section
- Full-width call-to-action
- Gradient background
- Multiple buttons

## Converting to Elementor

### Step 1: Export HTML Structure
The component-based design is Elementor-compatible. Each section is self-contained:
- Use different sections as Elementor widgets
- Copy HTML structure into Elementor's custom HTML widget
- Apply your Elementor styling

### Step 2: Create Elementor Blocks
1. Create custom CSS classes matching the component classes
2. Use Elementor's grid/flex containers for layouts
3. Map CSS variables to Elementor's global colors
4. Convert inline styles to Elementor styling

### Step 3: Build Custom Widgets
For complex components (Slider, Form), create custom Elementor widgets or use addon plugins:
- Slider: Use Elementor's carousel widget or "Swiper" addon
- Form: Use Elementor's native form builder

### Step 4: Export as Template Kit
1. Create each page section as Elementor template
2. Export with "Template Kit" option
3. Include all CSS variables documentation

## Browser Support

- Chrome/Edge (Latest 2 versions)
- Firefox (Latest 2 versions)
- Safari (Latest 2 versions)
- Mobile browsers (iOS Safari, Chrome Mobile)
- IE 11+ (with polyfills)

## Performance Tips

1. **Optimize Images**
   ```bash
   # Compress images
   imagemin assets/images/* --out-dir=assets/images/
   ```

2. **Minify CSS** (Production)
   - Use CSS minifiers for production versions

3. **Lazy Load Images**
   - Add `loading="lazy"` attribute to images

4. **Caching**
   - Enable browser caching in your web server configuration

## Security

- Form inputs are sanitized using `htmlspecialchars()` and `filter_var()`
- Email is validated using `FILTER_VALIDATE_EMAIL`
- Data is escaped before output
- Add CSRF tokens for production deployment
- Implement rate limiting on form submissions

## Font Awesome Icons

The template uses Font Awesome 6.4.0 for icons. To add more icons:

```html
<i class="fas fa-icon-name"></i>
```

Visit [Font Awesome Icons](https://fontawesome.com/icons) for the full list.

## PHP Requirements

- PHP 7.2+
- No database required (optional for enquiry storage)
- Standard PHP functions only (no external dependencies)

## Deployment Checklist

- [ ] Replace all placeholder images
- [ ] Update contact information
- [ ] Set email for form submissions
- [ ] Enable HTTPS
- [ ] Test on multiple browsers
- [ ] Test on mobile devices
- [ ] Optimize images
- [ ] Minify CSS and JS for production
- [ ] Set up error logging
- [ ] Test form submission
- [ ] Add analytics (Google Analytics/Matomo)
- [ ] Test accessibility with WCAG standards

## Troubleshooting

**Form not submitting?**
- Check `logs/enquiries.log` for entries
- Ensure PHP email is configured
- Check browser console for JavaScript errors

**Images not loading?**
- Verify image paths are correct
- Check file permissions (chmod 644)
- Ensure images are in the correct format

**Mobile menu not opening?**
- Check JavaScript console for errors
- Verify `assets/js/slider.js` is loaded
- Clear browser cache

**Slider not working?**
- Verify slider images are loaded
- Check browser console
- Ensure `assets/js/slider.js` is properly linked

## License

This template is provided as-is for educational and commercial use. Modify as needed for your institution.

## Support & Documentation

For more information on customization and features, refer to:
- CSS Variables Guide: See `assets/css/variables.css`
- Component Structure: See individual PHP include files
- Responsive Breakpoints: Mobile (480px), Tablet (768px), Desktop (1024px+)

## Changelog

### Version 1.0 (2026-02-21)
- Initial release
- Hero slider with auto-play
- All core sections implemented
- Mobile responsive design
- Enquiry form with validation
- CSS variable system

## Contact

For custom development or support, contact your web development team.

---

Built with ❤️ for educators and students.
