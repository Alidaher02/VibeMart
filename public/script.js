document.addEventListener("DOMContentLoaded", () => {



  const mySwiper = new Swiper('.mySwiper', {
    slidesPerView: 'auto',
    spaceBetween: 10,       // spacing between slides
    breakpoints: {
      0: { slidesPerView: 'auto' },     // phones
      640: { slidesPerView: 'auto' },   // tablets
      1024: { slidesPerView: 'auto' }, // desktop/laptop: fixed width 25%
    },
   
    // If we need pagination
    pagination: {
    el: '.swiper-pagination',
    clickable: true,
    },
    
    // Navigation arrows
    
    // And if we need scrollbar
    scrollbar: {
    el: '.swiper-scrollbar',
    },

    navigation: {
    prevEl: ".swiper-prev",
    nextEl: ".swiper-next",
},

    });

    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
    
        autoplay: {
          delay: 3000, // slide every 3 seconds
          disableOnInteraction: false,
        },
        
        // If we need pagination
        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },
        
        // Navigation arrows
        
        // And if we need scrollbar
        scrollbar: {
        el: '.swiper-scrollbar',
        },

        navigation: {
        prevEl: ".swiper-prev",
        nextEl: ".swiper-next",
    },

        });

        const gameSection = document.getElementById("gameSection");
        const appSection = document.getElementById("appSection");
        const topGamess = document.getElementById("topGames");
        const topAppss = document.getElementById("topApps");

       



        


      })