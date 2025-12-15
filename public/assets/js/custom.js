/**
 * Custom JavaScript for Desa Ajakkang Website
 */

(function() {
  "use strict";

  /* ===================================
     STRUKTUR ORGANISASI SWIPER
     =================================== */
  const strukturSlider = document.querySelector('.struktur-slider');
  
  if (strukturSlider && typeof Swiper !== 'undefined') {
    new Swiper('.struktur-slider', {
      loop: true,
      speed: 600,
      slidesPerView: 1,
      spaceBetween: 16,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        576: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 24,
        },
        992: {
          slidesPerView: 3,
          spaceBetween: 28,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 32,
        },
      },
    });
  }

})();

document.addEventListener('DOMContentLoaded', function() {
    const contactLink = document.querySelector('a[href="#contact"]');
    contactLink?.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' });
    });
});


/**
 * Custom JavaScript for Desa Ajakkang Website
 */

(function() {
  "use strict";

  /* ===================================
     STRUKTUR ORGANISASI SWIPER
     =================================== */
  document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.struktur-slider', {
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      spaceBetween: 20,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      },
    });
  });
  
  /* ===================================
     PETA WILAYAH SWIPER (PROFIL PAGE)
     =================================== */
  const petaSlider = document.querySelector('.peta-slider');
  
  if (petaSlider && typeof Swiper !== 'undefined') {
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
        640: {
          slidesPerView: 1
        },
        768: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 3
        },
      },
    });
  }

  /* ===================================
     SMOOTH SCROLL FOR CONTACT LINK
     =================================== */
  document.addEventListener('DOMContentLoaded', function() {
    const contactLink = document.querySelector('a[href="#contact"]');
    if (contactLink) {
      contactLink.addEventListener('click', function(e) {
        e.preventDefault();
        const contactSection = document.querySelector('#contact');
        if (contactSection) {
          contactSection.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    }
  });

})();