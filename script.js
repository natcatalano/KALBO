const buttonsWrapper = document.querySelector(".listas-packs");
const slides = document.querySelector(".carrousel");

buttonsWrapper.addEventListener("click", e => {
  if (e.target.nodeName === "BUTTON") {
    Array.from(buttonsWrapper.children).forEach(item =>
      item.classList.remove("active")
    );
    if (e.target.classList.contains("first")) {
      slides.style.transform = "translateX(-0%)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains("second")) {
      slides.style.transform = "translateX(-33.33333333333333%)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains("third")){
      slides.style.transform = 'translatex(-66.6666666667%)';
      e.target.classList.add('active');
    } else if (e.target.classList.contains("four")){
        slides.style.transform = 'translatex(-99.9999999990%)';
        e.target.classList.add('active');
    }
  }
});