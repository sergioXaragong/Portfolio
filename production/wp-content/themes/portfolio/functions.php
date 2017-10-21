<?php

// Thumbnails
add_theme_support('post-thumbnails');

// Widgets
function portfolio_widgets_init(){
    if(function_exists('register_sidebar')){
        register_sidebar(array(
            'name' => __('Información Contacto'),
            'id' => 'footer__widget__contact',
            'description' => __('Area en el footer para agregar datos de contacto'),
            'before_widget' => '',
            'after_widget' => '',
        ));
    }
}
add_action('widgets_init', 'portfolio_widgets_init');




function testEmail(){
    $to = "sergioa@dodmediagroup.co";
    $subject = "Apple Computer";
    $message = "Steve, I think this computer thing might really take off.";

    wp_mail( $to, $subject, $message );
}