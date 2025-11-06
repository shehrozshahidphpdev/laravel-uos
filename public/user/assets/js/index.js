// Hero Swiper Script
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  centeredSlides: true,
  speed: 1000,
  loop: true, // 🔁 Infinite loop
  autoplay: {
    delay: 6000, // 6 seconds per slide
    disableOnInteraction: false, // Keeps autoplay running even after user interacts
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// news cards swiper script
var newsSwiper = new Swiper(".news-swiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true, // 🔁 Infinite scroll
  speed: 800, // Smooth transition speed
  autoplay: {
    delay: 2500, // Auto slide every 2.5s
    disableOnInteraction: false, // Keeps autoplay running after clicks
  },
  navigation: {
    nextEl: ".news-btns-group button:last-child",
    prevEl: ".news-btns-group button:first-child",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 25,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
  },
});

// 🖱️ Pause autoplay when hovering
const swiperContainer = document.querySelector(".news-swiper");

swiperContainer.addEventListener("mouseenter", () => {
  newsSwiper.autoplay.stop();
});

swiperContainer.addEventListener("mouseleave", () => {
  newsSwiper.autoplay.start();
});

// jquery code goes here
$(document).ready(function () {
  // ✅ Hamburger toggle + dropdown animation
  $(".hamburger").on("click", function () {
    $(this).toggleClass("change"); // Animate the hamburger icon
    $(".hamburger__dropdown").stop(true, true).slideToggle(300); // Smooth dropdown
  });

  // ✅ Handle dropdown open/close inside menu items
  $(".open").on("click", function () {
    $(this).closest("li").toggleClass("active");
  });

  // ✅ Scroll-to-top icon visibility
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 250) {
      $(".scroll-icon").addClass("show");
    } else {
      $(".scroll-icon").removeClass("show");
    }
  });

  // ✅ Smooth scroll to top when clicked
  $(".scroll-icon").on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, 600);
  });

  $(".open").each(function () {
    $(this).on("click", function () {
      $(this).next(".submenu").stop(true, true).slideToggle(300);
    });
  });
  $(".submenu li:last").css("border-bottom", "none");
});
