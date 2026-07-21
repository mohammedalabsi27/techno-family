import './bootstrap';

import Alpine from 'alpinejs';
import AOS from 'aos';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade, EffectCoverflow } from 'swiper/modules';

/* ============================================================
   Alpine.js — التفاعلات البسيطة (قائمة الجوال، الهيدر)
   ============================================================ */
window.Alpine = Alpine;
Alpine.start();

/* ============================================================
   AOS — حركات عند التمرير
   ============================================================ */
AOS.init({
    duration: 500,
    once: true,
    offset: 20,
    easing: 'ease-out-cubic',
});

/* ============================================================
   Swiper — سلايدر الهيرو في الصفحة الرئيسية
   ============================================================ */
function initHeroSwiper() {
    const el = document.querySelector('.hero-swiper');
    if (!el) return;

    // eslint-disable-next-line no-new
    new Swiper(el, {
        modules: [Navigation, Pagination, Autoplay, EffectFade],
        loop: true,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        speed: 900,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.hero-swiper .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.hero-swiper .swiper-button-next',
            prevEl: '.hero-swiper .swiper-button-prev',
        },
    });
}

/* ============================================================
   Swiper — كاروسيل البرامج في الصفحة الرئيسية
   ============================================================ */
function initProgramsSwiper() {
    const el = document.querySelector('.programs-swiper');
    if (!el) return;

    // eslint-disable-next-line no-new
    new Swiper(el, {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        spaceBetween: 24,
        loop: el.querySelectorAll('.swiper-slide').length > 3,
        grabCursor: true,
        speed: 600,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: '.programs-pagination',
            clickable: true,
            bulletClass: 'programs-bullet',
            bulletActiveClass: 'programs-bullet-active',
            renderBullet: (index, className) =>
                `<span class="${className}"></span>`,
        },
        navigation: {
            nextEl: '.programs-next',
            prevEl: '.programs-prev',
        },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
}

/* ============================================================
   Swiper — سلايدر «الأثر المتوقع» ثلاثي الأبعاد (Coverflow)
   ============================================================ */
function initImpactSwiper() {
    const el = document.querySelector('.impact-swiper');
    if (!el) return;

    const slidesCount = el.querySelectorAll('.swiper-slide').length;

    // eslint-disable-next-line no-new
    new Swiper(el, {
        modules: [Navigation, Pagination, Autoplay, EffectCoverflow],
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        loop: slidesCount > 3,
        speed: 750,
        slidesPerView: 1.35,
        coverflowEffect: {
            rotate: 34,
            stretch: 0,
            depth: 160,
            modifier: 1,
            slideShadows: true,
        },
        autoplay: {
            delay: 4200,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: '.impact-pagination',
            clickable: true,
            bulletClass: 'impact-bullet',
            bulletActiveClass: 'impact-bullet-active',
            renderBullet: (index, className) =>
                `<span class="${className}"></span>`,
        },
        navigation: {
            nextEl: '.impact-next',
            prevEl: '.impact-prev',
        },
        breakpoints: {
            640: { slidesPerView: 2.2 },
            1024: { slidesPerView: 3 },
        },
    });
}

/* ============================================================
   العدّادات المتحركة (Counters)
   ============================================================ */
function initCounters() {
    const counters = document.querySelectorAll('.counter[data-target]');
    if (!counters.length) return;

    const animate = (elParent) => {
        const target = parseInt(elParent.dataset.target, 10) || 0;
        const duration = 1400;
        let startTime = null;

        const step = (now) => {
            if (!startTime) startTime = now;
            const progress = Math.min((now - startTime) / duration, 1);
            // easeOutExpo
            const eased = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
            elParent.textContent = Math.floor(eased * target).toLocaleString('en-US');
            if (progress < 1) requestAnimationFrame(step);
            else elParent.textContent = target.toLocaleString('en-US');
        };
        requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animate(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.4 }
    );

    counters.forEach((c) => observer.observe(c));
}

/* ============================================================
   التهيئة عند تحميل الصفحة
   ============================================================ */
document.addEventListener('DOMContentLoaded', () => {
    initHeroSwiper();
    initProgramsSwiper();
    initImpactSwiper();
    initCounters();
});
