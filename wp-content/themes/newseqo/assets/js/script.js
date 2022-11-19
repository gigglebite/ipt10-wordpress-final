jQuery( document ).ready( function($){
   "use strict";

  /* ----------------------------------------------------------- */
  /*  Mobile Menu
  /* ----------------------------------------------------------- */
   $('.dropdown > a').on('click', function(e) {
      var dropdown = $(this).parent('.dropdown');
      dropdown.find('>.dropdown-menu').slideToggle('show');
      $(this).toggleClass('opened');
      return false;
    });
    
    $('.comment-form-comment label').remove();

    $('.video-tab-list .post-tab-list li').on('click',function(){
      $('.video-index').html($(this).data('index'));
   });

   if ($(".video-tab-scrollbar").length > 0) {

   $(".video-tab-scrollbar").mCustomScrollbar({
         mouseWheel: true,
         scrollButtons: {
            enable: true
         }
   });

   }
    


   /* ----------------------------------------------------------- */
   /*  Back to top
   /* ----------------------------------------------------------- */

   $(window).on('scroll', function () {
    if ($(window).scrollTop() > $(window).height()) {
       $(".BackTo").fadeIn('slow');
    } else {
       $(".BackTo").fadeOut('slow');
    }

    });

    $("body, html").on("click", ".BackTo", function (e) {
        e.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, 800);
    });

    var comment_form = $('textarea#comment');
    if(comment_form.length){
      $('textarea#comment').html($('textarea#comment').html().trim());
    }

   /* ----------------------------------------------------------- */
   /*  related post
   /* ----------------------------------------------------------- */  
    var related_post = parseInt( $('.related-post-slider').data('count') );
    $(".related-post-slider").owlCarousel(
            {
            items: related_post,
            dots: false,
            loop: true,
            nav: true,
            margin: 30,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
               // breakpoint from 0 up
               0: {
                     items: 1,
               },
               // breakpoint from 480 up
               480: {
                     items: 2,
               },
               // breakpoint from 768 up
               768: {
                     items: 2,
               },
               // breakpoint from 768 up
               1200: {
                     items: related_post,
               }
            }
         }
      );

     
    var feature_post = parseInt( $('.feature-post-slider').data('count') );
    $(".feature-post-slider").owlCarousel(
            {
            items: feature_post,
            dots: false,
            loop: true,
            nav: true,
            margin: 30,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
               // breakpoint from 0 up
               0: {
                     items: 1,
               },
               // breakpoint from 480 up
               480: {
                     items: 2,
               },
               // breakpoint from 768 up
               768: {
                     items: 2,
               },
               // breakpoint from 768 up
               1200: {
                     items: feature_post,
               }
            }
         }
      );

      /*==========================================================
                   search popup
        ======================================================================*/
        if ($('.xs-modal-popup').length > 0) {
         $('.xs-modal-popup').magnificPopup({
             type: 'inline',
             fixedContentPos: false,
             fixedBgPos: true,
             overflowY: 'auto',
             closeBtnInside: false,
             callbacks: {
                 beforeOpen: function beforeOpen() {
                     this.st.mainClass = "my-mfp-slide-bottom xs-promo-popup";
                 }
             }
         });
    }

    if ($('.ts-play-btn').length > 0) {
      $('.ts-play-btn').magnificPopup({
          type: 'iframe',
          mainClass: 'mfp-with-zoom',
          zoom: {
              enabled: true, // By default it's false, so don't forget to enable it
   
              duration: 300, // duration of the effect, in milliseconds
              easing: 'ease-in-out', // CSS transition easing function
   
              opener: function (openerElement) {
                  return openerElement.is('img') ? openerElement : openerElement.find('img');
              }
          }
      });
   }

    // video tab scroll 
    if ($(".video-tab-scrollbar").length > 0) {
        $(".video-tab-scrollbar").mCustomScrollbar({
            mouseWheel: true,
            scrollButtons: {
                    enable: true
            }
        });
    }

} );


