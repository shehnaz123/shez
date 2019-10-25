<?php

namespace MRKWP\GlobalFooter;

use  Pimple\Container as PimpleContainer ;
/**
 * DI container
 */
class Container extends PimpleContainer
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initObjects();
    }
    
    /**
     * Initialize
     */
    public function initObjects()
    {
        $this['customizer'] = function ( $container ) {
            return new Customizer( $container );
        };
        $this['actions'] = function ( $container ) {
            return new Actions( $container );
        };
        $this['divi_library'] = function ( $container ) {
            return new DiviLibrary( $container );
        };
        $this['settings'] = function ( $container ) {
            return new Settings( $container );
        };
        $this['menu'] = function ( $container ) {
            return new Menu( $container );
        };
        $this['admin'] = function ( $container ) {
            return new Admin( $container );
        };
        $this['footer'] = function ( $container ) {
            return new Footer( $container );
        };
        $this['activation'] = function ( $container ) {
            return new Activation( $container );
        };
        $this['hub'] = function ( $container ) {
            return new \DF\HUB_V2\HUB_V2( $container );
        };
    }
    
    public function init()
    {
    }
    
    /**
     * Start the plugin
     */
    public function run()
    {
        add_action( 'init', array( $this['admin'], 'init' ) );
        $this['actions']->add();
    }

}