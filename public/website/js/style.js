 /* ===================================
    Counter on scroll section
    ====================================== */
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);

/* ===================================
    AOS Animtion
    ====================================== */
AOS.init({
  once: true,
  disable:  function() {
   var maxWidth = 767;
   return window.innerWidth < maxWidth;
 }
});


/* ===================================
    Gallery slider
    ====================================== */
var swiper = new Swiper(".gallery-slider", {
  slidesPerView: 2,
  speed: 500,
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  spaceBetween: 15,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    991:{
      slidesPerView: 4,
      spaceBetween: 30,
    },
    1200: {
      spaceBetween: 30,
      slidesPerView: 5,
    },
  },
});


var swiper = new Swiper(".gallery-food-slider", {
  slidesPerView: 4,
  spaceBetween: 30,
  centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  breakpoints: {
    320: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});

/* ===================================
    Chef slider
    ====================================== */
var swiper = new Swiper(".chef-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  speed: 900,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

/* ===================================
    related blog slider
    ====================================== */
var swiper = new Swiper(".related-blog-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  speed: 900,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    575: {
      slidesPerView: 2,
    },
  },
});

    /* ===================================
    related Foods slider
    ====================================== */
var swiper = new Swiper(".related-food-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  speed: 900,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    575: {
      slidesPerView: 2,
    },
    1024:{
      slidesPerView: 3,
    },
  },
});
/* ===================================
    Blog slider
    ====================================== */
var swiper = new Swiper(".blog-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  speed: 500,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});


var swiper = new Swiper(".blog-slider-swipe", {
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
  speed: 500,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024:{
      slidesPerView: 3,
    },
  },
});

/* ===================================
    sidebar gallery slider
    ====================================== */
var swiper = new Swiper(".sidebar-gallery", {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true,
  speed: 900,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
/* ===================================
    hero slider
    ====================================== */
var swiper = new Swiper(".hero-top-slider", {
  effect: 'fade',
  slidesPerView: 1,
  loop: false,
  speed: 900,
  simulateTouch: true,
  clickable: true,
  parallax: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
});


/* ===================================
    testimonial slider
    ====================================== */
var swiper = new Swiper(".testimonial-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  speed: 900,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


   /* ===================================
    Product Gallery slider
    ====================================== */
var swiper = new Swiper(".foodthumbsSlider", {
  loop: true,
  spaceBetween: 15,
  slidesPerView: 3,
  freeMode: true,
  speed: 900,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  watchSlidesProgress: true,
  breakpoints: {
    768: {
      spaceBetween: 30,
    },
  },
});
var swiper2 = new Swiper(".foodSwiper2", {
  loop: true,
  speed: 900,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});


$( document ).ready(function() {

  $(function () {
    $('.add').on('click',function(){
      var $qty=$(this).closest('form').find('.qty');
      var currentVal = parseInt($qty.val());
      if (!isNaN(currentVal)) {
        $qty.val(currentVal + 1);
      }
    });
    $('.minus').on('click',function(){
      var $qty=$(this).closest('form').find('.qty');
      var currentVal = parseInt($qty.val());
      if (!isNaN(currentVal) && currentVal > 0) {
        $qty.val(currentVal - 1);
      }
    });
  });


      /**********  menu ****************/
  $(document).on("click", function(event){
    if($(event.target).closest(".navbar-toggler").length){
      $(".navbar-collapse.collapse.show").toggle();
    } else if(!$(event.target).closest(".navbar-collapse.collapse.show").length){
      $(".navbar-collapse").removeClass('collapse show');

    }
  });


  $('.close-menu').on( "click", function() {
    $('.navbar-collapse').removeClass('collapse show')  
  });


  /* ===================================
    Counter Section
    ====================================== */
  $(function () {
    function isScrolledIntoView($elem) {
      var docViewTop = $(window).scrollTop();
      var docViewBottom = docViewTop + $(window).height();
      var elemTop = $elem.offset().top;
      var elemBottom = elemTop + $elem.height();
      return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    function count($this) {
      var current = parseInt($this.html(), 10);
      if (isScrolledIntoView($this) && !$this.data("isCounting") && current < $this.data('count')) {
        $this.html(++current);
        $this.data("isCounting", true);
        setTimeout(function () {
          $this.data("isCounting", false);
          count($this);
        }, 20);
      }
    }

    $(".c-counter").each(function () {
      $(this).data('count', parseInt($(this).html(), 10));
      $(this).html('0');
      $(this).data("isCounting", false);
    });

    function startCount() {
      $(".c-counter").each(function () {
        count($(this));
      });
    };

    $(window).scroll(function () {
      startCount();
    });

    startCount();
  });

 /* ===================================
    Gallery Section
    ====================================== */

  const nodes = [].slice.call(document.querySelectorAll('.gallery-item'), 0);
  const directions  = { 0: 'top', 1: 'right', 2: 'bottom', 3: 'left' };
  const classNames = ['in', 'out'].map((p) => Object.values(directions).map((d) => `${p}-${d}`)).reduce((a, b) => a.concat(b));

  const getDirectionKey = (ev, node) => {
    const { width, height, top, left } = node.getBoundingClientRect();
    const l = ev.pageX - (left + window.pageXOffset);
    const t = ev.pageY - (top + window.pageYOffset);
    const x = (l - (width/2) * (width > height ? (height/width) : 1));
    const y = (t - (height/2) * (height > width ? (width/height) : 1));
    return Math.round(Math.atan2(y, x) / 1.57079633 + 5) % 4;
  }

  class Item {
    constructor(element) {
      this.element = element;    
      this.element.addEventListener('mouseover', (ev) => this.update(ev, 'in'));
      this.element.addEventListener('mouseout', (ev) => this.update(ev, 'out'));
    }

    update(ev, prefix) {
      this.element.classList.remove(...classNames);
      this.element.classList.add(`${prefix}-${directions[getDirectionKey(ev, this.element)]}`);
    }
  }

  nodes.forEach(node => new Item(node));

});


  /* ===================================
    scroll bottom to top button
    ====================================== */

$(window).scroll(function() {
  if ($(this).scrollTop() > 100) {
    $('.scroll-top').fadeIn();
  } else {
    $('.scroll-top').fadeOut();
  }
});
$('.scroll-top').click(function() {
  $("html, body").animate({
    scrollTop: 0
  }, 100);
  return false;
});


/* ===================================
  Sticky Header
  ====================================== */
jQuery(window).scroll(function(){
  if (jQuery(window).scrollTop()) {
    jQuery('.header').addClass('fixed-header');
    jQuery('.main-header').addClass('fixed-header');
  }
  else {
    jQuery('.header').removeClass('fixed-header');
    jQuery('.main-header').removeClass('fixed-header');
  }
});


/* ===================================
  gallery popup image
  ====================================== */

"use strict";


(function ($) {
  var container = [];
  // Loop over gallery items and push it to the array
  $("#gallery")
  .find(".gallery-item")
  .each(function () {
    var $link = $(this).find(".gallery-popup"),
    item = {
      src: $link.attr("href"),
      w: $link.data("width"),
      h: $link.data("height"),
      title: $link.data("caption")
    };
    container.push(item);
  });

  // Define click event on gallery item
  $(".gallery-popup").click(function (event) {
    // Prevent location change
    event.preventDefault();

    // Define object and gallery options
    var $pswp = $(".pswp")[0],
    options = {
      index: $(this).parent(".gallery-item").index(),
      bgOpacity: 0.85,
      showHideOpacity: true
    };

    // Initialize PhotoSwipe
    var gallery = new PhotoSwipe(
      $pswp,
      PhotoSwipeUI_Default,
      container,
      options
      );
    gallery.init();
  });
})(jQuery);



/* ===================================
  bottom-top scroll
  ====================================== */

!function(o){
  "use strict";
  o(document).ready(function(){
    function t(){var t=o(window).scrollTop(),e=o(document).height()-o(window).height();
    r.style.strokeDashoffset=n-t*n/e}var r=document.querySelector(".scroll-top path"),n=r.getTotalLength();
    r.style.transition=r.style.WebkitTransition="none",
    r.style.strokeDasharray=n+" "+n,r.style.strokeDashoffset=n,
    r.getBoundingClientRect(),
    r.style.transition=r.style.WebkitTransition="stroke-dashoffset 10ms linear",
    t(),
    o(window).scroll(t);
    jQuery(window).on("scroll",function(){
      50<jQuery(this).scrollTop()?jQuery(".scroll-top").addClass("active"):
      jQuery(".scroll-top").removeClass("active")}),
    jQuery(".scroll-top").on("click",function(t){return t.preventDefault(),
      jQuery("html, body").animate({
        scrollTop:0
      },550),!1
    })
  })
}(jQuery)



/* ===================================
  Loading Timeout
  ====================================== */

$(window).on("load", function() {
  "use strict";
  setTimeout(function() {
    $('.loading-page').addClass("finished").fadeOut();
  }, 5000);
});

var counter = 0;
var c = 0;
var i = setInterval(function () {
  $(".loading-page .counter .count-number").html(c + "%");
  $(".loading-page .counter hr").css("width", c + "%");
      // $('.loading-page').addClass("pageisloaded");

  counter++;
  c++;

  if (counter == 101) {
    clearInterval(i);
  }
}, 50);
/* ===================================
  Mobile menu for all page
  ====================================== */ 

(function($) {
$.fn.menumaker = function(options) {  
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 1199;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
$(document).ready(function(){
$("#cssmenu").menumaker({
   format: "multitoggle"
});
});
})(jQuery);

/* ===================================
    Side toggle menu
    ====================================== */

    $(document).on("click", function(event){
      if($(event.target).closest(".view-pages-btn").length){
        $(".page_loaded").toggleClass("active");
      } else if(!$(event.target).closest(".sidebar-toggle").length){
        $(".page_loaded").removeClass("active");
      }
    });
