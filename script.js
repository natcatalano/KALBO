//SLIDER DE LISTAS PREMIUM
const swiper = new Swiper(".swiper", {
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	slidesPerView: 3,
	slidesPerGroup: 1,
	spaceBetween: 30,

	breakpoints: {

		360: {
			slidesPerView: 1,
			slidesPerGroup: 1,
			},

		1300: {
			slidesPerView: 3,
			slidesPerGroup: 1,
		},

		1600: {
			slidesPerView: 3,
			slidesPerGroup: 1,
			spaceBetween: 90
		},
	},

});

// SELECCION DE LISTAS 
$(document).ready(function () {

	// AGREGANDO CLASE ACTIVE AL PRIMER ENLACE
	$('.category_list .category_item[category="all"]').addClass('ct_item-active');

	// FILTRANDO PRODUCTOS 
	$('.category_item').click(function () {
		var catProduct = $(this).attr('category');
		console.log(catProduct);

		// AGREGANDO CLASE ACTIVE AL ENLACE SELECCIONADO 
		$('.category_item').removeClass('ct_item-active');
		$(this).addClass('ct_item-active');

		// OCULTANDO PRODUCTOS 
		function hideProduct() {
			$('.swiper-slide').hide();
		}
		hideProduct();

		// MOSTRANDO PRODUCTOS 
		function showProduct() {
			$('.swiper-slide[category="' + catProduct + '"]').show();
		}
		showProduct();

		updateSlider();
	});

	// MOSTRANDO TODOS LOS PRODUCTOS
	$('.category_item[category="all"]').click(function () {
		function showAll() {
			$('.swiper-slide').show();
		}
		showAll();

		updateSlider();
	});

	// FUNCION PARA ACTUALIZAR SLIDER
	function updateSlider() {
		swiper.update();
		swiper.slideTo(0);
	}
});

// configuracion menu hamburguesa
const menu = document.querySelector(".navegacion");
const menuItems = document.querySelectorAll(".boton-navegacion");
const hamburger = document.querySelector(".hamburger");
const closeIcon = document.querySelector(".closeIcon");
const menuIcon = document.querySelector(".menuIcon");

function toggleMenu() {
	if (menu.classList.contains("showMenu")) {
		menu.classList.remove("showMenu");
		closeIcon.style.display = "none";
		menuIcon.style.display = "block";
	} else {
		menu.classList.add("showMenu");
		closeIcon.style.display = "block";
		menuIcon.style.display = "none";
	}
}

hamburger.addEventListener("click", toggleMenu);

menuItems.forEach(
	function (menuItem) {
		menuItem.addEventListener("click", toggleMenu);
	}
)