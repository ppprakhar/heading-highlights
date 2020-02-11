<?php
/*
Plugin Name: Heading Highlight
Plugin URI: http://wpmife.com
Author: Prakhar Kant Tripathi
*/

/**
* Item Slider with woocommerce
*/
//error_reporting( E_ALL );
error_reporting( 0 );

if (!class_exists('Wp_Heading_Highlights')){
	class Wp_Heading_Highlights {

		public $settings;
		public $ajax;
		
		function __construct() {
			// Set constans needed by the plugin.
			add_action( 'plugins_loaded', array( $this, 'define_constants' ), 1 );

			//add script and style in frontend
			add_action('wp_enqueue_scripts', array($this, 'frontend_scripts') );

			//add script and style in frontend
			add_action('admin_enqueue_scripts', array($this, 'backend_scripts') );

			// register shortcode
			add_shortcode( 'heading-highlight', array($this, 'show_shortcode') );
		}

		/**
		 * Define constants used by the plugin.
		 *
		 * @access public
		 * @action plugins_loaded
		 * @return void
		*/
		public function define_constants() {
			// Set constant path to the plugin directory.
			define( 'HHLIGHTS_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

			// Set constant path to the includes directory.
			define( 'HHLIGHTS_INCLUDES_DIR', HHLIGHTS_DIR . trailingslashit( 'includes' ) );

			// Plugin url
			$plugin_dirname = basename( dirname( __FILE__ ) );
			define( 'HHLIGHTS_URL', trailingslashit( plugin_dir_url( '' ) ) . $plugin_dirname );
		}		

		/*
		*  register scritps and style files for frontend
		*/
		public function frontend_scripts(){
			wp_enqueue_script('hhlights-js', HHLIGHTS_URL.'/js/hhlights.js', array('jquery') );
			wp_enqueue_style('hhlights-css', HHLIGHTS_URL.'/css/style.css');
		}

		/*
		*  register scritps and style files for backend
		*/
		public function backend_scripts(){
			
		}

		/*
		* generates shortcode for showing slider
		*/
		public function show_shortcode($atts, $content = null ){
			ob_start();
			$atts = shortcode_atts( array(
				'args' => 'startup,events,products,slider',
				'colors' => '#31A8DF,#895691,#ffa500,#F26831',
				'pos' => 'left',
				'time' => 2000
		    ), $atts );

		    extract($atts);

		    require_once( HHLIGHTS_INCLUDES_DIR.'/hhlights-shortcode.php' );
		    return ob_get_clean();    
			
		}
	}

	$hhlights = new Wp_Heading_Highlights();

}



