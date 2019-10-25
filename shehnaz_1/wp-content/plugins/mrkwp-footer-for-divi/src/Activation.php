<?php

namespace MRKWP\GlobalFooter;

class Activation
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * install hook.
     */
    public function install()
    {
    }
}
