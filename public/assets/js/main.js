(function () {
  "use strict";

  /* ===================================
     SCROLL EFFECTS
     =================================== */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');

    if (!selectHeader) return;
    if (
      !selectHeader.classList.contains('scroll-up-sticky') &&
      !selectHeader.classList.contains('sticky-top') &&
      !selectHeader.classList.contains('fixed-top')
    )
      return;

    window.scrollY > 100
      ? selectBody.classList.add('scrolled')
      : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /* ===================================
     MOBILE NAVIGATION
     =================================== */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToggle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }

  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', mobileNavToggle);
  }

  // Hide mobile nav on same-page/hash links
  document.querySelectorAll('#navmenu a').forEach((navlink) => {
    navlink.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToggle();
      }
    });
  });

  // Toggle mobile nav dropdowns
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach((toggle) => {
    toggle.addEventListener('click', function (e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /* ===================================
     PRELOADER
     =================================== */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /* ===================================
     COUNTER ANIMATION
     =================================== */
  const counters = document.querySelectorAll('.counter');
  const speed = 150;

  const animateCounter = (counter) => {
    const target = +counter.getAttribute('data-target');
    const duration = Math.min(2000, (target * speed) / 100);
    const startTime = performance.now();

    const updateCount = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const currentValue = Math.floor(progress * target);
      counter.textContent = currentValue;

      if (progress < 1) {
        requestAnimationFrame(updateCount);
      } else {
        counter.textContent = target;
      }
    };

    requestAnimationFrame(updateCount);
  };

  // Use IntersectionObserver to trigger animation only when in view
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.1 }
  );

  counters.forEach((counter) => {
    observer.observe(counter);
  });

  /* ===================================
     SCROLL TO TOP BUTTON
     =================================== */
  const scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100
        ? scrollTop.classList.add('active')
        : scrollTop.classList.remove('active');
    }
  }

  if (scrollTop) {
    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
    });
  }

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /* ===================================
     ANIMATION ON SCROLL (AOS)
     =================================== */
  function aosInit() {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        mirror: false,
      });
    }
  }
  window.addEventListener('load', aosInit);

  /* ===================================
     LIGHTBOX (GLIGHTBOX)
     =================================== */
  if (typeof GLightbox !== 'undefined') {
    GLightbox({
      selector: '.glightbox',
    });
  }

  /* ===================================
     HASH LINK SCROLLING
     =================================== */
  window.addEventListener('load', function () {
    if (window.location.hash) {
      const section = document.querySelector(window.location.hash);
      if (section) {
        setTimeout(() => {
          const scrollMarginTop = parseInt(
            getComputedStyle(section).scrollMarginTop || '0',
            10
          );
          window.scrollTo({
            top: section.offsetTop - scrollMarginTop,
            behavior: 'smooth',
          });
        }, 100);
      }
    }
  });

  /* ===================================
     NAVMENU SCROLLSPY
     =================================== */
  const navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    const position = window.scrollY + 200;

    navmenulinks.forEach((link) => {
      if (!link.hash) return;
      const section = document.querySelector(link.hash);
      if (!section) return;

      if (
        position >= section.offsetTop &&
        position <= section.offsetTop + section.offsetHeight
      ) {
        document.querySelectorAll('.navmenu a.active').forEach((el) => {
          el.classList.remove('active');
        });
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  }

  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

  /* ===================================
     TYPING ANIMATION
     =================================== */
  const textElement = document.getElementById('typing-text');
  if (textElement) {
    const fullText = 'DESA AJAKKANG';
    let isDeleting = false;
    let charIndex = 0;
    let delay = 150;

    function type() {
      if (isDeleting) {
        textElement.textContent = fullText.substring(0, charIndex);
        charIndex--;

        if (charIndex < 0) {
          isDeleting = false;
          setTimeout(type, 300);
          return;
        }
        delay = 50;
      } else {
        textElement.textContent = fullText.substring(0, charIndex + 1);
        charIndex++;

        if (charIndex === fullText.length) {
          isDeleting = true;
          delay = 1500;
        } else {
          delay = 150;
        }
      }

      setTimeout(type, delay);
    }

    type();
  }

  /* ===================================
     STRUKTUR ORGANISASI & PETA WILAYAH SWIPER
     =================================== */
  document.addEventListener('DOMContentLoaded', function () {
    // Struktur Organisasi Slider
    if (
      document.querySelector('.struktur-slider') &&
      typeof Swiper !== 'undefined'
    ) {
      new Swiper('.struktur-slider', {
        loop: true,
        speed: 600,
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          576: { slidesPerView: 2, spaceBetween: 20 },
          768: { slidesPerView: 3, spaceBetween: 30 },
          1024: { slidesPerView: 4, spaceBetween: 30 },
        },
      });
    }

    // Peta Wilayah Slider (Profil Page)
    if (
      document.querySelector('.peta-slider') &&
      typeof Swiper !== 'undefined'
    ) {
      new Swiper('.peta-slider', {
        loop: true,
        speed: 600,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          640: { slidesPerView: 1 },
          768: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
        },
      });
    }

    // Smooth scroll for contact link
    const contactLink = document.querySelector('a[href="#contact"]');
    if (contactLink) {
      contactLink.addEventListener('click', function (e) {
        e.preventDefault();
        const contactSection = document.querySelector('#contact');
        if (contactSection) {
          contactSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start',
          });
        }
      });
    }
  });
})();