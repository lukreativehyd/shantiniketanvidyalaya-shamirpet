<?php
include 'includes/random-image-helper.php';
$page_title = "Admissions - Shantiniketan Vidyalaya";
$page_description = "Learn about our transparent and fair admission process. Apply now for Classes I-X at Shantiniketan Vidyalaya";
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
<section class="adm-page-header">
    <div class="container">
        <nav class="adm-breadcrumbs">
            <a href="index.php">Home</a>
            <span>/</span>
            <span>Admissions</span>
        </nav>
        <h1>Admissions</h1>
    </div>
</section>

<!-- Introduction Section -->
<section class="adm-section adm-section-intro" style="background: linear-gradient(135deg, rgba(41, 81, 146, 0.08) 0%, rgba(191, 49, 73, 0.06) 100%); padding: 100px 0;">
    <div class="container">
        <div style="max-width: 900px; margin: 0 auto; text-align: center;">
            <div style="margin-bottom: 30px;">
                <span style="display: inline-block; padding: 10px 25px; background: rgba(191, 49, 73, 0.15); color: var(--accent-color); font-size: 0.85rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; border-radius: 50px;">Begin Your Journey</span>
            </div>
            <h2 style="font-size: 3.2rem; font-weight: 900; color: var(--primary-color); margin-bottom: 24px; line-height: 1.2;">
                Join Our <span style="color: var(--accent-color);">Community</span>
            </h2>
            <p style="font-size: 1.15rem; color: var(--text-secondary); line-height: 1.9; margin-bottom: 0; font-weight: 400;">
                We welcome students who are passionate about learning and personal growth. Our transparent and fair admission process ensures equal opportunities for all deserving candidates.
            </p>
        </div>
    </div>
</section>

<!-- Application Overview Section -->
<section class="adm-section" style="padding: 100px 0;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;">
            <span style="display: inline-block; padding: 10px 25px; background: rgba(41, 81, 146, 0.15); color: var(--primary-color); font-size: 0.85rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; border-radius: 50px; margin-bottom: 20px;">Application Process</span>
            <h2 style="font-size: 2.8rem; color: var(--primary-color); font-weight: 900; margin: 0; line-height: 1.2;">
                How to <span style="color: var(--accent-color);">Apply</span>
            </h2>
        </div>

        <div style="max-width: 900px; margin: 0 auto;">
            <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.9; margin-bottom: 60px; text-align: center; font-weight: 500;">Our admission process is straightforward, transparent, and designed to identify talented students across all backgrounds. We conduct admission tests throughout the year for Classes I-X.</p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 30px;">
                <div style="text-align: center;">
                    <div style="width: 100px; height: 100px; background: rgba(41, 81, 146, 0.12); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 2.2rem;">
                        <i class="fas fa-calendar-check" style="color: var(--primary-color);"></i>
                    </div>
                    <h4 style="font-size: 1.1rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Regular Test Dates</h4>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7; margin: 0;">Admissions from January to May with flexible scheduling</p>
                </div>

                <div style="text-align: center;">
                    <div style="width: 100px; height: 100px; background: rgba(191, 49, 73, 0.12); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 2.2rem;">
                        <i class="fas fa-globe" style="color: var(--accent-color);"></i>
                    </div>
                    <h4 style="font-size: 1.1rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Flexible Testing</h4>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7; margin: 0;">Special dates for outstation and overseas candidates</p>
                </div>

                <div style="text-align: center;">
                    <div style="width: 100px; height: 100px; background: rgba(41, 81, 146, 0.12); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 2.2rem;">
                        <i class="fas fa-shield-alt" style="color: var(--primary-color);"></i>
                    </div>
                    <h4 style="font-size: 1.1rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Transparent Process</h4>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7; margin: 0;">Results declared same day with no delays</p>
                </div>

                <div style="text-align: center;">
                    <div style="width: 100px; height: 100px; background: rgba(191, 49, 73, 0.12); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 2.2rem;">
                        <i class="fas fa-star" style="color: var(--accent-color);"></i>
                    </div>
                    <h4 style="font-size: 1.1rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Merit-Based</h4>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7; margin: 0;">Fair evaluation for all applicants</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Admission Procedure Timeline -->
<section class="adm-section" style="background: linear-gradient(135deg, #f8f9fa 0%, rgba(41, 81, 146, 0.04) 100%); padding: 100px 0;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 100px;">
            <span style="display: inline-block; padding: 10px 25px; background: rgba(191, 49, 73, 0.15); color: var(--accent-color); font-size: 0.85rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; border-radius: 50px; margin-bottom: 20px;">Step-by-Step Guide</span>
            <h2 style="font-size: 2.8rem; color: var(--primary-color); font-weight: 900; margin: 0;">
                Admission <span style="color: var(--accent-color);">Procedure</span>
            </h2>
        </div>

        <div style="max-width: 900px; margin: 0 auto; position: relative; padding: 0;">
            <div style="position: absolute; left: 40px; top: 0; bottom: 0; width: 2px; background: linear-gradient(to bottom, var(--primary-color) 0%, var(--accent-color) 50%, #ccc 100%); z-index: 0;"></div>
            <div style="position: relative; z-index: 1;">
            <!-- Step 1 -->
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                <div style="width: 80px; height: 80px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 900; flex-shrink: 0; border: 4px solid #f8f9fa;">1</div>
                <div>
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Purchase Application Form</h4>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.8; margin: 0;"><strong>Fee:</strong> Rs. 500/- (Non-refundable)</p>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 0; margin-top: 8px;">Available at our school office and city office</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                <div style="width: 80px; height: 80px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 900; flex-shrink: 0; border: 4px solid #f8f9fa;">2</div>
                <div>
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Complete Registration</h4>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.8; margin: 0;"><strong>Fee:</strong> Rs. 500/- (Non-refundable)</p>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 0; margin-top: 8px;">Submit the application form with required undertakings</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                <div style="width: 80px; height: 80px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 900; flex-shrink: 0; border: 4px solid #f8f9fa;">3</div>
                <div>
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Verify Undertaking & Documentation</h4>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.8; margin: 0;">All undertakings attached to the application form will be carefully scrutinized and signed.</p>
                </div>
            </div>

            <!-- Step 4 -->
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                <div style="width: 80px; height: 80px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 900; flex-shrink: 0; border: 4px solid #f8f9fa;">4</div>
                <div>
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Take the Admission Test</h4>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.8; margin: 0;"><strong>Results declared on the same day.</strong> Individual intimation of results will not be sent separately.</p>
                </div>
            </div>

            <!-- Step 5 -->
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                <div style="width: 80px; height: 80px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 900; flex-shrink: 0; border: 4px solid #f8f9fa;">5</div>
                <div>
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Confirm Provisional Admission</h4>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.8; margin: 0;"><strong>Fee:</strong> Rs. 15,000/- (Not refundable)</p>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 0; margin-top: 8px;">Must be paid within 10 days of result declaration to secure admission</p>
                </div>
            </div>

            <!-- Step 6 -->
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                <div style="width: 80px; height: 80px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 900; flex-shrink: 0; border: 4px solid #f8f9fa;">6</div>
                <div>
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Submit Critical Documents</h4>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.8; margin: 0;"><strong>Required:</strong> Transfer Certificate, Birth Certificate (copy), and Aadhar Card (copy)</p>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; margin-bottom: 0; margin-top: 8px;">This confirms your provisional admission</p>
                </div>
            </div>

            <!-- Step 7 -->
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                <div style="width: 80px; height: 80px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 900; flex-shrink: 0; border: 4px solid #f8f9fa;">7</div>
                <div>
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Receive Admission Number & Details</h4>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.8; margin: 0;">You will be assigned an admission number, house, and provided with your school kit and fee schedule.</p>
                </div>
            </div>

            <!-- Step 8 -->
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                <div style="width: 80px; height: 80px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 900; flex-shrink: 0; border: 4px solid #f8f9fa;">8</div>
                <div>
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Pay First Term Fees</h4>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.8; margin: 0;">Upon first term fee payment, your ward is ready to join the school as per the calendar of events.</p>
                </div>
            </div>

            <!-- Step 9 -->
            <div style="display: grid; grid-template-columns: 80px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                <div style="width: 80px; height: 80px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 900; flex-shrink: 0; border: 4px solid #f8f9fa;">9</div>
                <div>
                    <h4 style="font-size: 1.3rem; color: var(--text-primary); font-weight: 800; margin-bottom: 12px;">Join School</h4>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.8; margin: 0;"><strong>Ensure:</strong> Complete school kit and all required documents are submitted before joining.</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- Important Requirements Section -->
<section class="adm-section" style="padding: 100px 0;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 80px;">
            <span style="display: inline-block; padding: 10px 25px; background: rgba(41, 81, 146, 0.15); color: var(--primary-color); font-size: 0.85rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; border-radius: 50px; margin-bottom: 20px;">Essential Information</span>
            <h2 style="font-size: 2.8rem; color: var(--primary-color); font-weight: 900; margin: 0; line-height: 1.2;">
                What You'll <span style="color: var(--accent-color);">Need</span>
            </h2>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; max-width: 1100px; margin: 0 auto;">
            <!-- Documents Required Card -->
            <div style="padding: 50px 40px; background: linear-gradient(135deg, rgba(41, 81, 146, 0.08) 0%, rgba(41, 81, 146, 0.04) 100%); border-radius: 16px;">
                <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 40px;">
                    <div style="width: 50px; height: 50px; background: rgba(41, 81, 146, 0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.6rem;">
                        <i class="fas fa-file-alt" style="color: var(--primary-color);"></i>
                    </div>
                    <h4 style="font-size: 1.5rem; color: var(--text-primary); font-weight: 800; margin: 0;">Documents Required</h4>
                </div>
                <div style="display: grid; gap: 16px;">
                    <div style="padding: 20px; background: white; border-radius: 10px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); font-size: 1.2rem; margin-top: 2px; flex-shrink: 0;"></i>
                            <div>
                                <p style="color: var(--text-primary); font-size: 0.95rem; font-weight: 700; margin: 0 0 6px 0;">Transfer Certificate</p>
                                <p style="color: var(--text-secondary); font-size: 0.9rem; margin: 0; line-height: 1.6;">From your previous school</p>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 20px; background: white; border-radius: 10px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); font-size: 1.2rem; margin-top: 2px; flex-shrink: 0;"></i>
                            <div>
                                <p style="color: var(--text-primary); font-size: 0.95rem; font-weight: 700; margin: 0 0 6px 0;">Birth Certificate</p>
                                <p style="color: var(--text-secondary); font-size: 0.9rem; margin: 0; line-height: 1.6;">Certified photocopy required</p>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 20px; background: white; border-radius: 10px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); font-size: 1.2rem; margin-top: 2px; flex-shrink: 0;"></i>
                            <div>
                                <p style="color: var(--text-primary); font-size: 0.95rem; font-weight: 700; margin: 0 0 6px 0;">Aadhar Card</p>
                                <p style="color: var(--text-secondary); font-size: 0.9rem; margin: 0; line-height: 1.6;">Copy of Aadhar card</p>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 20px; background: white; border-radius: 10px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--primary-color); font-size: 1.2rem; margin-top: 2px; flex-shrink: 0;"></i>
                            <div>
                                <p style="color: var(--text-primary); font-size: 0.95rem; font-weight: 700; margin: 0 0 6px 0;">Passport Photos</p>
                                <p style="color: var(--text-secondary); font-size: 0.9rem; margin: 0; line-height: 1.6;">Recent 4x6 inch photographs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Information Card -->
            <div style="padding: 50px 40px; background: linear-gradient(135deg, rgba(191, 49, 73, 0.08) 0%, rgba(191, 49, 73, 0.04) 100%); border-radius: 16px;">
                <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 40px;">
                    <div style="width: 50px; height: 50px; background: rgba(191, 49, 73, 0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.6rem;">
                        <i class="fas fa-credit-card" style="color: var(--accent-color);"></i>
                    </div>
                    <h4 style="font-size: 1.5rem; color: var(--text-primary); font-weight: 800; margin: 0;">Payment Information</h4>
                </div>
                <div style="display: grid; gap: 16px;">
                    <div style="padding: 20px; background: white; border-radius: 10px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--accent-color); font-size: 1.2rem; margin-top: 2px; flex-shrink: 0;"></i>
                            <div>
                                <p style="color: var(--text-primary); font-size: 0.95rem; font-weight: 700; margin: 0 0 6px 0;">Form Fee</p>
                                <p style="color: var(--text-secondary); font-size: 0.9rem; margin: 0; line-height: 1.6;">₹500 (Non-refundable)</p>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 20px; background: white; border-radius: 10px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--accent-color); font-size: 1.2rem; margin-top: 2px; flex-shrink: 0;"></i>
                            <div>
                                <p style="color: var(--text-primary); font-size: 0.95rem; font-weight: 700; margin: 0 0 6px 0;">Payment Method</p>
                                <p style="color: var(--text-secondary); font-size: 0.9rem; margin: 0; line-height: 1.6;">Demand Draft payable at Hyderabad</p>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 20px; background: white; border-radius: 10px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--accent-color); font-size: 1.2rem; margin-top: 2px; flex-shrink: 0;"></i>
                            <div>
                                <p style="color: var(--text-primary); font-size: 0.95rem; font-weight: 700; margin: 0 0 6px 0;">Provisional Admission</p>
                                <p style="color: var(--text-secondary); font-size: 0.9rem; margin: 0; line-height: 1.6;">₹15,000 (Within 10 days of result)</p>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 20px; background: white; border-radius: 10px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--accent-color); font-size: 1.2rem; margin-top: 2px; flex-shrink: 0;"></i>
                            <div>
                                <p style="color: var(--text-primary); font-size: 0.95rem; font-weight: 700; margin: 0 0 6px 0;">Important Note</p>
                                <p style="color: var(--text-secondary); font-size: 0.9rem; margin: 0; line-height: 1.6;">School not liable for loss by post</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.adm-page-header {
    background: linear-gradient(rgba(29, 53, 116, 0.85), rgba(41, 81, 146, 0.85)), url('assets/images/Website/School/UKP01825.jpg') center/cover no-repeat;
    color: white;
    padding: 120px 0;
    min-height: 140px;
    display: flex;
    align-items: center;
    text-align: center;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    position: relative;
}

.adm-page-header h1 {
    font-size: var(--font-size-h1);
    font-weight: 800;
    color: white;
    position: relative;
    z-index: 1;
}

.adm-breadcrumbs {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 30px;
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.9);
}

.adm-breadcrumbs a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: all 0.3s ease;
}

.adm-breadcrumbs a:hover {
    color: white;
    font-weight: 600;
}

.adm-section {
    padding: 60px 0;
}

.adm-section-intro {
    background: white;
}

@media (max-width: 768px) {
    .adm-page-header {
        padding: 60px 0;
    }

    .adm-page-header h1 {
        font-size: 2.2rem;
    }

    .adm-section {
        padding: 60px 0;
    }

    [style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }

    [style*="height: 450px"] {
        height: 300px !important;
    }

    [style*="grid-template-columns: repeat(2, 1fr)"] {
        grid-template-columns: 1fr !important;
    }

    [style*="grid-template-columns: 80px 1fr"] {
        grid-template-columns: 60px 1fr !important;
    }
}

@media (max-width: 480px) {
    .adm-page-header h1 {
        font-size: 1.8rem;
    }

    .adm-section {
        padding: 40px 0;
    }

    [style*="font-size: 2.8rem"] {
        font-size: 1.8rem !important;
    }

    [style*="font-size: 3rem"] {
        font-size: 1.8rem !important;
    }

    [style*="height: 450px"] {
        height: 250px !important;
    }

    [style*="width: 80px; height: 80px"] {
        width: 60px !important;
        height: 60px !important;
    }

    [style*="font-size: 2rem"] {
        font-size: 1.4rem !important;
    }
}
</style>

<!-- Enquiry Form -->
<?php include 'includes/enquiry-form.php'; ?>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>

<!-- JavaScript -->
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/bootstrap.bundle.min.js"></script>
    
    <!-- Form Validation -->
    <script src="assets/js/form-validation.js"></script>
    
    <!-- Slider -->
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
