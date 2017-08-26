<?php
namespace MyVendor\Stream\Module;

use BEAR\Streamer\StreamModule;
use Madapaja\TwigModule\TwigModule;
use Ray\Di\AbstractModule;

class HtmlModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new TwigModule);
    }
}
