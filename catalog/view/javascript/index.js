$(document).ready(function() {

    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
    sideslider.click(function(event){
        $(sel).toggleClass('in');
        $(sel2).toggleClass('out');
    });

	// $('#content').addClass('col-sm-offset-3');

	// make modal popup work
	// $('.modal-content-box').each(function(index) {
	// 	$(this).attr('id', 'box' + index);
	// });

	$('.modal-click').click(function() {
		var $modal = this.id;
		$('#' + $modal + '-modal').css('display', 'block');
	});

	$('.modal-cycle').click(function() {
		var $prev = $(this).closest('.modal').attr('id');
		var $modal = this.id;
		$('#' + $modal + '-modal').css('display', 'block');
		$('#' + $prev).css('display', 'none');
	});

	$('.lookbook-modal-button').hover(function() {
		$(this).next().css('display', 'block');
		console.log($(this).attr('id') + "on");
	}, function() {
		$(this).next().css('display', 'none');
		console.log($(this).attr('id') + "off");
	});

	$('.modal-close').click(function() {
		$('.modal').css('display', 'none');
	});

	$('#slider img').click(function() {
		var $img = $(this).attr('src');
		var $id = $(this).closest('.modal-content-box').attr('id');
		var $mainView = $('#' + $id).find('.quick-view-main');
		$mainView.attr('src', $img);
		$('#slider img').css('border-bottom', 'none');
		$(this).css('border-bottom', '3px solid black');
	});

	$('.image-additional img').click(function() {
		var $img = $(this).attr('src');
		$('.quick-view-main').attr('src', $img);
	});

	// zoom in on images
	$('.quick-view-main').mouseover(function() {
		$(this).addClass('quick-view-transition');
	});

	$('.quick-view-container').on('mousemove', function(e) {
		$(this).children('.quick-view-main').css('transform-origin', ((e.pageX - $(this).offset().left) / $(this).width() * 100) + '% ' + ((e.pageY - $(this).offset().top) / $(this).height() * 100) + '%');
	});

	$('.quick-view-main').mouseleave(function() {
		$(this).removeClass('quick-view-transition');
	});

	$(window).click(function(event) {
		if (event.target.className == 'modal') {
			$('.modal').css('display', 'none');
		}
	});

	$('.panel-title').on('click', function() {
		var $span = $(this).find('span');
		if ($span.hasClass('glyphicon-minus')) {
			$span.removeClass('glyphicon-minus');
			$span.addClass('glyphicon-plus');
		}
		else {
			$span.removeClass('glyphicon-plus');
			$span.addClass('glyphicon-minus');
		}
	});


	$('#search-toggle').click(function() {
		$('#search input').slideToggle();
		$('#search-button').slideToggle();
	});

	$('.scrollwithArrow').on('click', function() {
		event.preventDefault();

	    $('html, body').animate({
	        scrollTop: $( $.attr(this, 'href') ).offset().top
	    }, 800);
	});

	// Optimalisation: Store the references outside the event handler:
    var $window = $(window);

	if( $('#no-top-margin').hasClass('no-top-margin') ){
		$('.navbar').css('margin-top','0px');
	}

	function checkWidth() {
		var windowsize = $window.width();
        if (windowsize < 768) {
        	// Add slideDown animation to dropdown
			$('.dropdown').on('show.bs.dropdown', function(e){
			  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
			});

			// Add slideUp animation to dropdown
			$('.dropdown').on('hide.bs.dropdown', function(e){
			  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
			});
        	
        	$('.row-2').addClass('fix-top');

        	if( $('#no-top-margin').hasClass('no-top-margin') ){
				$('#no-top-margin').css('margin-top','-110px');
			}
        }else {
        	if( $('#no-top-margin').hasClass('no-top-margin') ){
				$('.navbar').css('margin-top','0px');
				$('#no-top-margin').css('margin-top','0px');
			}
        	$('.row-2').removeClass('fix-top');
        }
	}

	// Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);

    $('img.lazy').lazyload({
    	load: function() {$(this).addClass('lazyloader'); }
    });

});

$(window).on('scroll', function (e) {

	if($(window).scrollTop() == 0){
        $('.navbar').css('opacity', (1) );
    }else {
    	$('.navbar').css('opacity', (.6) );
    }

});

// lazyload
// function lazyloader (image) {
// 	image.lazyload();
// }

// lazyloader($('img.lazy'));

