( function ($, elementor) {
	"use strict";


    var Newseqo = {

        init: function () {
            
            var widgets = {
                'newseqo-main-slider.default': Newseqo.Newseqo_main_slider,
                'newseqo-post-grid-slider.default': Newseqo.Newseqo_post_grid_slider,
                'newseqo-post-block-slider.default': Newseqo.Newseqo_post_block_slider,
                'news-ticker.default': Newseqo.NewsTicker,
 
            };
            $.each(widgets, function (widget, callback) {
                elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
            });
           
      },
      // widgets function
      
            /* ----------------------------------------------------------- */
            /*  main slider
            /* ----------------------------------------------------------- */
            Newseqo_main_slider:function($scope){
            
               var $container = $scope.find('.main-slider');
               var control_data = $container.attr('data-controls');
               var autoslide = true;
               var nav = true;
               var dot_nav = false;
               if(control_data){
               var controls= JSON.parse(control_data);
               var autoslide = Boolean(controls.auto_nav_slide?true:false);
               var nav = Boolean(controls.nav_show?true:false);
               var dot_nav = Boolean(controls.dot_nav_show?true:false);
               }

                if ($container.length > 0) {
                      $container.owlCarousel({
                         items: 1,
                         loop: false,
                         autoplay: autoslide,
                         nav: nav,
                         dots: dot_nav,
                         autoplayTimeout: 8000,
                         autoplayHoverPause: true,
                         mouseDrag: true,
                         smartSpeed: 1100,
                         margin:30,
                         navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                         responsive: {
                            0: {
                               items: 1,
                            },
                            600: {
                               items: 1,
                            },
                            1000: {
                               items:1,
                            }
                         }
                   
                      });
                }
           
          },

           /* ----------------------------------------------------------- */
            /*  Grid slider
            /* ----------------------------------------------------------- */
            Newseqo_post_grid_slider:function($scope){
            
                  var $container = $scope.find('.weekend-top');
                  var controls = JSON.parse($container.attr('data-controls'));
                  var item_count = parseInt( controls.item_count );
                  var nav = Boolean(controls.nav_show?true:false);
                  var dot_nav = Boolean(controls.dot_nav_show?true:false);
                 
                if ($container.length > 0) {
                      $container.owlCarousel({
                         items: item_count,
                         loop: true,
                         autoplay: true,
                         nav: nav,
                         dots: dot_nav,
                         autoplayTimeout: 8000,
                         autoplayHoverPause: true,
                         mouseDrag: true,
                         smartSpeed: 1100,
                         margin:30,
                         navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                         responsive: {
                            0: {
                               items: 1,
                            },
                            600: {
                               items: 2,
                            },
                            1000: {
                               items:item_count,
                            }
                         }
                   
                      });
                }
           
          },

          /* ----------------------------------------------------------- */
		/*  news ticker
      	/* ----------------------------------------------------------- */
		NewsTicker: function( $scope ) {
			let $container = $scope.find( '.trending-slide .slider-container .swiper-container ' );

			if ( $container.length > 0 ) {
				// eslint-disable-next-line
				new Swiper($container, {
					slidesPerView: 1,
					centeredSlides: false,
					loop: true,
					wrapperClass: 'swiper-wrapper',
					slideClass: 'swiper-slide',
					grabCursor: false,
					allowTouchMove: true,
					speed: 1500, //slider transition speed
					parallax: true,
					autoplay:  true ? { delay: 4000 } : 0, //delay between two slides
					effect: 'slide',
					mousewheelControl: 1,
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
				} );
			}
		},


      /* ----------------------------------------------------------- */
            /*  Grid slider
            /* ----------------------------------------------------------- */
            Newseqo_post_block_slider:function($scope){
            
                var $container = $scope.find('.block-slider');
                 var controls = JSON.parse($container.attr('data-controls'));
                     
                 var autoslide = Boolean(controls.auto_nav_slide?true:false);
                 var dot_nav = Boolean(controls.dot_nav_show?true:false);
                 var item_count = parseInt( controls.item_count );
                
                 
                if ($container.length > 0) {
                      $container.owlCarousel({
                         items: item_count,
                         loop: true,
                         autoplay: autoslide,
                         nav: false,
                         dots: dot_nav,
                         autoplayTimeout: 8000,
                         autoplayHoverPause: true,
                         mouseDrag: true,
                         smartSpeed: 1100,
                         margin:30,
                         navText: ["<i class='icon icon-arrow-left'></i>", "<i class='xts-icon xts-arrow-right'></i>"],
                         responsive: {
                           0: {
                              items: 1,
                           },
                           600: {
                              items: 2,
                           },
                           1000: {
                              items: 3,
                           },
                           1200: {
                              items:item_count,
                           }
                        }
                   
                      });
                }
           
          }

          
    };
    $(window).on('elementor/frontend/init', Newseqo.init);
}(jQuery, window.elementorFrontend) ); 

