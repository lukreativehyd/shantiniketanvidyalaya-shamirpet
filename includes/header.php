<!-- Header -->
<header class="header">
    <div class="container flex-between">
        <div class="header-logo">
            <a href="/" class="logo">
                <img src="/assets/images/shantilogo48-1.png" alt="School Logo" class="logo-img">
            </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="mobile-menu-toggle" id="mobileMenuToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav class="header-nav" id="headerNav">
            <ul class="nav-list">
                <li><a href="/" class="nav-link active">Home</a></li>
                <li class="nav-item-dropdown">
                    <a href="#" class="nav-link">About</a>
                    <ul class="dropdown-menu">
                        <li><a href="/the-school">The School</a></li>
                        <li><a href="/advisory-council">Advisory Council</a></li>
                        <li><a href="/principal">Principal</a></li>
                    </ul>
                </li>
                <li class="nav-item-dropdown">
                    <a href="#" class="nav-link">Campus</a>
                    <ul class="dropdown-menu">
                        <li><a href="/infrastructure">Infrastructure</a></li>
                        <li><a href="/curriculum">Curriculum</a></li>
                        <li><a href="/activities">Activities</a></li>
                        <li><a href="/houses">Houses</a></li>
                        <li><a href="/videos">Videos</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                    </ul>
                </li>
                <li><a href="/admissions" class="nav-link">Admissions</a></li>
                <li><a href="/blogs" class="nav-link">Blog</a></li>
                <li><a href="/contact" class="nav-link">Contact</a></li>
            </ul>
        </nav>

        <div class="header-cta">
            <button type="button" class="btn btn-accent btn-sm" data-open-enquiry-modal>Enquire Now</button>
        </div>
    </div>
</header>

<!-- Mobile Sidebar Menu -->
<div class="mobile-sidebar" id="mobileSidebar">
    <!-- Close Button -->
    <div class="sidebar-close-btn" id="sidebarCloseBtn">
        <i class="fas fa-times"></i>
    </div>

    <div class="sidebar-content">
        <!-- Navigation Menu Section (Same as Header) -->
        <div class="sidebar-section nav-section-mobile">
            <ul class="sidebar-nav-list">
                <li><a href="/" class="nav-link-mobile">Home</a></li>
                <li class="nav-item-dropdown-mobile">
                    <a href="#" class="nav-link-mobile">About</a>
                    <ul class="dropdown-menu-mobile">
                        <li><a href="/the-school">The School</a></li>
                        <li><a href="/advisory-council">Advisory Council</a></li>
                        <li><a href="/principal">Principal</a></li>
                    </ul>
                </li>
                <li class="nav-item-dropdown-mobile">
                    <a href="#" class="nav-link-mobile">Campus</a>
                    <ul class="dropdown-menu-mobile">
                        <li><a href="/infrastructure">Infrastructure</a></li>
                        <li><a href="/curriculum">Curriculum</a></li>
                        <li><a href="/activities">Activities</a></li>
                        <li><a href="/houses">Houses</a></li>
                        <li><a href="/videos">Videos</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                    </ul>
                </li>
                <li><a href="/admissions" class="nav-link-mobile">Admissions</a></li>
                <li><a href="/blogs" class="nav-link-mobile">Blog</a></li>
                <li><a href="/contact" class="nav-link-mobile">Contact</a></li>
                <li class="nav-item-dropdown-mobile">
                    <a href="#" class="nav-link-mobile">Mandatory</a>
                    <ul class="dropdown-menu-mobile">
                        <li><a href="assets/documents/brochure.pdf" class="document-link-mobile" target="_blank">Brochure</a></li>
                        <li><a href="assets/documents/calender.pdf" class="document-link-mobile" target="_blank">Calendar</a></li>
                        <li><a href="assets/documents/tc.pdf" class="document-link-mobile" target="_blank">T.C.</a></li>
                        <li><a href="assets/documents/MANDATORY_PUBLIC_DISCLOSRE-2021-22.pdf" class="document-link-mobile" target="_blank">Mandatory Disclosure</a></li>
                        <li><a href="assets/documents/list-books.pdf" class="document-link-mobile" target="_blank">List of Books</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Social Media Section (Top) -->
        <div class="sidebar-section social-section-mobile">
            <div class="social-icons-container">
                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-icon-mobile" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-icon-mobile" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="social-icon-mobile" title="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<style>
.header {
    background-color: var(--white);
    border-bottom: 1px solid var(--border-color);
    padding: var(--spacing-md) 0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: var(--shadow-sm);
}

.header .container {
    display: flex;
    align-items: center;
    gap: var(--spacing-lg);
    width: 100%;
}

.header-logo {
    flex-shrink: 0;
}

.logo {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    text-decoration: none;
}

.logo-img {
    height: 50px;
    width: auto;
}

.header-cta {
    flex-shrink: 0;
    display: flex;
    gap: var(--spacing-md);
}

.header-cta .btn {
    padding: var(--spacing-sm) var(--spacing-lg);
    font-size: var(--font-size-body);
}

/* Navigation */
.header-nav {
    flex: 1;
}

.nav-list {
    list-style: none;
    display: flex;
    gap: var(--spacing-lg);
    justify-content: center;
}

.nav-link {
    color: var(--text-secondary);
    font-size: 17px;
    font-weight: 600;
    transition: color var(--transition-fast);
    position: relative;
}

.nav-link:hover,
.nav-link.active {
    color: var(--primary-color);
}

.nav-link .active::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    right: 0;
    height: 2px;
    background-color: var(--primary-color);
}

/* Dropdown Menu Styles */
.nav-item-dropdown {
    position: relative;
}

.nav-item-dropdown .nav-link::after {
    content: '▼';
    margin-left: 6px;
    font-size: 10px;
    vertical-align: middle;
}

.dropdown-menu {
    list-style: none;
    position: absolute;
    top: calc(100% + 10px);
    left: 0;
    background-color: var(--white);
    border: 1px solid var(--border-color);
    border-radius: 6px;
    min-width: 200px;
    max-height: 0;
    overflow: hidden;
    opacity: 0;
    transition: max-height var(--transition-normal), opacity var(--transition-normal);
    z-index: 1000;
    box-shadow: var(--shadow-md);
}

.nav-item-dropdown:hover .dropdown-menu {
    max-height: 300px;
    opacity: 1;
}

.dropdown-menu li {
    margin: 0;
}

.dropdown-menu a {
    display: block;
    padding: 12px 16px;
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 17px;
    font-weight: 600;
    transition: all var(--transition-fast);
}

.dropdown-menu a:hover {
    background-color: var(--primary-color);
    color: var(--white);
}



/* Mobile Menu Toggle */
.mobile-menu-toggle {
    display: none;
    flex-direction: column;
    gap: 6px;
    cursor: pointer;
    z-index: 101;
    padding: 8px;
    margin: -8px -8px -8px 0;
}

.mobile-menu-toggle span {
    width: 24px;
    height: 2.5px;
    background-color: var(--primary-color);
    border-radius: 2px;
    transition: all var(--transition-fast);
    display: block;
}

.mobile-menu-toggle.active span:nth-child(1) {
    transform: rotate(45deg) translate(10px, 10px);
}

.mobile-menu-toggle.active span:nth-child(2) {
    opacity: 0;
}

.mobile-menu-toggle.active span:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -7px);
}

@media (max-width: 768px) {
    .header .container {
        gap: var(--spacing-md);
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mobile-menu-toggle {
        display: flex;
        z-index: 102;
        margin-left: auto;
    }

    .header-cta {
        display: none;
        gap: var(--spacing-sm);
    }

    .header-logo {
        flex: 1;
    }

    .header-nav {
        position: fixed;
        top: 70px;
        left: 0;
        width: 100%;
        background-color: var(--white);
        max-height: 0;
        overflow: hidden;
        transition: max-height var(--transition-normal);
        z-index: 101;
        flex: none;
    }

    .header-nav.open {
        max-height: calc(100vh - 70px);
        overflow-y: auto;
    }

    .nav-list {
        flex-direction: column;
        gap: 0;
        padding: var(--spacing-md) var(--spacing-lg);
    }

    .nav-link {
        padding: var(--spacing-md) 0;
        display: block;
    }

    .nav-link.active::after {
        display: none;
    }

    /* Mobile Dropdown */
    .dropdown-menu {
        position: static;
        border: none;
        box-shadow: none;
        background-color: var(--background-lighter);
        max-height: 0;
        opacity: 1;
        padding-left: var(--spacing-md);
    }

    .nav-item-dropdown:hover .dropdown-menu {
        max-height: 300px;
    }

    .nav-item-dropdown.open .dropdown-menu {
        max-height: 300px;
    }

    .dropdown-menu a {
        padding: 10px 0;
        border-bottom: none;
        font-size: 13px;
    }

    /* Mobile Sidebar Container - Full Page */
    .mobile-sidebar {
        display: none;
    }

    .mobile-sidebar.show {
        display: block;
        position: fixed;
        left: -100%;
        top: 0;
        width: 100%;
        height: 100vh;
        background-color: var(--white);
        overflow-y: auto;
        transition: left 0.3s ease-in-out;
        z-index: 999;
    }

    .mobile-sidebar.show.active {
        left: 0;
    }

    .sidebar-close-btn {
        position: fixed;
        top: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        background-color: var(--primary-color);
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 24px;
        color: var(--white);
        z-index: 1000;
        transition: all var(--transition-fast);
    }

    .sidebar-close-btn:hover {
        background-color: var(--primary-dark);
        transform: scale(1.1);
    }

    .sidebar-content {
        padding: 70px var(--spacing-xl) var(--spacing-lg) var(--spacing-xl);
    }

    .sidebar-section {
        margin-bottom: 0.25rem;
    }

    .sidebar-section:last-child {
        margin-bottom: 0;
    }

    /* CBSE Badge Mobile */
    .cbse-section-mobile {
        margin-bottom: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .cbse-badge-mobile {
        display: flex;
        align-items: center;
        gap: var(--spacing-md);
        padding: var(--spacing-md) var(--spacing-lg);
        background-color: var(--background-lighter);
        border-radius: 8px;
    }

    .cbse-badge-mobile img {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }

    .cbse-badge-mobile-text .label {
        font-size: 14px;
        font-weight: 600;
        color: var(--primary-color);
    }

    .cbse-badge-mobile-text .number {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
    }

    /* Navigation Menu Section Mobile */
    .nav-section-mobile {
        background-color: var(--background-lighter);
        padding: var(--spacing-md) var(--spacing-lg);
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .sidebar-nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .sidebar-nav-list li {
        margin: 0;
        border-bottom: 1px solid var(--border-color);
    }

    .sidebar-nav-list li:last-child {
        border-bottom: none;
    }

    /* Documents Section Mobile */
    .documents-section-mobile {
        background-color: #f9f9f9;
        padding: var(--spacing-md) var(--spacing-lg);
        border-radius: 8px;
        border-left: 4px solid var(--accent-color);
        margin-bottom: 1.5rem;
    }

    .documents-section-mobile .sidebar-section-title {
        margin: 0 0 var(--spacing-md) 0;
        color: var(--accent-color);
        font-size: 0.75rem;
    }

    .nav-link-mobile {
        display: block;
        padding: 14px 0;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 18px;
        font-weight: 600;
        transition: all var(--transition-fast);
    }

    .nav-link-mobile:hover {
        color: var(--primary-color);
    }

    /* Dropdown Menu Mobile */
    .nav-item-dropdown-mobile {
        position: relative;
    }

    .nav-item-dropdown-mobile .nav-link-mobile::after {
        content: '▼';
        margin-left: 6px;
        font-size: 10px;
        vertical-align: middle;
        float: right;
    }

    .dropdown-menu-mobile {
        list-style: none;
        background-color: transparent;
        max-height: 0;
        overflow: hidden;
        transition: max-height var(--transition-normal);
    }

    .nav-item-dropdown-mobile.open .dropdown-menu-mobile {
        max-height: 400px;
    }

    .dropdown-menu-mobile li {
        margin: 0;
    }

    .dropdown-menu-mobile a {
        display: block;
        padding: 12px 16px 12px 20px;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: all var(--transition-fast);
        border-bottom: 1px solid var(--border-color);
    }

    .dropdown-menu-mobile li:last-child a {
        border-bottom: none;
    }

    .dropdown-menu-mobile a:hover {
        background-color: var(--primary-color);
        color: var(--white);
    }

    /* Social Media Section Mobile */
    .social-section-mobile {
        padding-top: 0.5rem;
    }

    /* Address Section Mobile */
    .address-section-mobile {
        background-color: var(--background-lighter);
        padding: var(--spacing-lg);
        border-radius: 8px;
        margin-bottom: var(--spacing-lg);
    }

    .address-content-mobile {
        display: flex;
        flex-direction: column;
    }

    .school-address {
        font-size: 14px;
        color: var(--text-secondary);
        line-height: 1.6;
    }

    .social-icons-container {
        display: flex;
        justify-content: flex-start;
        gap: var(--spacing-lg);
    }

    .social-icon-mobile {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: transparent;
        color: var(--primary-color);
        border-radius: 50%;
        font-size: 24px;
        transition: all var(--transition-fast);
        text-decoration: none;
    }

    .social-icon-mobile:hover {
        color: var(--accent-color);
        transform: scale(1.15);
    }

    /* Sidebar Overlay */
    body.sidebar-open {
        overflow: hidden;
    }

    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 998;
    }

    .sidebar-overlay.show {
        display: block;
    }

    /* Hide CBSE badge on slider in mobile */
    .cbse-badge-small {
        display: block;
    }

    /* CBSE Affiliation Bar - Under Nav */
    .cbse-affiliation-bar {
        background: linear-gradient(90deg, #295192, #1d3574) !important;
        padding: 12px 16px !important;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15) !important;
        display: flex !important;
        visibility: visible !important;
        width: 100% !important;
        justify-content: center !important;
        z-index: 999 !important;
        position: relative !important;
    }

    .cbse-bar-content {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .cbse-bar-content img {
        width: 30px !important;
        height: 30px !important;
        max-width: 30px !important;
        max-height: 30px !important;
        object-fit: contain;
        flex-shrink: 0;
    }

    .cbse-bar-label {
        font-size: 0.7rem;
        font-weight: 700;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .cbse-bar-number {
        font-size: 1.1rem;
        font-weight: 800;
        color: #ffd700;
        white-space: nowrap;
    }

    @media (max-width: 768px) {
        .cbse-affiliation-bar {
            padding: 10px 12px;
        }

        .cbse-bar-content {
            gap: 10px;
        }

        .cbse-bar-content img {
            width: 25px !important;
            height: 25px !important;
            max-width: 25px !important;
            max-height: 25px !important;
        }

        .cbse-bar-label {
            font-size: 0.65rem;
        }

        .cbse-bar-number {
            font-size: 0.95rem;
        }
    }

    @media (max-width: 480px) {
        .cbse-affiliation-bar {
            padding: 8px 10px;
        }

        .cbse-bar-content {
            gap: 8px;
            flex-direction: column;
        }

        .cbse-bar-content img {
            width: 22px !important;
            height: 22px !important;
            max-width: 22px !important;
            max-height: 22px !important;
        }

        .cbse-bar-label {
            font-size: 0.6rem;
        }

        .cbse-bar-number {
            font-size: 0.85rem;
        }
    }
}

/* Hide mobile sidebar on desktop (screens larger than 768px) */
@media (min-width: 769px) {
    .mobile-sidebar,
    .mobile-sidebar.show,
    .mobile-menu-toggle,
    .sidebar-overlay {
        display: none !important;
    }
}

@media (max-width: 480px) {
    .logo-img {
        height: 40px;
    }

    .header-cta {
        gap: var(--spacing-sm);
    }

    .header-cta .btn {
        padding: var(--spacing-sm) var(--spacing-md);
        font-size: var(--font-size-small);
    }
}
</style>

<script>
// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const headerNav = document.getElementById('headerNav');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    // Helper function to close sidebar
    function closeSidebar() {
        mobileMenuToggle.classList.remove('active');
        headerNav.classList.remove('open');
        mobileSidebar.classList.remove('active');
        if (sidebarOverlay) sidebarOverlay.classList.remove('show');
        document.body.classList.remove('sidebar-open');
        setTimeout(() => mobileSidebar.classList.remove('show'), 300);
    }

    // Helper function to open sidebar
    function openSidebar() {
        mobileMenuToggle.classList.add('active');
        mobileSidebar.classList.add('show');
        if (sidebarOverlay) sidebarOverlay.classList.add('show');
        document.body.classList.add('sidebar-open');
        setTimeout(() => mobileSidebar.classList.add('active'), 10);
    }

    if (mobileMenuToggle && headerNav && mobileSidebar) {
        // Toggle menu on hamburger click
        mobileMenuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            if (mobileSidebar.classList.contains('show')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });

        // Close sidebar with close button
        if (sidebarCloseBtn) {
            sidebarCloseBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                closeSidebar();
            });
        }

        // Close sidebar when clicking on overlay
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeSidebar);
        }

        // Close menu when clicking on nav links (header)
        const navLinks = headerNav.querySelectorAll('a');
        navLinks.forEach(link => {
            // Don't close menu for dropdown parent links
            if (!link.parentElement.classList.contains('nav-item-dropdown')) {
                link.addEventListener('click', closeSidebar);
            }
        });

        // Handle sidebar dropdown menus
        const sidebarDropdownParents = mobileSidebar.querySelectorAll('.nav-item-dropdown-mobile');
        sidebarDropdownParents.forEach(parent => {
            const link = parent.querySelector('.nav-link-mobile');

            link.addEventListener('click', function(e) {
                e.preventDefault();
                parent.classList.toggle('open');
            });
        });

        // Close sidebar when clicking on sidebar links (but not dropdowns)
        const sidebarNavLinks = mobileSidebar.querySelectorAll('.sidebar-nav-list a');
        sidebarNavLinks.forEach(link => {
            if (!link.parentElement.classList.contains('nav-item-dropdown-mobile')) {
                link.addEventListener('click', closeSidebar);
            }
        });

        // Also close sidebar when clicking on dropdown items
        const sidebarDropdownItems = mobileSidebar.querySelectorAll('.dropdown-menu-mobile a');
        sidebarDropdownItems.forEach(link => {
            link.addEventListener('click', closeSidebar);
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.header') && !e.target.closest('.header-nav') && !e.target.closest('.mobile-sidebar')) {
                closeSidebar();
            }
        });

        // Hide CBSE badge on slider in mobile view
        function toggleCBSEBadge() {
            const cbseBadge = document.querySelector('.cbse-badge-small');
            if (cbseBadge) {
                if (window.innerWidth <= 768) {
                    cbseBadge.style.display = 'none';
                } else {
                    cbseBadge.style.display = 'block';
                }
            }
        }

        // Call on load and on resize
        toggleCBSEBadge();
        window.addEventListener('resize', toggleCBSEBadge);
    }

    // Update active nav link based on current section
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        sections.forEach(section => {
            const sectionId = section.getAttribute('id');
            const sectionTop = section.offsetTop - 200;
            const sectionBottom = sectionTop + section.offsetHeight;

            if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionBottom) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                });
                const activeLink = document.querySelector(`a[href="#${sectionId}"]`);
                if (activeLink) {
                    activeLink.classList.add('active');
                }
            }
        });
    });
});
</script>
