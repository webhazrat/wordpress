<?php



function themeslug_customize_register( $wp_customize ) {
    // Pannel One
    // https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
    $wp_customize->add_panel( 'panel_one', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Panel One',
        'description'    => 'Panel One Description',
        'active_callback' => ''
    ) );
    
    // https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
    $wp_customize->add_section( 'section_one', array(
        'priority'       => 160,
        'panel'          => '',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Section One',
        'description'    => 'Section One Description',
        'active_callback' => ''
    ) );
    
    // https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
    $wp_customize->add_setting( 'same_one_item', array(
        'type'           => 'theme_mod', // or option
        'section'        => 'section_one',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'transport'      => 'refresh', // or postMessage
        'title'          => 'Setting One',
        'description'    => 'Setting One Description',
        'default'        => '',
        'sanitize_callback' => ''
    ) );
    
    // https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
    $wp_customize->add_control( 'same_one_item', array(
        'label'          => 'Label',
        'section'        => 'section_one',
        'title'          => 'Control One',
        'description'    => 'Control One Description',
        'type'           => 'dropdown-pages' // text, checkbox, radio, textarea, select, color, date, dropdown-pages, range
    ) );
    
    $wp_customize->add_setting('multi_img', array(
        'default'           => false,
        'sanitize_callback' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'multi_img', array(
        'label'    		=> esc_html__('Mutli Img', 'mytheme'),
        'type'     		=> 'media',
        'settings'		=> 'multi_img',
        'section'  		=> 'section_one',
    )));
}

if ( is_admin() || is_customize_preview() ) {
    add_action( 'customize_register', 'themeslug_customize_register' );
}

?>
