// FAQ
const accordion = document.querySelectorAll(".faq-global .accordion");
for (i = 0; i < accordion.length; i++) {
  const question = accordion[i].querySelector(".question");
  
  question.addEventListener("click", function (event) {
    // Sprawdź czy użytkownik próbuje zaznaczyć tekst
    const selection = window.getSelection();
    if (selection.toString().length > 0) {
      return; // Nie zamykaj FAQ jeśli tekst jest zaznaczony
    }
    
    let tmp = event.target.closest('.accordion');
    for (e = 0; e < accordion.length; e++) {
      if (accordion[e] == tmp) {
        accordion[e].classList.toggle("active");
      } else {
        accordion[e].classList.remove("active");
      }
    }
  });
  
  if ("#" + accordion[i].id == window.location.hash) {
    accordion[i].classList.add("active");
  }
}
