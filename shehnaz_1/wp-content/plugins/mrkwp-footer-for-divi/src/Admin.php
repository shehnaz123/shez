<?php

namespace MRKWP\GlobalFooter;

class Admin
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function init()
    {
        $this->container['menu']->adminMenu();
    }
}
