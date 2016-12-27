/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

				//Smoothstate

				function addBlacklistClass() {
				    $( 'a' ).each( function() {
				        if ( this.href.indexOf('/wp-admin/') !== -1 ||
				             this.href.indexOf('/wp-login.php') !== -1 ) {
				            $( this ).addClass( 'wp-link' );
				        }
				    });
				}

				function smoothScroll(){
					$('a[href*="#"]:not([href="#"])').click(function() {
				    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				      var target = $(this.hash);
				      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				      if (target.length) {
				        $('html, body').animate({
				          scrollTop: target.offset().top - 100
				        }, 1000);
				        return false;
				      }
				    }
				  });
				}

				function affixAnchor(){
					if($('#service-anchor').length){
						// console.log('running');
						$('#service-anchor').affix({
						  offset: {
						    top: 250
						  }
						});
					}
				};

				// function evenOutTeam(){
				// 	$('.team-member').equalHeights();
				// };

				addBlacklistClass();
				smoothScroll();
				affixAnchor();
				// evenOutTeam();
				// $(window).resize(function(){
				//   $('.team-member').height('auto');
				//   $('.team-member').equalHeights();
				// });


				if($('.admin-bar').length){
					//dont run smoothstate if logged in
				} else {
					var $page = $('#main'),
							options = {
								debug: true,
								prefetch: true,
								cacheLength: 2,
								forms: 'form',
								blacklist: '.wp-link',
								onStart: {
									duration: 250, // Duration of our animation
									render: function ($container) {
										// Add your CSS animation reversing class
										$container.addClass('is-exiting');
										// Restart your animation
										smoothState.restartCSSAnimations();
									}
								},
								onReady: {
									duration: 0,
									render: function ($container, $newContent) {
										// Remove your CSS animation reversing class
										$container.removeClass('is-exiting');
										// Inject the new content
										$container.html($newContent);

										addBlacklistClass();
										smoothScroll();
										affixAnchor();
										// evenOutTeam();
									}
								}
							},
							smoothState = $page.smoothState(options).data('smoothState');
				}

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired

      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page


      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
		'our_team': {
			init: function() {
				// JavaScript to be fired on the our team page

			}
		},
    'services': {
      init: function() {
        // JavaScript to be fired on the services page

      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
