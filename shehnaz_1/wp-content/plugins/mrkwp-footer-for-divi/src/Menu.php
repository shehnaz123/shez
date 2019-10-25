<?php

namespace MRKWP\GlobalFooter;

class Menu
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }


    /**
     * Register admin menu
     */
    public function adminMenu()
    {
        \add_action('admin_menu', array($this->container['settings'], 'main'));
    }
}
