<?php
include 'includes/random-image-helper.php';
$page_title = "Curriculum - Shantiniketan Vidyalaya";
$page_description = "Discover our comprehensive CBSE curriculum with integrated coaching, foundation competency support, and innovative learning methodologies";
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
<section class="curr-page-header">
    <div class="container">
        <nav class="curr-breadcrumbs">
            <a href="index">Home</a>
            <span>›</span>
            <a href="index#features">Campus</a>
            <span>/</span>
            <span>Curriculum</span>
        </nav>
        <h1>Our Curriculum</h1>
    </div>
</section>

<!-- Introduction Section -->
<section class="curr-section curr-section-intro">
    <div class="container">
        <div style="max-width: 1000px; margin: 0 auto; text-align: center;">
            <h2 style="font-size: 2.8rem; font-weight: 900; color: var(--primary-color); margin-bottom: 24px; line-height: 1.3;">
                Excellence in <span style="color: var(--accent-color);">Every Classroom</span>
            </h2>
            <p style="font-size: 1.05rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 0; font-weight: 400;">
                CBSE curriculum with specialized programs designed to unlock potential, foster innovation, and build tomorrow's leaders.
            </p>
        </div>
    </div>
</section>

<!-- Program Structure Section -->
<section class="curr-section curr-section-structure">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 60px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900; line-height: 1.3;">
            Academic <span style="color: var(--accent-color);">Progression</span>
        </h2>

        <!-- Tabs Container -->
        <div style="max-width: 1000px; margin: 0 auto;">
            <!-- Tab Buttons -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px;">
                <button class="prog-tab-btn active" data-tab="primary" style="padding: 20px 24px; background: var(--primary-color); border: 2px solid var(--primary-color); font-size: 1rem; font-weight: 700; color: white; cursor: pointer; border-radius: 12px; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 10px;">
                    <i class="fas fa-book" style="font-size: 1.2rem;"></i>Primary
                </button>
                <button class="prog-tab-btn" data-tab="middle" style="padding: 20px 24px; background: white; border: 2px solid rgba(41, 81, 146, 0.3); font-size: 1rem; font-weight: 700; color: var(--primary-color); cursor: pointer; border-radius: 12px; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 10px;">
                    <i class="fas fa-flask" style="font-size: 1.2rem;"></i>Middle School
                </button>
                <button class="prog-tab-btn" data-tab="secondary" style="padding: 20px 24px; background: white; border: 2px solid rgba(41, 81, 146, 0.3); font-size: 1rem; font-weight: 700; color: var(--primary-color); cursor: pointer; border-radius: 12px; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 10px;">
                    <i class="fas fa-graduation-cap" style="font-size: 1.2rem;"></i>Secondary
                </button>
            </div>

            <!-- Tab Content Box -->
            <div style="background: linear-gradient(135deg, rgba(41, 81, 146, 0.05) 0%, rgba(191, 49, 73, 0.05) 100%); padding: 60px; border-radius: 16px; border: 1px solid rgba(41, 81, 146, 0.1);">
                
                <!-- Primary Tab Content -->
                <div class="prog-tab-content active" id="primary-content" style="animation: fadeIn 0.3s ease;">
                    <div style="text-align: center;">
                        <div style="width: 80px; height: 80px; background: rgba(41, 81, 146, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 28px;">
                            <i class="fas fa-book" style="font-size: 2.2rem; color: var(--primary-color);"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--primary-color); font-weight: 900; margin-bottom: 12px; line-height: 1.3;">Primary</h3>
                        <p style="color: var(--text-secondary); font-size: 0.95rem; font-weight: 600; margin-bottom: 20px; letter-spacing: 0.3px;">Classes I - V</p>
                        <p style="color: var(--text-secondary); font-size: 1.05rem; line-height: 1.8; max-width: 700px; margin: 0 auto;">Foundation-building with focus on literacy, numeracy, and holistic development. Students develop essential skills through interactive learning, creative play, and age-appropriate curriculum designed to build confidence and curiosity.</p>
                    </div>
                </div>

                <!-- Middle School Tab Content -->
                <div class="prog-tab-content" id="middle-content" style="animation: fadeIn 0.3s ease; display: none;">
                    <div style="text-align: center;">
                        <div style="width: 80px; height: 80px; background: rgba(191, 49, 73, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 28px;">
                            <i class="fas fa-flask" style="font-size: 2.2rem; color: var(--accent-color);"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--accent-color); font-weight: 900; margin-bottom: 12px; line-height: 1.3;">Middle School</h3>
                        <p style="color: var(--text-secondary); font-size: 0.95rem; font-weight: 600; margin-bottom: 20px; letter-spacing: 0.3px;">Classes VI - VIII</p>
                        <p style="color: var(--text-secondary); font-size: 1.05rem; line-height: 1.8; max-width: 700px; margin: 0 auto;">Interdisciplinary learning with exploratory subjects and skill development. Students engage with Sciences, Mathematics, Languages, and Social Studies through hands-on experiments, collaborative projects, and critical thinking activities that foster intellectual growth.</p>
                    </div>
                </div>

                <!-- Secondary Tab Content -->
                <div class="prog-tab-content" id="secondary-content" style="animation: fadeIn 0.3s ease; display: none;">
                    <div style="text-align: center;">
                        <div style="width: 80px; height: 80px; background: rgba(41, 81, 146, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 28px;">
                            <i class="fas fa-graduation-cap" style="font-size: 2.2rem; color: var(--primary-color);"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; color: var(--primary-color); font-weight: 900; margin-bottom: 12px; line-height: 1.3;">Secondary</h3>
                        <p style="color: var(--text-secondary); font-size: 0.95rem; font-weight: 600; margin-bottom: 20px; letter-spacing: 0.3px;">Classes IX - X</p>
                        <p style="color: var(--text-secondary); font-size: 1.05rem; line-height: 1.8; max-width: 700px; margin: 0 auto;">Advanced content with Competency based learning, multi-disciplinary approach, shifting away from rote memorization to skill development and experimental learning. Students prepare for board exams while developing problem-solving abilities and practical knowledge applicable to real-world scenarios.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .prog-tab-content {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .prog-tab-content.active {
            opacity: 1;
            animation: fadeIn 0.3s ease;
        }

        .prog-tab-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(41, 81, 146, 0.15);
        }

        .prog-tab-btn.active {
            background: var(--primary-color) !important;
            color: white !important;
            border-color: var(--primary-color) !important;
        }

        .prog-tab-btn:not(.active) {
            background: white !important;
            color: var(--primary-color) !important;
            border-color: rgba(41, 81, 146, 0.3) !important;
        }
    </style>

    <script>
        document.querySelectorAll('.prog-tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                
                // Remove active class from all buttons and contents
                document.querySelectorAll('.prog-tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.prog-tab-content').forEach(content => {
                    content.classList.remove('active');
                    content.style.display = 'none';
                });
                
                // Add active class to clicked button and corresponding content
                this.classList.add('active');
                const contentElement = document.getElementById(tabName + '-content');
                contentElement.classList.add('active');
                contentElement.style.display = 'block';
            });
        });
    </script>
</section>

<!-- Key Features Section -->
<section class="curr-section curr-section-features">
    <div class="container">
        <div style="max-width: 1000px; margin: 0 auto;">
            <h2 style="text-align: center; margin-bottom: 60px; font-size: 2.8rem; color: var(--primary-color); font-weight: 900; line-height: 1.3;">
                Our <span style="color: var(--accent-color);">Curriculum</span>
            </h2>

            <!-- Featured CBSE Curriculum Section -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; margin-bottom: 100px; background: linear-gradient(135deg, rgba(41, 81, 146, 0.08) 0%, rgba(191, 49, 73, 0.06) 100%); padding: 60px; border-radius: 20px; border: 2px solid rgba(41, 81, 146, 0.15); box-shadow: 0 8px 32px rgba(41, 81, 146, 0.12); position: relative; overflow: hidden;">
                
                <div style="height: 400px; overflow: hidden; border-radius: 16px; box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12); position: relative; z-index: 1;">
                    <img src="assets/images/Website/Class%20rooms/UKP01799.jpg" alt="CBSE Curriculum" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                        <div style="background: linear-gradient(135deg, var(--accent-color) 0%, #D64364 100%); width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.4rem; font-weight: 900;">★</div>
                        <span style="color: var(--accent-color); font-size: 0.85rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; margin: 0; padding: 6px 12px; background: rgba(191, 49, 73, 0.12); border-radius: 8px; display: inline-block;">Featured Program</span>
                    </div>
                    <h3 style="font-size: 2.2rem; color: var(--primary-color); font-weight: 900; margin-bottom: 20px; line-height: 1.3;">CBSE Curriculum<br>for Classes I - X</h3>
                    <p style="color: var(--text-secondary); font-size: 1.05rem; line-height: 1.8; margin-bottom: 32px; font-weight: 500;">Comprehensive CBSE curriculum designed to develop critical thinking, creativity, and academic excellence. Our structured approach ensures balanced development across all subjects with focus on conceptual clarity and practical application.</p>
                    <ul style="list-style: none; padding: 0; margin: 0; margin-bottom: 32px;">
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 14px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 12px; font-size: 1rem; width: 20px;"></i>
                            <strong>Balanced subject coverage</strong> across Sciences, Mathematics, Languages, and Social Studies
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 14px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 12px; font-size: 1rem; width: 20px;"></i>
                            <strong>Conceptual understanding</strong> with hands-on experiments and practical learning
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 14px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 12px; font-size: 1rem; width: 20px;"></i>
                            <strong>Regular assessments</strong> with detailed feedback for continuous improvement
                        </li>
                        <li style="font-size: 0.95rem; color: var(--text-secondary); line-height: 1.8;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 12px; font-size: 1rem; width: 20px;"></i>
                            <strong>Rigorous exam preparation</strong> for Board and competitive entrance examinations
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Additional Features Section -->
            <div style="margin-bottom: 60px;">
                <h3 style="text-align: center; font-size: 2.2rem; color: var(--primary-color); font-weight: 900; margin-bottom: 60px; line-height: 1.3;">Complementary <span style="color: var(--accent-color);">Programs</span></h3>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px;">
                <!-- Foundation Competency Support Card -->
                <div style="background: white; border: 1px solid #e8e9eb; border-radius: 16px; overflow: hidden; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); height: 100%;">
                    <div style="height: 260px; overflow: hidden; border-bottom: 1px solid #e8e9eb;">
                        <img src="assets/images/Website/Class%20rooms/UKP01821.jpg" alt="Foundation Competency Support" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 36px 28px;">
                        <h3 style="font-size: 1.4rem; color: var(--text-primary); font-weight: 900; margin-bottom: 14px; line-height: 1.3;">Foundation Competency Support</h3>
                        <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 20px;">Specialized support programs to strengthen foundational concepts and core competencies across all subjects.</p>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px; font-size: 0.95rem;"></i>Remedial & accelerated classes
                            </li>
                            <li style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px; font-size: 0.95rem;"></i>Individualized learning pathways
                            </li>
                            <li style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.8;">
                                <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px; font-size: 0.95rem;"></i>Continuous progress monitoring
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Personalized Learning Card -->
                <div style="background: white; border: 1px solid #e8e9eb; border-radius: 16px; overflow: hidden; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); height: 100%;">
                    <div style="height: 260px; overflow: hidden; border-bottom: 1px solid #e8e9eb;">
                        <img src="assets/images/Website/Class%20rooms/UKP01985.jpg" alt="Personalized Learning" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 36px 28px;">
                        <h3 style="font-size: 1.4rem; color: var(--text-primary); font-weight: 900; margin-bottom: 14px; line-height: 1.3;">Personalized Learning</h3>
                        <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 20px;">Maximum 30 students per section ensures individual attention and tailored instruction.</p>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 10px; font-size: 0.95rem;"></i>Individual attention
                            </li>
                            <li style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 10px; font-size: 0.95rem;"></i>Personalized feedback
                            </li>
                            <li style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.8;">
                                <i class="fas fa-check-circle" style="color: var(--primary-color); margin-right: 10px; font-size: 0.95rem;"></i>Customized support
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Learning Support Card -->
                <div style="background: white; border: 1px solid #e8e9eb; border-radius: 16px; overflow: hidden; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); height: 100%;">
                    <div style="height: 260px; overflow: hidden; border-bottom: 1px solid #e8e9eb;">
                        <img src="assets/images/Website/Class%20rooms/UKP01966.jpg" alt="Learning Support" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 36px 28px;">
                        <h3 style="font-size: 1.4rem; color: var(--text-primary); font-weight: 900; margin-bottom: 14px; line-height: 1.3;">Learning Support</h3>
                        <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 20px;">Well-equipped laboratories, library, and smart classrooms for hands-on learning.</p>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px; font-size: 0.95rem;"></i>Science & Math labs
                            </li>
                            <li style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px; font-size: 0.95rem;"></i>Comprehensive library
                            </li>
                            <li style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.8;">
                                <i class="fas fa-check-circle" style="color: var(--accent-color); margin-right: 10px; font-size: 0.95rem;"></i>Smart classrooms
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<style>
.curr-page-header {
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

.curr-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    color: white;
    position: relative;
    z-index: 1;
}

.curr-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 24px;
    font-size: 0.95rem;
    color: rgba(255,255,255,0.85);
}

.curr-breadcrumbs a {
    color: rgba(255,255,255,0.85);
    text-decoration: none;
}

.curr-breadcrumbs a:hover {
    color: white;
}

.curr-breadcrumbs span {
    opacity: 0.6;
}

.curr-section {
    padding: 60px 0;
}

.curr-section-intro {
    background-color: white;
    padding: 100px 0;
}

.curr-section-structure {
    background: white;
    padding: 80px 0;
}

.curr-section-features {
    background: #f8f9fa;
    padding: 80px 0;
}

.curr-section-stats {
    background: white;
    padding: 60px 0;
}

/* Responsive */
@media (max-width: 1024px) {
    [style*="display: grid; grid-template-columns: 1fr 1fr;"] {
        gap: 50px !important;
    }

    [style*="grid-template-columns: 1fr 1fr;"] > div {
        order: unset !important;
    }

    [style*="grid-template-columns: 1fr 1fr;"] > div:nth-child(2) {
        display: none;
    }
}

@media (max-width: 768px) {
    .curr-page-header {
        padding: 60px 0;
    }

    .curr-page-header h1 {
        font-size: 2.5rem;
    }

    .curr-section {
        padding: 80px 0;
    }

    .curr-section-intro {
        padding: 80px 0;
    }

    .curr-section-intro h2 {
        font-size: 2.2rem !important;
    }

    .curr-section-structure h2 {
        font-size: 2.2rem !important;
    }

    [style*="position: relative; padding: 0 40px;"] {
        padding: 0 !important;
    }

    [style*="grid-template-columns: repeat(3"] {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
    }

    [style*="grid-template-columns: repeat(4"] {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 30px !important;
    }

    [style*="display: grid; grid-template-columns: 1fr 1fr;"] {
        grid-template-columns: 1fr !important;
        gap: 50px !important;
    }

    [style*="display: grid; grid-template-columns: 1fr 1fr;"] > div {
        order: unset !important;
    }

    [style*="display: grid; grid-template-columns: 1fr 1fr;"] > div:nth-child(2) {
        display: none;
    }
}

@media (max-width: 480px) {
    .curr-page-header {
        padding: 50px 0;
    }

    .curr-page-header h1 {
        font-size: 1.8rem;
    }

    .curr-section-intro h2 {
        font-size: 1.8rem !important;
    }

    .curr-section-structure h2 {
        font-size: 1.8rem !important;
    }

    .curr-section {
        padding: 60px 0;
    }

    [style*="grid-template-columns: repeat(3"] {
        grid-template-columns: 1fr !important;
    }

    [style*="grid-template-columns: repeat(4"] {
        grid-template-columns: 1fr !important;
    }

    [style*="font-size: 5rem;"] {
        font-size: 3.5rem !important;
    }

    [style*="width: 120px; height: 120px;"] {
        width: 80px !important;
        height: 80px !important;
    }

    [style*="font-size: 3rem;"] {
        font-size: 2rem !important;
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
