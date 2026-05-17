# Elementor Template Kit Conversion Guide

## Overview
This guide explains how to convert the High School Website into an Elementor Template Kit for WordPress.

## Prerequisites
- WordPress installation
- Elementor Pro (for template kit features)
- Elementor Template Kit exporter plugin or manual conversion

## Conversion Steps

### Step 1: Analyze Component Structure

The website is organized into logical, self-contained sections:

```
Header Component
├── Top Bar (contact info + enquiry button)
├── Header (logo + nav + affiliations)
└── Navigation (sticky header)

Page Sections
├── Hero Slider
├── About Section
├── Features Grid
├── Gallery
├── Blogs
├── Enquiry Form
├── CTA Section
└── Footer (3 columns)
```

### Step 2: CSS Variable Mapping

Map the CSS properties to Elementor Global Colors:

```javascript
{
  "global": {
    "colors": {
      "primary": "#295192",
      "secondary": "#FF6B35",
      "text": "#333333",
      "text-light": "#666666",
      "border": "#E0E0E0",
      "background": "#F5F5F5"
    },
    "typography": {
      "body": {
        "family": "DM Sans",
        "weight": 400,
        "size": "1rem"
      },
      "heading": {
        "family": "DM Sans",
        "weight": 600,
        "size": "2.8rem"
      }
    },
    "spacing": {
      "small": "1rem",
      "medium": "1.5rem",
      "large": "2rem",
      "xl": "3rem"
    }
  }
}
```

### Step 3: Convert Each Section

#### Header Section Template
```
Elementor Section (Full Width, Sticky)
├── Container (Flex, Space Between)
│   ├── Logo Widget
│   ├── Nav Menu Widget
│   └── Custom Buttons (Affiliation logos)
└── Mobile Hamburger Menu (Custom Widget)
```

**CSS Classes to Map:**
- `.header` → Section with sticky positioning
- `.header-logo` → Custom logo widget
- `.nav-list` → Elementor Nav Menu
- `.header-affiliations` → Custom HTML widget

#### Hero Slider Template
```
Elementor Section (Full Width)
└── Slider Widget (Elementor Carousel or Custom)
    ├── Slide 1 (Image + Overlay + Content)
    ├── Slide 2
    └── Slide 3
    └── Navigation Dots & Arrows
```

**Implementation Options:**
- Use Elementor's built-in Carousel widget
- Use "Swiper" addon for advanced features
- Create custom element widget with slider.js

#### Features Grid Template
```
Elementor Section
├── Heading Widget
└── Elementor Grid (3 Columns)
    ├── Feature Card 1
    ├── Feature Card 2
    ├── Feature Card 3
    ├── Feature Card 4
    ├── Feature Card 5
    └── Feature Card 6
```

**Card Elements:**
- Icon widget
- Text widget
- Custom styling for hover effects

#### Gallery Template
```
Elementor Section
├── Heading Widget
└── Gallery Grid (4 Columns)
    └── Gallery Items with Lightbox
```

**Alternative:** Use Elementor Gallery widget or Masonry grid

#### Blogs Template
```
Elementor Section
├── Heading Widget
└── Posts Grid (3 Columns)
    ├── Blog Post Card 1
    ├── Blog Post Card 2
    └── Blog Post Card 3
```

**As Elementor Template:**
- Use Elementor's Posts widget
- Filter by category/tag
- Create custom blog post template

#### Enquiry Form Template
```
Elementor Section
├── Heading Widget
└── Elementor Form Widget
    ├── Text Fields (First Name, Last Name)
    ├── Email Field
    ├── Phone Field
    ├── Select Fields (Grade, Curriculum)
    ├── Textarea (Message)
    ├── Checkbox (Agreement)
    └── Submit Button
```

**Form Features:**
- Built-in validation
- Email notifications
- Form submissions storage

#### CTA Template
```
Elementor Section (Dark Background)
├── Heading Widget
├── Text Widget
└── Button Group
    ├── Primary Button
    └── Secondary Button
```

#### Footer Template
```
Elementor Section (Dark Background)
├── Grid (3 Columns)
│   ├── Column 1: Logo + Description + Social Icons
│   ├── Column 2: Links List
│   └── Column 3: Contact Info
└── Bottom Bar
    └── Copyright Text
```

### Step 4: Create Template Kit JSON

Create a template kit definition file:

```json
{
  "kit": {
    "title": "High School Website Kit",
    "description": "Professional template kit for high school websites",
    "categories": ["education", "school"],
    "demo_url": "https://www.highschool.edu",
    "support_url": "https://www.highschool.edu/support",
    "version": "1.0",
    "author": "Your Company",
    "author_url": "https://yourcompany.com"
  },
  "templates": [
    {
      "id": "header",
      "title": "Header",
      "type": "section",
      "cat": ["header"]
    },
    {
      "id": "footer",
      "title": "Footer",
      "type": "section",
      "cat": ["footer"]
    },
    {
      "id": "homepage",
      "title": "Homepage",
      "type": "page",
      "cat": ["landing"]
    },
    {
      "id": "hero-slider",
      "title": "Hero Slider",
      "type": "section",
      "cat": ["hero"]
    },
    {
      "id": "about-section",
      "title": "About Section",
      "type": "section",
      "cat": ["about"]
    },
    {
      "id": "features-grid",
      "title": "Features Grid",
      "type": "section",
      "cat": ["features"]
    },
    {
      "id": "gallery",
      "title": "Gallery Section",
      "type": "section",
      "cat": ["gallery"]
    },
    {
      "id": "blogs",
      "title": "Blogs Section",
      "type": "section",
      "cat": ["blog"]
    },
    {
      "id": "enquiry-form",
      "title": "Enquiry Form",
      "type": "section",
      "cat": ["forms"]
    },
    {
      "id": "cta-section",
      "title": "Call to Action",
      "type": "section",
      "cat": ["cta"]
    }
  ]
}
```

### Step 5: CSS Customization for Elementor

Create an `elementor-custom.css` file for Elementor-specific styles:

```css
/* Elementor Template Kit Styles */

/* Override variables with Elementor global styles */
.elementor-section {
  --primary-color: var(--e-global-color-primary, #295192);
  --accent-color: var(--e-global-color-secondary, #FF6B35);
}

/* Custom element classes for template parts */
.e-header { background: var(--e-global-color-primary); }
.e-footer { background: var(--e-global-color-primary); }
.e-feature-card { border: 1px solid var(--e-global-color-tertiary); }

/* Elementor column adjustments */
.elementor-column { padding: var(--e-global-spacing-custom, 1.5rem); }

/* Responsive adjustments */
@media (max-width: 768px) {
  .elementor-column { padding: 1rem; }
}
```

### Step 6: Export Process

#### Using Elementor Built-in Export:
1. Go to Templates → My Templates
2. Select your template
3. Click Export
4. Choose "Export as Kit" option
5. Include all connected pages
6. Download .zip file

#### Manual Process:
1. Export each template as JSON via Elementor
2. Combine into template kit structure
3. Add kit.json definition file
4. Create .zip archive with all files
5. Upload to Elementor cloud or distribute

### Step 7: Documentation

Create comprehensive documentation:

```
ELEMENTOR_KIT_SETUP.md
├── Installation Instructions
├── Kit Contents & Components
├── Global Colors Reference
├── Typography Settings
├── Spacing System
├── Customization Tips
├── Plugin Dependencies
├── Known Issues & Solutions
└── Support Resources
```

## Best Practices for Elementor Conversion

### 1. Use Global Colors
```
Primary: #295192 (Dark Blue)
Secondary: #FF6B35 (Orange/Accent)
Text: #333333
Light Background: #F5F5F5
```

### 2. Utilize Global Fonts
```
Body Font: DM Sans (400, 500, 600, 700)
Heading Font: DM Sans (600, 700)
```

### 3. Create Reusable Blocks
- Header block
- Footer block
- Feature card block
- Blog post card block

### 4. Set Default Spacing
- Small: 1rem
- Medium: 1.5rem (gap)
- Large: 2rem
- XL: 3rem

### 5. Mobile Responsiveness
- Set breakpoints for tablet (768px)
- Set breakpoints for mobile (480px)
- Test all template previews

### 6. Keyboard Navigation & Accessibility
- Ensure ARIA labels are present
- Test keyboard navigation
- Verify color contrast
- Include alt text for images

## Common Customization Scenarios

### Changing School Brand
1. Update Global Colors
2. Replace logo in header block
3. Update footer content

### Adding More Sections
1. Duplicate existing section templates
2. Modify content
3. Adjust spacing/styling
4. Export updated template

### Creating Additional Pages
1. Duplicate homepage template
2. Remove/add sections as needed
3. Customize content
4. Save as new template

## Integration with WordPress

### Required Plugins
- Elementor / Elementor Pro 3.5+
- Optional: Elementor Theme Builder

### Setup Steps
1. Install template kit
2. Go to Templates → Template Kit
3. Activate kit in project
4. Customize global colors
5. Build pages using templates

### Creating Frontend Page
```php
<?php
// In WordPress theme or plugin
elementor_theme_do_location( 'header' );
// Page content here
elementor_theme_do_location( 'footer' );
?>
```

## Troubleshooting

**Templates not importing?**
- Clear Elementor cache
- Update to latest Elementor version
- Check file permissions

**Styling not applying?**
- Verify CSS class names match
- Check global color assignments
- Clear browser cache

**Responsive layout broken?**
- Verify breakpoint settings
- Check column width settings
- Test on actual devices

**Form not submitting?**
- Verify Elementor form settings
- Check email configuration
- Review submission action

## Performance Optimization

1. **Minify CSS/JS** for template kit
2. **Optimize images** before template inclusion
3. **Use lazy loading** for gallery/blog images
4. **Limit custom scripts** in templates
5. **Cache templates** properly

## Support & Resources

- [Elementor Documentation](https://elementor.com/docs/)
- [Elementor Template Kit Guide](https://elementor.com/docs/elementor-template-kit/)
- [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)

## Version History

### v1.0 (Initial Release)
- All core sections converted
- Global color system
- Mobile responsive
- Documentation complete

---

For questions or custom conversions, contact your development team.
