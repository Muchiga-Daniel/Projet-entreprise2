
var ww = document.body.clientWidth;

$(document).ready(function() {
	$("#notification-icon .nav li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("parent");
		};
	})
	
	$("#notification-icon .toggleMenu").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("active");
		$(".nav").toggle();
	});
	adjustMenu();
})

$(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 768) {
		$("#notification-icon .toggleMenu").css("display", "inline-block");
		if (!$("#notification-icon .toggleMenu").hasClass("active")) {
			$("#notification-icon .nav").hide();
		} else {
			$("#notification-icon .nav").show();
		}
		$("#notification-icon .nav li").unbind('mouseenter mouseleave');
		$("#notification-icon .nav li a.parent").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			e.preventDefault();
			$(this).parent("li").toggleClass("hover");
		});
	} 
	else if (ww >= 768) {
		$("#notification-icon .toggleMenu").css("display", "none");
		$("#notification-icon .nav").show();
		$("#notification-icon .nav li").removeClass("hover");
		$("#notification-icon .nav li a").unbind('click');
		$("#notification-icon .nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	$(this).toggleClass('hover');
		});
	}
}
