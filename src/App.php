<?php

namespace Juster\WordpressVite;

use Juster\WordpressVite\Assets\Assets;
use Juster\WordpressVite\Core\Config;
use Juster\WordpressVite\Core\Hooks;
use Juster\WordpressVite\Integrations\Integrations;

class App
{
    private Assets $assets;

    private Config $config;

    private Integrations $integrations;

    private static ?App $instance = null;

    private function __construct(string $config_path, string $env)
    {
        $this->assets = self::init(new Assets());
        $this->config = self::init(new Config($config_path, $env));
        $this->integrations = self::init(new Integrations());
    }

    public function assets(): Assets
    {
        return $this->assets;
    }

    public function config(): Config
    {
        return $this->config;
    }

    public function integrations(): Integrations
    {
        return $this->integrations;
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception('Cannot unserialize a singleton.');
    }

    public static function get(string $config_path, string $env): App
    {
        if (empty(self::$instance)) {
            self::$instance = new App($config_path, $env);
        }

        return self::$instance;
    }

    public static function init(object $module): object
    {
        return Hooks::init($module);
    }
}
