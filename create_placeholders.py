#!/usr/bin/env python3
from PIL import Image, ImageDraw, ImageFont
import os

os.chdir('/tmp/high-school-website/assets/images')

# Define colors
primary_blue = (41, 81, 146)
light_blue = (61, 102, 180)
dark_blue = (31, 59, 107)
orange = (255, 107, 53)
white = (255, 255, 255)

# Helper function to create placeholder image
def create_image(width, height, text, filename, bg_color=primary_blue):
    img = Image.new('RGB', (width, height), bg_color)
    draw = ImageDraw.Draw(img)
    
    # Try to use a basic font
    try:
        font = ImageFont.truetype("/System/Library/Fonts/Helvetica.ttc", 30)
    except:
        try:
            font = ImageFont.truetype("/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf", 30)
        except:
            font = ImageFont.load_default()
    
    # Draw text
    bbox = draw.textbbox((0, 0), text, font=font)
    text_width = bbox[2] - bbox[0]
    text_height = bbox[3] - bbox[1]
    x = (width - text_width) // 2
    y = (height - text_height) // 2
    draw.text((x, y), text, fill=white, font=font)
    
    img.save(filename)
    print(f"✓ Created {filename} ({width}x{height})")

# Logo
create_image(500, 200, "School Logo", "logo.png", primary_blue)

# Favicon
create_image(32, 32, "S", "favicon.png", primary_blue)

# Slider images
create_image(1920, 600, "Slide 1: Excellence in Education", "slider-1.jpg", primary_blue)
create_image(1920, 600, "Slide 2: Global Curriculum", "slider-2.jpg", light_blue)
create_image(1920, 600, "Slide 3: Holistic Development", "slider-3.jpg", dark_blue)

# Gallery images
colors_gallery = [primary_blue, light_blue, dark_blue, orange]
for i in range(1, 9):
    bg = colors_gallery[(i-1) % len(colors_gallery)]
    create_image(400, 400, f"Gallery {i}", f"gallery-{i}.jpg", bg)

# About school image
create_image(600, 400, "About School", "about-school.jpg", primary_blue)

# Blog images
colors_blog = [primary_blue, light_blue, dark_blue]
for i in range(1, 4):
    bg = colors_blog[i-1]
    create_image(600, 400, f"Blog {i}", f"blog-{i}.jpg", bg)

# Affiliation logos
create_image(120, 100, "CBSE", "cbse-logo.png", primary_blue)
create_image(120, 100, "IB", "ib-logo.png", primary_blue)
create_image(120, 100, "CAMBRIDGE", "cambridge-logo.png", primary_blue)

# OG Image
create_image(1200, 630, "High School Website", "og-image.jpg", primary_blue)

print("\n✅ All placeholder images created successfully!")
print(f"Total files: 20 images ready")
