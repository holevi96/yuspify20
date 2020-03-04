<?php
class GoogleImageOptimizerAdminScripts extends GoogleImageOptimizer
{	
	public static function wp_google_pagespeed_image_optimizer_load_script($hook)
	{
		if('upload.php' == $hook)
		{
			wp_register_script( 'wp_google_pagespeed_image_optimizer_event-move', plugins_url('assets/js/jquery.event.move.js', __FILE__), false, '1.0.0' );
			wp_enqueue_script( 'wp_google_pagespeed_image_optimizer_event-move' );

			wp_register_script( 'wp_google_pagespeed_image_optimizer_twentytwenty', plugins_url('assets/js/jquery.twentytwenty.js', __FILE__), false, '1.0.0' );
			wp_enqueue_script( 'wp_google_pagespeed_image_optimizer_twentytwenty' );
		
			wp_register_script( 'wp_google_pagespeed_image_optimizer-admin', plugins_url('assets/js/wp-google-pagespeed-image-optimizer-admin.js', __FILE__), false, '1.0.0' );
			wp_enqueue_script( 'wp_google_pagespeed_image_optimizer-admin' );
		}
	}
	
	public static function wp_google_pagespeed_image_optimizer_add_thickbox($hook)
	{
		if('upload.php' == $hook)
		{
			add_thickbox();
		}
	}
}