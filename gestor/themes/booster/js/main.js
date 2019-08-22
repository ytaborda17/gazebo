// ACCORDION MENU
$("#cleft").ready(function(){
	$(".arrowDown ul").hide();
	$(".arrowDown li.active").parent('ul').show();
	$('#cleft #menu > ul > li a').click(function() {
		var nextElement = $(this).next();
		if ( (nextElement.is('ul')) && (nextElement.is(':visible')) ) {
			nextElement.slideUp('normal');
		}
		if ( (nextElement.is('ul')) && (!nextElement.is(':visible')) ) {
			$('#cleft #menu ul ul:visible').slideUp('normal');
			nextElement.slideDown('normal');
		}
	});
	$('#menu ul:first-child').prepend('<li id="menu_top" class="arrowDown"><a><span class="icon-menu icon-list"></span>MENU PRINCIPAL<span></span></a></li>');
	menuResponsive ();

}); 

// INCREASE FONT SIZE BY 2PX
function zoomIn (elem) {
	$(elem).css('font-size', function (i,size) {
		return parseInt(size,10) + 2 + 'px';
	});
}

// REDUCE FONT SIZE BY 2PX
function zoomOut (elem) {
	$(elem).css('font-size', function (i,size) {
		return parseInt(size,10) - 2 + 'px';
	});
}

// REMOVE DUPLICATES FROM ARRAY LIST
function array_unique(list) {
	var result = [];
	$.each(list, function(i, e) {
		if ($.inArray(e, result) == -1) result.push(e);
	});
	return result;
}

// EXTENDED DISABLE FUNCTION
jQuery.fn.extend({
	disable: function(state) {
		return this.each(function() {
			this.disabled = state;
		});
	}
});

// MENU FOR RESOLUTIONS UNDER 768PX
var resBreak = 768;
function menuResponsive () {
	$('#menu_top a').click(function(){
		if ($(window).width()<resBreak) {
			var visible = $('#menu > ul > li:not(#menu_top)').css('display');
			if (visible == "none") {
				$('#menu > ul > li:not(#menu_top)').slideDown('200');
				$('.footer.in').slideDown('200');
			}
			else {
				$('#menu > ul > li:not(#menu_top)').slideUp('200');
				$('.footer.in').slideUp('200');
			}
		} else $('#menu > ul > li:not(#menu_top)').css('display','block');	
	});
}

$(document).ready(function() {
	// MENU FOR RESOLUTIONS UNDER 768PX (...cont)
	$(window).resize(function(){
		if ($(window).width()<resBreak) {
			$('#menu > ul > li:not(#menu_top)').css('display','none');
			$('.footer.in').css('display','none');
		}
		else {
			$('#menu > ul > li:not(#menu_top)').css('display','block');
			$('.footer.in').css('display','block');
		}
	});

	// MONOCHROME COLORS FOR HIGHCHARTS
	if(jQuery().Highcharts) {
		Highcharts.setOptions({colors:['#C8FF47','#AA7E33']});
		Highcharts.getOptions().plotOptions.pie.colors = (function () {
			var colors = [],
			base = Highcharts.getOptions().colors[0],i;

			for (i = 0; i < 10; i += 1) {
		      colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
		   }
		   return colors;
		}());
	}
	
	// AJAX preview for grid view  // div#previewThis
	$.fn.setPreviewLinksHandler = function(id, data) {
		$("a[name=ajax-link]").click(function() {
			var link = $(this);
			var pointer = $(this).attr('ajax-pointer');
			$.get(link.attr('href'), function(data) {
				$(pointer).html(data);
			});
			return false;
		});
	};
	$.fn.setPreviewLinksHandler();

	// COUNT CHARACTERS LEFT
	$('.count-chars-left').each(function(){
		var $this = $(this);
		var $badge = $(this).next('span').find('.badge');
		var maxLength = parseInt($this.attr('maxlength'));
		var cc = $this.val().length;
		$badge.text(maxLength - cc);

		$this.bind('keyup', function() {
			cc = $this.val().length;
			$badge.text(maxLength - cc);
		});
	});

	
})
