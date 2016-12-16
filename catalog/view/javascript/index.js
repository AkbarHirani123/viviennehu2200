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
	$('.modal-content-box').each(function(index) {
		$(this).attr('id', 'box' + index);
	});

	$('.modal-click').click(function() {
		var $modal = this.id;
		$('#' + $modal + '-modal').css('display', 'block');
	});

	$('.close').click(function() {
		$('.pic-modal').css('display', 'none');
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

	// show back view when mouse stays on object
	var config = {
		over: function() {
			$(this).fadeOut(400);
			$(this).next().delay(400).fadeIn(600);
		},
		interval: 600,
		out: function() {}
	}
	$('.frontPic').hoverIntent(config);

	$('.backPic').mouseout(function() {
		$(this).fadeOut(400);
		$(this).prev().delay(400).fadeIn(600);
	});

});

$(window).on('scroll', function (e) {
	$('.navbar').css('opacity', (.4) );

	$(window).mousemove(function(){
		$(".navbar").mouseover(function() {
			$(this).css('opacity', (1));
			$(this).css('background-color','rgba(255, 255, 255, 1)')
		});

		$(".navbar").mouseout(function() {
			if($(window).scrollTop() == 0){
		        $('.navbar').css('opacity', (1) );
				$(this).css('background-color','transparent');
		    }
			else{
				$(this).css('opacity', (.4));
				$(this).css('background-color','transparent');
			}
		});
	});
	
	if($(window).scrollTop() == 0){
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

