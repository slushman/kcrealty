<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package KC Realty
 */

if ( ! is_active_sidebar( 'sidebar-home' ) ) {
	return;
}
?><div id="secondary" class="widget-area" role="complementary"><?php

	dynamic_sidebar( 'sidebar-home' );

?></div><!-- #secondary -->