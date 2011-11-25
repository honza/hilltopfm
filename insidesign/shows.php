<?php
/**
 * Template Name: Shows
 */

get_header(); ?>

<div id="subpage" class="fullwidth">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	    
	<div class="top">

		<div class="corner">
		    
		    <?php if(get_custom_field('inde_corner_icon')): ?>
		
			    <span class="<?php echo get_custom_field('inde_corner_icon'); ?>"></span>
			    
			<?php endif; ?>
			
		</div>

		<h4><?php if(get_custom_field('inde_sidebar_parent_headline')) : echo get_custom_field('inde_sidebar_parent_headline'); else : the_title(); endif; ?></h4>
		
	    <?php if(get_custom_field('inde_page_subtitle')): ?>
	        
	    	<p class="subtitle"><?php echo get_custom_field('inde_page_subtitle'); ?></p>
		    
		<?php endif; ?>

	</div><!-- end .top -->

	<div class="main">

		<div class="content">

				<?php the_content(); ?>


<ul style="list-style: none">

    <li>
        <a href="http://www.intouchcanada.org">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-85" title="In touch" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/In-touch1.gif" alt="" width="238" height="79" />
            Listen weekdays at 3PM
        </a>
    </li>

    <li>
        <a href="http://www.insightforliving.ca">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-93" title="insight for living" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/insight-for-living.jpg" alt="" width="238" height="79" />
                Listen Weekday mornings at 9am
        </a>
    </li>


    <li>
        <a href="http://www.fotf.ca">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-96" title="fotf" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/fotf1.gif" alt="" width="238" height="79" />
                Listen to Weekend Magazine on Saturday at 4pm
        </a>
    </li>

    <li>
        <a href="http://www.heartlightministries.org/parentingtodaysteens/">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-98" title="parenting todays teens" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/parenting-todays-teens.jpg" alt="" width="238" height="79" />
                Listen to Mark Gregston Monday mornings at 10
        </a>
    </li>

    <li>
        <a href="http://www.homeword.com">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-101" title="homeword" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/homeword2.jpg" alt="" width="238" height="79" />
                Listen weekdays at 6:30PM for great parenting tips
        </a>
    </li>

    <li>

    <a href="http://www.sportsspectrum.com">
        <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-122" title="sports spectrum" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/sports-spectrum.jpg" alt="" width="238" height="79" />
        Hear from Christian athletes about life in the sports world Sundays at 7pm
    </a>

</ul>

<p>These shows offer quality Christian music to enjoy:</p>

<ul style="list-style: none">
    <li>
        <a href="http://www.madradioshow.net">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-109" title="mad radio" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/mad-radio.jpg" alt="" width="238" height="79" />
            Canadian show!  Listen Saturdays at 9PM
        </a>
    </li>

    <li>
        <a href="http://www.ct20.ca">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-113" title="ct20 1" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/ct20-1.jpg" alt="" width="240" height="79" />
            Another great Canadian music show!  Listen Sundays at 9pm
        </a>
    </li>

    <li>
        <a href="http://www.homecomingradio.com">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-116" title="homecoming radio" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/homecoming-radio.jpg" alt="" width="238" height="79" />
            Everybody's favourite Gospel Music Radio show!  Airs Sundays at 1PM
        </a>
    </li>

    <li>
        <a href="http://www.20thecountdownmagazine.com">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-120" title="20 the countdown" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/20-the-countdown.jpg" alt="" width="238" height="79" />
            Airs Saturdays at 5PM
        </a>
    </li>

    <li>
        <a href="http://www.gospelfestministries.com">
            <img align="absmiddle" style="vertical-align:middle" class=" size-full wp-image-125" title="gospelfest" src="http://www.hilltopfm.ca/wp-content/uploads/2011/02/gospelfest.jpg" alt="" width="238" height="79" />
            Listen Sunday at 2PM
        </a>
    </li>

</ul>









				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'insidesign' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'insidesign' ), '', '' ); ?>

			<?php endwhile; ?>

		</div><!-- end .content -->

	</div><!-- end .main -->

</div><!-- end #subpage -->

<?php get_footer(); ?>
