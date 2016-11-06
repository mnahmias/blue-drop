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
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired

      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page

				window.sr = ScrollReveal({ duration: 1000 });
				sr.reveal('.scroll-item');

				var rain = [], drops = [];
				var gravity = 0.2;
				var wind = 0.015;
				var rain_chance = 0.4;

				window.requestAnimFrame =
				    window.requestAnimationFrame ||
				    window.webkitRequestAnimationFrame ||
				    window.mozRequestAnimationFrame ||
				    window.oRequestAnimationFrame ||
				    window.msRequestAnimationFrame ||
				    function(callback) {
				        window.setTimeout(callback, 1000 / 60);
				    };

				var canvas = document.getElementById('raindrops');
				var ctx = canvas.getContext('2d');
				canvas.width = window.innerWidth;
				canvas.height = $('.hero--rain').height();

				//--------------------------------------------

				var Vector = function(x, y) {

				  this.x = x || 0;
				  this.y = y || 0;
				};

				Vector.prototype.add = function(v) {

				  if (v.x != null && v.y != null) {

				    this.x += v.x;
				    this.y += v.y;

				  } else {

				    this.x += v;
				    this.y += v;
				  }

				  return this;
				};

				Vector.prototype.copy = function() {

				  return new Vector(this.x, this.y);
				};

				//--------------------------------------------

				var Rain = function() {

				  this.pos = new Vector(Math.random() * canvas.width, -50);
				  this.prev = this.pos;

				  this.vel = new Vector();
				};

				Rain.prototype.update = function() {

				  this.prev = this.pos.copy();

				  this.vel.y += gravity;
				  this.vel.x += wind;

				  this.pos.add(this.vel);
				};

				Rain.prototype.draw = function() {

				  ctx.beginPath();
				  ctx.moveTo(this.pos.x, this.pos.y);
				  ctx.lineTo(this.prev.x, this.prev.y);
				  ctx.stroke();
				};

				//--------------------------------------------

				var Drop = function(x, y) {

				  var dist = Math.random() * 7;
				  var angle = Math.PI + Math.random() * Math.PI;

				  this.pos = new Vector(x, y);

				  this.vel = new Vector(
				    Math.cos(angle) * dist,
				    Math.sin(angle) * dist
				    );
				};

				Drop.prototype.update = function() {

				  this.vel.y += gravity;

				  this.vel.x *= 0.95;
				  this.vel.y *= 0.95;

				  this.pos.add(this.vel);
				};

				Drop.prototype.draw = function() {

				  ctx.beginPath();
				  ctx.arc(this.pos.x, this.pos.y, 1, 0, Math.PI * 2);
				  ctx.fill();
				};

				//--------------------------------------------

				function update() {

				  ctx.clearRect(0, 0, canvas.width, canvas.height);

				  var i = rain.length;
				  while (i--) {

				    var raindrop = rain[i];

				    raindrop.update();

				    if (raindrop.pos.y >= canvas.height) {

				      var n = Math.round(4 + Math.random() * 4);

				      while (n--)
				      drops.push(new Drop(raindrop.pos.x, canvas.height));

				      rain.splice(i, 1);
				    }

				    raindrop.draw();
				  }

				  var i = drops.length;
				  while (i--) {

				    var drop = drops[i];
				    drop.update();
				    drop.draw();

				    if (drop.pos.y > canvas.height) drops.splice(i, 1);
				  }

				  if (Math.random() < rain_chance) rain.push(new Rain());

				  requestAnimFrame(update);
				}

				function init() {

				  ctx.lineWidth = 1;
				  ctx.strokeStyle = 'rgba(0,105,196,1)';
				  ctx.fillStyle = 'rgba(0,105,196,1)';

				  update();
				}

				init();
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
		'our_team': {
			init: function() {
				// JavaScript to be fired on the our team page
				window.sr = ScrollReveal({ duration: 1000 });
				sr.reveal('.team-member');
			}
		},
    'services': {
      init: function() {
        // JavaScript to be fired on the services page
				var $grid = jQuery('#services_gallery').masonry({
				  itemSelector: '.gallery-item',
					columnWidth: '.gallery-sizer',
  				percentPosition: true,
					isAnimated: true,
				  animationOptions: {
				    duration: 200,
				    easing: 'linear',
				    queue: false
				  }
				});


				$grid.on( 'click', '.gallery-item__button', function( event ) {
					event.preventDefault();
					var elid = $(this).parents('.gallery-item').attr('id');
					console.log(elid);
					if($('.gallery-item--open')){
						$('.gallery-item--open').find('.gallery-item__full-text').hide();
						$('.gallery-item--open').find('.gallery-item__button').fadeIn();
						$('.gallery-item--open').find('.gallery-item__desc').fadeIn();
						$('.gallery-item--open').toggleClass('gallery-item--open');
					}
				  $( this ).parents('.gallery-item').toggleClass('gallery-item--open');
					$( this ).hide();
					$( this ).siblings('.gallery-item__desc').hide();
					$( this ).siblings('.gallery-item__full-text').fadeIn();
				  $grid.masonry();
					$('html, body').animate({
			        scrollTop: $('#'+elid).offset().top - 100
			    }, 'slow');
				});

				var hash = location.hash;
				if(hash != ''){
					$(hash).addClass('gallery-item--open');
					$(hash).find('.gallery-item__button').hide();
					$(hash).find('.gallery-item__desc').hide();
					$(hash).find('.gallery-item__full-text').fadeIn();
					$grid.masonry();
					$('html, body').animate({
			        scrollTop: $(hash).offset().top - 100
			    }, 'slow');
				}

				if(hash == ''){
					window.sr = ScrollReveal({ duration: 1000 });
					sr.reveal('.gallery-item');
				}
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
