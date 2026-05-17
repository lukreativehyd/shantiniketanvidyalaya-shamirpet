<?php
include 'includes/random-image-helper.php';
$page_title = "School Houses - Shantiniketan Vidyalaya";
$page_description = "Learn about our prestigious school houses including House of Vivekananda, Cariappa, Tagore, and Raman. Our house system promotes leadership, teamwork, and healthy competition.";
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
<section class="hous-page-header">
    <div class="container">
        <nav class="hous-breadcrumbs">
            <a href="index" class="breadcrumb-link">Home</a>
            <span>/</span>
            <span>Houses</span>
        </nav>
        <h1>School Houses</h1>
    </div>
</section>

<!-- Introduction Section -->
<section class="hous-section hous-section-intro">
    <div class="container">
        <div style="max-width: 900px; margin: 0 auto; text-align: center;">
            <h2 style="font-size: 2.8rem; font-weight: 900; color: var(--primary-color); margin-bottom: 20px; line-height: 1.2;">
                The House <span style="color: var(--accent-color);">System</span>
            </h2>
            <p style="font-size: 1.15rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 0; font-weight: 400;">
                Our house system is an integral part of school life, fostering healthy competition, camaraderie, and leadership. Each house maintains its unique identity and values while working towards academic and co-curricular excellence.
            </p>
        </div>
    </div>
</section>

<!-- Senior Houses Section -->
<section class="hous-section">
    <div class="container">
        <div style="max-width: 1000px; margin: 0 auto;">
            <h2 style="text-align: center; margin-bottom: 70px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900;">
                Senior School <span style="color: var(--accent-color);">Houses</span>
            </h2>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; margin-bottom: 80px;">
                <!-- House of Vivekananda -->
                <div style="background: linear-gradient(135deg, rgba(41, 81, 146, 0.08) 0%, rgba(191, 49, 73, 0.06) 100%); border: 2px solid rgba(41, 81, 146, 0.15); padding: 50px; border-radius: 20px; box-shadow: 0 8px 32px rgba(41, 81, 146, 0.12);">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary-color) 0%, #3D66B4 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--text-primary); font-weight: 900; margin: 0;">House of Vivekananda</h3>
                    </div>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 24px; font-weight: 400;">
                        Named after Swami Vivekananda, the great Indian philosopher and spiritual leader, this house embodies the values of knowledge, courage, and social service. Members of this house strive for intellectual excellence and moral integrity.
                    </p>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 12px; width: 20px;"></i>
                            Core Values: Knowledge, Courage, Service
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 12px; width: 20px;"></i>
                            Focus: Academic Excellence
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 12px; width: 20px;"></i>
                            Tradition: Community Service Programs
                        </li>
                    </ul>
                </div>

                <!-- House of Cariappa -->
                <div style="background: linear-gradient(135deg, rgba(191, 49, 73, 0.08) 0%, rgba(41, 81, 146, 0.06) 100%); border: 2px solid rgba(191, 49, 73, 0.15); padding: 50px; border-radius: 20px; box-shadow: 0 8px 32px rgba(191, 49, 73, 0.12);">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--accent-color) 0%, #D64364 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-shield"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--text-primary); font-weight: 900; margin: 0;">House of Cariappa</h3>
                    </div>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 24px; font-weight: 400;">
                        Named after Field Marshal K.M. Cariappa, the first Commander-in-Chief of independent India, this house represents discipline, leadership, and patriotism. Students are encouraged to develop leadership qualities and contribute to nation-building.
                    </p>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 12px; width: 20px;"></i>
                            Core Values: Discipline, Leadership, Patriotism
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 12px; width: 20px;"></i>
                            Focus: Sports & Physical Excellence
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                            <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 12px; width: 20px;"></i>
                            Tradition: Leadership Development
                        </li>
                    </ul>
                </div>

                <!-- House of Tagore -->
                <div style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(41, 81, 146, 0.06) 100%); border: 2px solid rgba(16, 185, 129, 0.15); padding: 50px; border-radius: 20px; box-shadow: 0 8px 32px rgba(16, 185, 129, 0.12);">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--text-primary); font-weight: 900; margin: 0;">House of Tagore</h3>
                    </div>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 24px; font-weight: 400;">
                        Named after Rabindranath Tagore, the poet, philosopher, and visionary, this house celebrates creativity, culture, and artistic expression. Members are inspired to explore their talents in performing and visual arts.
                    </p>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 12px;">
                            <i class="fas fa-check-circle" style="color: #10b981; margin-right: 12px; width: 20px;"></i>
                            Core Values: Creativity, Culture, Expression
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 12px;">
                            <i class="fas fa-check-circle" style="color: #10b981; margin-right: 12px; width: 20px;"></i>
                            Focus: Arts & Cultural Activities
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                            <i class="fas fa-check-circle" style="color: #10b981; margin-right: 12px; width: 20px;"></i>
                            Tradition: Annual Cultural Festival
                        </li>
                    </ul>
                </div>

                <!-- House of Raman -->
                <div style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.08) 0%, rgba(41, 81, 146, 0.06) 100%); border: 2px solid rgba(139, 92, 246, 0.15); padding: 50px; border-radius: 20px; box-shadow: 0 8px 32px rgba(139, 92, 246, 0.12);">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-flask"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--text-primary); font-weight: 900; margin: 0;">House of Raman</h3>
                    </div>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 24px; font-weight: 400;">
                        Named after C.V. Raman, the Nobel Prize-winning physicist, this house emphasizes scientific inquiry, innovation, and intellectual curiosity. Members are encouraged to pursue STEM excellence and research.
                    </p>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 12px;">
                            <i class="fas fa-check-circle" style="color: #8b5cf6; margin-right: 12px; width: 20px;"></i>
                            Core Values: Innovation, Inquiry, Excellence
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2; margin-bottom: 12px;">
                            <i class="fas fa-check-circle" style="color: #8b5cf6; margin-right: 12px; width: 20px;"></i>
                            Focus: STEM & Scientific Research
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 2;">
                            <i class="fas fa-check-circle" style="color: #8b5cf6; margin-right: 12px; width: 20px;"></i>
                            Tradition: Science Symposium & Exhibitions
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Junior Houses Section -->
<section class="hous-section" style="background: #f8f9fa;">
    <div class="container">
        <div style="max-width: 1000px; margin: 0 auto;">
            <h2 style="text-align: center; margin-bottom: 70px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900;">
                Junior School <span style="color: var(--accent-color);">Houses</span>
            </h2>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px;">
                <!-- Red House -->
                <div style="background: white; border: 2px solid #f8d7da; padding: 50px; border-radius: 20px; box-shadow: 0 6px 24px rgba(220, 53, 69, 0.08);">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #dc3545 0%, #e74c3c 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-circle"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--text-primary); font-weight: 900; margin: 0;">Red House</h3>
                    </div>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 24px; font-weight: 400;">
                        The Red House symbolizes energy, courage, and dynamism. Junior students in this house are encouraged to be bold, enthusiastic, and active participants in all school activities. Red House members are known for their vibrant spirit and competitive zeal.
                    </p>
                    <div style="background: #fff5f5; padding: 16px; border-radius: 12px; border-left: 4px solid #dc3545;">
                        <p style="color: #721c24; font-size: 0.9rem; margin: 0; font-weight: 600;">
                            <i class="fas fa-star" style="margin-right: 8px;"></i>
                            Motto: Courage and Excellence
                        </p>
                    </div>
                </div>

                <!-- Green House -->
                <div style="background: white; border: 2px solid #d1e7dd; padding: 50px; border-radius: 20px; box-shadow: 0 6px 24px rgba(25, 135, 84, 0.08);">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #198754 0%, #10b981 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-circle"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--text-primary); font-weight: 900; margin: 0;">Green House</h3>
                    </div>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 24px; font-weight: 400;">
                        The Green House represents growth, harmony, and environmental consciousness. Members of this house are encouraged to be responsible, cooperative, and committed to sustainability. Green House students embody balance and natural leadership.
                    </p>
                    <div style="background: #f0fdf4; padding: 16px; border-radius: 12px; border-left: 4px solid #198754;">
                        <p style="color: #0b3918; font-size: 0.9rem; margin: 0; font-weight: 600;">
                            <i class="fas fa-star" style="margin-right: 8px;"></i>
                            Motto: Growth and Harmony
                        </p>
                    </div>
                </div>

                <!-- Blue House -->
                <div style="background: white; border: 2px solid #cfe2ff; padding: 50px; border-radius: 20px; box-shadow: 0 6px 24px rgba(13, 110, 253, 0.08);">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #0d6efd 0%, #3d66B4 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-circle"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--text-primary); font-weight: 900; margin: 0;">Blue House</h3>
                    </div>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 24px; font-weight: 400;">
                        The Blue House symbolizes trust, stability, and intellectual pursuit. Members of this house are encouraged to be thoughtful, reliable, and dedicated to learning. Blue House students stand out for their steadfast commitment to academic excellence and integrity.
                    </p>
                    <div style="background: #eff6ff; padding: 16px; border-radius: 12px; border-left: 4px solid #0d6efd;">
                        <p style="color: #084298; font-size: 0.9rem; margin: 0; font-weight: 600;">
                            <i class="fas fa-star" style="margin-right: 8px;"></i>
                            Motto: Stability and Excellence
                        </p>
                    </div>
                </div>

                <!-- Yellow House -->
                <div style="background: white; border: 2px solid #fff3cd; padding: 50px; border-radius: 20px; box-shadow: 0 6px 24px rgba(255, 193, 7, 0.08);">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-circle"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--text-primary); font-weight: 900; margin: 0;">Yellow House</h3>
                    </div>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 24px; font-weight: 400;">
                        The Yellow House represents positivity, joy, and enthusiasm. Members of this house are encouraged to be friendly, optimistic, and supportive of their peers. Yellow House students bring brightness and positive energy to the school community.
                    </p>
                    <div style="background: #fffbf0; padding: 16px; border-radius: 12px; border-left: 4px solid #ffc107;">
                        <p style="color: #664d03; font-size: 0.9rem; margin: 0; font-weight: 600;">
                            <i class="fas fa-star" style="margin-right: 8px;"></i>
                            Motto: Joy and Positivity
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- House Activities Section -->
<section class="hous-section">
    <div class="container">
        <div style="max-width: 1000px; margin: 0 auto;">
            <h2 style="text-align: center; margin-bottom: 70px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900;">
                House <span style="color: var(--accent-color);">Activities</span>
            </h2>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px;">
                <div style="background: white; border: 1px solid #e8e9eb; padding: 40px; border-radius: 16px; box-shadow: 0 6px 20px rgba(0,0,0,0.08);">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-color) 0%, #3D66B4 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.6rem; margin-bottom: 20px;">
                        <i class="fas fa-running"></i>
                    </div>
                    <h3 style="font-size: 1.4rem; color: var(--text-primary); font-weight: 900; margin-bottom: 16px;">Inter-House Sports</h3>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin: 0;">
                        Competitive sporting events foster physical excellence, teamwork, and sportsmanship. Houses compete in various athletic events throughout the year.
                    </p>
                </div>

                <div style="background: white; border: 1px solid #e8e9eb; padding: 40px; border-radius: 16px; box-shadow: 0 6px 20px rgba(0,0,0,0.08);">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--accent-color) 0%, #D64364 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.6rem; margin-bottom: 20px;">
                        <i class="fas fa-masks-theater"></i>
                    </div>
                    <h3 style="font-size: 1.4rem; color: var(--text-primary); font-weight: 900; margin-bottom: 16px;">Cultural Competitions</h3>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin: 0;">
                        Houses showcase their talents through debates, drama, music, and dance competitions, celebrating diverse forms of artistic expression.
                    </p>
                </div>

                <div style="background: white; border: 1px solid #e8e9eb; padding: 40px; border-radius: 16px; box-shadow: 0 6px 20px rgba(0,0,0,0.08);">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.6rem; margin-bottom: 20px;">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 style="font-size: 1.4rem; color: var(--text-primary); font-weight: 900; margin-bottom: 16px;">House Points & Awards</h3>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin: 0;">
                        Students earn points through academic achievement, participation, and conduct. The house with the most points is recognized with the prestigious House Championship.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.hous-page-header {
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

.hous-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    color: white;
    position: relative;
    z-index: 1;
}

.hous-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 30px;
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.9);
}

.hous-breadcrumbs a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: all 0.3s ease;
}

.hous-breadcrumbs a:hover {
    color: white;
    font-weight: 600;
}

.hous-section {
    padding: 100px 0;
}

.hous-section-intro {
    background: white;
    padding: 80px 0;
}

@media (max-width: 768px) {
    .hous-page-header {
        padding: 60px 0;
    }

    .hous-page-header h1 {
        font-size: 2.2rem;
    }

    .hous-section {
        padding: 60px 0;
    }

    [style*="grid-template-columns: repeat(2, 1fr)"] {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
    }

    [style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: 1fr !important;
    }
}

@media (max-width: 480px) {
    .hous-page-header h1 {
        font-size: 1.8rem;
    }

    .hous-section {
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
