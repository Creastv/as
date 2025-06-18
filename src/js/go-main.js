
// HEader fixed

// const togglerNav = document.querySelector(".js-navbar__toggler");
// const nav = document.querySelector(".navbar__nav");
// let navFlag = false;

// togglerNav.addEventListener("click", () => {
//   if (navFlag == false) {
//     nav.classList.add("active");
//     togglerNav.classList.add("active");
//     document.querySelector("body").style.overflow = "hidden";
//     navFlag = true;
//   } else {
//     nav.classList.remove("active");
//     togglerNav.classList.remove("active");
//     document.querySelector("body").style.overflow = "inherit";
//     navFlag = false;
//   }
// });

const togglerNav = document.querySelector(".js-navbar__toggler");
const nav = document.querySelector(".navbar__nav");
let navFlag = false;

togglerNav.addEventListener("click", () => {
  if (!navFlag) {
    nav.classList.add("active");
    togglerNav.classList.add("active");
    document.body.style.overflow = "hidden";
    navFlag = true;

    // Sprawdzamy szerokość okna (np. poniżej 768px dla mobile)
    if (window.innerWidth <= 1200) {
      // Tworzymy element .close
      const closeBtn = document.createElement("div");
      closeBtn.classList.add("close");
      closeBtn.innerHTML= "&times;";

      // Dodajemy do menu lub do body (zależnie od struktury HTML)
      nav.appendChild(closeBtn);

      // Obsługa kliknięcia na przycisk close
      closeBtn.addEventListener("click", () => {
        nav.classList.remove("active");
        togglerNav.classList.remove("active");
        document.body.style.overflow = "inherit";
        navFlag = false;

        // Usuwamy przycisk close
        closeBtn.remove();
      });
    }

  } else {
    nav.classList.remove("active");
    togglerNav.classList.remove("active");
    document.body.style.overflow = "inherit";
    navFlag = false;

    // Jeśli .close istnieje – usuń go
    const closeBtn = document.querySelector(".navbar__nav .close");
    if (closeBtn) closeBtn.remove();
  }
});




let isFixed = false;

function handleScroll() {
    const nav = document.querySelector("#header");
    const mainWrap = document.querySelector('#main');
    const navHeight = nav.offsetHeight;

    if (window.pageYOffset >= 2) {
        isFixed = true;
        mainWrap.style.marginTop = `${navHeight}px`;
        nav.classList.add("fixed");
    } else {
        isFixed = false;
        nav.classList.remove("fixed");
        mainWrap.style.marginTop = "0px";
    }
}

let debounceTimeout;
document.addEventListener("scroll", function () {
    clearTimeout(debounceTimeout);
    debounceTimeout = setTimeout(handleScroll, 10); // Dodajemy opóźnienie 50ms
});


const calaps = document.querySelectorAll(".calaps");
for (let i = 0; i < calaps.length; i++) {
  calaps[i].querySelector(".calaps__opener").addEventListener("click", function () {
    calaps[i].classList.toggle("active");
  });
}

setTimeout(
  function() {
     //get the images
     let images = document.querySelectorAll("img"); 
      
     //loop through all images
     for (let i = 0; i < images.length; i++) {
         //add alt text if missing (but title is present)
         if (!images[i].alt) {
             // images[i].alt = 'test';
      images[i].setAttribute('alt', 'Z Orlika na Stadion');
         }
     }
 }, 1000);

 // Go to Top
 const goToTop = document.querySelector("#go-to-top");
 goToTop.addEventListener("click", () => {
   document.documentElement.scrollTop = 0;
 });
 document.addEventListener("scroll", () => {
   if (window.pageYOffset >= 200) {
     goToTop.classList.add("active");
   } else {
     goToTop.classList.remove("active");
   }
 });

  // document.querySelector(".js-navbar__toggler").addEventListener("click", function() {
  //   document.getElementById("toggleMenu").click();
  // });


// document.querySelector(".js-navbar__toggler").addEventListener("click", function() {
//   setTimeout(function() {
//       const menuButton = document.querySelector('.mega-menu-toggle');
//       const menu = document.querySelector('.mega-menu');

//       if (menuButton && menu) {
//           if (menu.classList.contains('mega-menu-open')) {
//               menuButton.click(); // Zamknij menu
//           } else {
//               menuButton.click(); // Otwórz menu
//           }
//       }
//   }, 100);
// });



