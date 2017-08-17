$(document).ready(function(){
    var mySwiper = new Swiper ('.swiper-container', {
      // Optional parameters
      direction: 'horizontal',
      slidesPerView: 1,
	  centeredSlides: true,
      loop: true,
	  pagination: '.swiper-pagination',
	  paginationClickable: true,
 	  nextButton: '.swiper-button-next',
      prevButton: '.swiper-button-prev',
    });
})