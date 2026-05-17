<?php
header('Content-Type: application/json');

// Helper function for sanitization
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

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

// Get parameters
$selected_category = isset($_GET['category']) ? sanitize($_GET['category']) : 'all';
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 60;

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

$total_photos = count($photos);
$displayed_photos = array_slice($photos, $offset, $limit);
$has_more = ($offset + $limit) < $total_photos;

// Build HTML for new images
$html = '';
foreach ($displayed_photos as $photo) {
    // URL encode folder names but preserve filename
    $parts = explode('/', $photo);
    $encoded_photo = '';
    foreach ($parts as $part) {
        if ($encoded_photo) $encoded_photo .= '/';
        $encoded_photo .= rawurlencode($part);
    }
    
    $html .= '<div class="gallery-masonry-item">
                <div class="gallery-item" onclick="openLightbox(\'' . htmlspecialchars('assets/images/Website/' . $encoded_photo) . '\', \'' . htmlspecialchars($photo) . '\')">
                    <img src="' . htmlspecialchars('assets/images/Website/' . $encoded_photo) . '" alt="' . htmlspecialchars($photo) . '" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-icon">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>';
}

// Return JSON response
echo json_encode([
    'success' => true,
    'html' => $html,
    'all_photos' => $photos,
    'displayed' => $offset + count($displayed_photos),
    'total' => $total_photos,
    'has_more' => $has_more
]);
?>
