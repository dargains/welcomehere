jQuery(document).ready(function($){
	//final width --> this is the quick view image slider width
	//maxQuickWidth --> this is the max-width of the quick-view panel
	var sliderFinalWidth = 600,
		maxQuickWidth = 1170;

	//open the quick view panel
	$('.numbat-trigger').on('click', function(event){
		var selectedImage = $(this).parent().parent().parent().find('.selected img');
			$(this).addClass('clicked');
			slectedImageUrl = selectedImage.attr('src');

			$('.portfolio-overlay').addClass('overlay-layer');
		animateQuickView(selectedImage, sliderFinalWidth, maxQuickWidth, 'open');

		//update the visible slider image in the quick view panel
		//you don't need to implement/use the updateQuickView if retrieving the quick view data with ajax
		//updateQuickView(slectedImageUrl);
	});

	//close the quick view panel
	$('.portfolio-overlay').on('click', function(event){
		//if( $(event.target).is('.numbat-close i') || $(event.target).is('.portfolio-overlay.overlay-layer')) {
			//closeQuickView( sliderFinalWidth, maxQuickWidth);
			$('.portfolio-overlay').removeClass('overlay-layer');
			$('.numbat-quick-view').removeClass('is-visible');
			$('.numbat-quick-view').removeClass('animate-width');
			$('.numbat-quick-view').removeClass('add-content');
		//}
	});
	$('.numbat-close i').on('click', function(event){
		//if( $(event.target).is('.numbat-close i') || $(event.target).is('.portfolio-overlay.overlay-layer')) {
			$('.portfolio-overlay').removeClass('overlay-layer');
			$('.numbat-quick-view').removeClass('is-visible');
			$('.numbat-quick-view').removeClass('animate-width');
			$('.numbat-quick-view').removeClass('add-content');
		//}
	});
	$(document).keyup(function(event){
		//check if user has pressed 'Esc'
    	if(event.which=='27'){
			//closeQuickView( sliderFinalWidth, maxQuickWidth);
			$('.portfolio-overlay.overlay-layer').removeClass('.overlay-layer');
			$('.numbat-quick-view').removeClass('.is-visible');
			$('.numbat-quick-view').removeClass('.animate-width');
			$('.numbat-quick-view').removeClass('.add-content');
		}
	});

	//quick view slider implementation
	$('.numbat-quick-view').on('click', '.numbat-slider-navigation a', function(){
		updateSlider($(this));
	});

	//center quick-view on window resize
	$(window).on('resize', function(){
		if($('.numbat-quick-view').hasClass('is-visible')){
			window.requestAnimationFrame(resizeQuickView);
		}
	});

	function updateSlider(navigation) {
		var sliderConatiner = navigation.parents('.numbat-slider-wrapper').find('.numbat-slider'),
			activeSlider = sliderConatiner.children('.selected').removeClass('selected');
		if ( navigation.hasClass('numbat-next') ) {
			( !activeSlider.is(':last-child') ) ? activeSlider.next().addClass('selected') : sliderConatiner.children('li').eq(0).addClass('selected'); 
		} else {
			( !activeSlider.is(':first-child') ) ? activeSlider.prev().addClass('selected') : sliderConatiner.children('li').last().addClass('selected');
		} 
	}

	function updateQuickView(url) {
		$('.numbat-quick-view .numbat-slider li').removeClass('selected').find('img[src="'+ url +'"]').parent('li').addClass('selected');
	}

	function resizeQuickView() {
		var quickViewLeft = ($(window).width() - $('.numbat-quick-view').width())/2,
			quickViewTop = ($(window).height() - $('.numbat-quick-view').height())/2;
		$('.numbat-quick-view').css({
		    "top": quickViewTop,
		    "left": quickViewLeft,
		});
	} 

	// function closeQuickView(finalWidth, maxQuickWidth) {
	// 	var close = $('.numbat-close i'),
	// 		activeSliderUrl = close.siblings('.numbat-slider-wrapper').find('.selected img').attr('src'),
	// 		selectedImage = $('.empty-box').find('img');
	// 	//update the image in the gallery
	// 	if( !$('.numbat-quick-view').hasClass('velocity-animating') && $('.numbat-quick-view').hasClass('add-content')) {
	// 		selectedImage.attr('src', activeSliderUrl);
	// 		animateQuickView(selectedImage, finalWidth, maxQuickWidth, 'close');
	// 	} else {
	// 		closeNoAnimation(selectedImage, finalWidth, maxQuickWidth);
	// 	}
	// }

	function animateQuickView(image, finalWidth, maxQuickWidth, animationType) {
		//store some image data (width, top position, ...)
		//store window data to calculate quick view panel position
		var parentListItem = image.parent('.numbat-item'),
			topSelected = image.offset().top - $(window).scrollTop(),
			leftSelected = image.offset().left,
			widthSelected = image.width(),
			heightSelected = image.height(),
			windowWidth = $(window).width(),
			windowHeight = $(window).height(),
			finalLeft = (windowWidth - finalWidth)/2,
			finalHeight = finalWidth * heightSelected/widthSelected,
			finalTop = (windowHeight - finalHeight)/2,
			quickViewWidth = ( windowWidth * .8 < maxQuickWidth ) ? windowWidth * .8 : maxQuickWidth ,
			quickViewLeft = (windowWidth - quickViewWidth)/2;

		if( animationType == 'open') {
			//hide the image in the gallery
			parentListItem.addClass('empty-box');
			//place the quick view over the image gallery and give it the dimension of the gallery image
			var currenntQuickView = jQuery('.numbat-trigger.clicked').parent().parent().parent().find('.numbat-quick-view');
			$(currenntQuickView).css({
			    "top": topSelected,
			    "left": leftSelected,
			    "width": widthSelected,
			}).velocity({
				//animate the quick view: animate its width and center it in the viewport
				//during this animation, only the slider image is visible
			    'top': finalTop+ 'px',
			    'left': finalLeft+'px',
			    'width': finalWidth+'px',
			}, 1000, [ 400, 20 ], function(){
				//animate the quick view: animate its width to the final value

				var currenntQuickView = jQuery('.numbat-trigger.clicked').parent().parent().parent().find('.numbat-quick-view');
				//console.log(currenntQuickView);

				$(currenntQuickView).addClass('animate-width').velocity({
					'left': quickViewLeft+'px',
			    	'width': quickViewWidth+'px',
				}, 300, 'ease' ,function(){
					//show quick view content
					var currenntQuickView = jQuery('.numbat-trigger.clicked').parent().parent().parent().find('.numbat-quick-view');
					$(currenntQuickView).addClass('add-content');
				});
			}).addClass('is-visible');
		} else {
			//close the quick view reverting the animation
			$('.numbat-quick-view').removeClass('add-content').velocity({
			    'top': finalTop+ 'px',
			    'left': finalLeft+'px',
			    'width': finalWidth+'px',
			}, 300, 'ease', function(){
				$('.portfolio-overlay').removeClass('overlay-layer');
				$('.numbat-quick-view').removeClass('animate-width').velocity({
					"top": topSelected,
				    "left": leftSelected,
				    "width": widthSelected,
				}, 500, 'ease', function(){
					$('.numbat-quick-view').removeClass('is-visible');
					$('.numbat-trigger').removeClass('clicked');
					parentListItem.removeClass('empty-box');
				});
			});
		}
	}
	function closeNoAnimation(image, finalWidth, maxQuickWidth) {
		var parentListItem = image.parent('.numbat-item'),
			topSelected = image.offset().top - $(window).scrollTop(),
			leftSelected = image.offset().left,
			widthSelected = image.width();

		//close the quick view reverting the animation
		$('.portfolio-overlay').removeClass('overlay-layer');
		parentListItem.removeClass('empty-box');
		$('.numbat-quick-view').velocity("stop").removeClass('add-content animate-width is-visible').css({
			"top": topSelected,
		    "left": leftSelected,
		    "width": widthSelected,
		});
	}
});