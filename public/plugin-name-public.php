<?php

/**
 * Registro todos os scripts do public que serão necessários para o funcionamento do meu shortcode_plugin-name_orcamento 
 */
function plugin_name_public_scripts(){

    global $post;

    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'shortcode_plugin_name') ) {

    $plugin_url = plugin_dir_url( __FILE__ );

    // adiciona css do bootstrap
    wp_enqueue_style('plugin-name-public-style', $plugin_url . 'css/plugin-name-public.css',array(), PLUGIN_NAME_VERSION, 'all');

    // adiciona javascript
    wp_enqueue_script('plugin-name-public-script', $plugin_url . 'js/plugin-name-public.js', array('jquery'), PLUGIN_NAME_VERSION,true);
   

    }



}
add_action( 'wp_enqueue_scripts', 'plugin_name_public_scripts');

// crio shortcode com o formulário para orçamento
function shortcode_plugin_name(){

    //atribuo todo o conteúdo do arquivo para a váriavel e a uso como retorno.
    ob_start();
        require_once(plugin_dir_path( __FILE__ ).'plugin-name-public-shortcode.php');
        $html = ob_get_contents();
    ob_get_clean();

    return $html;
}
add_shortcode( 'name_shortcode_plugin_name', 'shortcode_plugin_name' );