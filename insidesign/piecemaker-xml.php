<?php

require_once('../../../wp-load.php');

global $themename, $shortname;

header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="utf-8" ?>';

?>

<Piecemaker>
    
    <Settings>
        <imageWidth>960</imageWidth>
        <imageHeight>330</imageHeight>	
        <segments><?php echo get_option($shortname.'_piecemaker_segments') ?></segments>
        <tweenTime><?php echo get_option($shortname.'_piecemaker_tween_time') ?></tweenTime>
        <tweenDelay><?php echo get_option($shortname.'_piecemaker_tween_delay') ?></tweenDelay>
        <tweenType><?php echo get_option($shortname.'_piecemaker_tween_type') ?></tweenType>
        <zDistance><?php echo get_option($shortname.'_piecemaker_z_distance') ?></zDistance>
        <expand><?php echo get_option($shortname.'_piecemaker_expand') ?></expand>
        <innerColor><?php echo get_option($shortname.'_piecemaker_inner_color') ?></innerColor>
        <textBackground><?php echo get_option($shortname.'_piecemaker_text_background') ?></textBackground>
        <textDistance><?php echo get_option($shortname.'_piecemaker_text_distance') ?></textDistance>
        <shadowDarknent><?php echo get_option($shortname.'_piecemaker_shadow_darknent') ?></shadowDarknent>
        <autoplay><?php echo get_option($shortname.'_piecemaker_autoplay') ?></autoplay> 
    </Settings>

    <?php
      $loop = new WP_Query( array('post_type' => 'piecemaker_slider', 'post_status' => 'publish', 'orderby' => 'date', 'order' => 'ASC'));
       while ( $loop->have_posts() ) : $loop->the_post();
    ?>
        
        <?php
        $image_id = get_post_thumbnail_id();  
        $image_url = wp_get_attachment_image_src($image_id,'piecemaker-slider');  
        $image_url = str_replace(array('http://','https://'), '', $image_url[0]);
        
        $content = str_replace(array('&lt;','&gt;'), array('<','>'), get_the_content());
        echo '<Image Filename="' . $image_url . '">' . $content . '</Image>';
        ?>

    <?php endwhile; ?>
    
</Piecemaker>
