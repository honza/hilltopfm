var $j = jQuery.noConflict();

$j(document).ready(function(){

	/* CSS fix for IE */
	$j(function(){
		$j('#navigation .nav ul li:last-child').css('border-bottom','none');
		$j('#tabsNav li:last-child').css('border-right','none');
		$j('.gallery .gallery-item:last-child').css('border-right','none');
		$j('.gallery .gallery-item:last-child').css('padding-right','0');
		$j('#footer .latestPosts li:last-child').css('padding-bottom','0');
		$j('#footer .latestPosts li:last-child').css('background','none');
		$j('#footer .socialLinks li:last-child a').css('border-bottom','none');
	});
	/* End CSS fix for IE */

});