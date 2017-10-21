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


// Form Contact
function sendMessage(){
    $response = array(
        'status' => false,
        'message' => 'El mensaje no se envio. Complete el formulario e intente nuevamente.'
    );
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
        $message = '<p><strong>Name:</strong> '.$_POST['name'].'</p>';
        $message .= '<p><strong>Email:</strong> '.$_POST['email'].'</p>';
        $message .= '<p><strong>Message:</strong> '.$_POST['message'].'</p>';

        $to = "sergioluisalfonso@gmail.com";
        $subject = "Contact Message Checho Web Site";

        $headers[] = 'Reply-To: '.$_POST['name'].' <'.$_POST['email'].'>';

        if(wp_mail( $to, $subject, $message, $headers )){
            $response = array(
                'status' => true,
                'message' => 'Gracias por su mensaje. Me pondré en contacto lo mas pronto posible. Para obtener respuesta inmediata, por favor póngase en contacto conmigo a mi teléfono celular.'
            );
        }
        else
            $response['message'] = 'Ocurrio un error al intentar enviar el mensaje. Si desea, puede ponerse en contacto conmigo a mi teléfono celular.';
    }

    header('Content-type: application/json');
    echo json_encode($response);
    die;
}
add_action('wp_ajax_nopriv_sendMessage', 'sendMessage');
add_action('wp_ajax_sendMessage', 'sendMessage');


function set_html_content_type() {
    return 'text/html';
}
add_filter('wp_mail_content_type', 'set_html_content_type');