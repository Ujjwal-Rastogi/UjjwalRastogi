( function( $ ) {

// put all theme related jQuery here


		/*
	    * Mobile nav toggle class
	    */
	    $('.site-header__hamburger-icon').click(function () {
	      $(this).toggleClass('nav-close nav-open');
	      $('.site-header__nav-container').toggleClass('mobile-hide mobile-show');
		});
		
		/* One Page Nav */

		$('#primary-menu').onePageNav({
			currentClass: 'current'
		});


	   /* Scroll to Top Start Here */
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 50) {        
				$('#return-to-top').fadeIn(200);   
			} else {
				$('#return-to-top').fadeOut(200);   
			}
		});
		$('#return-to-top').click(function() {      
			$('body,html').animate({
				scrollTop : 0                       
			}, 500);
		});
		/* Scroll to Top End Here */
		
		jQuery(window).load(function () {

			/* Sticky Header */
			$(window).on('scroll', function () {
				if ($(this).scrollTop() > 1) {
					$('.site-header').addClass("sticky");
				} else {
					$('.site-header').removeClass("sticky");
				}
			});
		});

		/*-----------------------------------------------------------------------------------*/
		/* PikMe Acnhor override when it is in the Home page                                                                  */
		/*-----------------------------------------------------------------------------------*/

	    function pikmeAnchorOverride() {

	        if($('body').hasClass('home'))
	        {

	            //console.log("Hide description");
	            $("a[href='/#home']").attr('href', '#home');
	            $("a[href='/#about']").attr('href', '#about');
	            $("a[href='/#services']").attr('href', '#services');
	            $("a[href='/#portfolio']").attr('href', '#portfolio');
	            $("a[href='/#testimonials']").attr('href', '#testimonials');
	            $("a[href='/#price']").attr('href', '#price');
	            $("a[href='/#blog']").attr('href', '#blog');
	            $("a[href='/#contact']").attr('href', '#contact');
	        }

	    }

    	pikmeAnchorOverride();

 } )( jQuery );
