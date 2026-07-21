import './bootstrap';

import Alpine from 'alpinejs';
import AOS from 'aos';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';

/* ============================================================
   Alpine.js
   ============================================================ */
window.Alpine = Alpine;
Alpine.start();

/* ============================================================
   AOS — حركات عند التمرير
   ============================================================ */
AOS.init({
    duration: 600,
    once: true,
    offset: 30,
    easing: 'ease-out-cubic',
});

/* ============================================================
   Typewriter Effect
   ============================================================ */
function initTypewriter() {
    const el = document.querySelector('.typewriter-text');
    if (!el) return;

    const phrases = el.dataset.phrases ? JSON.parse(el.dataset.phrases) : [];
    if (!phrases.length) return;

    let phraseIndex = 0;
    let charIndex   = 0;
    let isDeleting  = false;
    let isPaused    = false;

    function type() {
        const current = phrases[phraseIndex];

        if (isDeleting) {
            el.textContent = current.substring(0, charIndex - 1);
            charIndex--;
        } else {
            el.textContent = current.substring(0, charIndex + 1);
            charIndex++;
        }

        let delay = isDeleting ? 60 : 100;

        if (!isDeleting && charIndex === current.length) {
            // وقفة قبل الحذف
            if (isPaused) {
                isPaused  = false;
                isDeleting = true;
                delay = 1800;
            } else {
                isPaused = true;
                delay = 50;
            }
        } else if (isDeleting && charIndex === 0) {
            isDeleting  = false;
            phraseIndex = (phraseIndex + 1) % phrases.length;
            delay = 400;
        }

        setTimeout(type, delay);
    }

    type();
}

/* ============================================================
   Hero — عناصر الكود العائمة (تولّد بـ JS)
   ============================================================ */
function initFloatingCode() {
    const container = document.querySelector('.hero-floating-container');
    if (!container) return;

    const snippets = [
        'const family = new TechnoFamily();',
        'import { love } from "@family/core";',
        'app.use(Education);',
        '{ quality: "life" }',
        '<App parents={true} />',
        'await grow(children);',
        'function buildFamily() {}',
        '// رؤية 2030 🚀',
        'const future = await tech();',
        'export default Family;',
    ];

    snippets.forEach((text, i) => {
        const el = document.createElement('div');
        el.classList.add('floating-code', `fc-${(i % 5) + 1}`);
        el.textContent = text;
        // توزيع عشوائي ضمن نطاقات آمنة
        el.style.top  = `${10 + (i * 8) % 75}%`;
        el.style.left = i % 2 === 0
            ? `${2 + (i * 3) % 15}%`
            : 'auto';
        el.style.right = i % 2 !== 0
            ? `${2 + (i * 4) % 15}%`
            : 'auto';
        el.style.animationDelay = `${(i * 0.7).toFixed(1)}s`;
        container.appendChild(el);
    });
}

/* ============================================================
   Swiper — الهيرو (إن وُجد slider)
   ============================================================ */
function initHeroSwiper() {
    const el = document.querySelector('.hero-swiper');
    if (!el) return;

    new Swiper(el, {
        modules: [Navigation, Pagination, Autoplay, EffectFade],
        loop: true,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        speed: 900,
        autoplay: { delay: 6000, disableOnInteraction: false },
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
   Swiper — كاروسيل البرامج
   ============================================================ */
function initProgramsSwiper() {
    const el = document.querySelector('.programs-swiper');
    if (!el) return;

    new Swiper(el, {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        spaceBetween: 24,
        loop: el.querySelectorAll('.swiper-slide').length > 3,
        grabCursor: true,
        speed: 600,
        autoplay: { delay: 5000, disableOnInteraction: false, pauseOnMouseEnter: true },
        pagination: {
            el: '.programs-pagination',
            clickable: true,
            bulletClass: 'programs-bullet',
            bulletActiveClass: 'programs-bullet-active',
            renderBullet: (_, cn) => `<span class="${cn}"></span>`,
        },
        navigation: { nextEl: '.programs-next', prevEl: '.programs-prev' },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
}

/* ============================================================
   تبويبات السنوات في قسم البرامج
   ============================================================ */
function initYearTabs() {
    const tabs  = document.querySelectorAll('.year-tab');
    const cards = document.querySelectorAll('.program-card-wrap');
    if (!tabs.length || !cards.length) return;

    function filterCards(year) {
        cards.forEach(card => {
            if (year === 'all' || card.dataset.year === year) {
                card.style.display = '';
                card.style.animation = 'fade-in-up 0.4s ease both';
            } else {
                card.style.display = 'none';
            }
        });
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            filterCards(tab.dataset.year);
        });
    });

    // الافتراضي: السنة الأولى
    const firstTab = document.querySelector('.year-tab');
    if (firstTab) {
        firstTab.classList.add('active');
        filterCards(firstTab.dataset.year);
    }
}

/* ============================================================
   العدّادات المتحركة (Counters)
   ============================================================ */
function initCounters() {
    const counters = document.querySelectorAll('.counter[data-target]');
    if (!counters.length) return;

    const animate = (el) => {
        const target   = parseInt(el.dataset.target, 10) || 0;
        const duration = 1600;
        let startTime  = null;

        const step = (now) => {
            if (!startTime) startTime = now;
            const progress = Math.min((now - startTime) / duration, 1);
            const eased    = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
            el.textContent = Math.floor(eased * target).toLocaleString('en-US');
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = target.toLocaleString('en-US');
        };

        requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver(
        entries => entries.forEach(e => {
            if (e.isIntersecting) { animate(e.target); observer.unobserve(e.target); }
        }),
        { threshold: 0.4 }
    );

    counters.forEach(c => observer.observe(c));
}

/* ============================================================
   Scroll to section بنعومة (للروابط #anchor في الهيدر)
   ============================================================ */
function initSmoothAnchors() {
    document.querySelectorAll('a[href*="#"]').forEach(link => {
        link.addEventListener('click', e => {
            const hash = link.getAttribute('href').split('#')[1];
            if (!hash) return;
            const target = document.getElementById(hash);
            if (!target) return;
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            // إغلاق قائمة الجوال لو مفتوحة
            const alpineEl = document.querySelector('[x-data]');
            if (alpineEl && alpineEl._x_dataStack) {
                Alpine.store && (alpineEl._x_dataStack[0].mobileOpen = false);
            }
        });
    });
}

/* ============================================================
   تهيئة عند تحميل الصفحة
   ============================================================ */
document.addEventListener('DOMContentLoaded', () => {
    initHeroSwiper();
    initProgramsSwiper();
    initCounters();
    initTypewriter();
    initFloatingCode();
    initYearTabs();
    initSmoothAnchors();
});
