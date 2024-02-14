//SLIDER DE LISTAS PREMIUM
const swiper = new Swiper(".swiper", {
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	slidesPerView: 3,
  slilidesPerGroup: 1,
	spaceBetween: 20,
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