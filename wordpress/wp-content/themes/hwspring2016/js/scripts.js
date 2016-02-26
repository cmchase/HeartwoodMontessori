(function ($, root, undefined) {
	// Don't go crazy firing callbacks
	// https://davidwalsh.name/javascript-debounce-function
	function debounce(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};


	$(function () {
		"use strict";
		var $headerContainer = $("#main-header").parent(),
			stickyHeader,
			scrollDelta = 0,
			// We need to resize the main header area because it's
			// using a fixed position (when sticky) and will default
			// to its content width without an explicit size.
			sizeHeader = function(){
				$("#main-header").width($("#main-header").parent().width());
			},
			resizeCallback = debounce(function(){
				sizeHeader();
			}, 250);
		
		$("#main-nav .menu-item-has-children").each(function(){
			var $this = $(this);
			$this.hover(
				function addHover(){
					$this.addClass("hover");
				}, function removeHover() {
					$this.removeClass("hover");
				}
			)
		});
		if ($("body").hasClass("home")) {
			$headerContainer.removeClass("scroll-up sticky-header");
			stickyHeader = debounce(function(){
				if (window.scrollY > 50) {
					if (window.scrollY < scrollDelta) {
						$headerContainer.addClass("scroll-up");
					} else {
						$headerContainer.removeClass("scroll-up");
					}
					$headerContainer.addClass("sticky-header");
				} else {
					$headerContainer.removeClass("sticky-header")
				}
				scrollDelta = window.scrollY;
			}, 200);
		} else {
			$headerContainer.addClass("scroll-up sticky-header");
			stickyHeader = debounce(function(){
				if (window.scrollY < scrollDelta) {
					$headerContainer.addClass("scroll-up");
				} else {
					$headerContainer.removeClass("scroll-up");
				}
				scrollDelta = window.scrollY;
			}, 200);
		};
		// Some hacky business for the upcoming events until React is added.
		$("#upcomingEvents").html($("#upcomingEventsTpl").html());
		
		sizeHeader();
		window.addEventListener('resize', resizeCallback)
		window.addEventListener('scroll', stickyHeader);
	});
	
})(jQuery, this);
