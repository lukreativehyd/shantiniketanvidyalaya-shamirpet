<?php
include 'includes/random-image-helper.php';
$page_title = "The School - Shantiniketan Vidyalaya";
$page_description = "Learn about Shantiniketan Vidyalaya, our philosophy, facilities, academics, and growth";
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

<!-- Page Title Section with Breadcrumbs -->
<section class="school-page-header">
    <div class="container">
        <nav class="school-breadcrumbs">
            <a href="index">Home</a>
            <span>›</span>
            <a href="the-school">About</a>
            <span>/</span>
            <span>The School</span>
        </nav>
        <h1>The School</h1>
    </div>
</section>

<!-- School About Section -->
<section class="school-section school-section-about">
    <div class="container">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div style="margin-bottom: 80px;">
                <h2 style="font-size: 2.8rem; font-weight: 900; color: var(--primary-color); margin-bottom: 20px; line-height: 1.3; text-align: center;">About <span style="color: var(--accent-color);">Shantiniketan Vidyalaya</span></h2>
                <p style="font-size: 1.05rem; color: var(--text-secondary); line-height: 1.8; max-width: 700px; margin: 0 auto; text-align: center;">A co-educational CBSE residential school dedicated to quality education and holistic development</p>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1.4fr; gap: 60px; align-items: center;">
                <div>
                    <p style="font-size: 1.1rem; color: var(--primary-color); line-height: 1.8; margin-bottom: 20px; font-weight: 700;">
                        Established to impart quality education and develop comprehensive personalities in our students.
                    </p>
                    <p style="font-size: 1.05rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 20px;">
                        We are proud to have been rated the best residential school in Hyderabad by Times of India. Our commitment to academic excellence, combined with a nurturing environment, has made us a trusted choice for families seeking quality education and personal growth.
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 16px; margin-top: 32px;">
                        <div style="display: flex; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); font-size: 1.3rem; flex-shrink: 0; margin-top: 2px;"></i>
                            <span style="color: var(--text-secondary); font-size: 1rem; line-height: 1.6;">Co-educational CBSE English Medium Residential School</span>
                        </div>
                        <div style="display: flex; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); font-size: 1.3rem; flex-shrink: 0; margin-top: 2px;"></i>
                            <span style="color: var(--text-secondary); font-size: 1rem; line-height: 1.6;">Diverse student community from across India and abroad</span>
                        </div>
                        <div style="display: flex; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); font-size: 1.3rem; flex-shrink: 0; margin-top: 2px;"></i>
                            <span style="color: var(--text-secondary); font-size: 1rem; line-height: 1.6;">State-of-the-art facilities and experienced educators</span>
                        </div>
                    </div>
                </div>
                <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 12px 32px rgba(0,0,0,0.12); height: 450px;">
                    <img src="assets/images/Website/School/UKP01787.jpg" alt="School Campus" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Philosophy, Vision & Mission Section -->
<section class="school-section school-section-pvm">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: var(--font-size-h2); font-weight: 800; color: var(--primary-color); margin-bottom: 16px;">Philosophy, Vision & <span class="gradient-text">Mission</span></h2>
            <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto;">The core values that guide every decision and action at Shantiniketan Vidyalaya</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
            <!-- Philosophy Card -->
            <div class="pvm-card">
                <div class="pvm-icon" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);">
                    <i class="fas fa-book-open" style="font-size: 2.5rem; color: white;"></i>
                </div>
                <h3 style="font-size: 1.5rem; color: var(--primary-color); margin: 24px 0 16px; font-weight: 800;">Philosophy</h3>
                <p style="color: var(--text-secondary); line-height: 1.8; font-size: 0.95rem;">
                    To quote Swami Vivekananda: "We want that education by which character is formed, strength of mind is increased, the intellect is expanded, and by which one can stand on one's own feet."
                </p>
            </div>

            <!-- Vision Card -->
            <div class="pvm-card">
                <div class="pvm-icon" style="background: linear-gradient(135deg, var(--accent-color) 0%, #D64364 100%);">
                    <i class="fas fa-eye" style="font-size: 2.5rem; color: white;"></i>
                </div>
                <h3 style="font-size: 1.5rem; color: var(--primary-color); margin: 24px 0 16px; font-weight: 800;">Vision</h3>
                <p style="color: var(--text-secondary); line-height: 1.8; font-size: 0.95rem;">
                    To develop a totally integrated personality with positive, creative and responsive qualities in our students through education.
                </p>
            </div>

            <!-- Mission Card -->
            <div class="pvm-card">
                <div class="pvm-icon" style="background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);">
                    <i class="fas fa-compass" style="font-size: 2.5rem; color: white;"></i>
                </div>
                <h3 style="font-size: 1.5rem; color: var(--primary-color); margin: 24px 0 16px; font-weight: 800;">Mission</h3>
                <p style="color: var(--text-secondary); line-height: 1.8; font-size: 0.95rem;">
                    To create an environment where every student is inspired to achieve excellence, develop critical thinking, foster innovation, and become responsible global citizens.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- School Motto Section -->
<section class="school-section school-section-motto" style="background: linear-gradient(135deg, rgba(41, 81, 146, 0.08) 0%, rgba(191, 49, 73, 0.06) 100%); padding: 80px 0; border-top: 2px solid rgba(41, 81, 146, 0.15); border-bottom: 2px solid rgba(41, 81, 146, 0.15);">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto;">
            <h2 style="font-size: 1.2rem; font-weight: 700; color: var(--primary-color); margin-bottom: 20px; letter-spacing: 1px; text-transform: uppercase;">Our School Motto</h2>
            <p style="font-size: 3rem; font-weight: 900; background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 12px; line-height: 1.2;">Sa Vidya Ya Vimuktaye</p>
            <p style="font-size: 1.5rem; color: var(--accent-color); font-weight: 700; margin-bottom: 24px; font-style: italic;">"That is True Education, which Liberates"</p>
            <p style="font-size: 1.05rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 0;">This ancient Sanskrit phrase, attributed to the Upanishads, encapsulates our core belief that education is the ultimate tool for liberation, empowerment, self-discovery, and personal excellence. Every decision we make is guided by this philosophy.</p>
        </div>
    </div>
</section>

<!-- Growth Section -->
<section class="school-section school-section-growth">
    <div class="container">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div style="margin-bottom: 80px;">
                <h2 style="font-size: 2.8rem; font-weight: 900; color: var(--primary-color); margin-bottom: 20px; line-height: 1.3; text-align: center;">Growth of <span style="color: var(--accent-color);">The School</span></h2>
                <p style="font-size: 1.05rem; color: var(--text-secondary); line-height: 1.8; max-width: 700px; margin: 0 auto; text-align: center;">A journey marked by phenomenal growth, trust, and consistent excellence</p>
            </div>
            <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 60px; align-items: start;">
                <div>
                    <h3 style="font-size: 1.5rem; color: var(--primary-color); margin-bottom: 16px; font-weight: 900; line-height: 1.3;">Our Journey to Excellence</h3>
                    <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 20px; font-size: 1.05rem;">
                        Shantiniketan Vidyalaya has grown from strength to strength in numbers, infrastructure, quality of teaching, academic results, and co-curricular achievements. Our phenomenal growth in student enrollment reflects the trust and confidence parents place in our institution.
                    </p>
                    <h4 style="font-size: 1.2rem; color: var(--primary-color); margin-top: 28px; margin-bottom: 12px; font-weight: 900;">Diverse Student Community</h4>
                    <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 20px; font-size: 1.05rem;">
                        Our students come from all streams of society and from across India. We have children joining us from Maharashtra, Karnataka, West Bengal, Bihar, Gujarat, Punjab, Uttar Pradesh, Madhya Pradesh, Chhattisgarh, Manipur, and Assam. We also welcome many NRI children, creating a truly cosmopolitan student community.
                    </p>
                    <h4 style="font-size: 1.2rem; color: var(--primary-color); margin-top: 28px; margin-bottom: 12px; font-weight: 900;">Dedicated Faculty</h4>
                    <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                        Over the years, we have evolved a team of highly qualified and dedicated staff members, committed to their mission of creating a home away from home where students can pursue excellence at their own pace and in areas of their own choice.
                    </p>
                </div>
                <div>
                    <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
                        <div style="padding: 28px; background: linear-gradient(135deg, var(--primary-color) 0%, #3D66B4 100%); color: white; border-radius: 14px; box-shadow: 0 8px 24px rgba(41, 81, 146, 0.15); text-align: center; transition: all 0.3s ease;">
                            <div style="font-size: 2.8rem; font-weight: 900; margin-bottom: 8px;">5000+</div>
                            <div style="font-size: 1rem; font-weight: 600;">Students</div>
                        </div>
                        <div style="padding: 28px; background: linear-gradient(135deg, var(--primary-color) 0%, #3D66B4 100%); color: white; border-radius: 14px; box-shadow: 0 8px 24px rgba(41, 81, 146, 0.15); text-align: center; transition: all 0.3s ease;">
                            <div style="font-size: 2.8rem; font-weight: 900; margin-bottom: 8px;">100+</div>
                            <div style="font-size: 1rem; font-weight: 600;">Faculty Members</div>
                        </div>
                        <div style="padding: 28px; background: linear-gradient(135deg, var(--accent-color) 0%, #D64364 100%); color: white; border-radius: 14px; box-shadow: 0 8px 24px rgba(191, 49, 73, 0.15); text-align: center; transition: all 0.3s ease;">
                            <div style="font-size: 2.8rem; font-weight: 900; margin-bottom: 8px;">27 yrs</div>
                            <div style="font-size: 1rem; font-weight: 600;">Track Record</div>
                        </div>
                        <div style="padding: 28px; background: linear-gradient(135deg, var(--accent-color) 0%, #D64364 100%); color: white; border-radius: 14px; box-shadow: 0 8px 24px rgba(191, 49, 73, 0.15); text-align: center; transition: all 0.3s ease;">
                            <div style="font-size: 2.8rem; font-weight: 900; margin-bottom: 8px;">100%</div>
                            <div style="font-size: 1rem; font-weight: 600;">Board Success</div>
                        </div>
                        <div style="padding: 28px; background: linear-gradient(135deg, var(--primary-color) 0%, #3D66B4 100%); color: white; border-radius: 14px; box-shadow: 0 8px 24px rgba(41, 81, 146, 0.15); text-align: center; transition: all 0.3s ease;">
                            <div style="font-size: 2.8rem; font-weight: 900; margin-bottom: 8px;">10 yrs</div>
                            <div style="font-size: 1rem; font-weight: 600;">Best School Awards</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Facilities Section -->
<section class="school-section school-section-facilities">
    <div class="container">
        <h2 style="font-size: var(--font-size-h2); font-weight: 800; color: var(--primary-color); margin-bottom: 40px; text-align: center;">World-Class <span class="gradient-text">Facilities</span></h2>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px;">
            <div style="background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div style="height: 200px; overflow: hidden;"><img src="assets/images/Website/Lab%20and%20lab%20classes/UKP01993.jpg" alt="Laboratories" style="width: 100%; height: 100%; object-fit: cover;"></div>
                <div style="padding: 20px;">
                    <h3 style="color: var(--primary-color); font-size: 1.2rem; font-weight: 700; margin-bottom: 12px;">Laboratories</h3>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6;">State-of-the-art computer and science laboratories where students are encouraged to experiment, innovate, and develop practical skills.</p>
                </div>
            </div>
            <div style="background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div style="height: 200px; overflow: hidden;"><img src="assets/images/Website/Library/UKP02232.jpg" alt="Library" style="width: 100%; height: 100%; object-fit: cover;"></div>
                <div style="padding: 20px;">
                    <h3 style="color: var(--primary-color); font-size: 1.2rem; font-weight: 700; margin-bottom: 12px;">Library</h3>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6;">A rich collection of books, encyclopedias, magazines, and digital resources covering all subjects for intellectual exploration.</p>
                </div>
            </div>
            <div style="background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div style="height: 200px; overflow: hidden;"><img src="assets/images/Website/Sports/Cricket/UKP03427.jpg" alt="Sports" style="width: 100%; height: 100%; object-fit: cover;"></div>
                <div style="padding: 20px;">
                    <h3 style="color: var(--primary-color); font-size: 1.2rem; font-weight: 700; margin-bottom: 12px;">Sports & Recreation</h3>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6;">Adequate infrastructure for Table Tennis, Chess, Cricket, Hockey, Football, Basketball, and Kabaddi to foster teamwork and excellence.</p>
                </div>
            </div>
            <div style="background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div style="height: 200px; overflow: hidden;"><img src="assets/images/Website/Dining%20hall/UKP01618.jpg" alt="Residential" style="width: 100%; height: 100%; object-fit: cover;"></div>
                <div style="padding: 20px;">
                    <h3 style="color: var(--primary-color); font-size: 1.2rem; font-weight: 700; margin-bottom: 12px;">Residential Facilities</h3>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6;">Comfortable hostels providing a home away from home with caring supervision, healthy meals, and supportive environment.</p>
                </div>
            </div>
            <div style="background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div style="height: 200px; overflow: hidden;"><img src="assets/images/Website/School/UKP01832.jpg" alt="Infrastructure" style="width: 100%; height: 100%; object-fit: cover;"></div>
                <div style="padding: 20px;">
                    <h3 style="color: var(--primary-color); font-size: 1.2rem; font-weight: 700; margin-bottom: 12px;">Campus Infrastructure</h3>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6;">Well-maintained classrooms, laboratories, hostels, and recreational facilities for a safe and stimulating environment.</p>
                </div>
            </div>
            <div style="background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div style="height: 200px; overflow: hidden;"><img src="assets/images/Website/Computer%20lab/UKP02145.jpg" alt="Digital" style="width: 100%; height: 100%; object-fit: cover;"></div>
                <div style="padding: 20px;">
                    <h3 style="color: var(--primary-color); font-size: 1.2rem; font-weight: 700; margin-bottom: 12px;">Digital Learning</h3>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6;">Integrated technology with modern labs supporting interactive and virtual learning experiences for all students.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Academic Excellence Section -->
<section class="school-section school-section-academics">
    <div class="container">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div style="margin-bottom: 80px;">
                <h2 style="font-size: 2.8rem; font-weight: 900; color: var(--primary-color); margin-bottom: 20px; line-height: 1.3; text-align: center;">Academic <span style="color: var(--accent-color);">Excellence</span></h2>
                <p style="font-size: 1.05rem; color: var(--text-secondary); line-height: 1.8; max-width: 700px; margin: 0 auto; text-align: center;">Comprehensive CBSE curriculum with consistent 100% success rate and focus on holistic student development</p>
            </div>
            
            <!-- Main Content Grid -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start;">
                <!-- Left: Content Cards -->
                <div style="display: flex; flex-direction: column; gap: 28px;">
                    <div style="background: white; padding: 40px; border-radius: 14px; border: 1px solid rgba(41, 81, 146, 0.1); box-shadow: 0 6px 20px rgba(41, 81, 146, 0.08); transition: all 0.3s ease;">
                        <div style="display: flex; gap: 16px; align-items: flex-start;">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-color) 0%, #3D66B4 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.6rem; flex-shrink: 0;">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.2rem; color: var(--primary-color); margin-bottom: 8px; font-weight: 900;">100% Board Success</h3>
                                <p style="color: var(--text-secondary); line-height: 1.7; margin: 0; font-size: 0.95rem;">Consistent excellence in Class X & XII CBSE examinations with outstanding grades across all streams and subjects.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div style="background: white; padding: 40px; border-radius: 14px; border: 1px solid rgba(191, 49, 73, 0.1); box-shadow: 0 6px 20px rgba(191, 49, 73, 0.08); transition: all 0.3s ease;">
                        <div style="display: flex; gap: 16px; align-items: flex-start;">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--accent-color) 0%, #D64364 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.6rem; flex-shrink: 0;">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.2rem; color: var(--accent-color); margin-bottom: 8px; font-weight: 900;">Holistic Curriculum</h3>
                                <p style="color: var(--text-secondary); line-height: 1.7; margin: 0; font-size: 0.95rem;">Beyond textbook learning, we emphasize character development, critical thinking, and problem-solving abilities for real-world success.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div style="background: white; padding: 40px; border-radius: 14px; border: 1px solid rgba(41, 81, 146, 0.1); box-shadow: 0 6px 20px rgba(41, 81, 146, 0.08); transition: all 0.3s ease;">
                        <div style="display: flex; gap: 16px; align-items: flex-start;">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-color) 0%, #3D66B4 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.6rem; flex-shrink: 0;">
                                <i class="fas fa-star"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.2rem; color: var(--primary-color); margin-bottom: 8px; font-weight: 900;">Co-Curricular Excellence</h3>
                                <p style="color: var(--text-secondary); line-height: 1.7; margin: 0; font-size: 0.95rem;">Comprehensive programs in sports, arts, cultural activities, and leadership training ensuring overall personality development.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right: Expert Faculty Highlight -->
                <div>
                    <div style="background: linear-gradient(135deg, var(--primary-color) 0%, #3D66B4 100%); padding: 48px 40px; border-radius: 16px; color: white; box-shadow: 0 12px 40px rgba(41, 81, 146, 0.2); position: relative;">
                        <h3 style="font-size: 2.2rem; font-weight: 900; margin-bottom: 16px; line-height: 1.2; color: white;">Expert Faculty & Mentorship</h3>
                        <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 32px; color: white;">
                            Our highly qualified and experienced teachers are dedicated to student success with personalized attention and mentorship.
                        </p>
                        
                        <div style="display: grid; grid-template-columns: 1fr; gap: 20px; margin-bottom: 32px;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <i class="fas fa-check-circle" style="font-size: 1.4rem; opacity: 0.9;"></i>
                                <span style="font-size: 1rem; font-weight: 500; color: white;">Post-graduate qualified teachers</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <i class="fas fa-check-circle" style="font-size: 1.4rem; opacity: 0.9;"></i>
                                <span style="font-size: 1rem; font-weight: 500; color: white;">Subject-specific expertise</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <i class="fas fa-check-circle" style="font-size: 1.4rem; opacity: 0.9;"></i>
                                <span style="font-size: 1rem; font-weight: 500; color: white;">Personalized student support</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <i class="fas fa-check-circle" style="font-size: 1.4rem; opacity: 0.9;"></i>
                                <span style="font-size: 1rem; font-weight: 500; color: white;">Regular feedback & guidance</span>
                            </div>
                        </div>
                        
                        <!-- Modern Curriculum Card -->
                        <div style="background: linear-gradient(135deg, var(--accent-color) 0%, #D64364 100%); padding: 28px; border-radius: 12px; box-shadow: 0 8px 25px rgba(191, 49, 73, 0.2);">
                            <div style="display: flex; align-items: flex-start; gap: 16px;">
                                <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="fas fa-book-open" style="font-size: 1.6rem; color: white;"></i>
                                </div>
                                <div>
                                    <h4 style="font-size: 1.2rem; font-weight: 800; margin: 0 0 8px 0; color: white;">Modern Curriculum</h4>
                                    <p style="color: white; font-size: 0.95rem; line-height: 1.6; margin: 0;">Updated curriculum aligned with national standards and international best practices.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.school-page-header {
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

.school-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    margin-bottom: 12px;
    color: white;
    position: relative;
    z-index: 1;
}

.school-page-header p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.school-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 24px;
    font-size: 0.95rem;
}

.school-breadcrumbs a {
    color: rgba(255,255,255,0.85);
    text-decoration: none;
}

.school-breadcrumbs a:hover {
    color: white;
}

.school-breadcrumbs span {
    opacity: 0.6;
}

/* Sections */
.school-section {
    padding: 80px 0;
}

.school-section-about {
    background-color: white;
}

.school-section-motto {
    background: linear-gradient(135deg, var(--background-light) 0%, var(--background-lighter) 100%);
}

.school-section-growth {
    background-color: white;
}

.school-section-facilities {
    background: linear-gradient(135deg, var(--background-light) 0%, var(--background-lighter) 100%);
}

.school-section-academics {
    background-color: white;
}

/* Excellence Cards - Hover Effects */
.excellence-card {
    cursor: pointer;
}

.excellence-card:hover {
    transform: translateY(-8px) !important;
    box-shadow: 0 12px 35px rgba(0,0,0,0.2) !important;
}

/* Ensure cards don't overflow on mobile */
@media (max-width: 768px) {
    .excellence-card {
        padding: 24px !important;
    }
}

@media (max-width: 480px) {
    .excellence-card {
        padding: 20px !important;
        overflow: hidden;
    }

    .excellence-card i {
        font-size: 1.5rem !important;
    }

    .excellence-card h4 {
        font-size: 1rem !important;
        margin: 0 0 6px 0 !important;
    }

    .excellence-card p {
        font-size: 0.85rem !important;
        line-height: 1.5 !important;
    }
}

.school-section-pvm {
    background: linear-gradient(135deg, var(--background-light) 0%, var(--background-lighter) 100%);
}

.pvm-card {
    background: white;
    border-radius: 16px;
    padding: 48px 32px;
    text-align: center;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.pvm-card:hover {
    transform: translateY(-12px) translateX(0);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.pvm-icon {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
}

.pvm-card h3 {
    transition: color 0.3s ease;
}

.pvm-card:hover h3 {
    color: var(--accent-color);
}

/* Responsive */
@media (max-width: 768px) {
    [style*="grid-template-columns: repeat(3"] {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
    }
    
    .pvm-card {
        padding: 40px 24px;
    }
}

@media (max-width: 480px) {
    .pvm-card {
        padding: 32px 20px;
    }
    
    .pvm-card h3 {
        font-size: 1.3rem;
    }
}

.gradient-text {
    color: var(--accent-color);
}

/* Responsive */
@media (max-width: 768px) {
    .school-page-header {
        padding: 60px 0;
    }

    .school-page-header h1 {
        font-size: 2.2rem;
    }

    .school-section {
        padding: 60px var(--container-padding);
    }

    /* Section titles consistency */
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

    /* Content padding and headings */
    [style*="padding: 40px"][style*="border-radius: 12px"] {
        padding: 30px !important;
    }

    [style*="font-size: 1.4rem"][style*="color: var(--primary-color)"] {
        font-size: 1.2rem !important;
    }

    [style*="font-size: 1.3rem"][style*="color: var(--primary-color)"] {
        font-size: 1.1rem !important;
    }

    [style*="font-size: 1.1rem"][style*="color: var(--text-secondary)"] {
        font-size: 1rem !important;
    }

    /* Grid stacking */
    [style*="grid-template-columns: 1.5fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }

    [style*="grid-template-columns: 1fr 1fr"],
    [style*="grid-template-columns: 1.2fr 1fr"],
    [style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }

    [style*="grid-template-columns: 1.2fr 1fr"] > :last-child {
        grid-template-columns: repeat(2, 1fr) !important;
    }

    /* Card styling */
    [style*="padding: 32px"][style*="background:"][style*="color: white"] {
        padding: 24px !important;
        margin-bottom: 20px !important;
    }

    [style*="font-size: 1.3rem"][style*="font-weight: 800"] {
        font-size: 1.1rem !important;
    }

    .pvm-card {
        padding: 40px 24px;
    }
}

@media (max-width: 480px) {
    .school-page-header {
        padding: 40px 0;
    }

    .school-page-header h1 {
        font-size: 1.8rem;
    }

    .school-page-header p {
        font-size: 0.95rem;
    }

    .school-section {
        padding: 60px var(--container-padding);
    }

    /* Section titles - Mobile */
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

    /* Headings - Mobile */
    [style*="font-size: 1.4rem"][style*="color: var(--primary-color)"] {
        font-size: 1rem !important;
    }

    [style*="font-size: 1.2rem"][style*="color: var(--primary-color)"] {
        font-size: 1rem !important;
    }

    [style*="font-size: 1.3rem"][style*="color: var(--primary-color)"] {
        font-size: 1rem !important;
    }

    [style*="font-size: 1.1rem"][style*="color: var(--text-secondary)"] {
        font-size: 0.95rem !important;
    }

    [style*="font-size: 1rem"][style*="color: var(--text-secondary)"] {
        font-size: 0.95rem !important;
    }

    /* Content padding - Mobile */
    [style*="padding: 40px"][style*="border-radius: 12px"] {
        padding: 20px !important;
    }

    [style*="padding: 30px"][style*="border-radius: 12px"] {
        padding: 20px !important;
    }

    [style*="padding: 32px"][style*="background:"][style*="color: white"] {
        padding: 20px !important;
        margin-bottom: 16px !important;
    }

    /* Gaps - Mobile */
    [style*="gap: 60px"] {
        gap: 25px !important;
    }

    [style*="gap: 40px"] {
        gap: 25px !important;
    }

    [style*="gap: 30px"] {
        gap: 20px !important;
    }

    [style*="gap: 16px"] {
        gap: 12px !important;
    }

    /* Card font sizes - Mobile */
    [style*="font-size: 1.3rem"][style*="font-weight: 800"] {
        font-size: 1.1rem !important;
    }

    [style*="font-size: 0.95rem"][style*="line-height: 1.6"] {
        font-size: 0.85rem !important;
    }

    /* Icon/display flex fixes */
    [style*="display: flex; align-items: flex-start"] {
        flex-direction: column !important;
    }

    [style*="width: 60px; height: 60px"] {
        width: 50px !important;
        height: 50px !important;
    }

    [style*="font-size: 2rem"][style*="fa-"] {
        font-size: 1.5rem !important;
    }

    /* Grid for cards - Mobile */
    [style*="grid-template-columns: 1.5fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 25px !important;
    }

    [style*="grid-template-columns: 1fr 1fr"],
    [style*="grid-template-columns: 1.2fr 1fr"],
    [style*="grid-template-columns: repeat(3, 1fr)"],
    [style*="grid-template-columns: repeat(2, 1fr)"] {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
    }

    [style*="grid-template-columns: 1.2fr 1fr"] > :last-child {
        grid-template-columns: 1fr !important;
    }

    .pvm-card {
        padding: 32px 20px;
    }

    .pvm-card h3 {
        font-size: 1.1rem;
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
