// Modern Enhanced Slider with Smooth Animations
class SchoolSlider {
    constructor(sliderElement) {
        this.slider = sliderElement;
        this.container = sliderElement.parentElement; // Get the container for buttons and controls
        this.slides = this.slider.querySelectorAll('.slider-slide');
        this.dots = this.container.querySelectorAll('.slider-dot');
        this.prevBtn = this.container.querySelector('.slider-prev');
        this.nextBtn = this.container.querySelector('.slider-next');
        this.currentIndex = 0;
        this.autoplayInterval = null;
        this.autoplayDelay = 6000; // 6 seconds
        this.isTransitioning = false;
        this.transitionDuration = 600; // ms

        this.init();
    }

    init() {
        if (this.slides.length === 0) return;

        // Event listeners
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => this.prev());
        }
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => this.next());
        }

        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.goToSlide(index));
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prev();
            if (e.key === 'ArrowRight') this.next();
        });

        // Touch/Swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        this.slider.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, false);

        this.slider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe(touchStartX, touchEndX);
        }, false);

        // Start autoplay
        this.startAutoplay();

        // Pause autoplay on hover
        this.container.addEventListener('mouseenter', () => this.stopAutoplay());
        this.container.addEventListener('mouseleave', () => this.startAutoplay());

        // Update display
        this.updateSlider();
    }

    goToSlide(index) {
        if (this.isTransitioning || index === this.currentIndex) return;
        this.currentIndex = index;
        this.updateSlider();
        this.resetAutoplay();
    }

    next() {
        if (this.isTransitioning) return;
        this.currentIndex = (this.currentIndex + 1) % this.slides.length;
        this.updateSlider();
        this.resetAutoplay();
    }

    prev() {
        if (this.isTransitioning) return;
        this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
        this.updateSlider();
        this.resetAutoplay();
    }

    handleSwipe(startX, endX) {
        if (this.isTransitioning) return;
        const diff = startX - endX;
        const threshold = 50;

        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                this.next();
            } else {
                this.prev();
            }
        }
    }

    updateSlider() {
        this.isTransitioning = true;

        // Fade out previous slide content
        const previousSlide = this.slides[Array.from(this.slides).findIndex(s => s.classList.contains('active'))];
        if (previousSlide && previousSlide !== this.slides[this.currentIndex]) {
            previousSlide.classList.remove('active');
        }

        // Fade in current slide
        setTimeout(() => {
            this.slides.forEach((slide, index) => {
                if (index === this.currentIndex) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });

            // Update dots with smooth animation
            this.dots.forEach((dot, index) => {
                if (index === this.currentIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });

            setTimeout(() => {
                this.isTransitioning = false;
            }, this.transitionDuration);
        }, 50);
    }

    startAutoplay() {
        this.autoplayInterval = setInterval(() => this.next(), this.autoplayDelay);
    }

    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
        }
    }

    resetAutoplay() {
        this.stopAutoplay();
        this.startAutoplay();
    }
}

// Initialize slider when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    const sliderElement = document.getElementById('heroSlider');
    if (sliderElement) {
        new SchoolSlider(sliderElement);
    }
});
