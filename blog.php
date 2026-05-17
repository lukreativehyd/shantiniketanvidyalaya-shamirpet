<?php
require 'admin/db-config.php';
include 'includes/random-image-helper.php';

// Function to fix featured image paths
function get_featured_image_url($path) {
    // If empty or null, return empty (will use fallback)
    if (empty($path)) {
        return '';
    }
    
    // Remove absolute filesystem paths from database
    // Handle paths like: /home/u723014502/domains/staging.shantiniketanvidyalaya.com/public_html/admin/uploads/blogs/img_xxx.jpg
    if (strpos($path, '/home/') === 0 || strpos($path, '/var/www/') === 0) {
        // Extract just the relative part after public_html/
        if (preg_match('|public_html(.+)$|', $path, $matches)) {
            return htmlspecialchars($matches[1]);
        }
    }
    
    // If it starts with /, it's already web-accessible
    if (strpos($path, '/') === 0) {
        return htmlspecialchars($path);
    }
    
    // If it's a relative path like "admin/uploads/blogs/...", convert to absolute
    if (!preg_match('|^https?://|', $path)) {
        return htmlspecialchars('/' . ltrim($path, '/'));
    }
    
    // Otherwise return as-is (might be full URL)
    return htmlspecialchars($path);
}

// Initialize random image for fallback
$randomImage = getRandomImage();

// Get blog slug from URL
$slug = isset($_GET['slug']) ? sanitize($_GET['slug']) : null;

if (!$slug) {
    http_response_code(404);
    include 'includes/header.php';
    ?>
    <section class="section" style="min-height: 60vh; display: flex; align-items: center; justify-content: center;">
        <div class="container text-center">
            <h1 style="color: #295192; font-size: 2.5rem; margin-bottom: 20px;">Blog Post Not Found</h1>
            <p style="color: #666; margin-bottom: 30px; font-size: 1.1rem;">No slug provided.</p>
            <a href="/blogs" class="btn btn-primary" style="padding: 12px 30px; font-size: 1rem;">Back to Blogs</a>
        </div>
    </section>
    <?php
    include 'includes/footer.php';
    exit;
}

// Fetch blog post by slug
$blog = null;
global $conn;
if (defined('DB_TYPE') && DB_TYPE === 'sqlite') {
    // SQLite
    $query = "SELECT * FROM blogs WHERE slug = ? AND status = 'published'";
    $stmt = $conn->prepare($query);
    $stmt->execute([$slug]);
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // MySQL
    $slug_esc = $conn->real_escape_string($slug);
    $query = "SELECT * FROM blogs WHERE slug = '$slug_esc' AND status = 'published'";
    $result = $conn->query($query);
    $blog = $result ? $result->fetch_assoc() : null;
}

if (!$blog) {
    http_response_code(404);
    include 'includes/header.php';
    ?>
    <section class="section" style="min-height: 60vh; display: flex; align-items: center; justify-content: center;">
        <div class="container text-center">
            <h1 style="color: #295192; font-size: 2.5rem; margin-bottom: 20px;">Blog Post Not Found</h1>
            <p style="color: #666; margin-bottom: 30px; font-size: 1.1rem;">The blog post you're looking for doesn't exist or has been removed.</p>
            <a href="/blogs" class="btn btn-primary" style="padding: 12px 30px; font-size: 1rem;">Back to Blogs</a>
        </div>
    </section>
    <?php
    include 'includes/footer.php';
    exit;
}

// Use featured image for header background, fallback to random image
$headerImageUrl = get_featured_image_url($blog['featured_image']);
$headerImage = !empty($headerImageUrl) ? $headerImageUrl : $randomImage;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['title']); ?> - Blog</title>
    <meta name="description" content="<?php echo htmlspecialchars($blog['excerpt']); ?>">
    <link rel="stylesheet" href="/assets/css/variables.css?v=45.0">
    <link rel="stylesheet" href="/assets/css/style.css?v=45.0">
    <link rel="stylesheet" href="/assets/css/responsive.css?v=45.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .section {
            background: #f5f6f7 !important;
            padding: 60px 0 !important;
        }

        .blog-header {
            background: linear-gradient(135deg, #295192 0%, #1F3B6B 100%);
            color: white !important;
            padding: 0;
            margin: 0;
            border-radius: 0;
            position: relative;
            background-size: cover;
            background-position: center;
            min-height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .blog-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(41, 81, 146, 0.9) 0%, rgba(31, 59, 107, 0.9) 100%);
            z-index: 1;
        }

        .blog-header .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .blog-header h1 {
            font-size: 2.8rem;
            font-weight: 900;
            margin: 0 0 25px 0;
            line-height: 1.2;
            color: white !important;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .blog-meta {
            display: flex;
            gap: 30px;
            margin-top: 15px;
            flex-wrap: nowrap;
            font-size: 1rem;
            opacity: 0.98;
            color: white !important;
            justify-content: center;
        }

        .blog-meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white !important;
            font-weight: 500;
        }

        .blog-meta-item i {
            font-size: 1.1rem;
        }

        .blog-featured-image {
            display: none;
        }

        .blog-content-wrapper {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 40px;
            margin-top: 40px;
        }

        .blog-article {
            background: white;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
        }

        .blog-article img {
            max-width: calc(100% + 100px);
            margin-left: -50px;
            margin-right: -50px;
            margin-top: -50px;
            width: calc(100% + 100px);
            height: auto;
            border-radius: 8px 8px 0 0;
            margin-bottom: 40px;
            box-shadow: none;
        }

        .blog-article h2,
        .blog-article h3,
        .blog-article h4 {
            color: #295192;
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .blog-article h2 {
            font-size: 1.8rem;
        }

        .blog-article h3 {
            font-size: 1.5rem;
        }

        .blog-article p,
        .blog-article li {
            color: #555;
            line-height: 1.8;
            margin-bottom: 15px;
            font-size: 1.05rem;
        }

        .blog-article ul,
        .blog-article ol {
            margin: 20px 0 20px 30px;
        }

        .blog-article li {
            margin-bottom: 10px;
        }

        .blog-article a {
            color: #295192;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .blog-article a:hover {
            color: #BF3149;
        }

        .blog-sidebar {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            height: fit-content;
        }

        .sidebar-block {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 80px;
            margin-bottom: 0;
        }

        .sidebar-block:last-child {
            margin-bottom: 0;
        }

        .sidebar-block p {
            color: #666 !important;
            font-size: 0.95rem !important;
            line-height: 1.6 !important;
        }

        .sidebar-block h3 {
            color: #295192;
            font-size: 1.3rem;
            font-weight: 800;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 3px solid #295192;
            display: inline-block;
        }

        .related-blog {
            padding: 0;
            border-bottom: none;
            margin-bottom: 15px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e8e9eb;
            display: flex;
            flex-direction: column;
        }

        .related-blog:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-color: #295192;
        }

        .related-blog-image {
            width: 100%;
            height: 120px;
            overflow: hidden;
            background: #f0f0f0;
        }

        .related-blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .related-blog-content {
            padding: 12px 15px 15px 15px;
        }

        .related-blog-title {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            line-height: 1.4;
            transition: color 0.3s ease;
            display: block;
            margin-bottom: 8px;
        }

        .related-blog-title:hover {
            color: #295192;
        }

        .related-blog-date {
            color: #999;
            font-size: 0.8rem;
            margin: 0;
            padding: 0;
        }

        .nav-links {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 40px;
            padding: 0;
            border-top: none;
        }

        .nav-links .nav-link {
            flex: 1;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
        }

        .nav-links .nav-link:hover {
            background: #295192;
            color: white;
        }

        .nav-links .nav-link:hover .nav-link-title,
        .nav-links .nav-link:hover .nav-link-subtitle {
            color: white !important;
        }

        .nav-link-title {
            font-weight: 800;
            margin-bottom: 5px;
            font-size: 1.1rem;
            color: #333;
        }

        .nav-link-subtitle {
            font-size: 0.9rem;
            opacity: 0.75;
            color: #666;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .blog-header {
                min-height: 300px;
            }

            .blog-header h1 {
                font-size: 1.8rem;
                margin-bottom: 15px;
            }

            .blog-featured-image {
                height: 250px;
            }

            .blog-content-wrapper {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .blog-article {
                padding: 30px 16px;
            }

            .blog-article p,
            .blog-article li {
                font-size: 0.95rem;
            }

            .blog-article img {
                margin-left: -16px;
                margin-right: -16px;
                margin-top: -30px;
                width: calc(100% + 32px);
            }

            .blog-sidebar {
                padding: 0;
                position: static;
                top: auto;
                grid-template-columns: 1fr;
            }

            .sidebar-block {
                padding: 25px;
                position: static;
                top: auto;
            }

            .nav-links {
                flex-direction: column;
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
        <img src="/assets/images/CBSE LOGO.png" alt="CBSE Logo" style="width: 30px; height: 30px; object-fit: contain;">
        <span style="font-size: 0.9rem; font-weight: 700; color: #BF3149;">No. 3630046</span>
    </div>

    <!-- Blog Header -->
    <div class="blog-header" style="background-image: url('<?php echo $headerImage; ?>');">
        <div class="container">
            <h1><?php echo htmlspecialchars($blog['title']); ?></h1>
            <div class="blog-meta">
                <div class="blog-meta-item">
                    <i class="fas fa-user"></i>
                    <span><?php echo htmlspecialchars($blog['author_id'] ? 'Admin' : 'Shamirpet Vidyalaya'); ?></span>
                </div>
                <div class="blog-meta-item">
                    <i class="fas fa-calendar"></i>
                    <span><?php echo date('M d, Y', strtotime($blog['created_at'])); ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Content -->
    <section class="section">
        <div class="container">
            <div class="blog-content-wrapper">
                <article class="blog-article">
                    <?php 
                    $featuredImg = get_featured_image_url($blog['featured_image']);
                    if (empty($featuredImg)) {
                        $featuredImg = 'assets/images/Website/Assembly/UKP01432.jpg';
                    }
                    ?>
                    <img src="<?php echo htmlspecialchars($featuredImg); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                    
                    <div style="padding: 0 50px 50px 50px;">
                        <div class="blog-body">
                            <?php echo $blog['content']; ?>
                        </div>
                    </div>
                </article>

                <!-- Sidebar -->
                <aside class="blog-sidebar">
                    <!-- Blog Info -->
                    <div class="sidebar-block">
                        <h3>About This Post</h3>
                        <p><?php echo htmlspecialchars($blog['excerpt']); ?></p>
                    </div>

                    <!-- Recent Posts -->
                    <div class="sidebar-block">
                        <h3>Recent Posts</h3>
                        <?php
                        $recentResult = execute_query("SELECT id, title, slug, featured_image, created_at FROM blogs WHERE status = 'published' ORDER BY created_at DESC LIMIT 5");
                        $recentBlogs = fetch_all($recentResult);
                        foreach ($recentBlogs as $recent):
                        ?>
                        <?php 
                        $featuredImg = get_featured_image_url($recent['featured_image']);
                        if (empty($featuredImg)) {
                            $featuredImg = 'assets/images/Website/Assembly/UKP01432.jpg';
                        }
                        ?>
                            <div class="related-blog">
                                <div class="related-blog-image">
                                    <img src="<?php echo htmlspecialchars($featuredImg); ?>" alt="<?php echo htmlspecialchars($recent['title']); ?>">
                                </div>
                                <div class="related-blog-content">
                                    <a href="/blog/<?php echo urlencode($recent['slug']); ?>/" class="related-blog-title">
                                        <?php echo htmlspecialchars($recent['title']); ?>
                                    </a>
                                    <div class="related-blog-date"><?php echo date('M d, Y', strtotime($recent['created_at'])); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </aside>
            </div>

            <!-- Navigation -->
            <div class="nav-links" style="margin-left: 0; margin-right: 0; margin-top: 40px; border-top: none; padding-top: 0;">
                <a href="/blogs" class="nav-link" style="text-align: center;">
                    <div class="nav-link-title">← Back to Blog</div>
                    <div class="nav-link-subtitle">View all posts</div>
                </a>
            </div>
        </div>
    </section>

    <?php include 'includes/popup-enquiry-form.php'; ?>
    <?php include 'includes/footer.php'; ?>
<!-- Sticky Floating Elements -->
<?php include 'includes/sticky-elements.php'; ?>
</body>
</html>
