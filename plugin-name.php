<?php

/**
  * O arquivo de inicialização do plug-in
  *
  * Este arquivo é lido pelo WordPress para gerar as informações do plugin.
  * área de administração. Este arquivo também inclui todas as dependências usadas pelo plug-in,
  * registra as funções de ativação e desativação e define uma função
  * que inicia o plugin.
 *
 * @link              https://webdevops.solutions/
 * @since             1.0.0
 * @package           PluguinName
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:        https://webdevops.solutions/
 * Description:       Escreva a descrição do Plugin.
 * Version:           1.0.0
 * Author:            Diogo Barbosa Silva Sousa
 * Author URI:        https://webdevops.solutions/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 */

// Se esse arquivo for chamado diretamente, aborte.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Versão atual do plugin.
 * Comece na versão 1.0.0 e use SemVer - https://semver.org
 * Renomeie isso para o seu plug-in e atualize-o conforme você libera novas versões.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );


/**
 * Url base do site
 */
define('PLUGIN_NAME_URL_HTTP',site_url());


/**
 * Constantes javascripts para o plugin
 */
function plugin_name_constantes_js() {
  ?>
  <!--  Constantes Javascript  -->
  <script>
        const PLUGIN_NAME_PUBLIC_SITE_URL = '<?php echo site_url() ;?>'; // Endereço base do site
        const PLUGIN_NAME_ADMIN_SITE_URL = '<?php echo admin_url() ;?>'; // Endereço base do site (administração)
        const PLUGIN_NAME_BASE_AJAX_URL = '<?php echo site_url() ;?>/wp-admin/admin-ajax.php'; // Endereço base do Wordpress para consultas com AJAX
   </script>
  <!--  Constantes Javascript  -->
  <?php
}

add_action('wp_head',' plugin_name_constantes_js', 20);



//require_once(__DIR__ . '/vendor/autoload.php'); // Autoload do composer

require_once(__DIR__ .'/includes/plugin-name-helper.php');

require_once(__DIR__ .'/admin/plugin-name-admin.php');

require_once(__DIR__ .'/public/plugin-name-public.php');