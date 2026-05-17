<?php
include 'includes/random-image-helper.php';
$page_title = "Advisory Council - Shantiniketan Vidyalaya";
$page_description = "Meet the eminent members of our Advisory Council - leading educationists, administrators and personalities from diverse fields";
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
<section class="ac-page-header">
    <div class="container">
        <nav class="ac-breadcrumbs">
            <a href="index.php">Home</a>
            <span>/</span>
            <a href="the-school.php">About</a>
            <span>/</span>
            <span>Advisory Council</span>
        </nav>
        <h1>Advisory Council</h1>
    </div>
</section>

<!-- Introduction Section -->
<section class="ac-section ac-section-intro">
    <div class="container">
        <div style="max-width: 900px; margin: 0 auto; text-align: center;">
            <p style="font-size: 1.1rem; color: var(--text-primary); line-height: 1.9; margin-bottom: 0; font-weight: 500;">
                Shantiniketan Vidyalaya's Advisory Council comprises leading educationists, administrators, and eminent personalities from diverse walks of life. The council constantly monitors emerging patterns in educational systems both in India and abroad, providing strategic direction, guidance, and expertise to foster institutional excellence and educational innovation.
            </p>
        </div>
    </div>
</section>

<!-- Advisory Council Members -->
<section class="ac-section ac-section-members">
    <div class="container">
        <div class="members-grid">
            <!-- Member 1 -->
            <div class="member-card">
                <h3>Prof. T. Navneeth Rao</h3>
                <p class="member-position">Former Vice-Chancellor, Osmania University</p>
            </div>

            <!-- Member 2 -->
            <div class="member-card">
                <h3>Anil Kumar Kutty</h3>
                <p class="member-position">IAS, New Delhi</p>
            </div>

            <!-- Member 3 -->
            <div class="member-card">
                <h3>Dr. Chukka Ramaiah</h3>
                <p class="member-position">M.L.C. Eminent Educationist, Hyderabad</p>
            </div>

            <!-- Member 4 -->
            <div class="member-card">
                <h3>M. Mahendar Reddy</h3>
                <p class="member-position">IPS, Hyderabad</p>
            </div>

            <!-- Member 5 -->
            <div class="member-card">
                <h3>Prof. Kakarla Subba Rao</h3>
                <p class="member-position">Former Director, NIMS, Hyderabad</p>
            </div>

            <!-- Member 6 -->
            <div class="member-card">
                <h3>K. Srinivas Reddy</h3>
                <p class="member-position">IPS, Hyderabad</p>
            </div>

            <!-- Member 7 -->
            <div class="member-card">
                <h3>Ch. Rajeshwar Rao</h3>
                <p class="member-position">Senior Journalist & Former Information Adviser to Chief Minister</p>
            </div>

            <!-- Member 8 -->
            <div class="member-card">
                <h3>N. Ashok Reddy</h3>
                <p class="member-position">Joint Commissioner, Commercial Taxes, Govt. of A.P</p>
            </div>

            <!-- Member 9 -->
            <div class="member-card">
                <h3>R.K. Maini</h3>
                <p class="member-position">Former Principal, Hyderabad Public School</p>
            </div>

            <!-- Member 10 -->
            <div class="member-card">
                <h3>Dr. V. Kondal Rao</h3>
                <p class="member-position">Former Director, Telugu Academy, Hyderabad</p>
            </div>

            <!-- Member 11 -->
            <div class="member-card">
                <h3>Dr. T. Jeevan Rao</h3>
                <p class="member-position">M.S., General Surgeon, Nizamabad</p>
            </div>

            <!-- Member 12 -->
            <div class="member-card">
                <h3>Dr. Pavuluri Krishna Chowdary</h3>
                <p class="member-position">Homeopathy Specialist, Hyderabad</p>
            </div>

            <!-- Member 13 -->
            <div class="member-card">
                <h3>R Damodar Rao</h3>
                <p class="member-position">Lecturer, Govt. Degree College, Kama Reddy</p>
            </div>

            <!-- Member 14 -->
            <div class="member-card">
                <h3>Mrs. Aruna Gupta</h3>
                <p class="member-position">Principal, City Montessory School, Lucknow</p>
            </div>

            <!-- Member 15 -->
            <div class="member-card">
                <h3>Dr. (Mrs.) G.D. Bakshi</h3>
                <p class="member-position">Former Chairperson, Indian Public School Conference & Principal, MGD School Jaipur</p>
            </div>

            <!-- Member 16 -->
            <div class="member-card">
                <h3>A. Chandra Shekar Reddy</h3>
                <p class="member-position">Press Secretary, Chief Minister's Office, Hyderabad</p>
            </div>

            <!-- Member 17 -->
            <div class="member-card">
                <h3>S. Kandhari</h3>
                <p class="member-position">Principal, Wellham Boys School, Dehradun</p>
            </div>

            <!-- Member 18 -->
            <div class="member-card">
                <h3>P. Vijaya Kumar</h3>
                <p class="member-position">IRAS, Director, Centralised Training Academy for Railway Accounts</p>
            </div>
        </div>
    </div>
</section>

<style>
.ac-page-header {
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

.ac-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    color: white;
    position: relative;
    z-index: 1;
}

.ac-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 24px;
    font-size: 0.95rem;
    color: rgba(255,255,255,0.85);
}

.ac-breadcrumbs a {
    color: rgba(255,255,255,0.85);
    text-decoration: none;
}

.ac-breadcrumbs a:hover {
    color: white;
}

.ac-breadcrumbs span {
    opacity: 0.6;
}

.ac-section {
    padding: 80px 0;
}

.ac-section-intro {
    background-color: white;
    border-bottom: 1px solid var(--border-color);
}

.ac-section-members {
    background: linear-gradient(135deg, var(--background-light) 0%, var(--background-lighter) 100%);
}

.members-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
}

.member-card {
    background: white;
    padding: 40px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease-in-out;
}

.member-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12);
}

.member-card h3 {
    font-size: 1.15rem;
    color: var(--text-primary);
    font-weight: 800;
    margin-bottom: 12px;
    line-height: 1.4;
}

.member-position {
    font-size: 0.95rem;
    color: var(--text-secondary);
    line-height: 1.6;
    font-weight: 500;
    margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .ac-page-header {
        padding: 60px 0;
    }

    .ac-page-header h1 {
        font-size: 2.5rem;
    }

    .ac-section {
        padding: 60px 0;
    }

    .members-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .member-card {
        padding: 30px 20px;
    }
}

@media (max-width: 480px) {
    .ac-page-header {
        padding: 50px 0;
    }

    .ac-page-header h1 {
        font-size: 1.8rem;
    }

    .ac-section-intro p {
        font-size: 1rem;
    }

    .members-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }

    .member-card {
        padding: 25px;
    }

    .member-card h3 {
        font-size: 1rem;
    }

    .member-position {
        font-size: 0.9rem;
    }

    .member-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
        margin-bottom: 15px;
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
