$(document).ready(function() {
	
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

	$('span').click(function() {
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

	$(".navbar").hover(function() {
		$(this).css('opacity', (1));
	});

	if($(window).scrollTop() == 0){
        $('.navbar').css('opacity', (1) );
    }
});

$(window).load(function(){
	if( $('#no-top-margin').hasClass('no-top-margin') ){
		$('.navbar').css('margin-top','-50px');
	}
});

