const buttonsWrapper = document.querySelector(".listas-packs");
const slides = document.querySelector(".inner");

buttonsWrapper.addEventListener("click", e => {
  if (e.target.nodeName === "BUTTON") {
    Array.from(buttonsWrapper.children).forEach(item =>
      item.classList.remove("active")
    );
    if (e.target.classList.contains("first")) {
      slides.style.transform = "translateX(0.9%)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains("second")) {
      slides.style.transform = "translateX(-24.66%)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains("third")){
      slides.style.transform = 'translatex(-49.8%)';
      e.target.classList.add('active');
    } else if (e.target.classList.contains("four")){
        slides.style.transform = 'translatex(-74.9%)';
        e.target.classList.add('active');
    }
  }
});