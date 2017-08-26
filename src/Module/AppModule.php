<?php
namespace MyVendor\Stream\Module;

use BEAR\Package\PackageModule;
use BEAR\Streamer\StreamModule;
use josegonzalez\Dotenv\Loader as Dotenv;
use Madapaja\TwigModule\TwigModule;
use Ray\Di\AbstractModule;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        Dotenv::load([
            'filepath' => dirname(dirname(__DIR__)) . '/.env',
            'toEnv' => true
        ]);
        $this->install(new PackageModule);
        $this->install(new StreamModule);
    }
}
