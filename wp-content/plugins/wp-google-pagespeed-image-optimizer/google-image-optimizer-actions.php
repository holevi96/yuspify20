<?php
class GoogleImageOptimizerActions extends GoogleImageOptimizer
{	
	public static function google_image_optimizer_do_actions()
	{
		add_action('admin_menu','GoogleImageOptimizerAdminView::register_google_image_optimizer_submenus');
		
		add_action('wp_ajax_bulk_optimize_single_image_ajax', 'GoogleImageOptimizerAdminView::bulk_optimize_single_image_ajax');		
		add_action('wp_ajax_restore_backup_ajax', 'GoogleImageOptimizerAdminView::restore_backup_ajax');
		add_action('wp_ajax_get_before_and_after', 'GoogleImageOptimizerAdminView::get_before_and_after');	
		
		add_action('wp_ajax_google_image_optimizer_get_all_attachment_ids', 'GoogleImageOptimizer::google_image_optimizer_get_all_attachment_ids');
		
		add_action('wp_ajax_google_image_optimizer_scan_themes', 'GoogleImageOptimizer::google_image_optimizer_scan_themes');
		
		add_action('wp_ajax_google_image_optimizer_optimize_theme_images', 'GoogleImageOptimizer::google_image_optimizer_optimize_theme_images');
		
		add_action('wp_ajax_google_image_optimizer_scan_plugins', 'GoogleImageOptimizer::google_image_optimizer_scan_plugins');
		
		add_action('wp_ajax_google_image_optimizer_optimize_plugin_images', 'GoogleImageOptimizer::google_image_optimizer_optimize_plugin_images');
		
		add_action('admin_init', 'GoogleImageOptimizerAdminView::register_google_image_optimizer_settings');
		
		add_action('delete_attachment','GoogleImageOptimizer::google_image_optimizer_delete_backups');
		
		add_action('admin_enqueue_scripts', 'GoogleImageOptimizerAdminStyles::wp_google_pagespeed_image_optimizer_load_css');
		
		add_action('admin_enqueue_scripts', 'GoogleImageOptimizerAdminScripts::wp_google_pagespeed_image_optimizer_load_script');
		
		add_action('admin_enqueue_scripts', 'GoogleImageOptimizerAdminScripts::wp_google_pagespeed_image_optimizer_add_thickbox');
				
		add_action('admin_notices','GoogleImageOptimizer::admin_notice_google_image_optimizer_api_key');
		
		add_action( 'current_screen', 'GoogleImageOptimizerAdminScripts::wp_google_pagespeed_image_optimizer_add_thickbox' );
	}
}