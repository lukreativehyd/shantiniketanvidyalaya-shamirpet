<?php
include 'includes/random-image-helper.php';
$page_title = "Principal - Shantiniketan Vidyalaya";
$page_description = "Meet the Principal of Shantiniketan Vidyalaya and read the message from the Head of School";
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
<section class="principal-page-header">
    <div class="container">
        <nav class="principal-breadcrumbs">
            <a href="index.php">Home</a>
            <span>/</span>
            <a href="the-school.php">About</a>
            <span>/</span>
            <span>Principal</span>
        </nav>
        <h1>Meet Our Principal</h1>
    </div>
</section>

<!-- Principal Message Section -->
<section class="principal-section principal-section-message">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <!-- Principal Image & Details -->
            <div style="text-align: center;">
                <div class="principal-image-wrapper">
                    <img src="assets/images/Principal.jpeg" alt="Principal" class="principal-image">
                </div>
                <h3 style="font-size: 1.8rem; color: var(--primary-color); margin: 28px 0 12px; font-weight: 800; letter-spacing: -0.5px;">Dr.DEEPAK GUNJAL</h3>
                <p style="color: var(--accent-color); font-size: 1.2rem; font-weight: 700; margin-bottom: 16px; letter-spacing: 0.5px;">Head of School</p>
                <p style="color: var(--text-primary); font-size: 1rem; line-height: 1.7; margin-bottom: 12px; font-weight: 500;">M.A, B.Ed</p>
                <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.7; font-weight: 500;">
                    <i class="fas fa-briefcase" style="color: var(--accent-color); margin-right: 10px;"></i>
                    14+ years of Educational Leadership
                </p>
            </div>

            <!-- Message Content -->
            <div>
                <p style="font-size: 1.15rem; color: var(--primary-color); line-height: 1.8; margin-bottom: 28px; font-weight: 700; letter-spacing: 0.3px;">
                    Dear Learning Community,
                </p>
                
                <p style="font-size: 1.05rem; color: var(--text-primary); line-height: 1.85; margin-bottom: 24px; font-weight: 500;">
                    Welcome to Shantiniketan Vidyalaya! We are thrilled to have you as part of our vibrant and diverse community. At Shantiniketan, every stakeholder is a learner that strives to learn, unlearn & relearn, making us a learning community that demonstrates a growth mindset.
                </p>

                <p style="font-size: 1.05rem; color: var(--text-primary); line-height: 1.85; margin-bottom: 24px; font-weight: 500;">
                    We are dedicated to nurturing and developing global citizens who are not only academically excellent but also socially responsible and environmentally conscious. Our mission is to provide a holistic education that fosters critical thinking, creativity, and a genuine love for learning.
                </p>

                <p style="font-size: 1.05rem; color: var(--text-primary); line-height: 1.85; margin-bottom: 24px; font-weight: 500;">
                    We believe in creating a supportive and inclusive environment where every student can thrive and achieve their full potential. Through innovative teaching practices, enriching extracurricular activities, and a strong emphasis on values, we aim to prepare our students for the challenges and opportunities of the 21st century.
                </p>

                <p style="font-size: 1.05rem; color: var(--text-primary); line-height: 1.85; font-weight: 500;">
                    We are committed to shaping creative and compassionate minds who understand diverse cultures, work towards sustainable living, and take responsibility for creating a better world. By instilling these values, we empower our students to make a positive impact both locally and globally.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Principal's Highlight Quote -->
<section class="principal-section principal-section-quote">
    <div class="container">
        <div class="quote-highlight">
            <i class="fas fa-quote-left quote-icon"></i>
            <p class="quote-text">
                Education is the most powerful tool we can use to change the world. It is not just about acquiring knowledge, but nurturing compassionate, creative, and critical minds who can envision a better tomorrow.
            </p>
            <div class="quote-attribution">
                <p style="font-weight: 700; color: var(--primary-color); margin-bottom: 0;">— Dr.DEEPAK GUNJAL</p>
                <p style="color: var(--accent-color); font-size: 0.9rem;">Head of School, Shantiniketan Vidyalaya</p>
            </div>
        </div>
    </div>
</section>

<style>
.principal-page-header {
    background: linear-gradient(rgba(29, 53, 116, 0.85), rgba(41, 81, 146, 0.85)), url('<?php echo $randomImage; ?>') center/cover no-repeat;
    min-height: 140px;
    display: flex;
    align-items: center;
    padding: 120px 0;
    color: white;
    text-align: center;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    position: relative;
}

.principal-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    color: white;
    position: relative;
    z-index: 1;
}

.principal-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 24px;
    font-size: 0.95rem;
    color: rgba(255,255,255,0.85);
}

.principal-breadcrumbs a {
    color: rgba(255,255,255,0.85);
    text-decoration: none;
}

.principal-breadcrumbs a:hover {
    color: white;
}

.principal-breadcrumbs span {
    opacity: 0.6;
}

.principal-section {
    padding: 80px 0;
}

.principal-section-message {
    background-color: white;
}

.principal-section-quote {
    background: linear-gradient(135deg, var(--background-light) 0%, var(--background-lighter) 100%);
}

.principal-image-wrapper {
    position: relative;
    display: inline-block;
    margin-bottom: 20px;
}

.principal-image {
    width: 300px;
    height: 350px;
    object-fit: cover;
    border-radius: 16px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    border: 4px solid white;
}

.quote-highlight {
    background: white;
    padding: 60px 50px;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
}

.quote-icon {
    font-size: 3.5rem;
    color: var(--accent-color);
    opacity: 0.3;
    margin-bottom: 20px;
    display: block;
}

.quote-text {
    font-size: 1.25rem;
    color: var(--text-primary);
    line-height: 1.85;
    font-weight: 600;
    margin-bottom: 32px;
    font-style: italic;
    letter-spacing: 0px;
}

.quote-attribution {
    border-top: 1px solid var(--border-color);
    padding-top: 20px;
}

.quote-attribution p:first-child {
    font-size: 1rem;
    letter-spacing: 0px;
}

.quote-attribution p:last-child {
    font-size: 0.9rem;
    margin-top: 4px;
}

/* Responsive */
@media (max-width: 768px) {
    .principal-page-header {
        padding: 60px 0;
    }

    .principal-page-header h1 {
        font-size: 2.5rem;
    }

    .principal-section {
        padding: 60px 0;
    }

    [style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }

    .principal-image {
        width: 250px;
        height: 300px;
    }

    .quote-highlight {
        padding: 40px 30px;
    }

    .quote-text {
        font-size: 1.1rem;
    }
}

@media (max-width: 480px) {
    .principal-page-header {
        padding: 50px 0;
    }

    .principal-page-header h1 {
        font-size: 1.8rem;
    }

    .principal-image {
        width: 200px;
        height: 250px;
    }

    .quote-highlight {
        padding: 30px 20px;
    }

    .quote-text {
        font-size: 1rem;
    }

    .quote-icon {
        font-size: 3rem;
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
