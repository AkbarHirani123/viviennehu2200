$(document).ready(function() {

    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
    sideslider.click(function(event){
        $(sel).toggleClass('in');
        $(sel2).toggleClass('out');
    });
	
	// fixes breadcrumbs to topNav on all pages
	// $('.breadcrumb').addClass('breadcrumbs');
	// $('.breadcrumbs').append('<div class="cart pull-right">' + 
	// 	'<a href="<?php echo $shopping_cart; ?>" title="<?php echo $text_shopping_cart; ?>"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_shopping_cart; ?></span></a>' + 
	// 	'<a href="<?php echo $checkout; ?>" title="<?php echo $text_checkout; ?>"><i class="fa fa-share"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_checkout; ?></span></a>' + 
	// 	'</div>');

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
		$('#search input').toggle();
	});

	$('.scrollwithArrow').on('click', function() {
		event.preventDefault();

	    $('html, body').animate({
	        scrollTop: $( $.attr(this, 'href') ).offset().top
	    }, 800);
	});

});

$(window).on('scroll', function (e) {
	$('.navbar').css('background-color', 'white' );
	$('.navbar').css('opacity', (.6) );

	$(window).mousemove(function(){
		$(".navbar").mouseover(function() {
			$(this).css('background-color','white');
			$(this).css('opacity', (1));
		});

		$(".navbar").mouseout(function() {
			if($(window).scrollTop() == 0){
				$(this).css('background-color','white');
		        $('.navbar').css('opacity', (1) );
		    }
			else{
				$('.navbar').css('background-color', 'white' );
				$(this).css('opacity', (.6));
			}
		});
	});
	
	if($(window).scrollTop() == 0){
		$('.navbar').css('background-color','white');
        $('.navbar').css('opacity', (1) );
    }

    
});

$(window).load(function(){
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
        	$('.navbar').css('margin-top','0px');
        }else {
        	if( $('#no-top-margin').hasClass('no-top-margin') ){
				$('.navbar').css('margin-top','0px');
			}
        	$('.row-2').removeClass('fix-top');
        }
	}

	// Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);
});

