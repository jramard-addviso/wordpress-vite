<?php

namespace Juster\WordpressVite\Integrations;

class Vite
{
    /**
     * @action wp_head 1
     */
    public function client(): void
    {
        printf('<script type="module" src="%s"></script>', esc_attr(vite()->config()->get('hmr.client')));
    }

    /**
     * @filter vite_assets_resolver_url 1 2
     */
    public function url(string $url, string $path): string
    {
        return vite()->config()->get('hmr.host') . "/{$path}";
    }
}
