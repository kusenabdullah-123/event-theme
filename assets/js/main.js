// (function () {

//     /*=====================================
//     Sticky
//     ======================================= */
//     window.onscroll = function () {
//         var header_navbar = document.querySelector(".navbar-area");
//         var sticky = header_navbar.offsetTop;

//         if (window.pageYOffset > sticky) {
//             header_navbar.classList.add("sticky");
//         } else {
//             header_navbar.classList.remove("sticky");
//         }



//         // show or hide the back-top-top button
//         var backToTo = document.querySelector(".scroll-top");
//         if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
//             backToTo.style.display = "flex";
//         } else {
//             backToTo.style.display = "none";
//         }
//     };

//     // section menu active
// 	function onScroll(event) {
// 		var sections = document.querySelectorAll('.page-scroll');
// 		var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

// 		for (var i = 0; i < sections.length; i++) {
// 			var currLink = sections[i];
// 			var val = currLink.getAttribute('href');
// 			var refElement = document.querySelector(val);
// 			var scrollTopMinus = scrollPos + 73;
// 			if (refElement.offsetTop <= scrollTopMinus && (refElement.offsetTop + refElement.offsetHeight > scrollTopMinus)) {
// 				document.querySelector('.page-scroll').classList.remove('active');
// 				currLink.classList.add('active');
// 			} else {
// 				currLink.classList.remove('active');
// 			}
// 		}
// 	};

//     window.document.addEventListener('scroll', onScroll);
    
//     // for menu scroll 
//     var pageLink = document.querySelectorAll('.page-scroll');

//     pageLink.forEach(elem => {
//         elem.addEventListener('click', e => {
//             e.preventDefault();
//             document.querySelector(elem.getAttribute('href')).scrollIntoView({
//                 behavior: 'smooth',
//                 offsetTop: 1 - 60,
//             });
//         });
//     });

//     "use strict";

// }) ();


(function () {
  "use strict";

  //===== Navbar Toggle =====//
  const navbarTogglerNine = document.querySelector(".navbar-nine .navbar-toggler");
  if (navbarTogglerNine) {
    navbarTogglerNine.addEventListener("click", function () {
      navbarTogglerNine.classList.toggle("active");
    });
  }

  //===== Sticky Navbar dan Scroll Top =====//
  window.addEventListener("scroll", function () {
    const header_navbar = document.querySelector(".navbar-area");
    const backToTop = document.querySelector(".scroll-top");

    if (header_navbar) {
      const sticky = header_navbar.offsetTop;
      if (window.pageYOffset > sticky) {
        header_navbar.classList.add("sticky");
      } else {
        header_navbar.classList.remove("sticky");
      }
    }

    if (backToTop) {
      if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        backToTop.style.display = "flex";
      } else {
        backToTop.style.display = "none";
      }
    }
  });

  //===== Scroll Spy (aktifkan link saat scroll) =====//
  function onScroll() {
    const pageLinks = document.querySelectorAll(".page-scroll");
    const scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

    pageLinks.forEach(link => {
      const target = document.querySelector(link.getAttribute("href"));
      const scrollTopMinus = scrollPos + 73;
      if (target && target.offsetTop <= scrollTopMinus && target.offsetTop + target.offsetHeight > scrollTopMinus) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    });
  }

  document.addEventListener("scroll", onScroll);

  //===== Smooth Scroll =====//
  document.querySelectorAll(".page-scroll").forEach(link => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start"
        });
      }
    });
  });

  //===== GLightbox Video Popup =====//
  if (typeof GLightbox !== "undefined") {
    GLightbox({
      href: 'https://www.youtube.com/watch?v=r44RKWyfcFw',
      type: 'video',
      source: 'youtube',
      width: 900,
      autoplayVideos: true,
    });
  }

  //===== Tiny Slider (Hero Section) =====//
  document.addEventListener("DOMContentLoaded", function () {
    if (typeof tns !== "undefined" && document.querySelector(".slider")) {
      tns({
        container: ".slider",
        items: 1,
        slideBy: "page",
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayButtonOutput: false,
        controls: false,
        nav: true,
        navPosition: "bottom",
        mouseDrag: true,
        gutter: 10,
        loop: true,
      });
    }
  });

})();