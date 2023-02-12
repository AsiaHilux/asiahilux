<?php
	function load_stylesheet(){
		wp_register_style('style-min',get_template_directory_uri().'/assets/css/style.css',array(),1,'all');
		wp_enqueue_style('style-min');
		
		wp_register_style('custom',get_template_directory_uri().'/assets/css/custom.css',array(),1,'all');
		wp_enqueue_style('custom');
		
		wp_register_style('bootstrap-min',get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css',array(),1,'all');
		wp_enqueue_style('bootstrap-min');
		
		wp_register_style('icofont-min',get_template_directory_uri().'/assets/vendor/icofont/icofont.min.css',array(),1,'all');
		wp_enqueue_style('icofont-min');
		
		wp_register_style('boxicons-min',get_template_directory_uri().'/assets/vendor/boxicons/css/boxicons.min.css',array(),1,'all');
		wp_enqueue_style('boxicons-min');
		
		wp_register_style('owl-carousel-min',get_template_directory_uri().'/assets/vendor/owl.carousel/assets/owl.carousel.min.css',array(),1,'all');
		wp_enqueue_style('owl-carousel-min');
		
		wp_register_style('select2',get_template_directory_uri().'/assets/css/select2.css',array(),1,'all');
		wp_enqueue_style('select2');
		
		wp_register_style('responsive',get_template_directory_uri().'/assets/css/responsive.css',array(),1,'all');
		wp_enqueue_style('responsive');
		
		wp_register_style('font-awesome-min',get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css',array(),1,'all');
		wp_enqueue_style('font-awesome-min');
		
	}
	add_action('wp_enqueue_scripts','load_stylesheet');
	
	function load_js(){
		wp_register_script('jquery-min',get_template_directory_uri().'/assets/vendor/jquery/jquery.min.js',array(),1,1,1);
		wp_enqueue_script('jquery-min');
		
		wp_register_script('bootstrap-bundle-min',get_template_directory_uri().'/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',array(),1,1,1);
		wp_enqueue_script('bootstrap-bundle-min');
		
		wp_register_script('jquery-easing-min',get_template_directory_uri().'/assets/vendor/jquery.easing/jquery.easing.min.js',array(),1,1,1);
		wp_enqueue_script('jquery-easing-min');
		
		wp_register_script('jquery-waypoints-min',get_template_directory_uri().'/assets/vendor/waypoints/jquery.waypoints.min.js',array(),1,1,1);
		wp_enqueue_script('jquery-waypoints-min');
		
		wp_register_script('owl-carousel-min',get_template_directory_uri().'/assets/vendor/owl.carousel/owl.carousel.min.js',array(),1,1,1);
		wp_enqueue_script('owl-carousel-min');
		
		wp_register_script('main',get_template_directory_uri().'/assets/js/main.js',array(),1,1,1);
		wp_enqueue_script('main');
		
		wp_register_script('select2',get_template_directory_uri().'/assets/js/select2.min.js',array(),1,1,1);
		wp_enqueue_script('select2');
		
	}
	add_action('wp_enqueue_scripts','load_js');
	
	
	
	add_theme_support('post-thumbnails');
	
	// Adding Footer Widgets
	function get_widgets() {
	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'asiahilux' ),
		'id' => 'right-sidebar',
		'description' => __( 'Right Sidebar', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
		
	register_sidebar( array(
		'name' => __( 'Footer Contacts', 'asiahilux' ),
		'id' => 'footer-contacts',
		'description' => __( 'Footer Contacts', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Browse Stock', 'asiahilux' ),
		'id' => 'browse-stock',
		'description' => __( 'Browse Stock', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'By Make', 'asiahilux' ),
		'id' => 'by-make',
		'description' => __( 'By Make', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'By Price', 'asiahilux' ),
		'id' => 'by-price',
		'description' => __( 'By Price', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'By Discount', 'asiahilux' ),
		'id' => 'by-discount',
		'description' => __( 'By Discount', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'By Type', 'asiahilux' ),
		'id' => 'by-type',
		'description' => __( 'By Type', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Car Contents', 'asiahilux' ),
		'id' => 'car-contents',
		'description' => __( 'Car Contents', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Global Office', 'asiahilux' ),
		'id' => 'global-office',
		'description' => __( 'Global Office', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Copyright', 'asiahilux' ),
		'id' => 'copyright',
		'description' => __( 'Copyright', 'asiahilux' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
		
}

add_action( 'widgets_init', 'get_widgets' );

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
?>