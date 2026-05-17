<!-- Sticky Floating Elements -->
<style>
/* Sticky Admission Banner */
.sticky-admission-banner {
    position: fixed;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    z-index: 999;
    animation: slideInLeft 0.5s ease;
}

.admission-banner {
    background: linear-gradient(45deg, #295192 0%, #BF3149 100%);
    color: white;
    padding: 16px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(41, 81, 146, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    writing-mode: vertical-rl;
    text-orientation: mixed;
    transform: rotate(180deg);
    min-width: auto;
    width: auto;
}

.admission-banner-text {
    font-size: 0.85rem;
    font-weight: 700;
    text-align: center;
    line-height: 1.3;
    white-space: nowrap;
    text-transform: uppercase;
}

.admission-banner-button {
    display: none;
}

.admission-banner:hover {
    background: linear-gradient(135deg, #1d3574 0%, #295192 100%);
    box-shadow: 0 6px 16px rgba(41, 81, 146, 0.5);
    padding-left: 18px;
}

/* WhatsApp Button */
.whatsapp-button {
    position: fixed;
    bottom: 80px;
    right: 20px;
    z-index: 1000;
    width: 60px;
    height: 60px;
    background-color: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
    transition: all 0.3s ease;
    animation: slideInUp 0.5s ease;
}

.whatsapp-button:hover {
    background-color: #20ba5c;
    box-shadow: 0 6px 16px rgba(37, 211, 102, 0.6);
    transform: scale(1.1);
}

.whatsapp-button i {
    color: white;
    font-size: 28px;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateY(-50%) translateX(-100px);
    }
    to {
        opacity: 1;
        transform: translateY(-50%) translateX(0);
    }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(100px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .sticky-admission-banner {
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }

    .admission-banner {
        padding: 12px 8px;
        min-width: auto;
    }

    .admission-banner-text {
        font-size: 0.8rem;
    }
}

    .whatsapp-button {
        bottom: 70px;
        right: 10px;
        width: 55px;
        height: 55px;
    }

    .whatsapp-button i {
        font-size: 24px;
    }
}

@media (max-width: 480px) {
    .sticky-admission-banner {
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }

    .admission-banner {
        padding: 12px 8px;
        min-width: auto;
    }

    .admission-banner-text {
        font-size: 0.75rem;
    }
}

    .whatsapp-button {
        width: 50px;
        height: 50px;
        bottom: 65px;
        right: 5px;
    }

    .whatsapp-button i {
        font-size: 20px;
    }
}
    }
}
</style>

<!-- Sticky Admission Banner -->
<div class="sticky-admission-banner">
    <button class="admission-banner" onclick="document.querySelector('[data-open-enquiry-modal]').click();" title="Click to apply for admissions 2026-27">
        <span class="admission-banner-text">Admissions | 2026-27</span>
    </button>
</div>

<!-- WhatsApp Chat Button -->
<a href="https://wa.me/917671003535?text=Hello%20Shantiniketan%20Vidyalaya%2C%20I%20would%20like%20to%20know%20more%20about%20admissions." 
   target="_blank" 
   rel="noopener noreferrer" 
   class="whatsapp-button" 
   title="Chat with us on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>
