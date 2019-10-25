<?php

namespace MRKWP\GlobalFooter;

class DiviLibrary
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }


    /**
     * Get the global modules.
     */
    public function getGlobals()
    {
        $args = array(
                'post_type'       => ET_BUILDER_LAYOUT_POST_TYPE,
                'posts_per_page'  => '-1'
            );

        $query = new \WP_Query($args);

        $posts = $query->get_posts();
        wp_reset_postdata();

        $sectionGlobals = array();

        foreach ($posts as $post) {
            $sectionGlobals[$post->ID] = $post->post_title;
        }

        return $sectionGlobals;
    }
}
