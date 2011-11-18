<?php

require_once('../../../../wp-load.php');

include_once('../js-settings.php');

global $themename, $shortname;

header('content-type:application/x-javascript');

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

?>

var $j = jQuery.noConflict();

$j(document).ready(function(){

    /* Dots Slider 1 */
    $j(function(){
    	$j('#dotsSlider')
    	.after('<div id="dotsSliderNav">')
    	.cycle({
    		fx:	'<?php echo $dots_slider_1_effect; ?>',
    		speed:	<?php echo $dots_slider_1_speed; ?>,
    		timeout: <?php echo $dots_slider_1_timeout; ?>, 
    		pager:	'#dotsSliderNav',
    		after:	onAfter
    	});
    
    	function onAfter() {
    		//get the height of the current slide
    		var $ht = $j(this).height();
    		//set the container's height to that of the current slide
    		$j(this).parent().animate({height: $ht});
    	}
    });
    /* End Dots Slider 1 */
    
    
    /* Rondabout Slider */
    $j(function(){
    	$j('#roundaboutSlider').roundabout({
    		minScale: 0.9,
    		minOpacity: 0.9,
    		easing: '<?php echo $roundabout_slider_easing; ?>',
    		duration: <?php echo $roundabout_slider_duration; ?>,
    		clickToFocus: false,
    		btnNext: '.nextSlide',
    		btnPrev: '.previousSlide'
    	});
    });
    /* End Rondabout Slider */
    
    /* Dots Slider 2 */
	$j(function(){
		$j('#dotsSlider2')
		.after('<div id="dotsSlider2Nav">')
		.cycle({
    		fx:	'<?php echo $dots_slider_2_effect; ?>',
    		speed:	<?php echo $dots_slider_2_speed; ?>,
    		timeout: <?php echo $dots_slider_2_timeout; ?>, 
			pager:	'#dotsSlider2Nav',
			height: '401px',
			prev:   '.prevDotsSlide',
			next:   '.nextDotsSlide'
		});
	});
	/* End Dots Slider 2 */
	
	/* Single Portfolio Slider */
	$j(function(){
		$j('#portfolioSlider')
		.after('<div id="portfolioSliderNav">')
		.cycle({
			fx:		'fade',
			speed:	400,
			timeout: 3000,
			pager:	'#portfolioSliderNav',
			height: '490px'
		});
	});
	/* End Single Portfolio Slider */
	
	/* Piecemaker 3D Slider */
	$j(function(){
		var flashvars = {};
		flashvars.xmlSource = "<?php bloginfo('template_url'); ?>/piecemaker-xml.php";
		flashvars.cssSource = "<?php bloginfo('template_url'); ?>/piecemaker/piecemaker.css";
		flashvars.imageSource = "<?php echo $piecemaker_images_path; ?>";
		var attributes = {};
		attributes.wmode = "transparent";
		swfobject.embedSWF("<?php bloginfo('template_url'); ?>/piecemaker/piecemaker.swf", "piecemakerSlider", "1200", "500", "10", "<?php bloginfo('template_url'); ?>/piecemaker/expressInstall.swf", flashvars, attributes);
	});
	/* End Piecemaker 3D Slider */
	
	/* Tabs Slider */
	$j(function(){
		$j.slideshow = {
			context: false,
			tabs: false,
			timeout: <?php echo $tabs_slider_timeout; ?>,
			slideSpeed: <?php echo $tabs_slider_slide_speed; ?>,
			tabSpeed: <?php echo $tabs_slider_tab_speed; ?>,
			fx: '<?php echo $tabs_slider_effect; ?>',
	
			init: function() {
				this.context = $j('#tabsSlider');
				this.tabs = $j('#tabsNav li', this.context);
				this.tabs.remove();
				this.prepareSlideshow();
				this.fillEmptyGap();
			},
	
			prepareSlideshow: function() {
				$j('#tabsSlides > ul', $j.slideshow.context).cycle({
					fx: $j.slideshow.fx,
					timeout: $j.slideshow.timeout,
					speed: $j.slideshow.slideSpeed,
					fastOnEvent: $j.slideshow.tabSpeed,
					pager: $j('#tabsNav', $j.slideshow.context),
					pagerAnchorBuilder: $j.slideshow.prepareTabs,
					before: $j.slideshow.activateTab,
					pauseOnPagerHover: true,
					pause: true
				});
			},
	
			prepareTabs: function(i, slide) {
				return $j.slideshow.tabs.eq(i);
			},

			fillEmptyGap: function() {
				// fill possibly empty gap in the end
				var tabsLiWidths = 0,
					tabsUl = $j('#tabsNav').outerWidth(true);
	
				$j('#tabsNav li').each(function() {
					tabsLiWidths += $j(this).outerWidth(true);
				});
	
				var fillWidth = tabsUl - tabsLiWidths;
	
				if (fillWidth >= 1) {
					$j('#tabsNav').append('<span class="fill">&nbsp;</span>');
					$j('#tabsNav span.fill').css('width',fillWidth);
				} else {
					$j('#tabsNav li:last-child').css('-moz-border-radius-bottomright','9px');
				}
			}
			
		};
		
		$j('body').addClass('js');
		
		$j.slideshow.init();
		
	});
	/* End Tabs Slider */
	
	/* Sidebar Widget Slider */
	$j(function(){
		$j("#subpage .sidebar h6.widget-title").click(function(){
			$j(this).toggleClass("active").next().slideToggle(400);
			return false;
		});
	});
	/* End Sidebar Widget Slider */

	/* clearField */
	$j(function(){
		$j('.clearField').clearField();
	});
	/* End clearField */
	
	/* Fancybox Images */
	$j(function(){
		$j("a.single_image").fancybox({
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic',
			'titlePosition'	: 'over'
		});
		$j("a.multi_images").fancybox({
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic',
			'titlePosition'	: 'over'
		});
	});
	/* End Fancybox Images */

	/* Fancybox Iframe */
	jQuery(function(){
		$j("a.iframe").fancybox({
			'width'				: '75%',
			'height'			: '75%',
			'autoScale'     	: false,
			'transitionIn'		: 'fade',
			'transitionOut'		: 'fade',
			'type'				: 'iframe',
			'titleShow'		    : false
		});
	});
	/* End Fancybox Iframe */

	/* Fancybox Youtube Video */
	jQuery(function(){
		$j(".youtube_video").click(function() {
			$j.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'transitionIn'	: 'fade',
					'transitionOut'	: 'fade',
					'title'			: this.title,
					'width'		    : 680,
					'height'		: 495,
					'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
					'type'			: 'swf',
					'swf'			: {
						'wmode'		: 'transparent',
						'allowfullscreen'	: 'true'
					}
				});

			return false;
		});
	});
	/* End Fancybox Youtube Video */
	
	/* Zoom Icon */
	$j(function(){
		$j(".zoom a").append("<span></span>");
		$j(".zoom a").hover(function(){
			$j(this).children("img").stop(true, true).animate({opacity:0.7},300);
			$j(this).children("span").stop(true, true).fadeIn(300);
		},function(){
			$j(this).children("img").stop(true, true).animate({opacity:1},250);
			$j(this).children("span").stop(true, true).fadeOut(250);
		});
		
		$j(".gallery .gallery-icon a").hover(function(){
			$j(this).children("img").stop(true, true).animate({opacity:0.6},300);
		},function(){
			$j(this).children("img").stop(true, true).animate({opacity:1},250);
		});
	});
	/* End Zoom Icon */
	
	/* Accordion Content */
	$j(function(){
		//Set default open/close settings
		$j('.acc_container').hide(); //Hide/close all containers
		$j('.acc_trigger:first').addClass('active').next().show(); //Add "active" class to first trigger, then show/open the immediate next container
		
		// Set widths to fix jumping bug
		fullWidth = $j('.acc_container').outerWidth(true);
		$j('.acc_trigger').css('width',fullWidth);
		$j('.acc_container').css('width',fullWidth);

		//On Click
		$j('.acc_trigger').click(function(){
			if( $j(this).next().is(':hidden') ) { //If immediate next container is closed...
				$j('.acc_trigger').removeClass('active').next().slideUp(300); //Remove all "active" state and slide up the immediate next container
				$j(this).toggleClass('active').next().slideDown(300); //Add "active" state to clicked trigger and slide down the immediate next container
			}
			return false; //Prevent the browser jump to the link anchor
		});
	});
	/* End Accordion Content */
	
	/* Content Tabs */
	$j(function(){
		//When page loads...
		$j(".tab_content").hide(); //Hide all content
		$j("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$j(".tab_content:first").show(); //Show first tab content

		//On Click Event
		$j("ul.tabs li").click(function() {

			$j("ul.tabs li").removeClass("active"); //Remove any "active" class
			$j(this).addClass("active"); //Add "active" class to selected tab
			$j(".tab_content").hide(); //Hide all tab content

			var activeTab = $j(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
			$j(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		});
	});
	/* End Content Tabs */
	
	/* Input Placeholder for All Browsers */
	$j('[placeholder]').focus(function() {
		var input = $j(this);
		if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		}
		}).blur(function() {
			var input = $j(this);
			if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			}
		}).blur().parents('form').submit(function() {
		$j(this).find('[placeholder]').each(function() {
			var input = $j(this);
				if (input.val() == input.attr('placeholder')) {
				input.val('');
			}
		})
	});
	/* End Input Placeholder for All Browsers */

});