<?php
include 'includes/random-image-helper.php';
// Configuration
$page_title = "Photo Gallery - Shantiniketan Vidyalaya";
$page_description = "Browse our comprehensive photo gallery showcasing school events, activities, campus facilities, and student life";
$randomImage = getRandomImage();

// Helper function for sanitization
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

// Define photo categories by mapping Website folders
$categories = [
    'all' => 'All Photos',
    'academics' => 'Academics',
    'sports' => 'Sports & Recreation',
    'arts' => 'Arts & Creative Activities',
    'campus' => 'Campus & Infrastructure',
    'wellness' => 'Wellness & Development',
    'activities' => 'Student Life & Events',
    'staff' => 'Staff & Leadership'
];

// Folder mapping to categories
$folder_mapping = [
    'academics' => ['Class rooms', 'Lab and lab classes', 'Library', 'Computer lab', 'Robotics'],
    'sports' => ['Sports'],
    'arts' => ['Art & Craft', 'Music', 'Dance room and classes'],
    'campus' => ['School', 'Swimming pool', 'Dining hall', 'Play park'],
    'wellness' => ['Yoga canopy', 'Medical'],
    'activities' => ['Assembly', 'Shooting and NCC'],
    'staff' => ['Staff']
];

// Get selected category
$selected_category = isset($_GET['category']) ? sanitize($_GET['category']) : 'all';
if (!isset($categories[$selected_category])) {
    $selected_category = 'all';
}

// Function to get images from a folder
function getImagesFromFolder($folderPath) {
    $images = [];
    if (is_dir($folderPath)) {
        $files = scandir($folderPath);
        foreach ($files as $file) {
            // Skip hidden/system files and directories
            if ($file !== '.' && $file !== '..' && $file[0] !== '.' && $file[0] !== '_') {
                $file_path = $folderPath . '/' . $file;
                if (is_file($file_path)) {
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                        $images[] = $file;
                    }
                }
            }
        }
    }
    return $images;
}

// Function to get images from Sports subfolders
function getSportsImages() {
    $images = [];
    $sports_dir = 'assets/images/Website/Sports';
    if (is_dir($sports_dir)) {
        $sport_categories = scandir($sports_dir);
        foreach ($sport_categories as $sport) {
            // Skip hidden/system files and directories
            if ($sport !== '.' && $sport !== '..' && $sport[0] !== '.' && $sport[0] !== '_') {
                $sport_path = $sports_dir . '/' . $sport;
                if (is_dir($sport_path)) {
                    $sport_images = getImagesFromFolder($sport_path);
                    foreach ($sport_images as $img) {
                        $images[] = 'Sports/' . $sport . '/' . $img;
                    }
                }
            }
        }
    }
    return $images;
}

// Get all photos by category
$photos = [];
$photos_dir = 'assets/images/Website';
$base_dir = 'assets/images/Website';

if ($selected_category === 'all') {
    // Get all images from all folders
    foreach ($folder_mapping as $category => $folders) {
        if ($category === 'sports') {
            $photos = array_merge($photos, getSportsImages());
        } else {
            foreach ($folders as $folder) {
                $folder_path = $base_dir . '/' . $folder;
                $images = getImagesFromFolder($folder_path);
                foreach ($images as $img) {
                    $photos[] = $folder . '/' . $img;
                }
            }
        }
    }
} else {
    // Get images for selected category
    $selected_folders = $folder_mapping[$selected_category] ?? [];
    
    // Handle sports category specially since it has subfolders
    if ($selected_category === 'sports') {
        $photos = getSportsImages();
    } else {
        // Handle all other categories normally
        foreach ($selected_folders as $folder) {
            $folder_path = $base_dir . '/' . $folder;
            $images = getImagesFromFolder($folder_path);
            foreach ($images as $img) {
                $photos[] = $folder . '/' . $img;
            }
        }
    }
}

// Shuffle all photos
shuffle($photos);
sort($photos);

// Pagination: load 60 images at a time
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 60;
$total_photos = count($photos);
$displayed_photos = array_slice($photos, $offset, $limit);
$has_more = ($offset + $limit) < $total_photos;
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
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    
    <style>
        .gallery-page-header {
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

        .gallery-page-header h1 {
            font-size: var(--font-size-h1);
            font-weight: 800;
            color: white;
            position: relative;
            z-index: 1;
        }

        .gallery-breadcrumbs {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 30px;
            font-size: 0.95rem;
            color: rgba(255,255,255,0.85);
        }

        .gallery-breadcrumbs a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            transition: color var(--transition-fast);
        }

        .gallery-breadcrumbs a:hover {
            color: white;
        }

        .gallery-masonry {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: var(--spacing-lg);
            margin-top: var(--spacing-lg);
        }
        
        @media (max-width: 768px) {
            .gallery-masonry {
                grid-template-columns: repeat(2, 1fr);
                gap: var(--spacing-md);
            }
        }
        
        @media (max-width: 480px) {
            .gallery-masonry {
                grid-template-columns: 1fr;
                gap: var(--spacing-md);
            }
        }
        
        .gallery-masonry-item {
            display: flex;
            aspect-ratio: 4 / 3;
        }

        .gallery-item {
            width: 100%;
            height: 100%;
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: auto !important;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        /* Override responsive.css gallery-item rules */
        .gallery-masonry .gallery-item:nth-child(1) {
            grid-column: auto !important;
            grid-row: auto !important;
            min-height: auto !important;
        }
        
        .gallery-info {
            color: var(--text-secondary);
            margin-bottom: var(--spacing-lg);
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: var(--spacing-sm);
            margin-top: var(--spacing-xl);
            margin-bottom: var(--spacing-xl);
            flex-wrap: wrap;
        }
        
        .pagination a, .pagination span {
            padding: var(--spacing-sm) var(--spacing-md);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius-md);
            text-decoration: none;
            color: var(--text-primary);
            transition: all var(--transition-fast);
        }
        
        .pagination a:hover {
            background-color: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
        }
        
        .pagination .active {
            background-color: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
        }
        
        .pagination .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .photo-count {
            text-align: center;
            margin: var(--spacing-lg) 0;
            color: var(--text-secondary);
            font-size: var(--font-size-small);
        }
        
        .lightbox {
            display: none;
            position: fixed;
            z-index: 200;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            animation: fadeIn 0.3s ease;
        }
        
        .lightbox.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            animation: slideUp 0.3s ease;
        }
        
        .lightbox-img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
        }
        
        .lightbox-close {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            font-size: 32px;
            cursor: pointer;
            transition: color var(--transition-fast);
        }
        
        .lightbox-close:hover {
            color: var(--accent-color);
        }
        
        .lightbox-prev, .lightbox-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: var(--spacing-md);
            transition: color var(--transition-fast);
        }
        
        .lightbox-prev {
            left: 10px;
        }
        
        .lightbox-next {
            right: 10px;
        }
        
        .lightbox-prev:hover, .lightbox-next:hover {
            color: var(--accent-color);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @media (max-width: 1024px) {
            .gallery-masonry {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .gallery-page-header {
                padding: 40px 0;
            }

            .gallery-page-header h1 {
                font-size: var(--font-size-h2);
            }

            .gallery-breadcrumbs {
                font-size: 0.85rem;
                margin-bottom: 16px;
            }

            .gallery-masonry {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
                gap: var(--spacing-md);
            }
        }

        @media (max-width: 600px) {
            .gallery-masonry {
                grid-template-columns: repeat(2, 1fr);
                gap: var(--spacing-md);
            }
        }

        @media (max-width: 480px) {
            .gallery-page-header {
                padding: 30px 0;
            }

            .gallery-page-header h1 {
                font-size: 1.75rem;
            }

            .gallery-breadcrumbs {
                font-size: 0.75rem;
                gap: 4px;
            }

            .gallery-masonry {
                grid-template-columns: 1fr;
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

    <!-- Sticky Floating Elements -->
    <?php include 'includes/sticky-elements.php'; ?>

    <!-- Page Header -->
    <section class="gallery-page-header">
        <div class="container">
            <nav class="gallery-breadcrumbs">
                <a href="index">Home</a>
                <span>/</span>
                <span>Gallery</span>
            </nav>
            <h1>Photo Gallery</h1>
        </div>
    </section>

    <!-- Gallery Section -->
    <main>
        <section class="section">
            <div class="container">
                <!-- Category Filters -->
                <div style="display: flex; gap: 15px; justify-content: center; margin-bottom: 40px; flex-wrap: wrap;">
                    <?php foreach ($categories as $cat_key => $cat_name): ?>
                        <a href="gallery?category=<?php echo $cat_key; ?>" 
                           style="padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; border: 2px solid #295192; 
                           <?php echo ($selected_category === $cat_key) ? 'background: #295192; color: white;' : 'background: white; color: #295192;'; ?>"
                           onmouseover="this.style.backgroundColor='#295192'; this.style.color='white'"
                           onmouseout="this.style.backgroundColor='<?php echo ($selected_category === $cat_key) ? '#295192' : 'white'; ?>'; this.style.color='<?php echo ($selected_category === $cat_key) ? 'white' : '#295192'; ?>'">
                            <?php echo $cat_name; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                
                <!-- Gallery Grid -->
                <div class="gallery-masonry" id="gallery-grid">
                    <?php foreach ($displayed_photos as $photo): ?>
                        <?php
                            // URL encode folder names but preserve filename
                            $parts = explode('/', $photo);
                            $encoded_photo = '';
                            foreach ($parts as $part) {
                                if ($encoded_photo) $encoded_photo .= '/';
                                $encoded_photo .= rawurlencode($part);
                            }
                        ?>
                        <div class="gallery-masonry-item">
                            <div class="gallery-item" onclick="openLightbox('<?php echo htmlspecialchars('assets/images/Website/' . $encoded_photo); ?>', '<?php echo htmlspecialchars($photo); ?>')">
                                <img src="<?php echo htmlspecialchars('assets/images/Website/' . $encoded_photo); ?>" alt="<?php echo htmlspecialchars($photo); ?>" loading="lazy">
                                <div class="gallery-overlay">
                                    <div class="gallery-overlay-icon">
                                        <i class="fas fa-search-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Photo Count -->
                <div class="photo-count">
                    Showing <?php echo count($displayed_photos); ?> of <?php echo $total_photos; ?> photos
                </div>
                
                <!-- Load More Button -->
                <?php if ($has_more): ?>
                    <div style="display: flex; justify-content: center; margin: 40px 0;">
                        <button id="load-more-btn" class="btn-primary" onclick="loadMorePhotos()" 
                                style="padding: 14px 40px; font-size: 1.1rem; cursor: pointer; background: #295192; color: white; border: none; border-radius: 8px; transition: all 0.3s ease;">
                            Load More Photos
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">
        <div class="lightbox-content">
            <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
            <span class="lightbox-prev" onclick="previousPhoto()">&lsaquo;</span>
            <img id="lightboxImg" src="" alt="" class="lightbox-img">
            <span class="lightbox-next" onclick="nextPhoto()">&rsaquo;</span>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script>
        let currentPhotoIndex = 0;
        let allPhotos = <?php echo json_encode($photos); ?>;
        let currentOffset = <?php echo $offset + $limit; ?>;
        let currentCategory = '<?php echo $selected_category; ?>';
        const photosDir = 'assets/images/Website';
        
        function openLightbox(photoPath, photoName) {
            const photoFileName = photoName;
            currentPhotoIndex = allPhotos.indexOf(photoFileName);
            document.getElementById('lightbox').classList.add('active');
            document.getElementById('lightboxImg').src = photoPath;
            document.body.style.overflow = 'hidden';
        }
        
        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        function nextPhoto() {
            currentPhotoIndex = (currentPhotoIndex + 1) % allPhotos.length;
            updateLightboxImage();
        }
        
        function previousPhoto() {
            currentPhotoIndex = (currentPhotoIndex - 1 + allPhotos.length) % allPhotos.length;
            updateLightboxImage();
        }
        
        function updateLightboxImage() {
            const photoPath = photosDir + '/' + allPhotos[currentPhotoIndex];
            document.getElementById('lightboxImg').src = photoPath;
        }
        
        function loadMorePhotos() {
            const btn = document.getElementById('load-more-btn');
            btn.disabled = true;
            btn.textContent = 'Loading...';
            
            fetch('gallery-load-more.php?category=' + currentCategory + '&offset=' + currentOffset)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Add new images to the gallery grid
                        const grid = document.getElementById('gallery-grid');
                        grid.innerHTML += data.html;
                        
                        // Update allPhotos array with new photos
                        allPhotos = data.all_photos;
                        
                        // Update offset
                        currentOffset += 60;
                        
                        // Update photo count
                        document.querySelector('.photo-count').textContent = 
                            'Showing ' + data.displayed + ' of ' + data.total + ' photos';
                        
                        // Remove or hide the button if no more photos
                        if (!data.has_more) {
                            btn.style.display = 'none';
                        } else {
                            btn.disabled = false;
                            btn.textContent = 'Load More Photos';
                        }
                    }
                })
                .catch(error => {
                    console.error('Error loading more photos:', error);
                    btn.disabled = false;
                    btn.textContent = 'Load More Photos';
                });
        }
        
        // Keyboard navigation for lightbox
        document.addEventListener('keydown', function(event) {
            const lightbox = document.getElementById('lightbox');
            if (lightbox.classList.contains('active')) {
                if (event.key === 'ArrowRight') nextPhoto();
                if (event.key === 'ArrowLeft') previousPhoto();
                if (event.key === 'Escape') closeLightbox();
            }
        });
        
        // Close lightbox when clicking outside the image
        document.getElementById('lightbox').addEventListener('click', function(event) {
            if (event.target === this) {
                closeLightbox();
            }
        });

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

    <!-- Form Validation -->
    <script src="assets/js/form-validation.js"></script>

    <!-- Popup Enquiry Form Modal -->
    <?php include 'includes/popup-enquiry-form.php'; ?>
