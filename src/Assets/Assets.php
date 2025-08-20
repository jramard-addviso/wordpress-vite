<?php

namespace Juster\WordpressVite\Assets;

use Juster\WordpressVite\Assets\Resolver;

class Assets
{
    use Resolver;

    public function enqueueStyle(string $name, string $path): void
    {
        wp_enqueue_style($name, $this->resolve($path), [], null);
    }

    public function enqueueScript(string $name, string $path): void
    {
        if (! vite()->config()->get('hmr.active')) {
            foreach ($this->resolveCssDeps($path) as $key => $url) {
                wp_enqueue_style("$name-deps-$key", $url, [], null);
            }
        }
        wp_enqueue_script_module($name, $this->resolve($path), [], null);
    }
}
