<?php

namespace MRKWP\GlobalFooter;

class Actions
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }


    // actions.
    public function add()
    {
        if (!isset($_GET['et_fb'])) {
            add_action('get_footer', array($this->container['footer'], 'get'));
        }
    }
}
