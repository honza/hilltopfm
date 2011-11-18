// 'Header' button
(function(){
	tinymce.create('tinymce.plugins.Header', {
		createControl : function(id, controlManager) {
			if (id == 'header') {
				var button = controlManager.createButton('header', {
					title : 'Add Header',
					image : '../wp-content/themes/insidesign/functions/assets/layout_header.png',
					onclick : function() {
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Header Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=header-form' );
					}
				});
				return button;
			}
			return null;
		}
	});
	
	tinymce.PluginManager.add('header', tinymce.plugins.Header);
	
	jQuery(function(){
		var form = jQuery('<div id="header-form"><table id="header-table" class="form-table">\
			<tr>\
				<th><label for="header-dotbg">Remove Dot Background</label></th>\
				<td><input type="checkbox" id="header-dotbg" name="dotbg" size="50" /></td><br />\
			</tr>\
			<tr>\
				<th><label for="header-icon">Icon URL</label></th>\
				<td><input type="text" id="header-icon" name="icon" size="50" /></td><br />\
			</tr>\
			<tr>\
				<th><label for="header-headline">Headline</label></th>\
				<td><input type="text" id="header-headline" name="headline" size="50" /></td><br />\
			</tr>\
			<tr>\
				<th><label for="header-subtitle">Subtitle</label></th>\
				<td><input type="text" id="header-subtitle" name="subtitle" size="50" /></td><br />\
			</tr>\
			<tr>\
				<th><label for="header-links">Buttons</label></th>\
				<td><textarea type="text" id="header-links" name="links" rows="10" cols="40"></textarea></td><br />\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="header-submit" class="button-primary" value="Insert Header" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		form.find('#header-submit').click(function(){
			var icon = table.find('#header-icon').val(),
			    headline = table.find('#header-headline').val(),
			    subtitle = table.find('#header-subtitle').val(),
			    links = table.find('#header-links').val();
    				
			if (jQuery('#header-dotbg').is(':checked')) {
			    var shortcode = '[header dots="no-dots"] ';
			} else {
			    var shortcode = '[header] ';				    
			};				

			if (icon != '' || headline != '' || subtitle != '') {
			    shortcode += '[info] ';
		    };
		    
		    if (icon != '') {
			    shortcode += '<img src="' + icon + '" alt="icon" class="alignleft" />';
		    };
		    
			if (headline != '') {
			    shortcode += ' [headline] ' + headline + ' [/headline] ';
		    };

			if (subtitle != '') {
			    shortcode += '[subtitle] ' + subtitle + ' [/subtitle]';
		    };
		    
			if (icon != '' || headline != '' || subtitle != '') {
			    shortcode += ' [/info]';
		    };
		    
		    if ( links != '') {
			    shortcode += ' [links] ' + links + ' [/links]';
		    };
		
	    	shortcode += ' [/header]';
			
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			tb_remove();
		});
	});
})();


// 'HomeBox' button
(function(){
	tinymce.create('tinymce.plugins.HomeBox', {
		createControl : function(id, controlManager) {
			if (id == 'homebox') {
				var button = controlManager.createButton('homebox', {
					title : 'Add HomeBox',
					image : '../wp-content/themes/insidesign/functions/assets/layout_content.png',
					onclick : function() {
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Homebox Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=homebox-form' );
					}
				});
				return button;
			}
			return null;
		}
	});
	
	tinymce.PluginManager.add('homebox', tinymce.plugins.HomeBox);
	
	jQuery(function(){
		var form = jQuery('<div id="homebox-form"><table id="homebox-table" class="form-table">\
			<tr>\
				<th><label for="homebox-width">Select Size</label></th>\
				<td><select id="homebox-width" name="size">\
				<option value="" selected="selected">Choose</option>\
				<option value="one-half">One Half</option>\
				<option value="one-third">One Third</option>\
				<option value="one-fourth">One Fourth</option>\
				<option value="two-third">Two Third</option>\
				<option value="two-fourth">Two Fourth</option>\
				</select></td><br />\
			</tr>\
			<tr>\
				<th><label for="homebox-last">Last</label></th>\
				<td><input type="checkbox" id="homebox-last" name="last" size="50" /></td><br />\
			</tr>\
		<p class="submit">\
			<input type="button" id="button-submit" class="button-primary" value="Insert Homebox" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		form.find('#button-submit').click(function(){
			var options = { 
				'width'		: 'one-third'
			};
			
			var width = table.find('#homebox-width').val();
    						
			if (jQuery('#homebox-last').is(':checked')) {
			    var shortcode = '[home_box_last';
			} else {
			    var shortcode = '[home_box';				    
			};			
		    
		    if ( width != '') {
			    shortcode += ' width="' + width + '"]';
			} else {
			    shortcode += ']';			
		    };
			
			if (jQuery('#homebox-last').is(':checked')) {
			    shortcode += ' [/home_box_last]';
			} else {
			    shortcode += ' [/home_box]';				    
			};		
			
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			tb_remove();
		});
	});
})();


// 'Raw' button
(function() {
    tinymce.create('tinymce.plugins.Raw', {
        init : function(ed, url) {
            ed.addButton('raw', {
                title : 'Wrap selected content with [raw] to remove all Wordpress formatting',
                image : '../wp-content/themes/insidesign/functions/assets/script_go.png',
                onclick : function() {
                    content = tinyMCE.activeEditor.selection.getContent();
    		    	tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[raw] ' + content  + ' [/raw]' );
                }
            });
        }
    });
    tinymce.PluginManager.add('raw', tinymce.plugins.Raw);
})();


// Shortcodes Dropdown
(function(){
	tinymce.create('tinymce.plugins.ShortcodesDropdown', {
		createControl : function(id, controlManager) {
			if (id == 'shortcodes_dropdown') {
				var button = controlManager.createButton('shortcodes_dropdown', {
					title : 'Add Shortcode',
					image : '../wp-content/themes/insidesign/functions/assets/add.png',
					onclick : function() {
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'All Shortcodes', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes-dropdown-form' );
					}
				});
				return button;
			}
			return null;
		}
	});
	
	tinymce.PluginManager.add('shortcodes_dropdown', tinymce.plugins.ShortcodesDropdown);
	
	jQuery(function(){
		var form = jQuery('<div id="shortcodes-dropdown-form"><table id="shortcodes-dropdown-table" class="form-table">\
			<tr>\
				<th><label for="shortcodes-dropdown">Select Shortcode</label></th>\
				<td><select id="shortcodes-dropdown" name="shortcodes-dropdown">\
				<option value="" selected="selected">Choose</option>\
				<option value="layout_one_half">Layout - One Half</option>\
				<option value="layout_one_half_last">Layout - One Half Last</option>\
				<option value="layout_one_third">Layout - One Third</option>\
				<option value="layout_one_third_last">Layout - One Third Last</option>\
				<option value="layout_one_fourth">Layout - One Fourth</option>\
				<option value="layout_one_fourth_last">Layout - One Fourth Last</option>\
				<option value="layout_two_third">Layout - Two Third</option>\
				<option value="layout_two_third_last">Layout - Two Third Last</option>\
				<option value="layout_three_fourth">Layout - Three Fourth</option>\
				<option value="layout_three_fourth_last">Layout - Three Fourth Last</option>\
				<option value="divider">Elements - Divider</option>\
				<option value="tabs_slider_button">Elements - Tabs Slider Button</option>\
				<option value="accordion_content">Elements - Accordion Content</option>\
				<option value="tabgroup">Elements - Content Tabs</option>\
				<option value="recent_blog_posts">Elements - Recent Blog Post</option>\
				<option value="dots_slider_1">Slider - Dots Slider 1</option>\
				<option value="dots_slider_2">Slider - Dots Slider 2</option>\
				<option value="roundabout_slider">Slider - Roundabout Slider</option>\
				<option value="piecemaker_slider">Slider - Piecemaker 3D Slider</option>\
				<option value="tabs_slider">Slider - Tabs Slider</option>\
				</select></td><br />\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="header-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		form.find('#header-submit').click(function(){
			 			
			var current_shortcode = table.find('#shortcodes-dropdown').val();

			if (current_shortcode == 'tabs_slider_button') {
				shortcode = '[tabs_slider_button url=""] [/tabs_slider_button]';
			};
		    
			if (current_shortcode == 'divider') {
				shortcode = '[divider]';
			};
			
			if (current_shortcode == 'accordion_content') {
				shortcode = '[accordion_content title=""] [/accordion_content]';
			};
			
			if (current_shortcode == 'tabgroup') {
				shortcode = '[tabgroup] [tab title=""] [/tab] [/tabgroup]';
			};
			
			if (current_shortcode == 'recent_blog_posts') {
				shortcode = '[recent_blog_posts limit="5"]';
			};
			
			if (current_shortcode == 'dots_slider_1') {
				shortcode = '[dots_slider_1]';
			};
			
			if (current_shortcode == 'dots_slider_2') {
				shortcode = '[dots_slider_2]';
			};
			
			if (current_shortcode == 'roundabout_slider') {
				shortcode = '[roundabout_slider]';
			};
			
			if (current_shortcode == 'piecemaker_slider') {
				shortcode = '[piecemaker_slider]';
			};
			
			if (current_shortcode == 'tabs_slider') {
				shortcode = '[tabs_slider]';
			};
			
			if (current_shortcode == 'layout_one_half') {
				shortcode = '[one_half] [/one_half]';
			};
			
			if (current_shortcode == 'layout_one_half_last') {
				shortcode = '[one_half_last] [/one_half_last]';
			};
			
			if (current_shortcode == 'layout_one_third') {
				shortcode = '[one_third] [/one_third]';
			};
			
			if (current_shortcode == 'layout_one_third_last') {
				shortcode = '[one_third_last] [/one_third_last]';
			};
			
			if (current_shortcode == 'layout_one_fourth') {
				shortcode = '[one_fourth] [/one_fourth]';
			};
			
			if (current_shortcode == 'layout_one_fourth_last') {
				shortcode = '[one_fourth_last] [/oone_fourth_last]';
			};
			
			if (current_shortcode == 'layout_two_third') {
				shortcode = '[two_third] [/two_third]';
			};
			
			if (current_shortcode == 'layout_two_third_last') {
				shortcode = '[two_third_last] [/two_third_last]';
			};
			
			if (current_shortcode == 'layout_two_third') {
				shortcode = '[two_third] [/two_third]';
			};
			
			if (current_shortcode == 'layout_two_third_last') {
				shortcode = '[two_third_last] [/two_third_last]';
			};
			
			if (current_shortcode == 'layout_two_third') {
				shortcode = '[two_third] [/two_third]';
			};
			
			if (current_shortcode == 'layout_two_third_last') {
				shortcode = '[two_third_last] [/two_third_last]';
			};
			
			if (current_shortcode == 'layout_three_fourth') {
				shortcode = '[three_fourth] [/three_fourth]';
			};
			
			if (current_shortcode == 'layout_three_fourth_last') {
				shortcode = '[three_fourth_last] [/three_fourth_last]';
			};
			
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			tb_remove();
		});
	});
})();


// 'Button' button
(function(){
	tinymce.create('tinymce.plugins.Button', {
		createControl : function(id, controlManager) {
			if (id == 'button') {
				var button = controlManager.createButton('button', {
					title : 'Add Button',
					image : '../wp-content/themes/insidesign/functions/assets/button.png',
					onclick : function() {
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Button Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=button-form' );
					}
				});
				return button;
			}
			return null;
		}
	});
	
	tinymce.PluginManager.add('button', tinymce.plugins.Button);
	
	jQuery(function(){
		var form = jQuery('<div id="button-form"><table id="button-table" class="form-table">\
			<tr>\
				<th><label for="button-style">Select Style</label></th>\
				<td><select id="button-style" name="style">\
				<option value="" selected="selected">Choose</option>\
				<option value="grey">Grey</option>\
				<option value="blue">Blue</option>\
				<option value="brightBlue">Bright Blue</option>\
				<option value="brightOrange">Bright Orange</option>\
				</select></td><br />\
			</tr>\
			<tr>\
				<th><label for="button-size">Select Size</label></th>\
				<td><select id="button-size" name="size">\
				<option value="" selected="selected">Choose</option>\
				<option value="small">Small</option>\
				<option value="big">Big</option>\
				</select></td><br />\
			</tr>\
			<tr>\
				<th><label for="button-url">URL</label></th>\
				<td><input type="text" id="button-url" name="url" size="50" /></td><br />\
			</tr>\
			<tr>\
				<th><label for="button-content">Content</label></th>\
				<td><input type="text" id="button-content" name="content" size="50" /></td><br />\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="button-submit" class="button-primary" value="Insert Button" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		form.find('#button-submit').click(function(){
			var options = { 
				'style'		: 'brightBlue'
			};
			
			var style = table.find('#button-style').val(),
			    size = table.find('#button-size').val(),
			    url = table.find('#button-url').val(),
			    content = table.find('#button-content').val();
    				
			var shortcode = '[button';			
		    
		    if ( style != '') {
			    shortcode += ' style="' + style + '"';
		    };
			
		    if ( size != '') {
			    shortcode += ' size="' + size + '"';
		    };
		
		    if ( url != '') {
			    shortcode += ' url="' + url + '"';
		    };
		
	    	shortcode += '] ' + content + ' [/button]';
			
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			tb_remove();
		});
	});
})();