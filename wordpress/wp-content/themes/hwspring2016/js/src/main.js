$ = jQuery = require('jquery');
var React = require('react');
var ReactDOM = require('react-dom');

var EventList = require('./components/EventList');

window.hw = {
	themeSrc: '/wp-content/themes/hwspring2016/',
	daysAbbr: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
	monthsAbbr: ['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec'],

	// This is one of those convenience methods you either don't
	// have to normally think about or have already written,
	// but for a small project like this it's not really worth
	// importing another library.
	getTime: function(dateTime) {
		var hh = dateTime.getHours(),
			mm = dateTime.getMinutes(),
			tt = 'AM';

		if (hh > 11) {
			tt = 'PM';
			if (hh > 12) {
				hh -= 12;
			}
		}
		if (mm < 10) {
			mm = '0' + mm;
		}
		return hh + ':' + mm + ' ' + tt;
	},
	// https://davidwalsh.name/javascript-debounce-function

	debounce: function(func, wait, immediate) {
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
	},
	createGoogleCalendar: function(viewWidth){
		var calId = 'heartwoodmontessori.com_r04s3d3u5v0mk30fim7rlnr0fs%40group.calendar.google.com';
    var height = '600';
    var width = '100%';
    var bg = 'f6f6f6';
    var color = 'ff0000';
    var mode = (viewWidth > 1024) ? 'MONTH' : 'AGENDA'; // MONTH, AGENDA, WEEK
		var html = '<iframe id="googleCalIframe" src="https://calendar.google.com/calendar/embed?showTitle=0&amp;height=600&amp;wkst=1&amp;mode='
			+ mode
			+ '&amp;bgcolor=%23'
			+ bg
			+ '&amp;src='
			+ calId
			+ '&amp;color=%23'
			+ color
			+ '&amp;ctz=America%2FNew_York" style="border-width:0" width="'
			+ width
			+ '" height="'
			+ height
			+ '" frameborder="0" scrolling="no"></iframe>"';

		return html;
	}
};

(function ($, root, undefined) {
	'use strict';

	if ($('#upcomingEvents').length > 0) {
		ReactDOM.render(<EventList />, document.getElementById('upcomingEvents'))
	};

	var $headerContainer = $('#main-header').parent(),
		viewWidth =  $('#main-header').parent().width(),
		viewHeight,
		stickyHeader,
		scrollDelta = 0,
		// We need to resize the main header area because it's
		// using a fixed position (when sticky) and will default
		// to its content width without an explicit size.
		sizeContent = function(){
			viewWidth = $('#main-header').parent().width();
			viewHeight = $(window).height();
			$('.nav-wrapper').css('max-height', viewHeight * .8);
			$('#main-header').width(viewWidth);
		},
		resizeCallback = hw.debounce(function(){
			sizeContent();
		}, 250);

	$('#main-nav .menu-item-has-children').each(function(){
		var $this = $(this);
		// Let's watch for touch devices so
		// we can show our dropdowns correctly
		if ($('html').hasClass('touch')) {
			$this.click(function(event){
				if ($this.hasClass('hover')) {
					event.stopPropagation();
					return true;
				} else {
					event.preventDefault();
					event.stopPropagation();
					$('.hover').removeClass('hover');
					$this.addClass('hover');
				}
			});
		} else {
			$this.hover(
				function addHover(){
					$this.addClass('hover');
				}, function removeHover() {
					$this.removeClass('hover');
				}
			)
		}
	});
	if ($('body').hasClass('home') && viewWidth > 1024) {
		$headerContainer.removeClass('scroll-up sticky-header');
		stickyHeader = hw.debounce(function(){
			if (window.scrollY > 50) {
				if (window.scrollY <= scrollDelta) {
					$headerContainer.addClass('scroll-up');
				} else {
					$headerContainer.removeClass('scroll-up');
				}
				$headerContainer.addClass('sticky-header');
			} else {
				$headerContainer.removeClass('sticky-header')
			}
			scrollDelta = window.scrollY;
		}, 200);
	} else {
		$headerContainer.addClass('scroll-up sticky-header');
		stickyHeader = hw.debounce(function(){
			if (window.scrollY <= scrollDelta) {
				$headerContainer.addClass('scroll-up');
			} else {
				$headerContainer.removeClass('scroll-up');
			}
			scrollDelta = window.scrollY;
		}, 200);
	};
	// Even though we're at the end of the doc, we need
	// to wait for document ready in some instances.
	$(function(){
		// Let's replace the Contact Form 7 loading indicator
		// with something a little more noticible.
		$('img.ajax-loader').attr('src', hw.themeSrc + 'img/loading.gif');
		$('.menu-category > a').on('click', function(event){
			event.stopPropagation();
			event.preventDefault();
		});
		$('.nav-trigger').on('click', function(event) {
			event.stopPropagation();
			$('body').toggleClass('nav-shown');
		});
		$('body').on('click', function() {
			$('body').removeClass('nav-shown');
			$('.hover').removeClass('hover');
		})
	})

	sizeContent();

	// if ($('#googleCalendar').length > 0) {
	// 	$('#googleCalendar').html(hw.createGoogleCalendar(viewWidth));
	// }
	window.addEventListener('resize', resizeCallback)
	window.addEventListener('scroll', stickyHeader);

})(jQuery, this);
