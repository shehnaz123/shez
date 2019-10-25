<?php

namespace MRKWP\GlobalFooter;

class Footer
{
    protected  $container ;
    public function __construct( $container )
    {
        $this->container = $container;
    }
    
    /**
     * Get the divi footer.
     */
    public function get()
    {
        global  $post ;
        $inject_footer = true;
        $inject_footer = apply_filters( 'can_inject_df_footer', $inject_footer );
        if ( !$inject_footer ) {
            return;
        }
        $footerPostID = $this->container['settings']->getFooterPostId();
        
        if ( $footerPostID ) {
            $showFooter = true;
            
            if ( $showFooter ) {
                $footerPost = get_post( $footerPostID );
                wp_reset_postdata();
                
                if ( $footerPost ) {
                    $content = $footerPost->post_content;
                    echo  do_shortcode( $content ) ;
                }
            
            }
        
        }
    
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

}