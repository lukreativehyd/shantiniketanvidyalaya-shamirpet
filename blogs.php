<?php
require 'admin/db-config.php';
include 'includes/random-image-helper.php';

// Function to fix featured image paths
function get_featured_image_url($path) {
    // If empty or null, return fallback
    if (empty($path)) {
        return '/assets/images/Website/School/UKP01787.jpg';
    }
    
    // Remove absolute filesystem paths from database
    // Handle paths like: /home/u723014502/domains/staging.shantiniketanvidyalaya.com/public_html/admin/uploads/blogs/img_xxx.jpg
    if (strpos($path, '/home/') === 0 || strpos($path, '/var/www/') === 0) {
        // Extract just the relative part after public_html/
        if (preg_match('|public_html(.+)$|', $path, $matches)) {
            return $matches[1];
        }
    }
    
    // If it starts with /, it's already web-accessible
    if (strpos($path, '/') === 0) {
        return htmlspecialchars($path);
    }
    
    // If it's a relative path like "admin/uploads/blogs/...", convert to absolute
    if (!preg_match('|^https?://|', $path)) {
        return '/' . ltrim($path, '/');
    }
    
    // Otherwise return as-is (might be full URL)
    return htmlspecialchars($path);
}

// Get all published blogs
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$perPage = 9;
$offset = ($page - 1) * $perPage;

$totalBlogs = fetch_value("SELECT COUNT(*) FROM blogs WHERE status = 'published'") ?? 0;
$totalPages = ceil($totalBlogs / $perPage);

$blogsResult = execute_query("SELECT b.*, a.full_name FROM blogs b JOIN admin_users a ON b.author_id = a.id WHERE b.status = 'published' ORDER BY b.created_at DESC LIMIT $perPage OFFSET $offset");
$blogs = fetch_all($blogsResult);

$randomImage = getRandomImage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - News & Articles</title>
    <meta name="description" content="Stay updated with the latest news, articles, and insights from Shantiniketan Vidyalaya">
    <link rel="stylesheet" href="assets/css/variables.css?v=45.0">
    <link rel="stylesheet" href="assets/css/style.css?v=45.0">
    <link rel="stylesheet" href="assets/css/responsive.css?v=45.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .blog-archive-header {
            background: linear-gradient(rgba(29, 53, 116, 0.85), rgba(41, 81, 146, 0.85)), url('<?php echo $randomImage; ?>');
            background-size: cover;
            background-position: center;
            color: white !important;
            min-height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 120px 0;
            text-align: center;
        }

        .blog-archive-header h1 {
            font-size: 2.8rem;
            font-weight: 900;
            margin: 0;
            color: white !important;
            line-height: 1.2;
        }

        .blog-archive-header p {
            margin-top: 15px;
            font-size: 1.15rem;
            opacity: 0.95;
            color: white !important;
        }

        .blogs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin: 60px 0;
        }

        .blog-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
            cursor: pointer;
        }

        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .blog-card a {
            text-decoration: none;
            color: inherit;
        }

        .blog-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: #f0f0f0;
        }

        .blog-card-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .blog-date {
            color: white;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .blog-card h3 {
            color: #333;
            font-size: 1.3rem;
            font-weight: 700;
            margin: 0 0 12px 0;
            line-height: 1.4;
        }

        .blog-card p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0 0 15px 0;
            flex-grow: 1;
        }

        .blog-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #e8e9eb;
            margin-top: auto;
        }

        .blog-author {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 0.85rem;
        }

        .blog-author i {
            color: #295192;
        }

        .read-more {
            color: #295192;
            font-weight: 700;
            font-size: 0.9rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .read-more:hover {
            color: #BF3149;
        }

        .read-more i {
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .blog-card:hover .read-more i {
            transform: translateX(3px);
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 60px 0;
            padding: 40px 0;
        }

        .pagination a,
        .pagination span {
            padding: 10px 14px;
            border: 1px solid #e8e9eb;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .pagination a:hover {
            background: #295192;
            color: white;
            border-color: #295192;
        }

        .pagination .active {
            background: #295192;
            color: white;
            border-color: #295192;
        }

        .pagination .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .no-blogs {
            text-align: center;
            padding: 80px 20px;
            color: #666;
        }

        .no-blogs h2 {
            color: #295192;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .no-blogs p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .blog-archive-header h1 {
                font-size: 1.8rem;
            }

            .blogs-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .pagination {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
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

    <!-- Blog Archive Header -->
    <div class="blog-archive-header">
        <div class="container">
            <h1>Blog & News</h1>
            <p>Latest updates, insights, and stories from our school community</p>
        </div>
    </div>

    <!-- Blog Grid -->
    <section class="section">
        <div class="container">
            <?php if ($totalBlogs > 0): ?>
                <div class="blogs-grid">
                    <?php foreach ($blogs as $blog): ?>
                        <div class="blog-card">
                            <a href="/blog/<?php echo urlencode($blog['slug']); ?>/">
                                <img src="<?php echo get_featured_image_url($blog['featured_image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="blog-image">
                            </a>
                            <div class="blog-card-content">
                                <span class="blog-date"><?php echo date('M d, Y', strtotime($blog['created_at'])); ?></span>
                                <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
                                <div class="blog-card-footer">
                                    <div class="blog-author">
                                        <i class="fas fa-user"></i>
                                        <span><?php echo htmlspecialchars($blog['full_name']); ?></span>
                                    </div>
                                    <a href="/blog/<?php echo urlencode($blog['slug']); ?>/" class="read-more">
                                        Read <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                    <div class="pagination">
                        <?php if ($page > 1): ?>
                            <a href="blogs?page=1">First</a>
                            <a href="blogs?page=<?php echo $page - 1; ?>">← Previous</a>
                        <?php else: ?>
                            <span class="disabled">First</span>
                            <span class="disabled">← Previous</span>
                        <?php endif; ?>

                        <?php
                        $startPage = max(1, $page - 2);
                        $endPage = min($totalPages, $page + 2);
                        
                        for ($i = $startPage; $i <= $endPage; $i++):
                        ?>
                            <?php if ($i === $page): ?>
                                <span class="active"><?php echo $i; ?></span>
                            <?php else: ?>
                                <a href="blogs?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <a href="blogs?page=<?php echo $page + 1; ?>">Next →</a>
                            <a href="blogs?page=<?php echo $totalPages; ?>">Last</a>
                        <?php else: ?>
                            <span class="disabled">Next →</span>
                            <span class="disabled">Last</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="no-blogs">
                    <h2>No Blog Posts Yet</h2>
                    <p>Check back soon for our latest news and articles!</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php include 'includes/popup-enquiry-form.php'; ?>

    <?php include 'includes/footer.php'; ?>

    <!-- Sticky Floating Elements -->
    <?php include 'includes/sticky-elements.php'; ?>
</body>
</html>
