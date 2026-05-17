# Image Assets Required

## Image Placeholders and Specifications

Below is a complete list of images needed for the website to function properly.

### 1. Logo & Branding

**Logo (Required)**
- File: `assets/images/logo.png`
- Dimensions: 500x200 px (width x height)
- Format: PNG with transparency
- Usage: Header, footer
- Note: Keep aspect ratio for responsive scaling

**Favicon**
- File: `assets/images/favicon.png`
- Dimensions: 32x32 px
- Format: PNG with transparency
- Usage: Browser tab icon

**OG Image (Social sharing)**
- File: `assets/images/og-image.jpg`
- Dimensions: 1200x630 px (Open Graph standard)
- Format: JPG
- Usage: Social media preview

### 2. Hero Slider Images

**Slider Image 1**
- File: `assets/images/slider-1.jpg`
- Dimensions: 1920x600 px minimum
- Format: JPG or WebP
- Aspect Ratio: 16:5 or 3:1
- Content: School campus or students

**Slider Image 2**
- File: `assets/images/slider-2.jpg`
- Dimensions: 1920x600 px minimum
- Format: JPG or WebP
- Content: Classroom or academic activity

**Slider Image 3**
- File: `assets/images/slider-3.jpg`
- Dimensions: 1920x600 px minimum
- Format: JPG or WebP
- Content: Sports, arts, or events

### 3. Affiliation Logos

**CBSE Logo**
- File: `assets/images/cbse-logo.png`
- Dimensions: 120x100 px
- Format: PNG with transparency
- Usage: White text on dark blue background

**IB Logo**
- File: `assets/images/ib-logo.png`
- Dimensions: 120x100 px
- Format: PNG with transparency
- Usage: White text on dark blue background

**Cambridge Logo**
- File: `assets/images/cambridge-logo.png`
- Dimensions: 120x100 px
- Format: PNG with transparency
- Usage: White text on dark blue background

### 4. About Section

**School Campus Image**
- File: `assets/images/about-school.jpg`
- Dimensions: 600x400 px minimum
- Format: JPG
- Aspect Ratio: 3:2
- Content: School building or main campus

### 5. Gallery Images

**Gallery Item 1 - Classroom**
- File: `assets/images/gallery-1.jpg`
- Dimensions: 400x400 px
- Format: JPG
- Content: Classroom/learning space

**Gallery Item 2 - Science Lab**
- File: `assets/images/gallery-2.jpg`
- Dimensions: 400x400 px
- Format: JPG
- Content: Laboratory setup

**Gallery Item 3 - Sports Ground**
- File: `assets/images/gallery-3.jpg`
- Dimensions: 400x400 px
- Format: JPG
- Content: Sports/outdoor activity

**Gallery Item 4 - Library**
- File: `assets/images/gallery-4.jpg`
- Dimensions: 400x400 px
- Format: JPG
- Content: Library or resources

**Gallery Item 5 - Auditorium**
- File: `assets/images/gallery-5.jpg`
- Dimensions: 400x400 px
- Format: JPG
- Content: Auditorium or event space

**Gallery Item 6 - Event/Activity**
- File: `assets/images/gallery-6.jpg`
- Dimensions: 400x400 px
- Format: JPG
- Content: School event or activity

**Gallery Item 7 - Students**
- File: `assets/images/gallery-7.jpg`
- Dimensions: 400x400 px
- Format: JPG
- Content: Student group photo

**Gallery Item 8 - Cafeteria**
- File: `assets/images/gallery-8.jpg`
- Dimensions: 400x400 px
- Format: JPG
- Content: Cafeteria or dining space

### 6. Blog Section Images

**Blog Image 1**
- File: `assets/images/blog-1.jpg`
- Dimensions: 600x400 px
- Format: JPG
- Aspect Ratio: 3:2
- Content: Achievement/event thumbnail

**Blog Image 2**
- File: `assets/images/blog-2.jpg`
- Dimensions: 600x400 px
- Format: JPG
- Aspect Ratio: 3:2
- Content: Sports day or event

**Blog Image 3**
- File: `assets/images/blog-3.jpg`
- Dimensions: 600x400 px
- Format: JPG
- Aspect Ratio: 3:2
- Content: Facility or announcement

## Image Specifications Summary

### File Format Recommendations
- **Logo**: PNG (transparent background)
- **Photographs**: JPG (compressed for web)
- **Icons**: SVG (scalable vector)
- **Web Optimization**: WebP (modern format with fallback)

### Performance Guidelines
1. **Compression**: Use tools like TinyPNG, ImageOptim
2. **Lazy Loading**: Add `loading="lazy"` attribute
3. **Responsive Images**: Use srcset for different sizes
4. **CDN**: Consider using CDN for image delivery
5. **Optimization Tool**: Use ImageMagick/FFMPEG for batch processing

Example compression command:
```bash
# Using ImageMagick
convert input.jpg -quality 80 -resize 1920x600 output.jpg

# Batch process gallery images
for img in gallery-*.jpg; do
    convert "$img" -quality 85 -resize 400x400 "optimized_$img"
done
```

## Directory Structure

```
assets/
└── images/
    ├── logo.png                    (500x200)
    ├── favicon.png                 (32x32)
    ├── og-image.jpg                (1200x630)
    ├── slider-1.jpg                (1920x600)
    ├── slider-2.jpg                (1920x600)
    ├── slider-3.jpg                (1920x600)
    ├── cbse-logo.png               (120x100)
    ├── ib-logo.png                 (120x100)
    ├── cambridge-logo.png          (120x100)
    ├── about-school.jpg            (600x400)
    ├── gallery-1.jpg to gallery-8.jpg (400x400 each)
    ├── blog-1.jpg to blog-3.jpg     (600x400 each)
    └── [additional images as needed]
```

## Placeholder Generation

For quick testing, generate placeholder images:

```bash
# Using ImageMagick
convert -size 1920x600 xc:"#295192" -pointsize 72 -fill white \
  -gravity center -annotate +0+0 "Slide 1" assets/images/slider-1.jpg

# Generate random color gradient
convert -size 400x400 gradient:"#8B4513-#D2B48C" assets/images/gallery-1.jpg
```

## Alternative: Use Stock Images

For better quality, consider:
- [Pexels](https://www.pexels.com) - Free high-quality images
- [Pixabay](https://pixabay.com) - Royalty-free images
- [Unsplash](https://unsplash.com) - Free stock photos
- [Canva](https://www.canva.com) - Design graphics

## Image Optimization Best Practices

1. **Original Size**: Always keep originals at high resolution
2. **Version Control**: Store originals in separate folder
3. **Compression**: Compress for web (70-85% quality)
4. **Formats**: JPEG for photos, PNG for graphics, WebP for modern browsers
5. **Naming**: Use descriptive, lowercase names with hyphens
6. **Alt Text**: Always provide descriptive alt text
7. **Dimensions**: Match expected dimensions exactly
8. **Testing**: Test on different speeds and connections

---

Last updated: 2026-02-21
