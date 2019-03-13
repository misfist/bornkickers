var height = 0;
function getSliderHeight(){
	height = $('.slider div.show').find('img').height();
	$('.slider').css('height',height);
	//alert(height);
}

$(function(){
	
	var slider = $('#slider');
	var slides = slider.find('.slider div');
	var slide_ctls = $('#slider-controls a');

	var scroller = $('#scroller');
	var logos = scroller.find('img');
	var scrollerWidth = 0;
	var count = 1;
	var logo_count = logos.length;
	
	setTimeout(function(){
		logos.each(function(){
			var $this = $(this).width();
			scrollerWidth += $this;
			if(count==logo_count){
				var margin = logo_count * 25;
				scroller.find('div').css('width',scrollerWidth + margin);
				console.log(scrollerWidth + margin);
			}else{
				count++;
			}
			console.log($this, scrollerWidth, count, logo_count);
		});
	}, 1000);

	slide_ctls.on('click',function(){
		var $this = $(this);
		var id = $this.attr('id').split('-ctl')[0];
		slide_ctls.removeClass('active');
		slides.fadeOut(500).removeClass('show');
		$this.addClass('active');
		slider.find('#'+id).fadeIn(500).addClass('show');
	});

	var url = $('#the-logo').attr('href');
	$('#new-header .logo').attr('href',url);

	setTimeout(function(){
		getSliderHeight();
	}, 1);

});

//  Resize flexslider header height - Javie 
$(window).resize(function(){
	getSliderHeight();
});

$(document).ready(function() {
    fixFlexsliderHeight();
});

$(window).load(function() {
    fixFlexsliderHeight();
});

$(window).resize(function() {
    fixFlexsliderHeight();
});

function fixFlexsliderHeight() {
    // Set fixed height based on the tallest slide
    $('.flexslider').each(function(){
        var sliderHeight = 0;
        $(this).find('.slides > li').each(function(){
            slideHeight = $(this).height();
            if (sliderHeight < slideHeight) {
                sliderHeight = slideHeight;
            }
        });
        $(this).find('ul.slides').css({'height' : sliderHeight});
    });
}
