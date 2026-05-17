<?php
include 'includes/random-image-helper.php';
$page_title = "Contact Us - Shantiniketan Vidyalaya";
$page_description = "Get in touch with Shantiniketan Vidyalaya. Visit our campus in Shamirpet, Hyderabad or reach out through our contact form";
$randomImage = getRandomImage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $page_description; ?>">
    <title><?php echo $page_title; ?></title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/variables.css?v=45.0">
    <link rel="stylesheet" href="assets/css/style.css?v=45.0">
    <link rel="stylesheet" href="assets/css/responsive.css?v=45.0">
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

<!-- Page Header -->
<section class="con-page-header">
    <div class="container">
        <nav class="con-breadcrumbs">
            <a href="index">Home</a>
            <span>/</span>
            <span>Contact Us</span>
        </nav>
        <h1>Get In Touch</h1>
    </div>
</section>

<!-- Address & Map Section -->
<section class="con-section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: stretch;">
            <!-- Address Information Left -->
            <div style="background: linear-gradient(135deg, rgba(41, 81, 146, 0.08) 0%, rgba(191, 49, 73, 0.05) 100%); border: 1px solid rgba(41, 81, 146, 0.15); padding: 50px; border-radius: 16px; height: 350px; display: flex; align-items: center; box-shadow: 0 4px 15px rgba(41, 81, 146, 0.08); transition: all 0.3s ease;">
                <div style="display: flex; align-items: center; gap: 30px; width: 100%;">
                    <div style="width: 100px; height: 100px; background: linear-gradient(135deg, rgba(41, 81, 146, 0.15), rgba(41, 81, 146, 0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 12px rgba(41, 81, 146, 0.1);">
                        <i class="fas fa-map-marker-alt" style="font-size: 3rem; color: var(--primary-color);"></i>
                    </div>
                    <div>
                        <h4 style="font-size: 1.5rem; color: var(--primary-color); font-weight: 900; margin-bottom: 12px;">Our Location</h4>
                        <p style="color: var(--text-primary); font-size: 1.15rem; line-height: 1.8; margin: 0; font-weight: 600;">
                            <strong>Shantiniketan Vidyalaya</strong><br>
                            Chanakyapuri, Near Upparpalli Village<br>
                            Shamirpet, Hyderabad - 500078<br>
                            Telangana, India
                        </p>
                    </div>
                </div>
            </div>

            <!-- Map Right -->
            <div style="border-radius: 16px; overflow: hidden; border: 1px solid rgba(41, 81, 146, 0.15); height: 350px; box-shadow: 0 8px 20px rgba(41, 81, 146, 0.1);">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.8697365523833!2d78.3381!3d17.6898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91c8a4c4d4d7%3A0x7c6e9c4e7c6e9c4e!2sShantiniketan%20Vidyalaya!5e0!3m2!1sen!2sin!4v1640000000000" width="100%" height="100%" style="border:0; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Contact Details Section -->
<section class="con-section" style="background: linear-gradient(180deg, #f5f7fa 0%, #f9fafb 100%);">
    <div class="container">
        <div class="section-title" style="margin-bottom: 60px;">
            <h2>We'd Love to <span class="gradient-text">Hear From You</span></h2>
            <p>Have questions about admissions, academics, or our facilities? Reach out through any of these channels and our team will respond promptly</p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px;">
            <!-- Phone & Email Left -->
            <div>
                <!-- Phone -->
                <div style="background: linear-gradient(135deg, rgba(41, 81, 146, 0.08), rgba(41, 81, 146, 0.02)); border: 1px solid rgba(41, 81, 146, 0.15); padding: 50px; border-radius: 16px; margin-bottom: 40px; box-shadow: 0 4px 15px rgba(41, 81, 146, 0.08); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);" class="contact-info-box">
                    <div style="display: flex; align-items: flex-start; gap: 20px;">
                        <div style="width: 90px; height: 90px; background: linear-gradient(135deg, rgba(191, 49, 73, 0.15), rgba(191, 49, 73, 0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 12px rgba(191, 49, 73, 0.1);">
                            <i class="fas fa-phone" style="font-size: 2.5rem; color: var(--accent-color);"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 1.4rem; color: var(--primary-color); font-weight: 900; margin-bottom: 16px;">Phone</h4>
                            <p style="color: var(--text-primary); font-size: 1.1rem; line-height: 2; margin: 0; font-weight: 600;">
                                <a href="tel:+917671003535" style="color: var(--accent-color); text-decoration: none; display: block; transition: all 0.3s ease;">+91 7671003535</a>
                                <a href="tel:+918885531555" style="color: var(--text-primary); text-decoration: none; display: block; transition: all 0.3s ease;">+91 8885531555</a>
                                <a href="tel:+919393952299" style="color: var(--text-primary); text-decoration: none; display: block; transition: all 0.3s ease;">+91 9393952299</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div style="background: linear-gradient(135deg, rgba(41, 81, 146, 0.08), rgba(41, 81, 146, 0.02)); border: 1px solid rgba(41, 81, 146, 0.15); padding: 50px; border-radius: 16px; margin-bottom: 40px; box-shadow: 0 4px 15px rgba(41, 81, 146, 0.08); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);" class="contact-info-box">
                    <div style="display: flex; align-items: flex-start; gap: 20px;">
                        <div style="width: 90px; height: 90px; background: linear-gradient(135deg, rgba(41, 81, 146, 0.15), rgba(41, 81, 146, 0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 12px rgba(41, 81, 146, 0.1);">
                            <i class="fas fa-envelope" style="font-size: 2.5rem; color: var(--primary-color);"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 1.4rem; color: var(--primary-color); font-weight: 900; margin-bottom: 16px;">Email</h4>
                            <p style="color: var(--text-primary); font-size: 1.1rem; line-height: 1.8; margin: 0; font-weight: 600;">
                                <a href="mailto:shantiniketan99@gmail.com" style="color: var(--primary-color); text-decoration: none; transition: all 0.3s ease;">shantiniketan99@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div style="background: linear-gradient(135deg, rgba(37, 211, 102, 0.08), rgba(37, 211, 102, 0.02)); border: 1px solid rgba(37, 211, 102, 0.15); padding: 50px; border-radius: 16px; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.08); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);" class="contact-info-box">
                    <div style="display: flex; align-items: flex-start; gap: 20px;">
                        <div style="width: 90px; height: 90px; background: linear-gradient(135deg, rgba(37, 211, 102, 0.15), rgba(37, 211, 102, 0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.1);">
                            <i class="fab fa-whatsapp" style="font-size: 2.5rem; color: #25D366;"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 1.4rem; color: var(--primary-color); font-weight: 900; margin-bottom: 16px;">WhatsApp</h4>
                            <p style="color: var(--text-primary); font-size: 1.1rem; line-height: 1.8; margin: 0; font-weight: 600;">
                                <a href="https://wa.me/917671003535?text=Hello%2C%20I%20have%20a%20query" style="color: #25D366; text-decoration: none; font-weight: 700; transition: all 0.3s ease;" target="_blank">Connect with us</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Right -->
            <div style="background: white; padding: 40px; border-radius: 16px; border: 1px solid rgba(41, 81, 146, 0.1); box-shadow: 0 8px 25px rgba(41, 81, 146, 0.08);">
                <div id="contactFormMessage" style="display: none; padding: 15px; border-radius: 8px; margin-bottom: 20px;"></div>
                
                <form id="contactForm" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
                    <input type="hidden" name="formSource" value="Contact Page Form">
                    <input type="hidden" name="parentName" id="parentName">
                    <input type="hidden" name="mobileNumber" id="mobileNumber">
                    <input type="hidden" name="childName" value="">
                    <input type="hidden" name="age" value="N/A">
                    <input type="hidden" name="grade" value="N/A">
                    <input type="hidden" name="userMessage" id="userMessage">
                    
                    <div>
                        <label style="display: block; font-size: 0.95rem; font-weight: 700; color: var(--primary-color); margin-bottom: 10px;">Full Name *</label>
                        <input type="text" name="name" id="contactName" required style="width: 100%; padding: 14px 16px; border: 1.5px solid rgba(41, 81, 146, 0.2); border-radius: 8px; font-size: 1rem; font-family: inherit; transition: all 0.3s ease; background: #f9fafb;" placeholder="Your full name">
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.95rem; font-weight: 700; color: var(--primary-color); margin-bottom: 10px;">Email Address *</label>
                        <input type="email" name="email" required style="width: 100%; padding: 14px 16px; border: 1.5px solid rgba(41, 81, 146, 0.2); border-radius: 8px; font-size: 1rem; font-family: inherit; transition: all 0.3s ease; background: #f9fafb;" placeholder="your.email@example.com">
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.95rem; font-weight: 700; color: var(--primary-color); margin-bottom: 10px;">Phone Number</label>
                        <input type="tel" name="phone" id="contactPhone" style="width: 100%; padding: 14px 16px; border: 1.5px solid rgba(41, 81, 146, 0.2); border-radius: 8px; font-size: 1rem; font-family: inherit; transition: all 0.3s ease; background: #f9fafb;" placeholder="+91 XXXXX XXXXX">
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.95rem; font-weight: 700; color: var(--primary-color); margin-bottom: 10px;">Subject *</label>
                        <select name="subject" required style="width: 100%; padding: 14px 16px; border: 1.5px solid rgba(41, 81, 146, 0.2); border-radius: 8px; font-size: 1rem; font-family: inherit; background: #f9fafb; transition: all 0.3s ease;">
                            <option value="">Select a subject</option>
                            <option value="admission">Admission Inquiry</option>
                            <option value="curriculum">Curriculum Information</option>
                            <option value="facilities">Facilities & Infrastructure</option>
                            <option value="activities">Activities & Programs</option>
                            <option value="general">General Inquiry</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.95rem; font-weight: 700; color: var(--primary-color); margin-bottom: 10px;">Message *</label>
                        <textarea name="message" id="contactMessage" required rows="5" style="width: 100%; padding: 14px 16px; border: 1.5px solid rgba(41, 81, 146, 0.2); border-radius: 8px; font-size: 1rem; font-family: inherit; resize: vertical; background: #f9fafb; transition: all 0.3s ease;" placeholder="Your message here..."></textarea>
                    </div>

                    <button type="submit" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); color: white; border: none; padding: 16px 32px; border-radius: 8px; font-size: 1.05rem; font-weight: 700; cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 4px 12px rgba(41, 81, 146, 0.2);">
                        <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
.con-page-header {
    background: linear-gradient(rgba(29, 53, 116, 0.85), rgba(41, 81, 146, 0.85)), url('<?php echo $randomImage; ?>') center/cover no-repeat;
    min-height: 140px;
    display: flex;
    align-items: center;
    padding: 30px 0;
    color: white;
    padding: 120px 0;
    text-align: center;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    position: relative;
}

.con-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    color: white;
    position: relative;
    z-index: 1;
    letter-spacing: -1px;
}

.con-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 30px;
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.9);
}

.con-breadcrumbs a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
}

.con-breadcrumbs a:hover {
    color: white;
    font-weight: 600;
}

.con-section {
    padding: 70px 0;
}

.contact-info-box {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

.contact-info-box:hover {
    transform: translateY(-8px) !important;
    box-shadow: 0 12px 30px rgba(41, 81, 146, 0.15) !important;
    border-color: rgba(41, 81, 146, 0.25) !important;
}

input[type="text"],
input[type="email"],
input[type="tel"],
select,
textarea {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05) !important;
    transition: all 0.3s ease !important;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
select:focus,
textarea:focus {
    outline: none;
    border-color: var(--primary-color) !important;
    box-shadow: 0 0 0 4px rgba(41, 81, 146, 0.15) !important;
    background: white !important;
}

button[type="submit"] {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

button[type="submit"]:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(41, 81, 146, 0.3) !important;
}

button[type="submit"]:active {
    transform: translateY(0) !important;
}

@media (max-width: 768px) {
    .con-page-header {
        padding: 60px 0;
    }

    .con-page-header h1 {
        font-size: 2.2rem;
    }

    .con-section {
        padding: 60px var(--container-padding);
    }

    .section-title {
        margin-bottom: 50px;
    }

    .section-title h2 {
        font-size: 2.8rem;
        margin-bottom: 15px;
    }

    .section-title p {
        font-size: 0.95rem;
    }

    [style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }

    [style*="height: 350px"] {
        height: auto !important;
    }

    /* Card headings h4 - Phone, Email, WhatsApp, Our Location */
    [style*="font-size: 1.5rem"][style*="color: var(--primary-color)"] {
        font-size: 1.25rem !important;
    }

    [style*="font-size: 1.4rem"][style*="color: var(--primary-color)"] {
        font-size: 1.2rem !important;
    }

    /* Card text paragraphs */
    [style*="font-size: 1.15rem"][style*="font-weight: 600"] {
        font-size: 1rem !important;
    }

    [style*="font-size: 1.1rem"][style*="font-weight: 600"] {
        font-size: 1rem !important;
    }

    /* Icon sizes in cards */
    [style*="font-size: 3rem"][style*="color: var(--primary-color)"] {
        font-size: 2rem !important;
    }

    [style*="font-size: 2.5rem"] {
        font-size: 2rem !important;
    }

    /* Icon circles */
    [style*="width: 100px; height: 100px"] {
        width: 80px !important;
        height: 80px !important;
    }

    [style*="width: 90px; height: 90px"] {
        width: 70px !important;
        height: 70px !important;
    }

    /* Card padding */
    [style*="padding: 50px"] {
        padding: 35px !important;
    }

    /* Form styling */
    [style*="padding: 40px"][style*="border-radius: 16px"][style*="background: white"] {
        padding: 30px !important;
    }

    /* Form label text */
    [style*="font-size: 0.95rem"][style*="font-weight: 700"] {
        font-size: 0.9rem !important;
    }

    /* Form input padding */
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select,
    textarea {
        padding: 12px 14px !important;
    }
}

@media (max-width: 480px) {
    .con-page-header {
        padding: 40px 0;
    }

    .con-page-header h1 {
        font-size: 1.8rem;
    }

    .con-section {
        padding: 60px var(--container-padding);
    }

    .section-title {
        margin-bottom: 35px;
    }

    .section-title h2 {
        font-size: 1.8rem;
        margin-bottom: 12px;
    }

    .section-title p {
        font-size: 0.9rem;
    }

    /* Card headings - Mobile */
    [style*="font-size: 1.5rem"][style*="color: var(--primary-color)"] {
        font-size: 1rem !important;
    }

    [style*="font-size: 1.4rem"][style*="color: var(--primary-color)"] {
        font-size: 1rem !important;
    }

    [style*="font-size: 1.25rem"][style*="color: var(--primary-color)"] {
        font-size: 1rem !important;
    }

    [style*="font-size: 1.2rem"][style*="color: var(--primary-color)"] {
        font-size: 1rem !important;
    }

    /* Card text paragraphs - Mobile */
    [style*="font-size: 1.15rem"][style*="font-weight: 600"] {
        font-size: 0.95rem !important;
    }

    [style*="font-size: 1.1rem"][style*="font-weight: 600"] {
        font-size: 0.95rem !important;
    }

    [style*="font-size: 1rem"][style*="font-weight: 600"] {
        font-size: 0.95rem !important;
    }

    /* Icon sizes - Mobile */
    [style*="font-size: 3rem"][style*="color: var(--primary-color)"] {
        font-size: 1.5rem !important;
    }

    [style*="font-size: 2.5rem"] {
        font-size: 1.5rem !important;
    }

    [style*="font-size: 2rem"] {
        font-size: 1.5rem !important;
    }

    /* Icon circles - Mobile */
    [style*="width: 100px; height: 100px"] {
        width: 60px !important;
        height: 60px !important;
    }

    [style*="width: 80px; height: 80px"] {
        width: 60px !important;
        height: 60px !important;
    }

    [style*="width: 90px; height: 90px"] {
        width: 60px !important;
        height: 60px !important;
    }

    [style*="width: 70px; height: 70px"] {
        width: 60px !important;
        height: 60px !important;
    }

    /* Card padding - Mobile */
    [style*="padding: 50px"] {
        padding: 20px !important;
    }

    [style*="padding: 35px"] {
        padding: 20px !important;
    }

    /* Gaps */
    [style*="gap: 60px"] {
        gap: 25px !important;
    }

    [style*="gap: 40px"] {
        gap: 25px !important;
    }

    [style*="gap: 30px"] {
        gap: 20px !important;
    }

    [style*="gap: 20px"] {
        gap: 15px !important;
    }

    /* Form styling - Mobile */
    [style*="padding: 40px"][style*="border-radius: 16px"][style*="background: white"] {
        padding: 20px !important;
    }

    [style*="padding: 30px"][style*="border-radius: 16px"][style*="background: white"] {
        padding: 20px !important;
    }

    /* Form label text - Mobile */
    [style*="font-size: 0.95rem"][style*="font-weight: 700"] {
        font-size: 0.85rem !important;
    }

    [style*="font-size: 0.9rem"][style*="font-weight: 700"] {
        font-size: 0.85rem !important;
    }

    /* Form input padding */
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select,
    textarea {
        padding: 12px 12px !important;
        font-size: 0.95rem !important;
    }

    button[type="submit"] {
        padding: 14px 24px !important;
        font-size: 0.95rem !important;
    }

    /* Margins for card gaps */
    [style*="margin-bottom: 16px"] {
        margin-bottom: 12px !important;
    }

    [style*="margin-bottom: 40px"] {
        margin-bottom: 25px !important;
    }
}
</style>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/bootstrap.bundle.min.js"></script>
<script src="assets/js/form-validation.js"></script>
<script src="assets/js/slider.js"></script>

<script>
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const headerNav = document.getElementById('headerNav');
    
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            headerNav.classList.toggle('active');
        });
    }

    // Contact Form AJAX Submission
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            const messageDiv = document.getElementById('contactFormMessage');
            
            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            messageDiv.style.display = 'none';
            
            // Map contact form fields to enquiry form fields
            document.getElementById('parentName').value = document.getElementById('contactName').value;
            document.getElementById('mobileNumber').value = document.getElementById('contactPhone').value;
            document.getElementById('userMessage').value = document.getElementById('contactMessage').value;
            
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
                            // Show success message
                            messageDiv.style.display = 'block';
                            messageDiv.style.backgroundColor = '#d4edda';
                            messageDiv.style.color = '#155724';
                            messageDiv.style.border = '1px solid #c3e6cb';
                            messageDiv.innerHTML = '<i class="fas fa-check-circle"></i> ' + response.success + '<br><small>Reference: ' + response.enquiry_id + '</small>';
                            
                            // Reset form
                            form.reset();
                            
                            // Clear message after 5 seconds
                            setTimeout(() => {
                                messageDiv.style.display = 'none';
                            }, 5000);
                            
                            // Reset button
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnText;
                        } else {
                            // Show error message
                            messageDiv.style.display = 'block';
                            messageDiv.style.backgroundColor = '#f8d7da';
                            messageDiv.style.color = '#721c24';
                            messageDiv.style.border = '1px solid #f5c6cb';
                            messageDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> ' + (response.error || 'An error occurred');
                            
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnText;
                        }
                    } catch (e) {
                        messageDiv.style.display = 'block';
                        messageDiv.style.backgroundColor = '#f8d7da';
                        messageDiv.style.color = '#721c24';
                        messageDiv.style.border = '1px solid #f5c6cb';
                        messageDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> Error processing response';
                        
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    }
                } else {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        messageDiv.style.display = 'block';
                        messageDiv.style.backgroundColor = '#f8d7da';
                        messageDiv.style.color = '#721c24';
                        messageDiv.style.border = '1px solid #f5c6cb';
                        messageDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> ' + (response.error || 'Error submitting form');
                    } catch (e) {
                        messageDiv.style.display = 'block';
                        messageDiv.style.backgroundColor = '#f8d7da';
                        messageDiv.style.color = '#721c24';
                        messageDiv.style.border = '1px solid #f5c6cb';
                        messageDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> Error submitting form. Please try again.';
                    }
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            };
            
            xhr.onerror = function() {
                messageDiv.style.display = 'block';
                messageDiv.style.backgroundColor = '#f8d7da';
                messageDiv.style.color = '#721c24';
                messageDiv.style.border = '1px solid #f5c6cb';
                messageDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> Network error. Please check your connection and try again.';
                
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            };
            
            xhr.send(formData);
        });
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

<!-- Popup Enquiry Form Modal -->
<?php include 'includes/popup-enquiry-form.php'; ?>
<!-- Sticky Floating Elements -->
<?php include 'includes/sticky-elements.php'; ?>
</body>
</html>
