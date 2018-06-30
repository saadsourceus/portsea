	jQuery(document).ready(function($){
  var winWidth = $(window).width();
    if( winWidth <= 600 ){    
    
    $('.mob-slider').slick({
      autoplay: true,
      arrows: true,
      slidetoshow: 1,
    });
 
  }
	
    	 $(function() {
    $( "#tabs" ).tabs();

	 $('#sblock4_wrapper').on('click', '#spnext', function() {
              $( "#mc-game-content" ).animate({
                  'marginLeft': '-=240px'
                }, 200, function() {
                        
                });
          });
          
          $('#sblock4_wrapper').on('click', '#spprev', function() {
            if($( "#mc-game-content" ).css('marginLeft') < '0px'){

            
                $( "#mc-game-content" ).animate({
                    'marginLeft': '+=240px'
                }, 200, function() {

                });
            }
          })
          $('#sblock6_wrapper').on('click', '#spnext', function() {
              $( "#mc-game-content1" ).animate({
                  'marginLeft': '-=240px'
                }, 200, function() {
                        
                });
          });
          
          $('#sblock6_wrapper').on('click', '#spprev', function() {
            if($( "#mc-game-content1" ).css('marginLeft') < '0px'){

            
                $( "#mc-game-content1" ).animate({
                    'marginLeft': '+=240px'
                }, 200, function() {

                });
            }
          })
           $('#sblock7_wrapper').on('click', '#spnext', function() {
              $( "#mc-game-content2" ).animate({
                  'marginLeft': '-=240px'
                }, 200, function() {
                        
                });
          });
          
          $('#sblock7_wrapper').on('click', '#spprev', function() {
            if($( "#mc-game-content2" ).css('marginLeft') < '0px'){

            
                $( "#mc-game-content2" ).animate({
                    'marginLeft': '+=240px'
                }, 200, function() {

                });
            }
          })


             $('#sblock8_wrapper').on('click', '#spnext', function() {
              $( "#mc-game-content3" ).animate({
                  'marginLeft': '-=240px'
                }, 200, function() {
                        
                });
          });
          
          $('#sblock8_wrapper').on('click', '#spprev', function() {
            if($( "#mc-game-content3" ).css('marginLeft') < '0px'){

            
                $( "#mc-game-content3" ).animate({
                    'marginLeft': '+=240px'
                }, 200, function() {

                });
            }
          })


               $('#sblock9_wrapper').on('click', '#spnext', function() {
              $( "#mc-game-content4" ).animate({
                  'marginLeft': '-=240px'
                }, 200, function() {
                        
                });
          });
          
          $('#sblock9_wrapper').on('click', '#spprev', function() {
            if($( "#mc-game-content4" ).css('marginLeft') < '0px'){

            
                $( "#mc-game-content4" ).animate({
                    'marginLeft': '+=240px'
                }, 200, function() {

                });
            }
          })

          $('div.ladder').hide();
        $('div#ladder_61').show();

        $('#selectme4').change(function () {
          $('div.ladder').hide();

          $('#'+$(this).val()).show();
         
        });
      $('.player-profiles-archive .col-md-2').matchHeight();	
      $('.single-gallery').matchHeight();
 //     $('.page-template-contact-template .col-md-6').matchHeight();

      
      }); 	
    	 
    
		
		if($( window ).width() >= 992){
		$('#nav-container .menu > li > a').on('mouseenter',function(){
			$('#nav-container .menu > li > a').css('opacity',0.5);
			$('#nav-container .menu > li > a').css('color','#000');
      $(this).css('color','#fff');
			$(this).css('opacity',1);
			//$(".menu ul").css('visibility', 'visible');	
		});	
    $('#nav-container .menu > li > a').on('mouseleave',function(){
      $('#nav-container .menu > li > a').css('opacity',1);    
      $('#nav-container .menu > li > a').css('color','#fff');
    });


		$('ul.menu > li ul.sub-menu').on('mouseenter',function(){
			$('#nav-container .menu > li> a').css('opacity',0.5);
			$(this).siblings().css('opacity',1);
      $('#nav-container .menu > li > a').css('color','#000');
      $(this).css('color','#fff');
       $(this).parents("li").addClass('active-parent');
			//$(".menu ul").css('visibility', 'hidden');	
		});	
		$('ul.menu > li ul.sub-menu').on('mouseleave',function(){
      $('#nav-container .menu > li > a').css('opacity',1);    
      $('#nav-container .menu > li > a').css('color','#fff');
       $(this).parents("li").removeClass('active-parent');
    });
		
	}

		if($( window ).width() < 992){

    		//$(".js .main-nav .menu li ul").css('visibility', 'hidden');	
    		
		
		
			
					$('#nav-container .menu .menu-item-has-children a').click(function(e){		
					//$('#nav-container .menu .menu-item-has-children a .sub-menu li').addClass('active');			
			    	if(!$(this).parent().hasClass('active')) {
			        $('#nav-container .menu .menu-item-has-children a').removeClass('active');
			        $(this).parent().addClass('active');
			        e.preventDefault();
			    } else {
			        return true;
				    }
				});
		}
	  $('#sblock4_wrapper').on('click', '#spnext', function() {
              $( "#mc-game-content" ).animate({
                  'marginLeft': '-=240px'
                }, 200, function() {
                        
                });
          });
          
          $('#sblock4_wrapper').on('click', '#spprev', function() {
            if($( "#mc-game-content" ).css('marginLeft') < '0px'){

            
                $( "#mc-game-content" ).animate({
                    'marginLeft': '+=240px'
                }, 200, function() {

                });
            }
          })
$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#toTop').fadeIn();
    } else {
        $('#toTop').fadeOut();
    }
});
		$('div.ladder').hide();
        $('div#ladder_61').show();

        $('#selectme4').change(function () {
	        $('div.ladder').hide();

	        $('#'+$(this).val()).show();
         
        });
 
	$("#toTop").click(function () {
 
  		 $("html, body").animate({scrollTop: 0}, 800);

	});
	
		$('.heading, .widget-title, .entry-title, .page-title, .news-title').not('.coaches .heading, .staff .heading').each(function() {
			var h = $(this).html();
			var index = h.indexOf(' ');
			if(index == -1) {
			  index = h.length;
			}
			//$(this).html('<span class="first-word">' + h.substring(0, index) + '</span>' + $.trim(h.substring(index, h.length)));
		});

		$('.scroller').on('click', function(){
		
       $('html,body').animate({scrollTop: ($(this).offset().top + 160)}, 800);
   });

		
	
var first_img = $('.panel_youtube .ytCard .aggroPic:first img').attr('src');
		 if(typeof first_img === 'undefined'){
		 } else {
 			var fixed_img = first_img.replace("hqdefault", "maxresdefault");
			$('.panel_youtube .ytCard .aggroPic:first img').attr('src', fixed_img)
		};


	    $('.scroller').on('click', function(){
	        $('html,body').animate({scrollTop: ($(this).offset().top + 120)}, 800);
	    });

	})

	function createCookie(name, value, expires, path, domain) {
	  var cookie = name + "=" + escape(value) + ";";
	 
	  if (expires) {
	    // If it's a date
	    if(expires instanceof Date) {
	      // If it isn't a valid date
	      if (isNaN(expires.getTime()))
	       expires = new Date();
	    }
	    else
	      expires = new Date(new Date().getTime() + parseInt(expires) * 1000 * 60 * 60 * 24);
	 
	    cookie += "expires=" + expires.toGMTString() + ";";
	  }
	 
	  if (path)
	    cookie += "path=" + path + ";";
	  if (domain)
	    cookie += "domain=" + domain + ";";
	 
	  document.cookie = cookie;
	}

	function getCookie(name) {
	  var regexp = new RegExp("(?:^" + name + "|;\s*"+ name + ")=(.*?)(?:;|$)", "g");
	  var result = regexp.exec(document.cookie);
	  return (result === null) ? null : result[1];
	}

	function deleteCookie(name, path, domain) {
	  // If the cookie exists
	  if (getCookie(name))
	    createCookie(name, "", -1, path, domain);
	}


	if (screen && screen.width < 768) { 
	jQuery(document).ready(function($){
   $('#menu-main-menu li').children('ul').hide();
    $('#menu-main-menu li').click(function () {

    	$(this).siblings('li').children('ul,p').slideUp('slow');
        $(this).children('ul,p').slideUp('slow');


       $('#menu-main-menu li a').each(function () {
            if ($(this).attr('rel') != '') {
                $(this).removeClass($(this).attr('rel') + 'Over on')
            }
        });

       if ($(this).children('ul,p').is(':hidden') == true) {
        $(this).children('ul,p').slideDown('slow');
        return false
        }
    })
     $('#menu-02-main-menu li').children('ul').hide();
    $('#menu-02-main-menu li').click(function () {

    	$(this).siblings('li').children('ul,p').slideUp('slow');
        $(this).children('ul,p').slideUp('slow');


       $('#menu-02-main-menu li a').each(function () {
            if ($(this).attr('rel') != '') {
                $(this).removeClass($(this).attr('rel') + 'Over on')
            }
        });

       if ($(this).children('ul,p').is(':hidden') == true) {
        $(this).children('ul,p').slideDown('slow');
        return false
        }
    })
});
}







