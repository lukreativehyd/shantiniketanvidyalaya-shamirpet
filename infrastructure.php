<?php
include 'includes/random-image-helper.php';
$page_title = "Infrastructure - Shantiniketan Vidyalaya";
$page_description = "Explore our state-of-the-art infrastructure including classrooms, laboratories, hostels, sports facilities, and 25 acres of campus";
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
<section class="infra-page-header">
    <div class="container">
        <nav class="infra-breadcrumbs">
            <a href="index">Home</a>
            <span>›</span>
            <a href="index#features">Campus</a>
            <span>/</span>
            <span>Infrastructure</span>
        </nav>
        <h1>Our Infrastructure</h1>
    </div>
</section>

<!-- Introduction Section -->
<section class="infra-section infra-section-intro">
    <div class="container">
        <div style="max-width: 900px; margin: 0 auto;">
            <p style="font-size: 1.1rem; color: var(--text-primary); line-height: 1.9; margin-bottom: 0; font-weight: 500; text-align: center;">
                Shantiniketan Vidyalaya is built on 25 acres of verdant land, providing students with a serene learning environment. Our world-class infrastructure combines modern educational facilities with residential amenities, ensuring a holistic development of every student.
            </p>
        </div>
    </div>
</section>

<!-- Facilities Section -->
<section class="infra-section infra-section-facilities">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 60px; font-size: 2.5rem; color: var(--primary-color); font-weight: 800;">
            World-Class <span style="color: var(--accent-color);">Facilities</span>
        </h2>

        <div class="facilities-grid">
            <!-- Facility 1 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Class%20rooms/UKP01816.jpg" alt="Classrooms" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Classrooms</h3>
                <p>25 spacious and well-designed classrooms equipped with modern teaching aids and natural lighting</p>
            </div>

            <!-- Facility 2 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Computer%20lab/UKP02155.jpg" alt="Smart Classrooms" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Smart Classrooms</h3>
                <p>Interactive smart classrooms with audio-visual systems for immersive and engaging learning experiences</p>
            </div>

            <!-- Facility 3 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Lab%20and%20lab%20classes/UKP02078.jpg" alt="Laboratories" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Laboratories</h3>
                <p>Well-equipped Science, Mathematics, and Computer labs with modern apparatus and safety standards</p>
            </div>

            <!-- Facility 4 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Library/UKP02232.jpg" alt="Library" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Library</h3>
                <p>Spacious library with rich collections of books, encyclopedias, magazines, and digital resources</p>
            </div>

            <!-- Facility 5 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/School/UKP01832.jpg" alt="Residential Hostels" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Residential Hostels</h3>
                <p>3-storied boys and girls hostels providing safe, comfortable, and supportive living spaces</p>
            </div>

            <!-- Facility 6 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Swimming%20pool/UKP02846.jpg" alt="Sports Facilities" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Sports Facilities</h3>
                <p>Open playgrounds, skating rink, swimming pool, and play courts for comprehensive physical development</p>
            </div>

            <!-- Facility 7 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Dining%20hall/UKP01764.jpg" alt="Dining Hall" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Dining Hall</h3>
                <p>Spacious dining hall with capacity for 350 students, serving nutritious and hygienic meals</p>
            </div>

            <!-- Facility 8 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Art%20%26%20Craft/UKP02225.jpg" alt="Art & Craft Studio" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Art & Craft Studio</h3>
                <p>Dedicated space for creative expression and development of artistic talents</p>
            </div>

            <!-- Facility 9 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Dance%20room%20and%20classes/UKP02113.jpg" alt="Indoor Activity Hall" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Indoor Activity Hall</h3>
                <p>Multi-purpose indoor hall for various activities, events, and competitions</p>
            </div>

            <!-- Facility 10 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/School/UKP01880.jpg" alt="Open Air Theatre" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Open Air Theatre</h3>
                <p>Outdoor amphitheater for cultural events, performances, and assemblies</p>
            </div>

            <!-- Facility 11 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Shooting%20and%20NCC/UKP02566.jpg" alt="NCC Center" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>NCC Center</h3>
                <p>National Cadet Corps facility for developing discipline and leadership qualities</p>
            </div>

            <!-- Facility 12 -->
            <div class="facility-item">
                <div class="facility-image">
                    <img src="assets/images/Website/Staff/UKP02974.jpg" alt="Support Services" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3>Support Services</h3>
                <p>Staff quarters, principal residence, mineral water plant, and comprehensive support infrastructure</p>
            </div>
        </div>
    </div>
</section>

<style>
.infra-page-header {
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

.infra-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    color: white;
    position: relative;
    z-index: 1;
}

.infra-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 24px;
    font-size: 0.95rem;
    color: rgba(255,255,255,0.85);
}

.infra-breadcrumbs a {
    color: rgba(255,255,255,0.85);
    text-decoration: none;
}

.infra-breadcrumbs a:hover {
    color: white;
}

.infra-breadcrumbs span {
    opacity: 0.6;
}

.infra-section {
    padding: 80px 0;
}

.infra-section-intro {
    background-color: white;
    border-bottom: 1px solid var(--border-color);
}

.infra-section-facilities {
    background: linear-gradient(135deg, var(--background-light) 0%, var(--background-lighter) 100%);
}

.facilities-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 35px;
}

.facility-item {
    background: white;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease-in-out;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.facility-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12);
}

.facility-image {
    width: 100%;
    height: 180px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
}

.facility-item:hover .facility-image {
    transform: scale(1.05);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
}

.facility-item h3 {
    font-size: 1.25rem;
    color: var(--primary-color);
    font-weight: 800;
    margin-bottom: 12px;
    line-height: 1.3;
    padding: 24px 40px 0 40px;
}

.facility-item p {
    font-size: 0.95rem;
    color: var(--text-secondary);
    line-height: 1.7;
    margin: 0;
    font-weight: 500;
    padding: 0 40px 40px 40px;
    flex-grow: 1;
}

/* Responsive */
@media (max-width: 768px) {
    .infra-page-header {
        padding: 60px 0;
    }

    .infra-page-header h1 {
        font-size: 2.5rem;
    }

    .infra-section {
        padding: 60px 0;
    }

    .facilities-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }

    .facility-image {
        height: 150px;
    }
}

@media (max-width: 480px) {
    .infra-page-header {
        padding: 50px 0;
    }

    .infra-page-header h1 {
        font-size: 1.8rem;
    }

    .infra-section-intro p {
        font-size: 1rem;
    }

    .facilities-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .facility-item h3 {
        font-size: 1.1rem;
        padding: 20px 25px 0 25px;
    }

    .facility-item p {
        padding: 0 25px 25px 25px;
    }

    .facility-image {
        height: 130px;
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
