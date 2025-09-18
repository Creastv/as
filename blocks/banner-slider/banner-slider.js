

var swiper6 = new Swiper(".banner-slider", {
    slidesPerView: 1,
    // slidesPerView: "auto",
    // spaceBetween: 20,
    // centeredSlides: true,
    loop: true,
    // autoplay: {
    //   delay: 5500,
    //   disableOnInteraction: false
    // },
    pagination: {
        el: ".swiper-pagination--baner",
        clickable: true
      },
    breakpoints: {
      640: {
        slidesPerView: 1,
        // spaceBetween: 20
      },
      1366: {
        slidesPerView:1,
        // spaceBetween: 50
        // slidesPerView: "auto",
      }
    }
  });
  
  
  