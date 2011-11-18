<?php

global $themename, $shortname;

/* Dots Slider 1 */

$dots_slider_1_effect = get_option($shortname.'_dots_slider_1_effects');

if (get_option($shortname.'_dots_slider_1_speed') == 'Slow') : $dots_slider_1_speed = '800';
elseif (get_option($shortname.'_dots_slider_1_speed') == 'Normal') : $dots_slider_1_speed = '450';
elseif (get_option($shortname.'_dots_slider_1_speed') == 'Fast') : $dots_slider_1_speed = '250'; endif;

if (get_option($shortname.'_dots_slider_1_custom_speed')) : $dots_slider_1_speed = get_option($shortname.'_dots_slider_1_custom_speed'); endif;

if (get_option($shortname.'_dots_slider_1_timeout') == 'Disable Autoplay') : $dots_slider_1_timeout = '0';
elseif (get_option($shortname.'_dots_slider_1_timeout') == '3 Seconds') : $dots_slider_1_timeout = '3000';
elseif (get_option($shortname.'_dots_slider_1_timeout') == '5 Seconds') : $dots_slider_1_timeout = '5000';
elseif (get_option($shortname.'_dots_slider_1_timeout') == '10 Seconds') : $dots_slider_1_timeout = '10000'; endif;

if (get_option($shortname.'_dots_slider_1_custom_timeout')) : $dots_slider_1_timeout = get_option($shortname.'_dots_slider_1_custom_timeout'); endif;

/* Roundabout Slider */

$roundabout_slider_easing = get_option($shortname.'_roundabout_slider_easing');

if (get_option($shortname.'_roundabout_slider_duration') == 'Slow') : $roundabout_slider_duration = '1200';
elseif (get_option($shortname.'_roundabout_slider_duration') == 'Normal') : $roundabout_slider_duration = '800';
elseif (get_option($shortname.'_roundabout_slider_duration') == 'Fast') : $roundabout_slider_duration = '400'; endif;

if (get_option($shortname.'_roundabout_slider_custom_duration')) : $roundabout_slider_duration = get_option($shortname.'_roundabout_slider_custom_duration'); endif;

/* Dots Slider 2 */

$dots_slider_2_effect = get_option($shortname.'_dots_slider_2_effects');

if (get_option($shortname.'_dots_slider_2_speed') == 'Slow') : $dots_slider_2_speed = '800';
elseif (get_option($shortname.'_dots_slider_2_speed') == 'Normal') : $dots_slider_2_speed = '450';
elseif (get_option($shortname.'_dots_slider_2_speed') == 'Fast') : $dots_slider_2_speed = '250'; endif;

if (get_option($shortname.'_dots_slider_2_custom_speed')) : $dots_slider_2_speed = get_option($shortname.'_dots_slider_2_custom_speed'); endif;

if (get_option($shortname.'_dots_slider_2_timeout') == 'Disable Autoplay') : $dots_slider_2_timeout = '0';
elseif (get_option($shortname.'_dots_slider_2_timeout') == '3 Seconds') : $dots_slider_2_timeout = '3000';
elseif (get_option($shortname.'_dots_slider_2_timeout') == '5 Seconds') : $dots_slider_2_timeout = '5000';
elseif (get_option($shortname.'_dots_slider_2_timeout') == '10 Seconds') : $dots_slider_2_timeout = '10000'; endif;

if (get_option($shortname.'_dots_slider_2_custom_timeout')) : $dots_slider_2_timeout = get_option($shortname.'_dots_slider_2_custom_timeout'); endif;

/* Piecemaker 3D Slider */

$piecemaker_images_path = get_option($shortname.'_piecemaker_images_path');

/* Tabs Slider */

$tabs_slider_effect = get_option($shortname.'_tabs_slider_effects');

if (get_option($shortname.'_tabs_slider_tab_speed') == 'Slow') : $tabs_slider_tab_speed = '800';
elseif (get_option($shortname.'_tabs_slider_tab_speed') == 'Normal') : $tabs_slider_tab_speed = '450';
elseif (get_option($shortname.'_tabs_slider_tab_speed') == 'Fast') : $tabs_slider_tab_speed = '250'; endif;

if (get_option($shortname.'_tabs_slider_custom_tab_speed')) : $tabs_slider_tab_speed = get_option($shortname.'_tabs_slider_custom_tab_speed'); endif;

if (get_option($shortname.'_tabs_slider_slide_speed') == 'Slow') : $tabs_slider_slide_speed = '800';
elseif (get_option($shortname.'_tabs_slider_slide_speed') == 'Normal') : $tabs_slider_slide_speed = '450';
elseif (get_option($shortname.'_tabs_slider_slide_speed') == 'Fast') : $tabs_slider_slide_speed = '250'; endif;

if (get_option($shortname.'_tabs_slider_custom_slide_speed')) : $tabs_slider_slide_speed = get_option($shortname.'_tabs_slider_custom_slide_speed'); endif;

if (get_option($shortname.'_tabs_slider_timeout') == 'Disable Autoplay') : $tabs_slider_timeout = '0';
elseif (get_option($shortname.'_tabs_slider_timeout') == '3 Seconds') : $tabs_slider_timeout = '3000';
elseif (get_option($shortname.'_tabs_slider_timeout') == '5 Seconds') : $tabs_slider_timeout = '5000';
elseif (get_option($shortname.'_tabs_slider_timeout') == '10 Seconds') : $tabs_slider_timeout = '10000'; endif;

if (get_option($shortname.'_tabs_slider_custom_timeout')) : $tabs_slider_timeout = get_option($shortname.'_tabs_slider_custom_timeout'); endif;
