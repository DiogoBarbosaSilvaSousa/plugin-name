<?php

//Registro todos os scripts do admin 
function plugin_name_admin_scripts(){

    // adiciona css 
    wp_enqueue_style('plugin-name-admin-style',plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), PLUGIN_NAME_VERSION, 'all' );

    // adiciona javascript
    wp_enqueue_script('plugin-name-admin-script',plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), PLUGIN_NAME_VERSION, false );

}
add_action('admin_wp_enqueue_scripts','plugin_name_admin_scripts');// Adiciono ao wordpress os scripts para serem inseridos na ordem certa.


//Registro de  Custom Post Type plugin_name_post_type_name 
function custom_post_type_plugin_name_post_type_name () {

    $labels = array(
        'name'                  => _x( 'Plugin Post Type', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Plugin Post Type', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Plugin Post Type', 'text_domain' ),
        'name_admin_bar'        => __( 'Plugin Post Type', 'text_domain' ),
        'all_items'             => __( 'Todos', 'text_domain' ),
        'add_new'               => __( 'Novo', 'text_domain' ),
        'new_item'              => __( 'Novo item', 'text_domain' ),
        'edit_item'             => __( 'Editar Item', 'text_domain' ),
        'update_item'           => __( 'Atualizar', 'text_domain' ),
        'view_item'             => __( 'Ver', 'text_domain' ),
        'view_items'            => __( 'Ver item', 'text_domain' ),
        'search_items'          => __( 'Buscar item', 'text_domain' ),
        'not_found'             => __( 'Não encontrado', 'text_domain' ),
        'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                  => 'plugin-name-post-type',
    );
    $args = array(
        'label'                 => __( 'Plugin Post Type', 'text_domain' ),
        'description'           => __( 'Plugin Post Type', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array('none' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
        'menu_icon'				=> 'dashicons-cart'
    );

    //O nome do post type não pode conter mais do que 20 caracteres caso possua mais ocorrerá erro ou não será registrado
    register_post_type( 'plugin_name_post_type_name', $args );

}
add_action( 'init', 'custom_post_type_plugin_name_post_type_name', 0 );


/** 
 * Colunas do novo custom_post_type_plugin_name_post_type_name()
 * Dados vêm do plugin Advanced Custom Fields
 */
function set_custom_edit_plugin_name_post_type_name_columns($columns) {

    $columnsNew = [];

    $columnsNew = [
        'cb' => $columns['cb'],
        'campo_1' => 'Campo 1',
        'campo_2' => 'Campo 2',
        'campo_3' => 'Campo 3',
        'date' => $columns['date']
    ];

    return $columnsNew;
}
add_filter( 'manage_plugin_name_post_type_name_posts_columns','set_custom_editplugin_name_post_type_name_columns' );


// A forma que cada dado da coluna será exibido
function custom_plugin_name_post_type_name_column( $column, $post_id ) {
    switch ( $column ) {
        case 'campo_1' :
        case 'campo_2' :
        case 'campo_3' :
            echo get_field($column, $post_id);
            break;
    }
}
add_action( 'manage_plugin_name_posts_custom_column','custom_plugin_name_post_type_name_column', 10, 2 );