<?php
/**
 * Get a random image from the Website gallery
 */
function getRandomImage() {
    $baseDir = __DIR__ . '/../assets/images/Website';
    $schoolDir = $baseDir . '/School';
    
    // Try to get from School folder first for good header images
    if (is_dir($schoolDir)) {
        $images = scandir($schoolDir);
        $images = array_filter($images, function($img) {
            // Skip hidden/system files starting with . or _
            if (empty($img) || $img[0] === '.' || $img[0] === '_') return false;
            return in_array(strtolower(pathinfo($img, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp']);
        });
        $images = array_values($images); // Reindex array after filtering
        
        if (!empty($images)) {
            $randomImage = $images[array_rand($images)];
            return 'assets/images/Website/School/' . rawurlencode($randomImage);
        }
    }
    
    // Fallback to Website root level if available
    if (is_dir($baseDir)) {
        $subdirs = ['Assembly', 'Swimming pool', 'Dining hall'];
        $fallbackDir = $baseDir . '/' . $subdirs[array_rand($subdirs)];
        
        if (is_dir($fallbackDir)) {
            $images = scandir($fallbackDir);
            $images = array_filter($images, function($img) {
                // Skip hidden/system files starting with . or _
                if (empty($img) || $img[0] === '.' || $img[0] === '_') return false;
                return in_array(strtolower(pathinfo($img, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp']);
            });
            $images = array_values($images); // Reindex array after filtering
            
            if (!empty($images)) {
                $randomImage = $images[array_rand($images)];
                return 'assets/images/Website/' . rawurlencode(basename($fallbackDir)) . '/' . rawurlencode($randomImage);
            }
        }
    }
    
    // Ultimate fallback
    return 'assets/images/Website/School/UKP01787.jpg';
}
?>
