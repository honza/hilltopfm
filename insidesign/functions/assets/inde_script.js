jQuery(document).ready(function(){
	jQuery('.inde_options').slideUp();
	
	jQuery('.inde_section h3').click(function(){		
		if(jQuery(this).parent().next('.inde_options').css('display')=='none')
			{	jQuery(this).removeClass('inactive');
				jQuery(this).addClass('active');
				jQuery(this).parent().removeClass('inactive');
				jQuery(this).parent().addClass('active');
				
			}
		else
			{	jQuery(this).removeClass('active');
				jQuery(this).addClass('inactive');		
				jQuery(this).parent().removeClass('active');			
				jQuery(this).parent().addClass('inactive');
			}
			
		jQuery(this).parent().next('.inde_options').slideToggle(400);	
	});
});