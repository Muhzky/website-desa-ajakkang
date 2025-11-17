(function() {
  "use strict";

  /* ===================================
     SCROLL EFFECTS
     =================================== */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    
    if (!selectHeader) return;
    if (!selectHeader.classList.contains('scroll-up-sticky') && 
        !selectHeader.classList.contains('sticky-top') && 
        !selectHeader.classList.contains('fixed-top')) return;
    
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /* ===================================
     MOBILE NAVIGATION
     =================================== */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }

  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
  }

  // Hide mobile nav on same-page/hash links
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });
  });

  // Toggle mobile nav dropdowns
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
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
    const duration = Math.min(2000, target * speed / 100);
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

    // Counter Animation
    // const counters = document.querySelectorAll('.counter');
    // const speed = 200;

    // const animateCounters = () => {
    //   counters.forEach(counter => {
    //     const updateCount = () => {
    //       const target = +counter.getAttribute('data-target');
    //       const count = +counter.innerText;
    //       const inc = target / speed;

    //       if (count < target) {
    //         counter.innerText = Math.ceil(count + inc);
    //         setTimeout(updateCount, 1);
    //       } else {
    //         counter.innerText = target;
    //       }
    //     };
    //     updateCount();
    //   });
    // };


  };

  // IntersectionObserver for counter animation
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  counters.forEach(counter => {
    observer.observe(counter);
  });

  /* ===================================
     SCROLL TO TOP BUTTON
     =================================== */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }

  if (scrollTop) {
    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
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
        mirror: false
      });
    }
  }
  window.addEventListener('load', aosInit);

  /* ===================================
     LIGHTBOX (GLIGHTBOX)
     =================================== */
  if (typeof GLightbox !== 'undefined') {
    const glightbox = GLightbox({
      selector: '.glightbox'
    });
  }

  /* ===================================
     HASH LINK SCROLLING
     =================================== */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /* ===================================
     NAVMENU SCROLLSPY
     =================================== */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      
      let position = window.scrollY + 200;
      
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
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
    const fullText = "DESA AJAKKANG";
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

})();