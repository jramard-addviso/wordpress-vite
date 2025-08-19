<?php

if (! file_exists($autoloader = ABSPATH . '../vendor/autoload.php')) {
    wp_die(wp_kses_post('Error locating autoloader. Please run <code>composer install</code>.'));
}

require_once $autoloader;

use Juster\WordpressVite\App;

if (! function_exists('vite')) {
    function vite(): App
    {
        return App::get(ABSPATH, WP_ENVIRONMENT_TYPE);
    }
}

if (! function_exists('resolve')) {
    function resolve($path): string
    {
        return vite()->assets()->resolve($path);
    }
}

vite();

if (! function_exists('theme')) {
    function theme(): void
    {
        vite()->assets()->enqueueStyle('theme', 'styles/main.css');
        vite()->assets()->enqueueScript('theme', 'scripts/main.js');
    }
}

add_action('wp_enqueue_scripts', 'theme');

/**
 * Prints space separated HTML classes from a given array.
 *
 * @param array $classes
 *
 * @return string
 */
function html_classes($classes = [])
{
    return implode(' ', array_filter($classes));
}

/**
 * Prints space separated HTML attributes from a given associative array.
 *
 * @param array $attributes
 *
 * @return string
 */
function html_attributes($attributes = [])
{
    $html_attributes = '';
    foreach ($attributes as $key => $value) {
        if ($value === true) {
            $html_attributes .= " $key";
        } elseif ($value !== false) {
            $html_attributes .= " $key=\"$value\"";
        }
    }
    return $html_attributes;
}
