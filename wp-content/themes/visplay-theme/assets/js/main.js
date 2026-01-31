/**
 * Main JavaScript File
 * 
 * @package Glochar_Theme
 */

(function ($) {
  'use strict';

  // Wait for DOM to be ready
  $(document).ready(function () {

    // ==========================================
    // MOBILE MENU TOGGLE
    // ==========================================
    $('.menu-toggle').on('click', function () {
      $(this).toggleClass('active');
      $('.nav-menu').toggleClass('active');
      $('body').toggleClass('menu-open');
    });

    // Close menu when clicking outside
    $(document).on('click', function (event) {
      if (!$(event.target).closest('.main-navigation').length) {
        $('.menu-toggle').removeClass('active');
        $('.nav-menu').removeClass('active');
        $('body').removeClass('menu-open');
      }
    });

    // ==========================================
    // HEADER SCROLL EFFECT
    // ==========================================
    let lastScroll = 0;
    const header = $('.site-header');

    $(window).on('scroll', function () {
      const currentScroll = $(this).scrollTop();

      // Add shadow on scroll
      if (currentScroll > 50) {
        header.addClass('scrolled');
      } else {
        header.removeClass('scrolled');
      }

      // Hide/show header on scroll
      if (currentScroll > lastScroll && currentScroll > 100) {
        header.addClass('header-hidden');
      } else {
        header.removeClass('header-hidden');
      }

      lastScroll = currentScroll;
    });

    // ==========================================
    // SMOOTH SCROLLING
    // ==========================================
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function (event) {
      if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
        location.hostname === this.hostname) {

        let target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

        if (target.length) {
          event.preventDefault();

          $('html, body').animate({
            scrollTop: target.offset().top - 80
          }, 800, 'swing');

          // Close mobile menu if open
          $('.menu-toggle').removeClass('active');
          $('.nav-menu').removeClass('active');
          $('body').removeClass('menu-open');
        }
      }
    });

    // ==========================================
    // LAZY LOADING IMAGES
    // ==========================================
    if ('IntersectionObserver' in window) {
      const imageObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.classList.add('loaded');
            imageObserver.unobserve(img);
          }
        });
      });

      document.querySelectorAll('img[data-src]').forEach(function (img) {
        imageObserver.observe(img);
      });
    }

    // ==========================================
    // FADE IN ANIMATION ON SCROLL
    // ==========================================
    function fadeInOnScroll() {
      $('.fade-in').each(function () {
        const elementTop = $(this).offset().top;
        const elementBottom = elementTop + $(this).outerHeight();
        const viewportTop = $(window).scrollTop();
        const viewportBottom = viewportTop + $(window).height();

        if (elementBottom > viewportTop && elementTop < viewportBottom) {
          $(this).addClass('visible');
        }
      });
    }

    // Run on load and scroll
    fadeInOnScroll();
    $(window).on('scroll', fadeInOnScroll);

    // ==========================================
    // CARD HOVER EFFECTS
    // ==========================================
    $('.story-card, .project-card, .system-card').hover(
      function () {
        $(this).addClass('hovered');
      },
      function () {
        $(this).removeClass('hovered');
      }
    );

    // ==========================================
    // AJAX LOAD MORE (Optional)
    // ==========================================
    let page = 2;
    let loading = false;

    $('.load-more-btn').on('click', function (e) {
      e.preventDefault();

      if (loading) return;

      loading = true;
      const $button = $(this);
      const postType = $button.data('post-type') || 'post';
      const container = $button.data('container') || '.posts-grid';

      $button.text('Loading...');

      $.ajax({
        url: glochar_ajax.ajax_url,
        type: 'POST',
        data: {
          action: 'load_more_posts',
          nonce: glochar_ajax.nonce,
          page: page,
          post_type: postType
        },
        success: function (response) {
          if (response.success && response.data) {
            $(container).append(response.data);
            page++;
            $button.text('Load More');

            // Run fade in animation on new items
            fadeInOnScroll();
          } else {
            $button.text('No more posts').prop('disabled', true);
          }
          loading = false;
        },
        error: function () {
          $button.text('Error loading posts');
          loading = false;
        }
      });
    });

    // ==========================================
    // FORM VALIDATION (Basic)
    // ==========================================
    $('form.validate').on('submit', function (e) {
      let isValid = true;

      $(this).find('[required]').each(function () {
        if (!$(this).val()) {
          isValid = false;
          $(this).addClass('error');
        } else {
          $(this).removeClass('error');
        }
      });

      if (!isValid) {
        e.preventDefault();
        alert('Please fill in all required fields.');
      }
    });

    // Remove error class on input
    $('input, textarea, select').on('focus', function () {
      $(this).removeClass('error');
    });

    // ==========================================
    // PARALLAX EFFECT (Optional)
    // ==========================================
    $(window).on('scroll', function () {
      const scrolled = $(window).scrollTop();
      $('.parallax').css('transform', 'translateY(' + (scrolled * 0.5) + 'px)');
    });

    // ==========================================
    // COOKIE CONSENT (Optional)
    // ==========================================
    if (!localStorage.getItem('cookieConsent')) {
      // Show cookie banner
      $('body').append('<div class="cookie-banner">We use cookies to improve your experience. <button class="accept-cookies">Accept</button></div>');

      $('.accept-cookies').on('click', function () {
        localStorage.setItem('cookieConsent', 'true');
        $('.cookie-banner').fadeOut();
      });
    }

    // ==========================================
    // BACK TO TOP BUTTON
    // ==========================================
    const $backToTop = $('<button class="back-to-top" aria-label="Back to top">↑</button>');
    $('body').append($backToTop);

    $(window).on('scroll', function () {
      if ($(this).scrollTop() > 300) {
        $backToTop.addClass('visible');
      } else {
        $backToTop.removeClass('visible');
      }
    });

    $backToTop.on('click', function () {
      $('html, body').animate({ scrollTop: 0 }, 600);
    });

  }); // End document ready

})(jQuery);
