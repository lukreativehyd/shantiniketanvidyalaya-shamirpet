<?php
// Configuration
require 'admin/db-config.php';
include 'includes/random-image-helper.php';
$page_title = "Home - Shantiniketan Vidyalaya";
$page_description = "Welcome to Shantiniketan Vidyalaya - A leading CBSE residential school in Hyderabad, Shamirpet";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $page_description; ?>">
    <title><?php echo $page_title; ?></title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/variables.css?v=46.0">
    <link rel="stylesheet" href="assets/css/style.css?v=46.0">
    <link rel="stylesheet" href="assets/css/responsive.css?v=46.0">
    <link rel="stylesheet" href="assets/css/form-validation.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/bootstrap.min.css">
    
    <!-- Font Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpg" href="assets/images/Logo symbol.jpg">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader" class="preloader">
        <div class="preloader-content">
            <img src="assets/images/Logo symbol.jpg" alt="Loading..." class="preloader-logo">
            <div class="preloader-spinner"></div>
        </div>
    </div>

    <!-- Top Bar -->
    <?php include 'includes/top-bar.php'; ?>

    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <!-- CBSE Affiliation Bar -->
    <div class="cbse-bar" style="background: #F5F5F5; padding: 12px 16px; display: flex; justify-content: center; align-items: center; gap: 12px; max-width: 400px; margin: 0 auto 0 auto; margin-bottom: 0; position: relative; z-index: 20; border-bottom: 1px solid rgba(0,0,0,0.05);">
        <span style="font-size: 0.9rem; font-weight: 700; color: #333333; letter-spacing: 0.5px;">Affiliated to CBSE</span>
        <img src="assets/images/CBSE LOGO.png" alt="CBSE Logo" style="width: 30px; height: 30px; object-fit: contain;">
        <span style="font-size: 0.9rem; font-weight: 700; color: #BF3149;">No. 3630046</span>
    </div>

    <!-- Sticky Floating Elements -->
    <?php include 'includes/sticky-elements.php'; ?>

    <!-- Hero Slider Section -->
    <section class="hero-section">
        <div id="carouselHero" class="carousel slide carousel-fade hero-carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="hero-slide">
                        <img src="assets/images/Website/School/UKP01787.jpg" alt="Excellence in Education" class="hero-image">
                        <div class="hero-overlay"></div>
                        <div class="hero-content-wrapper">
                            <div class="container">
                                <div class="row align-items-center h-100">
                                    <div class="col-lg-7">
                                        <div class="hero-text-content">
                                            <h1 class="hero-title fade-in">Co-Educational • CBSE • Residential</h1>
                                            <p class="hero-description">Excellence in academics, character, and holistic development in a nurturing residential community for boys and girls</p>
                                            <div class="hero-actions">
                                                <a href="#enquiry-form-section" class="btn btn-accent btn-lg">Enroll Today</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="hero-slide">
                        <img src="assets/images/Website/Class%20rooms/UKP01799.jpg" alt="Global Programs" class="hero-image">
                        <div class="hero-overlay"></div>
                        <div class="hero-content-wrapper">
                            <div class="container">
                                <div class="row align-items-center h-100">
                                    <div class="col-lg-7">
                                        <div class="hero-text-content">
                                            <h1 class="hero-title fade-in">Premier CBSE Education</h1>
                                            <p class="hero-description">Comprehensive curriculum for holistic development of well-rounded global citizens</p>
                                            <div class="hero-actions">
                                                <a href="#enquiry-form-section" class="btn btn-accent btn-lg">Apply Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="hero-slide">
                        <img src="assets/images/Website/Sports/Yoga/UKP02399.jpg" alt="Holistic Development" class="hero-image">
                        <div class="hero-overlay"></div>
                        <div class="hero-content-wrapper">
                            <div class="container">
                                <div class="row align-items-center h-100">
                                    <div class="col-lg-7">
                                        <div class="hero-text-content">
                                            <h1 class="hero-title fade-in">Holistic Development & Growth</h1>
                                            <p class="hero-description">24/7 mentorship, leadership programs, and co-curricular excellence in a supportive residential community</p>
                                            <div class="hero-actions">
                                                <a href="#enquiry-form-section" class="btn btn-accent btn-lg">Join Us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Carousel Indicators -->
            <div class="carousel-indicators customized">
                <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- CBSE Badge -->
            <div class="cbse-badge-small">
                <img src="assets/images/CBSE LOGO.png" alt="CBSE Logo" class="cbse-badge-logo">
                <div class="cbse-badge-text">
                    <div class="cbse-badge-label">AFFILIATED TO CBSE</div>
                    <div class="cbse-badge-number">No. 3630046</div>
                </div>
            </div>
        </div>
    </section>

    <!-- School Motto Bar -->
    <div style="background: linear-gradient(135deg, #295192 0%, #BF3149 100%); padding: 24px 16px; display: flex; justify-content: center; align-items: center;">
        <div style="text-align: center;">
            <p style="font-size: 1.5rem; font-weight: 700; color: white; letter-spacing: 0.5px; margin: 0; display: flex; align-items: center; justify-content: center; gap: 16px;">
                <span>Sā vidyā yā vimuktaye</span>
                <span>–</span>
                <span>सा विद्या या विमुक्तये</span>
            </p>
        </div>
    </div>

    <!-- About School Section -->
    <section id="about" class="section">
        <div class="container">
            <div class="about-wrapper">
                <div class="about-image-side">
                    <img src="assets/images/Website/School/UKP01832.jpg" alt="School Campus" class="about-main-image">
                    <div class="years-badge">
                        <div class="years-number">25+</div>
                        <div class="years-text">Years of<br>Excellence</div>
                    </div>
                </div>
                
                <div class="about-content-side">
                    <h2 class="about-heading">A Home Away <span class="gradient-text">From Home</span></h2>
                    <div style="background: #F5F5F5; padding: 16px 20px; border-radius: 6px; margin-bottom: 24px; border-left: 4px solid var(--primary-color);">
                        <span style="color: #333; font-size: 0.95rem; font-weight: 600; letter-spacing: 0.3px;">We are Shantiniketan Vidyalaya, established in 1999</span>
                    </div>
                    
                    <div class="about-description">
                        <p>
                            Shantiniketan Vidyalaya is a co-educational CBSE English medium residential school established in 1999 to impart quality education and develop comprehensive personality in children. Our motto, "Sa Vidya Ya Vimuktaye" (स्वा विद्या या विमुक्तये), means "That is True Education, which Liberates." Guided by the vision of Swami Vivekananda, we foster character formation, strengthen minds, expand intellect, and empower students to stand on their own feet.
                        </p>
                    </div>

                    <a href="/the-school" class="read-more-link">Read More About Us →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Highlights Section -->
    <section class="section section-light highlights-section">
        <div class="container">
            <div class="highlights-grid">
                <div class="highlight-card">
                    <div class="highlight-number">5000+</div>
                    <h4>Students</h4>
                    <p>Diverse student community from various backgrounds</p>
                </div>
                <div class="highlight-card">
                    <div class="highlight-number">100+</div>
                    <h4>Faculty</h4>
                    <p>Highly qualified and experienced educators</p>
                </div>
                <div class="highlight-card">
                    <div class="highlight-number">27 yrs</div>
                    <h4>Track Record</h4>
                    <p>Proven track record of academic excellence</p>
                </div>
                <div class="highlight-card">
                    <div class="highlight-number">100%</div>
                    <h4>Success</h4>
                    <p>Success in CBSE board exams</p>
                </div>
                <div class="highlight-card">
                    <div class="highlight-number">10 yrs</div>
                    <h4>Awards</h4>
                    <p>Best Residential School awards for last 10 years</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Three Pillars Section -->
    <section class="section three-pillars-section" style="background: linear-gradient(180deg, #f8fafc 0%, #f0f4f9 100%); padding: 100px 0;">
        <div class="container">
            <div class="section-title" style="margin-bottom: 80px;">
                <h2 style="font-size: 2.8rem; font-weight: 900; color: var(--primary-color); margin-bottom: 16px;">Our <span class="gradient-text">Foundation</span></h2>
                <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto;">Built on three core pillars that define Shantiniketan Vidyalaya</p>
            </div>
            <div class="pillars-grid">
                <!-- Pillar 1: Co-Educational -->
                <div class="pillar-card" style="background: white; padding: 40px 32px; border-radius: 16px; box-shadow: 0 8px 24px rgba(41, 81, 146, 0.08); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid rgba(41, 81, 146, 0.1); position: relative; overflow: hidden;">
                    <div class="pillar-icon" style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; color: white; margin-bottom: 24px; box-shadow: 0 8px 20px rgba(41, 81, 146, 0.25); position: relative; z-index: 1;">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 style="font-size: 1.6rem; font-weight: 800; color: var(--primary-color); margin-bottom: 8px; position: relative; z-index: 1;">Co-Educational</h3>
                    <p class="pillar-subtitle" style="color: var(--accent-color); font-size: 0.95rem; font-weight: 700; margin-bottom: 16px; position: relative; z-index: 1;">Equal Opportunities for All</p>
                    <p class="pillar-description" style="color: var(--text-secondary); line-height: 1.8; font-size: 0.95rem; position: relative; z-index: 1; text-align: left;">
                        We believe in providing equal opportunities for boys and girls to learn, grow, and excel together. Our inclusive environment celebrates diversity, promotes mutual respect, and prepares students for a truly global society where gender equality is paramount.
                    </p>
                </div>

                <!-- Pillar 2: CBSE Curriculum -->
                <div class="pillar-card" style="background: white; padding: 40px 32px; border-radius: 16px; box-shadow: 0 8px 24px rgba(41, 81, 146, 0.08); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid rgba(41, 81, 146, 0.1); position: relative; overflow: hidden; transform: translateY(-8px);">
                    <div class="pillar-icon" style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--accent-color) 0%, #D64364 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; color: white; margin-bottom: 24px; box-shadow: 0 8px 20px rgba(191, 49, 73, 0.25); position: relative; z-index: 1;">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3 style="font-size: 1.6rem; font-weight: 800; color: var(--primary-color); margin-bottom: 8px; position: relative; z-index: 1;">CBSE Curriculum</h3>
                    <p class="pillar-subtitle" style="color: var(--accent-color); font-size: 0.95rem; font-weight: 700; margin-bottom: 16px; position: relative; z-index: 1;">Rigorous Academic Excellence</p>
                    <p class="pillar-description" style="color: var(--text-secondary); line-height: 1.8; font-size: 0.95rem; position: relative; z-index: 1; text-align: left;">
                        Our comprehensive CBSE curriculum combines structured academics with experiential learning. We focus on conceptual understanding, critical thinking, and comprehensive skill development, preparing students for higher education and professional success.
                    </p>
                </div>

                <!-- Pillar 3: Residential -->
                <div class="pillar-card" style="background: white; padding: 40px 32px; border-radius: 16px; box-shadow: 0 8px 24px rgba(41, 81, 146, 0.08); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid rgba(41, 81, 146, 0.1); position: relative; overflow: hidden;">
                    <div class="pillar-icon" style="width: 70px; height: 70px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; color: white; margin-bottom: 24px; box-shadow: 0 8px 20px rgba(16, 185, 129, 0.25); position: relative; z-index: 1;">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 style="font-size: 1.6rem; font-weight: 800; color: var(--primary-color); margin-bottom: 8px; position: relative; z-index: 1;">Residential</h3>
                    <p class="pillar-subtitle" style="color: var(--accent-color); font-size: 0.95rem; font-weight: 700; margin-bottom: 16px; position: relative; z-index: 1;">Holistic Development & Growth</p>
                    <p class="pillar-description" style="color: var(--text-secondary); line-height: 1.8; font-size: 0.95rem; position: relative; z-index: 1; text-align: left;">
                        Our 25-acre sprawling campus offers a green and pollution-free environment that supports students' emotional, mental, and physical wellbeing. We provide 24/7 mentorship, specialized games coaching, and shared living experiences that develop independence, resilience, and leadership through comprehensive co-curricular activities shaping well-rounded personalities.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- School Features Section -->
    <section id="features" class="section section-light">
        <div class="container">
            <div class="section-title">
                <h2>Our <span class="gradient-text">Features & Facilities</span></h2>
                <p>Discover what makes our school unique and the best choice for your child's education</p>
            </div>
            <div class="features-wrapper">
                <div class="features-list">
                    <!-- Feature 1 -->
                    <div class="feature-item">
                        <div class="feature-header" onclick="selectFeature(0, 'assets/images/Website/Class%20rooms/UKP01816.jpg')">
                            <h4>Smart Classrooms</h4>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="feature-description">
                            <p>State-of-the-art classrooms equipped with interactive smart boards, multimedia projectors, and high-speed connectivity. Our technology-enabled learning spaces foster engagement, collaboration, and digital literacy for modern education.</p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-item">
                        <div class="feature-header" onclick="selectFeature(1, 'assets/images/Website/Dance%20room%20and%20classes/UKP02090.jpg')">
                            <h4>Performing Arts</h4>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="feature-description">
                            <p>Dedicated auditorium and performance spaces for music, dance, and drama. Students explore traditional and contemporary performing arts, building confidence, cultural awareness, and stage presence through comprehensive training.</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-item">
                        <div class="feature-header" onclick="selectFeature(2, 'assets/images/Website/Robotics/UKP02173.jpg')">
                            <h4>STEM & Innovation Labs</h4>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="feature-description">
                            <p>Advanced science, technology, engineering, and mathematics laboratories with cutting-edge equipment. Students engage in hands-on experiments, coding, robotics, and innovation projects preparing them for future careers.</p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="feature-item">
                        <div class="feature-header" onclick="selectFeature(3, 'assets/images/Website/Sports/Cricket/UKP03427.jpg')">
                            <h4>Sports Complex</h4>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="feature-description">
                            <p>Comprehensive sports infrastructure including cricket fields, basketball courts, tennis courts, swimming pool, and indoor games. Our programs develop athletic excellence, teamwork, wellness, and competitive spirit.</p>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="feature-item">
                        <div class="feature-header" onclick="selectFeature(4, 'assets/images/Website/Art%20%26%20Craft/UKP02225.jpg')">
                            <h4>Cultural Activities</h4>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="feature-description">
                            <p>Rich cultural engagement programs including traditional Indian art forms, music, dance, crafts, and festivals. Students celebrate diversity, develop cultural appreciation, and express creativity through various artistic mediums.</p>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="feature-item">
                        <div class="feature-header" onclick="selectFeature(5, 'assets/images/Website/Library/UKP02232.jpg')">
                            <h4>Library & Learning Center</h4>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="feature-description">
                            <p>Comprehensive library with extensive collection of books, digital resources, and research materials. Our information commons supports critical thinking, independent learning, and fosters a love for reading and knowledge exploration.</p>
                        </div>
                    </div>

                    <!-- Feature 7 -->
                    <div class="feature-item">
                        <div class="feature-header" onclick="selectFeature(6, 'assets/images/Website/Shooting%20and%20NCC/UKP02571.jpg')">
                            <h4>NCC Training</h4>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="feature-description">
                            <p>National Cadet Corps (NCC) program fostering discipline, leadership, patriotism, and character development. Our cadets engage in military training, outdoor expeditions, and community service while building confidence and civic responsibility.</p>
                        </div>
                    </div>
                </div>

                <div class="features-image-container">
                    <img id="featureImage" src="assets/images/Website/Class%20rooms/UKP01816.jpg" alt="Smart Classrooms">
                </div>
            </div>
        </div>
    </section>

    <!-- School Video Section -->
    <section id="video" class="section section-light">
        <div class="container">
            <div class="section-title">
                <h2>Experience <span class="gradient-text">Shantiniketan Vidyalaya</span></h2>
                <p>Take a virtual tour of our beautiful campus and world-class facilities</p>
            </div>
            <div class="video-container">
                <iframe class="school-video" src="https://www.youtube.com/embed/lKtpZUZWX00" title="Shantiniketan Vidyalaya School Tour" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Campus <span class="gradient-text">Gallery</span></h2>
                <p>Explore our vibrant campus, facilities, and memorable moments</p>
            </div>
            <div class="gallery-grid">
                <?php
                // Get one random image from each top 5 category
                $categories = [
                    'Academics' => ['Class rooms', 'Lab and lab classes', 'Library', 'Computer lab', 'Robotics'],
                    'Sports' => ['Sports'],
                    'Infrastructure' => ['School', 'Swimming pool', 'Dining hall', 'Play park'],
                    'Yoga' => ['Yoga canopy'],
                    'Student Life' => ['Assembly', 'Shooting and NCC']
                ];
                
                foreach ($categories as $categoryName => $folders) {
                    $randomImage = null;
                    
                    // Try to get an image from one of the folders in this category
                    shuffle($folders);
                    foreach ($folders as $folder) {
                        $dirPath = 'assets/images/Website/' . $folder;
                        
                        // Special handling for Sports (has subfolders)
                        if ($categoryName === 'Sports' && is_dir($dirPath)) {
                            $sportSubfolders = array_filter(scandir($dirPath), function($item) use ($dirPath) {
                                return is_dir($dirPath . '/' . $item) && $item !== '.' && $item !== '..' && $item[0] !== '.';
                            });
                            shuffle($sportSubfolders);
                            foreach ($sportSubfolders as $sport) {
                                $sportPath = $dirPath . '/' . $sport;
                                $files = array_filter(scandir($sportPath), function($file) {
                                    return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])
                                        && $file !== '.' && $file !== '..' && $file[0] !== '.' && $file[0] !== '_';
                                });
                                if (!empty($files)) {
                                    $files = array_values($files);
                                    $randomImage = 'Sports/' . $sport . '/' . $files[array_rand($files)];
                                    break 2;
                                }
                            }
                        } elseif (is_dir($dirPath)) {
                            $files = array_filter(scandir($dirPath), function($file) {
                                return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])
                                    && $file !== '.' && $file !== '..' && $file[0] !== '.' && $file[0] !== '_';
                            });
                            if (!empty($files)) {
                                $files = array_values($files);
                                $randomImage = str_replace('assets/images/Website/', '', $dirPath) . '/' . $files[array_rand($files)];
                                break;
                            }
                        }
                    }
                    
                    if ($randomImage) {
                        // URL encode folder names but preserve filename
                        $parts = explode('/', $randomImage);
                        $encoded_image = '';
                        foreach ($parts as $part) {
                            if ($encoded_image) $encoded_image .= '/';
                            $encoded_image .= rawurlencode($part);
                        }
                        echo '<div class="gallery-item">';
                        echo '<img src="assets/images/Website/' . htmlspecialchars($encoded_image) . '" alt="' . htmlspecialchars($categoryName) . '">';
                        echo '<div class="gallery-overlay">';
                        echo '<div class="gallery-overlay-icon">';
                        echo '<i class="fas fa-search-plus"></i>';
                        echo '</div>';
                        echo '<div class="gallery-category-label">' . htmlspecialchars($categoryName) . '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div style="text-align: center; margin-top: var(--spacing-xl);">
                <a href="gallery" class="btn btn-primary btn-lg">View Full Photo Gallery</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="section testimonials-section">
        <div class="container">
            <div class="section-title">
                <h2>Hear from Our <span class="gradient-text">Happy Parents</span>!</h2>
            </div>
            
            <div class="testimonials-carousel">
                <div class="testimonials-container">
                    <div class="testimonials-track">
                        <div class="testimonial-card">
                            <div class="testimonial-quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text">We are very overwhelmed and happy to say that my son is doing very well in his school with the help of his teachers and staff. Very supportive and kind-hearted teachers and staff.</p>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="testimonial-author">- Niraj & Priyanka Dama</h4>
                            <p class="testimonial-location">Shamirpet HSR, Hyderabad</p>
                        </div>

                        <div class="testimonial-card">
                            <div class="testimonial-quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text">The curriculum is well-structured and engaging. Our daughter has developed strong analytical skills and creative thinking. We appreciate the holistic approach to education.</p>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="testimonial-author">- Arun & Sneha Kapoor</h4>
                            <p class="testimonial-location">Shamirpet HSR, Hyderabad</p>
                        </div>

                        <div class="testimonial-card">
                            <div class="testimonial-quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text">Excellent education with great focus on values and character development. Our child has grown tremendously in confidence and academics. Highly recommended for all parents.</p>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="testimonial-author">- Rajesh & Anjali Singh</h4>
                            <p class="testimonial-location">Shamirpet HSR, Hyderabad</p>
                        </div>

                        <div class="testimonial-card">
                            <div class="testimonial-quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text">The teachers are very dedicated and caring. My daughter loves going to school every day. The blend of academics and extracurricular activities is perfect.</p>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="testimonial-author">- Vikram & Meera Malhotra</h4>
                            <p class="testimonial-location">Shamirpet HSR, Hyderabad</p>
                        </div>
                    </div>
                </div>

                <button class="testimonial-nav testimonial-prev" aria-label="Previous testimonial">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="testimonial-nav testimonial-next" aria-label="Next testimonial">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <div class="testimonial-dots">
                    <span class="testimonial-dot active"></span>
                    <span class="testimonial-dot"></span>
                    <span class="testimonial-dot"></span>
                    <span class="testimonial-dot"></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Blogs Section -->
    <section id="blogs" class="section section-light">
        <div class="container">
            <div class="section-title">
                <h2>Latest <span class="gradient-text">News & Articles</span></h2>
                <p>Stay updated with recent events, achievements, and educational insights from our school</p>
            </div>
            <div class="blogs-grid">
                <?php
                // Fetch latest 3 published blogs from database
                $blogsResult = execute_query("SELECT b.*, a.full_name FROM blogs b JOIN admin_users a ON b.author_id = a.id WHERE b.status = 'published' ORDER BY b.created_at DESC LIMIT 3");
                $latestBlogs = fetch_all($blogsResult);
                
                if ($latestBlogs && count($latestBlogs) > 0):
                    // Helper function for featured images (same as in blogs.php)
                    function get_featured_image_url($path) {
                        if (empty($path)) {
                            return '/assets/images/Website/School/UKP01787.jpg';
                        }
                        if (strpos($path, '/') === 0) {
                            return htmlspecialchars($path);
                        }
                        if (strpos($path, '/Volumes/') !== false || strpos($path, 'C:\\') !== false) {
                            return '/assets/images/Website/School/UKP01787.jpg';
                        }
                        if (!preg_match('|^https?://|', $path)) {
                            return htmlspecialchars('/' . ltrim($path, '/'));
                        }
                        return htmlspecialchars($path);
                    }
                    
                    foreach ($latestBlogs as $blog): ?>
                        <div class="blog-card">
                            <img src="<?php echo get_featured_image_url($blog['featured_image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="blog-image">
                            <div class="blog-content">
                                <span class="blog-date"><?php echo date('M d, Y', strtotime($blog['created_at'])); ?></span>
                                <h4 class="blog-title"><?php echo htmlspecialchars($blog['title']); ?></h4>
                                <a href="/blog/<?php echo urlencode($blog['slug']); ?>/" class="blog-link">Read More →</a>
                            </div>
                        </div>
                    <?php endforeach;
                else:
                    // Fallback if no blogs in database
                    ?>
                    <div class="blog-card">
                        <img src="/assets/images/Website/Lab%20and%20lab%20classes/UKP02078.jpg" alt="Blog" class="blog-image">
                        <div class="blog-content">
                            <span class="blog-date"><?php echo date('M d, Y'); ?></span>
                            <h4 class="blog-title">Innovative Laboratory Education Enhances Scientific Thinking</h4>
                            <a href="/blogs" class="blog-link">View All Blogs →</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- View More Button -->
            <div style="display: flex; justify-content: center; margin-top: 50px;">
                <a href="/blogs" class="btn btn-primary" style="padding: 14px 40px; font-size: 1rem; font-weight: 700;">
                    View All Blogs & News <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Enquiry Form Section -->
    <?php include 'includes/enquiry-form.php'; ?>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- Popup Enquiry Form Modal -->
    <?php include 'includes/popup-enquiry-form.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/form-validation.js"></script>
    <script src="assets/js/slider.js"></script>
    <script>
        // Accordion Toggle Function
        function toggleAccordion(header) {
            const isActive = header.classList.contains('active');
            
            // Close all other accordion items
            const allHeaders = document.querySelectorAll('.accordion-header');
            allHeaders.forEach(h => {
                if (h !== header) {
                    h.classList.remove('active');
                }
            });
            
            // Toggle current item
            header.classList.toggle('active');
        }

        // Feature Selection Function
        function selectFeature(index, imageSrc) {
            // Update active feature
            const featureItems = document.querySelectorAll('.feature-item');
            featureItems.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
            
            // Update image with smooth transition
            const featureImage = document.getElementById('featureImage');
            featureImage.style.transition = 'opacity 0.3s ease-in-out';
            featureImage.style.opacity = '0';
            
            // Wait for fade-out to complete, then change image
            setTimeout(() => {
                featureImage.src = imageSrc;
                // Trigger reflow to ensure opacity transition is applied
                void featureImage.offsetHeight;
                featureImage.style.opacity = '1';
            }, 300);
        }

        // Form Submission Handler
        document.getElementById('enquiryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            
            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            
            // Get form data
            const formData = new FormData(form);
            
            // Send to server via AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/process-enquiry.php', true);
            
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Redirect to thank you page with reference number
                            window.location.href = 'thank-you.php?ref=' + (response.enquiry_id || 'N/A');
                        } else {
                            alert(response.error || 'An error occurred');
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnText;
                        }
                    } catch (e) {
                        alert('Error processing response');
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    }
                } else {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        alert(response.error || 'Error submitting form');
                    } catch (e) {
                        alert('Error submitting form. Please try again.');
                    }
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            };
            
            xhr.onerror = function() {
                alert('Network error. Please check your connection and try again.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            };
            
            xhr.send(formData);
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#enquiry' && href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });
        });

        // Testimonials Carousel
        class TestimonialsCarousel {
            constructor() {
                this.container = document.querySelector('.testimonials-container');
                this.track = document.querySelector('.testimonials-track');
                this.cards = document.querySelectorAll('.testimonial-card');
                this.prevBtn = document.querySelector('.testimonial-prev');
                this.nextBtn = document.querySelector('.testimonial-next');
                this.dots = document.querySelectorAll('.testimonial-dot');
                
                this.currentIndex = 0;
                this.cardWidth = 0;
                this.gap = 0;
                
                this.init();
            }
            
            init() {
                this.updateDimensions();
                this.attachEventListeners();
                
                // Update dimensions on resize
                window.addEventListener('resize', () => this.updateDimensions());
            }
            
            updateDimensions() {
                if (this.cards.length === 0) return;
                
                const containerWidth = this.container.offsetWidth;
                const isMobile = window.innerWidth < 768;
                const isTablet = window.innerWidth < 1024;
                
                // Adjust card width based on viewport
                if (isMobile) {
                    this.cardWidth = containerWidth - 32; // 1 card visible
                } else if (isTablet) {
                    this.cardWidth = (containerWidth - 16) / 2; // 2 cards visible minus gap
                } else {
                    this.cardWidth = (containerWidth - 16) / 2; // 2 cards visible minus gap
                }
            }
            
            attachEventListeners() {
                this.prevBtn.addEventListener('click', () => this.prevSlide());
                this.nextBtn.addEventListener('click', () => this.nextSlide());
                
                this.dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => this.goToSlide(index));
                });
            }
            
            updateTrackPosition() {
                const offset = -(this.currentIndex * (this.cardWidth + 16)); // 16px gap
                this.track.style.transform = `translateX(${offset}px)`;
                
                // Update active dot
                this.dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === this.currentIndex);
                });
            }
            
            maxSlides() {
                const isMobile = window.innerWidth < 768;
                return isMobile ? this.cards.length - 1 : Math.ceil(this.cards.length / 2) - 1;
            }
            
            nextSlide() {
                if (this.currentIndex < this.maxSlides()) {
                    this.currentIndex++;
                } else {
                    this.currentIndex = 0;
                }
                this.updateTrackPosition();
            }
            
            prevSlide() {
                if (this.currentIndex > 0) {
                    this.currentIndex--;
                } else {
                    this.currentIndex = this.maxSlides();
                }
                this.updateTrackPosition();
            }
            
            goToSlide(index) {
                if (index >= 0 && index <= this.maxSlides()) {
                    this.currentIndex = index;
                    this.updateTrackPosition();
                }
            }
        }
        
        // Initialize testimonials carousel
        document.addEventListener('DOMContentLoaded', () => {
            new TestimonialsCarousel();
            
            // Announcements rotation
            const announcements = [
                'Admissions open for 2024-25 academic year',
                'Annual sports day scheduled for March 15',
                'Science exhibition on February 28',
                'Parent-teacher conference in April',
                'Summer camps registration now open'
            ];
            
            let announcementIndex = 0;
            const announcementsText = document.getElementById('announcementsText');
            
            if (announcementsText) {
                setInterval(() => {
                    announcementIndex = (announcementIndex + 1) % announcements.length;
                    announcementsText.textContent = announcements[announcementIndex];
                }, 4000);
            }
        });
    </script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/bootstrap.bundle.min.js"></script>
    
    <!-- Hero Carousel Controls - Custom implementation with proper fade support -->
    <script>
        // Custom carousel controller that properly handles carousel-fade class
        function initCarousel() {
            const carouselEl = document.getElementById('carouselHero');
            const indicators = document.querySelectorAll('.carousel-indicators.customized button');
            const items = carouselEl.querySelectorAll('.carousel-item');
            
            if (!carouselEl || items.length === 0) {
                console.error('❌ Carousel not properly initialized');
                return false;
            }
            
            console.log('✓ Carousel found with', items.length, 'slides');
            
            let currentIndex = 0;
            let autoplayInterval = null;
            let isTransitioning = false;
            
            function goToSlide(index) {
                if (isTransitioning) return; // Ignore if already transitioning
                
                isTransitioning = true;
                
                // Normalize index
                if (index < 0) index = items.length - 1;
                if (index >= items.length) index = 0;
                
                console.log('Moving to slide:', index + 1);
                
                // Remove active class from all items
                items.forEach(item => {
                    item.classList.remove('active');
                });
                
                // Add active class to current item (this will trigger CSS fade)
                items[index].classList.add('active');
                
                // Update indicators
                indicators.forEach((indicator, idx) => {
                    indicator.classList.toggle('active', idx === index);
                });
                
                currentIndex = index;
                
                // Wait for fade transition to complete before allowing next transition
                // CSS has 1s transition, so wait a bit more
                setTimeout(() => {
                    isTransitioning = false;
                }, 1100);
            }
            
            function autoadvance() {
                goToSlide(currentIndex + 1);
            }
            
            function startAutoplay() {
                if (autoplayInterval) clearInterval(autoplayInterval);
                autoplayInterval = setInterval(autoadvance, 5000);
                console.log('✓ Autoplay started');
            }
            
            function stopAutoplay() {
                if (autoplayInterval) {
                    clearInterval(autoplayInterval);
                    autoplayInterval = null;
                }
            }
            
            // Setup indicator clicks
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    if (isTransitioning) return;
                    stopAutoplay();
                    goToSlide(index);
                    startAutoplay();
                });
            });
            
            // Pause on hover
            carouselEl.addEventListener('mouseenter', () => stopAutoplay());
            
            // Resume on leave
            carouselEl.addEventListener('mouseleave', () => startAutoplay());
            
            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    stopAutoplay();
                    goToSlide(currentIndex - 1);
                    startAutoplay();
                } else if (e.key === 'ArrowRight') {
                    stopAutoplay();
                    goToSlide(currentIndex + 1);
                    startAutoplay();
                }
            });
            
            // Initialize first slide
            goToSlide(0);
            
            // Start autoplay after initial setup
            setTimeout(startAutoplay, 500);
            
            console.log('✓✓✓ CAROUSEL FULLY INITIALIZED ✓✓✓');
            return true;
        }
        
        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCarousel);
        } else {
            setTimeout(initCarousel, 100);
        }

        // Preloader Handler
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            if (preloader) {
                setTimeout(function() {
                    preloader.classList.add('loaded');
                }, 800);
            }
        });

        // Hide preloader if page takes too long to load
        setTimeout(function() {
            const preloader = document.getElementById('preloader');
            if (preloader && !preloader.classList.contains('loaded')) {
                preloader.classList.add('loaded');
            }
        }, 3000);
    </script>
</body>
</html>
