<?php
include 'includes/random-image-helper.php';
$page_title = "Videos & Virtual Tour - Shantiniketan Vidyalaya";
$page_description = "Explore Shantiniketan Vidyalaya through our videos and 360-degree virtual tour. Experience campus life and facilities.";
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
    <link rel="stylesheet" href="assets/css/variables.css?v=44.0">
    <link rel="stylesheet" href="assets/css/style.css?v=44.0">
    <link rel="stylesheet" href="assets/css/responsive.css?v=44.0">
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
<section class="vid-page-header">
    <div class="container">
        <nav class="vid-breadcrumbs">
            <a href="index">Home</a>
            <span>/</span>
            <span>Videos</span>
        </nav>
        <h1>Videos & Virtual Tour</h1>
    </div>
</section>

<!-- Introduction Section -->
<section class="vid-section vid-section-intro">
    <div class="container">
        <div style="max-width: 900px; margin: 0 auto; text-align: center;">
            <h2 style="font-size: 2.8rem; font-weight: 900; color: var(--primary-color); margin-bottom: 20px; line-height: 1.2;">
                Explore Campus <span style="color: var(--accent-color);">Life</span>
            </h2>
            <p style="font-size: 1.15rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 0; font-weight: 400;">
                Take a virtual journey through Shantiniketan Vidyalaya. Watch our inspiring videos and explore the campus through our 360-degree virtual tours.
            </p>
        </div>
    </div>
</section>

<!-- Videos Section -->
<section class="vid-section">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 70px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900;">
            Our <span style="color: var(--accent-color);">Videos</span>
        </h2>

        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; max-width: 1200px; margin: 0 auto;">
            <!-- NEW Video 1 -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/9UbZIxbFdyo" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- NEW Video 2 -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/lT22FN5z7LI" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- NEW Video 3 -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/LJ32C2YiEuQ" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- NEW Video 4 -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/x3zWue_lWg4" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- NEW Video 5 -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/kkAelJJdw-Y" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- NEW Video 6 -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/qIC1pZgowBg" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- NEW Video 7 -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7E575d0Hs1o" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- Video 1 (Existing) -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/nbJ0EfEdQGw" title="With Voice - Shantiniketan Vidyalaya" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- Video 2 (Existing) -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/mbxdmJ9jgg4" title="Inspiration Infinity - Shantiniketan Vidyalaya" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- Video 3 (Existing) -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ubSETToWIoo" title="Shantiniketan Vidyalaya" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>

            <!-- Video 4 (Existing) -->
            <div style="aspect-ratio: 16/9; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.15);">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/lKtpZUZWX00" title="Back to School - Shantiniketan Vidyalaya" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: none;"></iframe>
            </div>
        </div>
    </div>
</section>

<style>
.vid-page-header {
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

.vid-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    color: white;
    position: relative;
    z-index: 1;
}

.vid-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 30px;
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.9);
}

.vid-breadcrumbs a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: all 0.3s ease;
}

.vid-breadcrumbs a:hover {
    color: white;
    font-weight: 600;
}

.vid-section {
    padding: 100px 0;
}

.vid-section-intro {
    background: white;
    padding: 80px 0;
}

@media (max-width: 768px) {
    .vid-page-header {
        padding: 60px 0;
    }

    .vid-page-header h1 {
        font-size: 2.2rem;
    }

    .vid-section {
        padding: 60px 0;
    }

    [style*="grid-template-columns: repeat(2, 1fr)"] {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
    }
}

@media (max-width: 480px) {
    .vid-page-header h1 {
        font-size: 1.8rem;
    }

    .vid-section {
        padding: 40px 0;
    }

    [style*="font-size: 2.8rem"] {
        font-size: 1.8rem !important;
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
