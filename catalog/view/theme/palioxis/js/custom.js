$(document).ready(function() {
	//Language and Currency Switcher
	$('.switcher').hover(function() {
		$(this).find('.option').stop(true, true).slideDown(300);
	},function() {
		$(this).find('.option').stop(true, true).slideUp(150);
	});
});
