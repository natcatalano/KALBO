const buttonsWrapper = document.querySelector(".listas-packs");
const slides = document.querySelector(".inner");

buttonsWrapper.addEventListener("click", e => {
  if (e.target.nodeName === "BUTTON") {
    Array.from(buttonsWrapper.children).forEach(item =>
      item.classList.remove("active")
    );
    if (e.target.classList.contains("first")) {
      slides.style.transform = "translateX(33%)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains("second")) {
      slides.style.transform = "translateX(-0%)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains("third")){
      slides.style.transform = 'translatex(-25%)';
      e.target.classList.add('active');
    } else if (e.target.classList.contains("four")){
        slides.style.transform = 'translatex(-35%)';
        e.target.classList.add('active');
    }
  }
});