<?php
// Thank You Page
$page_title = "Thank You - Shamirpet Vidyalaya";
$page_description = "Thank you for your enquiry. Our admission counselor will contact you soon.";
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
    
    <!-- Font Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/bootstrap.min.css">
    
    <style>
        .thank-you-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e8eef7 0%, #d9e2f0 100%);
            padding: 40px 20px;
        }
        
        .thank-you-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            padding: 60px 40px;
            text-align: center;
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #295192 0%, #1F3B6B 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            box-shadow: 0 4px 15px rgba(41, 81, 146, 0.3);
        }
        
        .checkmark i {
            font-size: 48px;
            color: white;
            animation: popIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        
        @keyframes popIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
        
        .thank-you-container h1 {
            font-size: 36px;
            color: #295192;
            margin-bottom: 20px;
            font-weight: 900;
        }
        
        .thank-you-container p {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 15px;
        }
        
        .inquiry-ref {
            background: #f9f9f9;
            padding: 20px;
            margin: 30px 0;
            border-radius: 8px;
            text-align: left;
        }
        
        .inquiry-ref strong {
            color: #295192;
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        
        .inquiry-ref code {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            font-family: 'Courier New', monospace;
        }
        
        .next-steps {
            background: rgba(41, 81, 146, 0.05);
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
            text-align: left;
        }
        
        .next-steps h3 {
            font-size: 18px;
            color: #295192;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .next-steps ol {
            margin: 0;
            padding-left: 20px;
        }
        
        .next-steps li {
            margin-bottom: 10px;
            color: #666;
            line-height: 1.6;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }
        
        .btn-home {
            background: linear-gradient(135deg, #295192 0%, #1F3B6B 100%);
            color: white;
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(41, 81, 146, 0.3);
            color: white;
            text-decoration: none;
        }
        
        .btn-contact {
            background: white;
            color: #295192;
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            border: 2px solid #295192;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-contact:hover {
            background: #295192;
            color: white;
            text-decoration: none;
        }
        
        @media (max-width: 768px) {
            .thank-you-container {
                padding: 40px 25px;
            }
            
            .thank-you-container h1 {
                font-size: 28px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-home, .btn-contact {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
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
    
    <!-- Thank You Section -->
    <section class="thank-you-section">
        <div class="thank-you-container">
            <div class="checkmark">
                <i class="fas fa-check"></i>
            </div>
            
            <h1>Thank You!</h1>
            <p>Your enquiry has been received successfully.</p>
            <p style="font-size: 18px; color: #295192; font-weight: 600; margin-top: 30px;">Our admission counselor will get in touch with you soon.</p>
            
            <div class="inquiry-ref">
                <strong>Your Reference Number</strong>
                <code><?php echo htmlspecialchars($_GET['ref'] ?? 'N/A'); ?></code>
            </div>
            
            <div class="action-buttons">
                <a href="index.php" class="btn-home">
                    <i class="fas fa-home"></i> Back to Home
                </a>
                <a href="contact.php" class="btn-contact">
                    <i class="fas fa-envelope"></i> Contact Us
                </a>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    
    <!-- Popup Enquiry Form Modal -->
    <?php include 'includes/popup-enquiry-form.php'; ?>
    
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/bootstrap.bundle.min.js"></script>
    <script src="assets/js/form-validation.js"></script>
    
    <script>
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
<!-- Sticky Floating Elements -->
<?php include 'includes/sticky-elements.php'; ?>
</body>
</html>
