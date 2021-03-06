<?php

/**
 * La funcionalidad específica de administración del plugin.
 *
 * @link       http://misitioweb.com
 * @since      1.0.0
 *
 * @package    Beziercode_blank
 * @subpackage Beziercode_blank/admin
 */

/**
 * Define el nombre del plugin, la versión y dos métodos para
 * Encolar la hoja de estilos específica de administración y JavaScript.
 * 
 * @since      1.0.0
 * @package    Beziercode-Blank
 * @subpackage Beziercode-Blank/admin
 * @author     Gilbert Rodríguez <email@example.com>
 * 
 * @property string $plugin_name
 * @property string $version
 */
class BC_Admin {

    /**
	 * objeto wpdb
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name  El nombre o identificador único de éste plugin
	 */
    private $db;
    /**
	 * El identificador único de éste plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name  El nombre o identificador único de éste plugin
	 */
    private $plugin_name;
    
    /**
	 * Versión actual del plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version  La versión actual del plugin
	 */
    private $version;

    /**
	 * Versión actual del plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version  La versión actual del plugin
	 */
     
    private $build_menupage;
    /**
     * @param string $plugin_name nombre o identificador único de éste plugin.
     * @param string $version La versión actual del plugin.
     */
    public function __construct( $plugin_name, $version ) {
        
        $this->plugin_name = $plugin_name;
        $this->version = $version; 
        $this->build_menupage = new BC_Build_Menupage(); 
        global $wpdb;
        $this->db = $wpdb;   
        
    }
    
    /**
	 * Registra los archivos de hojas de estilos del área de administración
	 *
	 * @since    1.0.0
     * @access   public
	 */
    public function enqueue_styles( $hook ) {

        if($hook != 'toplevel_page_bc_data'){
            return;
        }
        
        /**
         * Una instancia de esta clase debe pasar a la función run()
         * definido en BC_Cargador como todos los ganchos se definen
         * en esa clase particular.
         *
         * El BC_Cargador creará la relación
         * entre los ganchos definidos y las funciones definidas en este
         * clase.
		 */

        wp_enqueue_style( 'bc_wordpress_icons_css', BC_PLUGIN_DIR_URL . 'admin/css/bc-wordpress.css', array(), $this->version, 'all' );
        
        wp_enqueue_style( 'bc_material_icons',  'https://fonts.googleapis.com/icon?family=Material+Icons', array(), $this->version, 'all' );
        
        wp_enqueue_style( 'bc_materialize_admin_css', BC_PLUGIN_DIR_URL . 'helpers/materialize/css/materialize.min.css', array(), $this->version, 'all' );


        wp_enqueue_style( 'bc_swwet_alert_css', BC_PLUGIN_DIR_URL . '/helpers/sweetalert/sweetalert.css', array(), $this->version, 'all' );

        wp_enqueue_style( $this->plugin_name, BC_PLUGIN_DIR_URL . 'admin/css/bc-admin.css', array(), $this->version, 'all' );

    }
    
    /**
	 * Registra los archivos Javascript del área de administración
	 *
	 * @since    1.0.0
     * @access   public
	 */
    public function enqueue_scripts ( $hook ) {

        if($hook != 'toplevel_page_bc_data'){
            return;
        }
        
        /**
         * Una instancia de esta clase debe pasar a la función run()
         * definido en BC_Cargador como todos los ganchos se definen
         * en esa clase particular.
         *
         * El BC_Cargador creará la relación
         * entre los ganchos definidos y las funciones definidas en este
         * clase.
		 */
        wp_enqueue_script( 'bc_materialize_admin_js', BC_PLUGIN_DIR_URL . 'helpers/materialize/materialize.js', ['jquery'], $this->version, true );

        wp_enqueue_script( 'bc_swwet_alert_js', BC_PLUGIN_DIR_URL .  '/helpers/sweetalert/sweetalert.min.js', ['jquery'], $this->version, true );

        wp_enqueue_script( $this->plugin_name, BC_PLUGIN_DIR_URL . 'admin/js/bc-admin.js', ['jquery'], $this->version, true );

        wp_localize_script( 
            $this->plugin_name,
            'bcdata',
            [
                'url'        => admin_url('admin-ajax.php'),
                'seguridad'  => wp_create_nonce('bcdata_seg')
            ]
        );
    }
    
    public function add_menu() {
        $this->build_menupage->add_menu_page(
            __('Sebas CRUD', 'beziercode-textdomain'),
            __('Sebas CRUD', 'beziercode-textdomain'),
            'manage_options',
            'bc_data',
            [$this, 'controlador_display_menu'],
            BC_PLUGIN_DIR_URL .'admin/img/bezier-20-wp-active.svg',
            22
        );
        $this->build_menupage->run();
    }

    public function controlador_display_menu(){
        if($_GET['page'] == 'bc_data' &&  $_GET['action'] == 'edit' && isset($_GET['id'])){
            require_once BC_PLUGIN_DIR_PATH .'admin/partials/bc-admin-display-edit.php';
        } else {
            require_once BC_PLUGIN_DIR_PATH .'admin/partials/bc-admin-display.php';
        }
       

    }
    public function ajax_crud_table(){
        check_ajax_referer( 'bcdata_seg','nonce');
        if(current_user_can('manage_options')){
            extract($_POST,EXTR_OVERWRITE);
            if($tipo == 'add'){
                $columns = [
                    'nombre' => $nombre,
                    'data'   =>'',
                ];
                $result = $this->db->insert(BC_TABLE,$columns);
                $json = json_encode( [
                    'result'    => $result,
                    'nombre'    => $nombre,
                    'insert_id' => $this->db->insert_id
                ] );
            }
            echo $json;
            wp_die();
        }
    }
}







