<?php

namespace Juster\WordpressVite\Core;

class Config
{
    private array $config = [];

    public function __construct(string $config_path, string $env)
    {
        $theme_path = get_stylesheet_directory();
        $theme_uri = get_stylesheet_directory_uri();

        $vite_config = require $config_path . 'vite.config.php';
        $vite_dev_path = $theme_path . '/.dev';
        $vite_hmr_host = self::getViteServer($vite_dev_path);

        $this->config = [
            'path' => $theme_path,
            'uri' => $theme_uri,
            'output' => $theme_uri . '/dist',
            'env' => [
                'type' => $env,
                'mode' => false === strpos($theme_path, ABSPATH . 'wp-content/plugins') ? 'theme' : 'plugin',
            ],
            'hmr' => [
                'host' => $vite_hmr_host,
                'client' => $vite_hmr_host . '/@vite/client',
                'active' => $env !== 'production' && file_exists($vite_dev_path),
            ],
            'manifest' => [
                'path' => $theme_path . '/dist/' . $vite_config['manifest'],
            ],
        ];
    }

    public function get(string $key): mixed
    {
        $value = $this->config;

        foreach (explode('.', $key) as $key) {
            if (isset($value[$key])) {
                $value = $value[$key];
            } else {
                return null;
            }
        }

        return $value;
    }

    public function isTheme(): bool
    {
        return 'theme' === $this->get('env.mode');
    }

    public function isPlugin(): bool
    {
        return 'plugin' === $this->get('env.mode');
    }

    private static function getViteServer(string $path): string
    {
        $default = 'http://localhost:5173';

        if (! file_exists($path)) {
            return $default;
        }

        $file = file_get_contents($path);
        [$key, $value] = explode('=', trim($file), 2);

        if ($key !== 'VITE_SERVER') {
            return $default;
        }

        return $value;
    }
}
