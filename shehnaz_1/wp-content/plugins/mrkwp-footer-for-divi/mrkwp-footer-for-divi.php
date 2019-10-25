<?php

/**
 * Plugin Name: Footer Plugin for Divi
 * Version: 3.3.4
 * Description: Injects a divi global module before the WordPress footer.php file load.
 * Author: M R K Development Pty Ltd
 * Author URI: http://www.mrkwp.com/
 * Text Domain: divi-framework-global-footer-injector
 * Domain Path: /languages
 *
 * @package Divi Global Footer
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly
}

define( 'MRKWP_GLOBAL_FOOTER_INJECTOR_VERSION', '3.3.4' );
define( 'MRKWP_GLOBAL_FOOTER_INJECTOR_DIR', __DIR__ );
define( 'MRKWP_GLOBAL_FOOTER_INJECTOR_URL', plugins_url( '/' . basename( __DIR__ ) ) );
require_once MRKWP_GLOBAL_FOOTER_INJECTOR_DIR . '/vendor/autoload.php';
$container = new \MRKWP\GlobalFooter\Container();
$container['plugin_name'] = 'Footer Plugin for Divi';
$container['plugin_version'] = MRKWP_GLOBAL_FOOTER_INJECTOR_VERSION;
$container['plugin_file'] = __FILE__;
$container['plugin_dir'] = MRKWP_GLOBAL_FOOTER_INJECTOR_DIR;
$container['plugin_url'] = MRKWP_GLOBAL_FOOTER_INJECTOR_URL;
$container['plugin_slug'] = 'mrkwp-footer-plugin-for-divi';
// activation hook.
register_activation_hook( __FILE__, array( $container['activation'], 'install' ) );
add_action( 'admin_menu', array( $container['hub'], 'add_menu_page' ) );
add_action( 'init', array( $container, 'init' ), 0 );

if ( !function_exists( 'dfgfi_fs' ) ) {
    // Create a helper function for easy SDK access.
    function dfgfi_fs()
    {
        global  $dfgfi_fs ;
        
        if ( !isset( $dfgfi_fs ) ) {
            // Include Freemius SDK.
            include_once dirname( __FILE__ ) . '/freemius/start.php';
            $dfgfi_fs = fs_dynamic_init( array(
                'id'             => '3726',
                'slug'           => 'mrkwp-footer-for-divi',
                'type'           => 'plugin',
                'public_key'     => 'pk_a316bc934f8e99c3d3ff736f0ac24',
                'is_premium'     => false,
                'premium_suffix' => 'Premium',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'trial'          => array(
                'days'               => 7,
                'is_require_payment' => false,
            ),
                'menu'           => array(
                'slug'    => 'divi-footer-selector',
                'support' => false,
                'parent'  => array(
                'slug' => 'df-hub-v2',
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $dfgfi_fs;
    }
    
    // Init Freemius.
    dfgfi_fs();
    // Signal that SDK was initiated.
    do_action( 'dfgfi_fs_loaded' );
}

$container->run();