$(document).ready(function () {
	
    //initialise Stellar.js
    $(window).stellar();
    //Cache some variables
    var links = $('#menu').find('li');
    slide = $('.slide');
    button = $('.button');
    mywindow = $(window);
    htmlbody = $('html,body');
    //Setup waypoints plugin
    //waypoints doesnt detect the first slide when user scrolls back up to the top so we add this little bit of code, that removes the class
    //from navigation link slide 2 and adds it to navigation link slide 1.
    if (mywindow.scrollTop() < 1) {
		$('#menu li[data-slide="1"]').addClass('activo');
	}

    slide.waypoint(function (event, direction) {

        dataslide = $(this).attr('data-slide');

        if (direction === 'down') {
            $('#menu li[data-slide="' + dataslide + '"]').addClass('activo').prev().removeClass('activo');
			
			$('#menu li[data-slide="1"]').removeClass('activo');
			
        }
        else {
            $('#menu li[data-slide="' + dataslide + '"]').addClass('activo').next().removeClass('activo');
        }

    });
     mywindow.scroll(function () {
        if (mywindow.scrollTop() == 0) {
            $('#menu li[data-slide="1"]').addClass('activo');
            $('#menu li[data-slide="2"]').removeClass('activo');
        }
        
    });
    function goToByScroll(dataslide) {
		var goal = $('.slide[data-slide="' + dataslide + '"]').offset().top;
		if (mywindow.scrollTop()<goal) {
			var goalPx = goal + 5;
		} else {
			var goalPx = goal - 50;
		}
        htmlbody.animate({
            scrollTop: goalPx
        }, 1500, 'easeInOutQuint');
    }


    links.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
    });

    button.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);

    });
    $("#portafolio, #habilidades, #portafolio").each(function () {
        var slide_h = $(this).height();
		
		$(this).css('background-size', '100% '+slide_h+'px');
		
    });
    /*$(".info-text .rotate").textrotator({
        animation: "flipUp",
        speed: 3250
      });*/
});