<!-- Call to Action Section (Appears on all pages) -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <div class="cta-text">
                <h2>Begin Your Child's Journey to <span class="gradient-text">Excellence</span></h2>
            </div>
            <div class="cta-buttons">
                <button type="button" class="btn btn-accent" data-open-enquiry-modal>Schedule a Tour</button>
            </div>
        </div>
    </div>
</section>

<!-- Sticky Side Buttons (Appears on all pages) -->
<div class="sticky-buttons">
    <button type="button" class="sticky-btn sticky-btn-enquiry" data-open-enquiry-modal title="Enquire Now">
        <i class="fas fa-envelope"></i>
        <span class="sticky-btn-label">Enquiry</span>
    </button>
    <a href="tel:+917671003535" class="sticky-btn sticky-btn-call">
        <i class="fas fa-phone"></i>
        <span class="sticky-btn-label">Call</span>
    </a>
</div>

<!-- Footer -->
<footer class="footer" id="contact">
    <div class="container">
        <div class="grid grid-3">
            <!-- Column 1: About -->
            <div class="footer-column">
                <div class="footer-logo">
                    <img src="/assets/images/footer-logo.webp" alt="School Logo" class="footer-logo-img">
                </div>
                <p class="footer-description">
                    A premier educational institution dedicated to academic excellence and holistic development of students through innovative teaching and world-class facilities.
                </p>
                <div class="footer-socials">
                    <a href="https://facebook.com" target="_blank" class="social-link" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="social-link" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://youtube.com" target="_blank" class="social-link" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Navigation Links -->
            <div class="footer-column">
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="index">Home</a></li>
                    <li><a href="the-school">The School</a></li>
                    <li><a href="infrastructure">Infrastructure</a></li>
                    <li><a href="admissions">Admissions</a></li>
                    <li><a href="index#blogs">Blog</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact Info -->
            <div class="footer-column">
                <h4 class="footer-heading">Contact Info</h4>
                <div class="footer-contact">
                    <div class="contact-item">
                        <span class="contact-label">Address:</span>
                        <span class="contact-value">Shantiniketan Vidyalaya<br>Chanakyapuri, Near Upparpalli Village, Shamirpet, Hyderabad - 500078, Telangana, India</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-label">Phone:</span>
                        <a href="tel:+917671003535" class="contact-value">(+91) 7671003535</a>
                    </div>
                    <div class="contact-item">
                        <span class="contact-label">Email:</span>
                        <a href="mailto:shantiniketan99@gmail.com" class="contact-value">shantiniketan99@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
        <div class="container text-center">
            <p>&copy; <span id="year"><?php echo date('Y'); ?></span> Shantiniketan Vidyalaya. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Mobile Admissions Banner (Above buttons) -->
<div class="mobile-admissions-banner">
    <a href="/admissions" class="mobile-admissions-link">
        <i class="fas fa-graduation-cap"></i>
        <span>Admissions 2026-27</span>
    </a>
</div>

<!-- Mobile-Only Flat Buttons (Bottom of page on mobile) -->
<div class="mobile-action-buttons">
    <button type="button" class="mobile-action-btn mobile-action-enquiry" data-open-enquiry-modal>
        <i class="fas fa-envelope"></i>
        <span>Enquire</span>
    </button>
    <a href="tel:+917671003535" class="mobile-action-btn mobile-action-call">
        <i class="fas fa-phone"></i>
        <span>Call us</span>
    </a>
</div>

<style>
/* Mobile Admissions Banner */
.mobile-admissions-banner {
    display: none;
}

/* Call to Action Section */
.cta-section {
    background: linear-gradient(135deg, #f9fafb 0%, #f5f7fa 100%);
    padding: 30px 0;
    margin-bottom: 0;
    border-top: 1px solid rgba(41, 81, 146, 0.1);
    border-bottom: 1px solid rgba(41, 81, 146, 0.1);
}

.cta-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 40px;
}

.cta-text h2 {
    color: var(--primary-color);
    font-size: 2rem;
    font-weight: 800;
    margin: 0;
    line-height: 1.2;
}

.cta-buttons {
    flex-shrink: 0;
}

.cta-buttons .btn {
    white-space: nowrap;
    padding: 12px 32px;
    font-size: 1rem;
}

/* Sticky Buttons */
.sticky-buttons {
    display: flex;
    position: fixed;
    right: 20px;
    bottom: 30px;
    z-index: 90;
    gap: 15px;
    flex-direction: column;
}

.sticky-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    font-size: 20px;
    position: relative;
    color: white !important;
}

.sticky-btn i {
    color: white !important;
    opacity: 1 !important;
    display: flex;
}

.sticky-btn-label {
    display: none;
    position: absolute;
    right: 60px;
    background: rgba(0,0,0,0.8);
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 0.85rem;
    font-weight: 600;
    white-space: nowrap;
    top: 50%;
    transform: translateY(-50%);
}

.sticky-btn-enquiry {
    background: var(--accent-color);
    color: white;
}

.sticky-btn-enquiry:hover {
    background: var(--accent-color);
    color: white;
}

.sticky-btn-enquiry:hover i {
    color: white !important;
}

.sticky-btn-call {
    background: var(--primary-color);
    color: white;
}

.sticky-btn-call:hover {
    background: var(--primary-color);
    color: white;
}

.sticky-btn-call:hover i {
    color: white !important;
}

.sticky-buttons {
    display: flex;
}

@media (max-width: 767px) {
    .sticky-btn-label {
        display: none;
    }
}

/* Video Container Styles */
.video-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(41, 81, 146, 0.15);
    margin-top: 40px;
}

.school-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    border-radius: 12px;
}

.footer {
    background-color: var(--primary-color);
    color: var(--white);
    padding: var(--spacing-xl) 0 0;
}

.footer .container {
    padding-left: var(--container-padding);
    padding-right: var(--container-padding);
}

.footer-column {
    padding: var(--spacing-xl) 0;
}

.footer-logo {
    display: flex;
    align-items: center;
    margin-bottom: var(--spacing-lg);
}

.footer-logo-img {
    height: 50px;
    width: auto;
}

.footer-logo-text {
    font-size: var(--font-size-h5);
    color: var(--white);
    margin: 0;
}

.footer-description {
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: var(--spacing-lg);
    line-height: var(--line-height-body);
}

.footer-heading {
    color: var(--white);
    margin-bottom: var(--spacing-md);
    font-size: var(--font-size-h5);
}

/* Social Links */
.footer-socials {
    display: flex;
    gap: var(--spacing-sm);
}

.social-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    color: var(--white);
    transition: all var(--transition-fast);
    font-size: 1.2rem;
}

.social-link:hover {
    background-color: rgba(255, 255, 255, 0.3);
    transform: translateY(-3px);
}

/* Footer Links */
.footer-links {
    list-style: none;
}

.footer-links li {
    margin-bottom: var(--spacing-md);
}

.footer-links a {
    color: rgba(255, 255, 255, 0.8);
    font-size: 17px;
    font-weight: 500;
    transition: color var(--transition-fast);
}

.footer-links a:hover {
    color: var(--accent-color);
}

/* Contact Info */
.footer-contact {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-lg);
}

.contact-item {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-xs);
}

.contact-label {
    font-weight: var(--font-weight-semibold);
    color: var(--white);
    font-size: var(--font-size-small);
}

.contact-value {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.5;
}

.contact-value a {
    color: var(--accent-color);
}

.contact-value a:hover {
    color: var(--accent-light);
}

/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    padding: var(--spacing-md) 0;
    margin-top: var(--spacing-lg);
    text-align: center;
}

.footer-bottom .container {
    padding-left: var(--container-padding);
    padding-right: var(--container-padding);
}

.footer-bottom p {
    color: rgba(255, 255, 255, 0.7);
    margin: 0;
    font-size: var(--font-size-small);
}

.footer-bottom a {
    color: var(--accent-color);
}

.footer-bottom a:hover {
    color: var(--accent-light);
}

/* Responsive */
@media (max-width: 768px) {
    .footer .container {
        padding-left: var(--container-padding) !important;
        padding-right: var(--container-padding) !important;
    }

    .footer-column {
        padding: var(--spacing-xl) 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .footer-column:last-child {
        border-bottom: none;
    }

    .footer {
        padding: var(--spacing-xxl) 0 0;
    }

    .footer-bottom .container {
        padding-left: var(--container-padding) !important;
        padding-right: var(--container-padding) !important;
    }

    /* CTA Section Mobile */
    .cta-section {
        padding: 20px var(--container-padding) !important;
    }

    .cta-content {
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }

    .cta-text h2 {
        font-size: 1.5rem;
        white-space: normal;
        line-height: 1.3;
    }

    .cta-buttons {
        width: 100%;
    }

    .cta-buttons .btn {
        white-space: nowrap;
        padding: 10px 24px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .footer .container {
        padding-left: var(--container-padding) !important;
        padding-right: var(--container-padding) !important;
    }

    .footer-bottom .container {
        padding-left: var(--container-padding) !important;
        padding-right: var(--container-padding) !important;
    }

    .footer-logo-text {
        font-size: 1rem;
    }

    .footer-socials {
        gap: var(--spacing-sm);
    }

    .social-link {
        width: 35px;
        height: 35px;
        font-size: 1rem;
    }

    .footer-heading {
        font-size: 1.1rem;
    }

    /* CTA Section Extra Mobile */
    .cta-section {
        padding: 20px var(--container-padding) !important;
    }

    .cta-text h2 {
        font-size: 1.2rem;
    }

    .sticky-btn-label {
        font-size: 0.75rem;
    }
}

/* Button styling - Reset default button styles and use class-based styling */
.cta-buttons button,
.sticky-btn[type="button"],
.mobile-action-btn[type="button"] {
    border: none;
    font-family: inherit;
    cursor: pointer;
}

.cta-buttons button.btn {
    /* .btn class handles all the styling */
}

.sticky-btn[type="button"] {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    border: none;
    font-family: inherit;
    cursor: pointer;
}
</style>
