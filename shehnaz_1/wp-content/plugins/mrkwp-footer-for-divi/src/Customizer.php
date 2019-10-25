<?php

namespace MRKWP\GlobalFooter;

use  WP_Customize_Control ;
class Customizer
{
    protected  $container ;
    public function __construct( $container )
    {
        $this->container = $container;
    }
    
    public function getPublicPostTypes()
    {
        $registeredPostTypes = get_post_types( array(
            'public' => true,
        ), 'object' );
        $postTypes = array();
        foreach ( $registeredPostTypes as $registeredPostType ) {
            $postTypes[$registeredPostType->name] = $registeredPostType->label;
        }
        return $postTypes;
    }
    
    public function get_settings()
    {
        return get_option( 'df_gbf', array() );
    }

}