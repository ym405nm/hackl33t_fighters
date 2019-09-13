<?php
/**
 * VW Restaurant Lite Theme Customizer
 *
 * @package VW Restaurant Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_restaurant_lite_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_restaurant_lite_custom_controls' );

function vw_restaurant_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_restaurant_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-restaurant-lite' ),
	    'description' => __( 'Description of what this panel does.', 'vw-restaurant-lite' ),
	) );

	//theme Layouts
	$wp_customize->add_section( 'vw_restaurant_lite_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'vw-restaurant-lite' ),
		'priority'   => 30,
		'panel' => 'vw_restaurant_lite_panel_id'
	) );

	$wp_customize->add_setting('vw_restaurant_lite_width_option',array(
        'default' => __('Full Width','vw-restaurant-lite'),
        'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Restaurant_Lite_Image_Radio_Control($wp_customize, 'vw_restaurant_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-restaurant-lite'),
        'description' => __('Here you can change the width layout of Website.','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_restaurant_lite_theme_options',array(
        'default' => __('Right Sidebar','vw-restaurant-lite'),
        'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_restaurant_lite_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-restaurant-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-restaurant-lite'),
            'Right Sidebar' => __('Right Sidebar','vw-restaurant-lite'),
            'One Column' => __('One Column','vw-restaurant-lite'),
            'Three Columns' => __('Three Columns','vw-restaurant-lite'),
            'Four Columns' => __('Four Columns','vw-restaurant-lite'),
            'Grid Layout' => __('Grid Layout','vw-restaurant-lite')
        ),
	));

	$wp_customize->add_setting('vw_restaurant_lite_page_layout',array(
        'default' => __('One Column','vw-restaurant-lite'),
        'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_restaurant_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-restaurant-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-restaurant-lite'),
            'Right Sidebar' => __('Right Sidebar','vw-restaurant-lite'),
            'One Column' => __('One Column','vw-restaurant-lite')
        ),
	) );

	//Topbar section
	$wp_customize->add_section('vw_restaurant_lite_topbar_icon',array(
		'title'	=> __('Topbar Section','vw-restaurant-lite'),
		'description'	=> __('Add Top Header Content here','vw-restaurant-lite'),
		'priority'	=> null,
		'panel' => 'vw_restaurant_lite_panel_id',
	));

	$wp_customize->add_setting('vw_restaurant_lite_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_contact',array(
		'label'	=> __('Add Phone Number','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_topbar_icon',
		'setting'	=> 'vw_restaurant_lite_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_restaurant_lite_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_email',array(
		'label'	=> __('Add Email','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_topbar_icon',
		'setting'	=> 'vw_restaurant_lite_email',
		'type'		=> 'text'
	));
	
	//home page slider
    $wp_customize->add_section( 'vw_restaurant_lite_slidersettings' , array(
      'title'      => __( 'Slider Settings', 'vw-restaurant-lite' ),
      'priority'   => null,
      'panel' => 'vw_restaurant_lite_panel_id'
    ) );

    $wp_customize->add_setting( 'vw_restaurant_lite_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-restaurant-lite' ),
          'section' => 'vw_restaurant_lite_slidersettings'
    )));

    for ( $count = 1; $count <= 4; $count++ ) {

    // Add color scheme setting and control.
    $wp_customize->add_setting( 'vw_restaurant_lite_slider_page' . $count, array(
      'default'           => '',
      'sanitize_callback' => 'vw_restaurant_lite_sanitize_dropdown_pages'
    ) );
    $wp_customize->add_control( 'vw_restaurant_lite_slider_page' . $count, array(
      'label'    => __( 'Select Slide Image Page', 'vw-restaurant-lite' ),
      'description' => __('Slider image size (1284 x 546)','vw-restaurant-lite'),
      'section'  => 'vw_restaurant_lite_slidersettings',
      'type'     => 'dropdown-pages'
    ) );
    
    }

    //content layout
	$wp_customize->add_setting('vw_restaurant_lite_slider_content_option',array(
        'default' => __('Center','vw-restaurant-lite'),
        'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Restaurant_Lite_Image_Radio_Control($wp_customize, 'vw_restaurant_lite_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_restaurant_lite_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_restaurant_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-restaurant-lite' ),
		'section'     => 'vw_restaurant_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_restaurant_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_restaurant_lite_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_restaurant_lite_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-restaurant-lite' ),
	'section'     => 'vw_restaurant_lite_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_restaurant_lite_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-restaurant-lite'),
      '0.1' =>  esc_attr('0.1','vw-restaurant-lite'),
      '0.2' =>  esc_attr('0.2','vw-restaurant-lite'),
      '0.3' =>  esc_attr('0.3','vw-restaurant-lite'),
      '0.4' =>  esc_attr('0.4','vw-restaurant-lite'),
      '0.5' =>  esc_attr('0.5','vw-restaurant-lite'),
      '0.6' =>  esc_attr('0.6','vw-restaurant-lite'),
      '0.7' =>  esc_attr('0.7','vw-restaurant-lite'),
      '0.8' =>  esc_attr('0.8','vw-restaurant-lite'),
      '0.9' =>  esc_attr('0.9','vw-restaurant-lite')
	),
	));

	//we Believe
	$wp_customize->add_section('vw_restaurant_lite_belive',array(
		'title'	=> __('We Believe Section','vw-restaurant-lite'),
		'description'	=> __('Add We Believe sections below.','vw-restaurant-lite'),
		'panel' => 'vw_restaurant_lite_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$posts[]='Select';	
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_restaurant_lite_belive_post_setting',array(
		'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices',
	));
	$wp_customize->add_control('vw_restaurant_lite_belive_post_setting',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-restaurant-lite'),
		'section' => 'vw_restaurant_lite_belive',
	));

	//Blog Post
	$wp_customize->add_section('vw_restaurant_lite_blog_post',array(
		'title'	=> __('Blog Post Settings','vw-restaurant-lite'),
		'panel' => 'vw_restaurant_lite_panel_id',
	));	

	$wp_customize->add_setting( 'vw_restaurant_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-restaurant-lite' ),
        'section' => 'vw_restaurant_lite_blog_post'
    )));

    $wp_customize->add_setting( 'vw_restaurant_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_toggle_author',array(
		'label' => esc_html__( 'Author','vw-restaurant-lite' ),
		'section' => 'vw_restaurant_lite_blog_post'
    )));

    $wp_customize->add_setting( 'vw_restaurant_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-restaurant-lite' ),
		'section' => 'vw_restaurant_lite_blog_post'
    )));

    $wp_customize->add_setting( 'vw_restaurant_lite_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_restaurant_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-restaurant-lite' ),
		'section'     => 'vw_restaurant_lite_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_restaurant_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Content Creation
	$wp_customize->add_section( 'vw_restaurant_lite_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-restaurant-lite' ),
		'priority' => null,
		'panel' => 'vw_restaurant_lite_panel_id'
	) );

	$wp_customize->add_setting('vw_restaurant_lite_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Restaurant_Lite_Content_Creation( $wp_customize, 'vw_restaurant_lite_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-restaurant-lite' ),
		),
		'section' => 'vw_restaurant_lite_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-restaurant-lite' ),
	) ) );

	//footer text
	$wp_customize->add_section('vw_restaurant_lite_footer_section',array(
		'title'	=> __('Footer Text','vw-restaurant-lite'),
		'description'	=> __('Add some text for footer like copyright etc.','vw-restaurant-lite'),
		'panel' => 'vw_restaurant_lite_panel_id'
	));
	
	$wp_customize->add_setting('vw_restaurant_lite_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_footer_copy',array(
		'label'	=> __('Copyright Text','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'vw_restaurant_lite_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-restaurant-lite' ),
      	'section' => 'vw_restaurant_lite_footer_section'
    )));

	$wp_customize->add_setting('vw_restaurant_lite_scroll_top_alignment',array(
        'default' => __('Right','vw-restaurant-lite'),
        'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Restaurant_Lite_Image_Radio_Control($wp_customize, 'vw_restaurant_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_footer_section',
        'settings' => 'vw_restaurant_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));
	
}
add_action( 'customize_register', 'vw_restaurant_lite_customize_register' );	

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Restaurant_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Restaurant_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Restaurant_Lite_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Restaurant Pro', 'vw-restaurant-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO','vw-restaurant-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/premium/food-restaurant-wordpress-theme/')
		)));

		// Register sections.
		$manager->add_section(new VW_Restaurant_Lite_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENATATION', 'vw-restaurant-lite' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-restaurant-lite' ),
			'pro_url'  => esc_url( 'themes.php?page=vw_restaurant_lite_guide' )
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-restaurant-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-restaurant-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Restaurant_Lite_Customize::get_instance();