<?php
include 'includes/random-image-helper.php';
$page_title = "Activities - Shantiniketan Vidyalaya";
$page_description = "Explore our comprehensive co-curricular and extracurricular activities including sports, arts, competitions, and educational tours";
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
<section class="act-page-header">
    <div class="container">
        <nav class="act-breadcrumbs">
            <a href="index" class="breadcrumb-link">Home</a>
            <span>/</span>
            <span>Activities</span>
        </nav>
        <h1>CO-Curricular Activities</h1>
    </div>
</section>

<!-- Introduction Section -->
<section class="act-section act-section-intro">
    <div class="container">
        <div style="max-width: 900px; margin: 0 auto; text-align: center;">
            <h2 style="font-size: 3rem; font-weight: 900; color: var(--primary-color); margin-bottom: 20px; line-height: 1.2;">
                Beyond the <span style="color: var(--accent-color);">Classroom</span>
            </h2>
            <p style="font-size: 1.25rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 0; font-weight: 400;">
                We believe in developing well-rounded individuals through diverse activities that nurture creativity, leadership, and teamwork.
            </p>
        </div>
    </div>
</section>

<!-- Sports & Games Section -->
<section class="act-section">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 70px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900;">
            Sports & <span style="color: var(--accent-color);">Games</span>
        </h2>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <div style="height: 450px; overflow: hidden; border-radius: 20px;">
                <img src="assets/images/Website/Sports/Skating/UKP03280.jpg" alt="Sports" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div>
                <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.9; margin-bottom: 32px;">Our students engage in a diverse range of sports and games both during and after academic hours. We have excellent infrastructure for indoor and outdoor activities.</p>
                
                <div style="background: #f8f9fa; padding: 40px; border-radius: 16px; margin-bottom: 32px;">
                    <h4 style="font-size: 1.4rem; color: var(--text-primary); font-weight: 800; margin-bottom: 24px;">Available Sports & Games:</h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; gap-y: 20px;">
                        <div>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-water" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Swimming
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-person-running" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Skating
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-basketball" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Basketball
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-volleyball" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Volleyball
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-futbol" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Football
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-fire" style="color: var(--primary-color); margin-right: 10px; width: 20px;"></i>
                                    Cricket
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-table-tennis" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Table-Tennis
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2;">
                                    <i class="fas fa-dice" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Carrom
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-chess" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Chess
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-person-hiking" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Kabaddi
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-person-running" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Kho-Kho
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-feather" style="color: var(--primary-color); margin-right: 10px; width: 20px;"></i>
                                    Badminton
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-volleyball" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Throwball
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-table-tennis" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Pickleball
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                                    <i class="fas fa-bullseye" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Shooting
                                </li>
                                <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2;">
                                    <i class="fas fa-child" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                                    Small Kids Play Area
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Co-Curricular Activities Section -->
<section class="act-section">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 70px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900;">
            Creative <span style="color: var(--accent-color);">Activities</span>
        </h2>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <div style="order: 2;">
                <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.9; margin-bottom: 32px;">Every Sunday, students explore their creative talents through a wide variety of activities. This is when we celebrate the artistic and innovative spirit within our community.</p>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                    <div style="background: white; border: 1px solid #e8e9eb; padding: 30px; border-radius: 12px;">
                        <h4 style="font-size: 1.2rem; color: var(--text-primary); font-weight: 700; margin-bottom: 18px;">Performing Arts</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 8px;">
                                <i class="fas fa-music" style="color: var(--accent-color); margin-right: 8px;\"></i>Music
                            </li>
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 8px;">
                                <i class="fas fa-music" style="color: var(--accent-color); margin-right: 8px;\"></i>Dance
                            </li>
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                                <i class="fas fa-masks-theater" style="color: var(--accent-color); margin-right: 8px;\"></i>Dramatics
                            </li>
                        </ul>
                    </div>
                    <div style="background: white; border: 1px solid #e8e9eb; padding: 30px; border-radius: 12px;">
                        <h4 style="font-size: 1.2rem; color: var(--text-primary); font-weight: 700; margin-bottom: 18px;">Visual Arts</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 8px;">
                                <i class="fas fa-palette" style="color: var(--accent-color); margin-right: 8px;\"></i>Painting
                            </li>
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 8px;">
                                <i class="fas fa-palette" style="color: var(--accent-color); margin-right: 8px;\"></i>Rangoli
                            </li>
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                                <i class="fas fa-palette" style="color: var(--accent-color); margin-right: 8px;\"></i>Flower Arrangement
                            </li>
                        </ul>
                    </div>
                    <div style="background: white; border: 1px solid #e8e9eb; padding: 30px; border-radius: 12px;">
                        <h4 style="font-size: 1.2rem; color: var(--text-primary); font-weight: 700; margin-bottom: 18px;">Wellness</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 8px;">
                                <i class="fas fa-spa" style="color: var(--accent-color); margin-right: 8px;\"></i>Yoga
                            </li>
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                                <i class="fas fa-hand-fist" style="color: var(--accent-color); margin-right: 8px;\"></i>Karate
                            </li>
                        </ul>
                    </div>
                    <div style="background: white; border: 1px solid #e8e9eb; padding: 30px; border-radius: 12px;">
                        <h4 style="font-size: 1.2rem; color: var(--text-primary); font-weight: 700; margin-bottom: 18px;">Spoken Word</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 8px;">
                                <i class="fas fa-microphone" style="color: var(--accent-color); margin-right: 8px;\"></i>Debates
                            </li>
                            <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                                <i class="fas fa-microphone" style="color: var(--accent-color); margin-right: 8px;\"></i>Elocution
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="order: 1; height: 450px; overflow: hidden; border-radius: 20px;">
                <img src="assets/images/Website/Art%20%26%20Craft/UKP02300.jpg" alt="Creative Activities" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Inter-School Competitions Section -->
<section class="act-section" style="background: #f8f9fa;">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 70px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900;">
            Inter-School <span style="color: var(--accent-color);">Competitions</span>
        </h2>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
            <div style="background: white; padding: 40px; border-radius: 16px; border: 1px solid #e8e9eb;">
                <h3 style="font-size: 1.5rem; color: var(--text-primary); font-weight: 800; margin-bottom: 20px;">Academic Excellence</h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 20px;">Our students excel in academic competitions showcasing their scholarly prowess.</p>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 10px;">
                        <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 10px;\"></i>Essay Writing
                    </li>
                    <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 10px;">
                        <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 10px;\"></i>Quiz Competitions
                    </li>
                    <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                        <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 10px;\"></i>Recitation
                    </li>
                </ul>
            </div>

            <div style="background: white; padding: 40px; border-radius: 16px; border: 1px solid #e8e9eb;">
                <h3 style="font-size: 1.5rem; color: var(--text-primary); font-weight: 800; margin-bottom: 20px;">Creative Pursuits</h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 20px;">Our creative students have won numerous accolades in artistic competitions.</p>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 10px;">
                        <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px;\"></i>Group Dance
                    </li>
                    <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 10px;">
                        <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px;\"></i>Yoga
                    </li>
                    <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                        <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px;\"></i>Singing & Music
                    </li>
                </ul>
            </div>

            <div style="background: white; padding: 40px; border-radius: 16px; border: 1px solid #e8e9eb;">
                <h3 style="font-size: 1.5rem; color: var(--text-primary); font-weight: 800; margin-bottom: 20px;">Sports Achievements</h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 20px;">Our athletes consistently perform well in inter-school sporting events.</p>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 10px;">
                        <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 10px;\"></i>Athletics & Cross Country
                    </li>
                    <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 10px;">
                        <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 10px;\"></i>Team Sports
                    </li>
                    <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                        <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 10px;\"></i>Individual Events
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Educational Tours Section -->
<section class="act-section">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 70px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900;">
            Educational <span style="color: var(--accent-color);">Tours</span>
        </h2>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <div style="height: 450px; overflow: hidden; border-radius: 20px;">
                <img src="assets/images/Website/Music/UKP01918.jpg" alt="Educational Tours" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div>
                <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.9; margin-bottom: 32px;">We organize educational tours to places of historical and scientific importance, providing students with practical exposure and a deeper understanding of the world beyond the classroom.</p>
                
                <div style="background: #f8f9fa; padding: 40px; border-radius: 16px; margin-bottom: 32px;">
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 24px;">Tour Destinations:</h4>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                            <i class="fas fa-map-pin" style="color: var(--accent-color); margin-right: 10px; width: 20px;\"></i>
                            Historic Cities: Delhi, Simla, Kulu, Manali
                        </li>
                        <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                            <i class="fas fa-map-pin" style="color: var(--accent-color); margin-right: 10px; width: 20px;\"></i>
                            Coastal Destinations: Vishakapatnam, Goa, Bombay
                        </li>
                        <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 12px;">
                            <i class="fas fa-map-pin" style="color: var(--accent-color); margin-right: 10px; width: 20px;\"></i>
                            Technology Hubs: Bangalore
                        </li>
                        <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2;">
                            <i class="fas fa-map-pin" style="color: var(--accent-color); margin-right: 10px; width: 20px;\"></i>
                            Local Excursions: Ocean Park, Basara Temple
                        </li>
                    </ul>
                </div>

                <div style="background: white; border: 2px solid #e8e9eb; padding: 30px; border-radius: 12px;">
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin: 0;"><strong>Learning Experience:</strong> Each tour includes guided exploration, interactive sessions, and written assignments to help students synthesize and reflect on their experiences.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Annual Day Section -->
<section class="act-section" style="background: #f8f9fa;">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 70px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900;">
            Annual <span style="color: var(--accent-color);">Day</span>
        </h2>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <div style="order: 2;">
                <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.9; margin-bottom: 28px;">Our Annual Day is the grand celebration of the year, showcasing the talents and achievements of our students. It's a spectacular event where creativity, discipline, and excellence are on full display.</p>
                
                <div style="background: white; border-left: 4px solid var(--accent-color); padding: 30px; border-radius: 8px; margin-bottom: 28px;">
                    <h4 style="font-size: 1.4rem; color: var(--text-primary); font-weight: 800; margin-bottom: 20px;">What to Expect:</h4>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 10px;">
                            <i class="fas fa-star" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                            Spectacular performances by all students
                        </li>
                        <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 10px;">
                            <i class="fas fa-star" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                            Display of academic and artistic achievements
                        </li>
                        <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2; margin-bottom: 10px;">
                            <i class="fas fa-star" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                            Recognition of excellence and awards
                        </li>
                        <li style="font-size: 1rem; color: var(--text-secondary); line-height: 2.2;">
                            <i class="fas fa-star" style="color: var(--primary-color); margin-right: 10px; width: 20px;\"></i>
                            Celebration of school culture and values
                        </li>
                    </ul>
                </div>
            </div>
            <div style="order: 1; height: 450px; overflow: hidden; border-radius: 20px;">
                <img src="assets/images/Website/Dance%20room%20and%20classes/UKP02111.jpg" alt="Annual Day" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<style>
.act-page-header {
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

.act-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    color: white;
    position: relative;
    z-index: 1;
}

.act-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 30px;
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.9);
}

.act-breadcrumbs a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: all 0.3s ease;
}

.act-breadcrumbs a:hover {
    color: white;
    font-weight: 600;
}

.act-section {
    padding: 60px 0;
}

.act-section-intro {
    background: white;
}

@media (max-width: 768px) {
    .act-page-header {
        padding: 60px 0;
    }

    .act-page-header h1 {
        font-size: 2.2rem;
    }

    .act-section {
        padding: 60px 0;
    }

    [style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }

    [style*="height: 450px"] {
        height: 300px !important;
    }
}

@media (max-width: 480px) {
    .act-page-header h1 {
        font-size: 1.8rem;
    }

    .act-section {
        padding: 40px 0;
    }

    [style*="font-size: 2.8rem"] {
        font-size: 1.8rem !important;
    }

    [style*="font-size: 3rem"] {
        font-size: 1.8rem !important;
    }

    [style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: 1fr !important;
    }

    [style*="height: 450px"] {
        height: 250px !important;
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
