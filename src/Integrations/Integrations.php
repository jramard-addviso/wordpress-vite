<?php

namespace Juster\WordpressVite\Integrations;

use Juster\WordpressVite\Integrations\Vite;

class Integrations
{
    /**
     * @action init
     */
    public function init(): void
    {
        if (vite()->config()->get('hmr.active')) {
            \Juster\WordpressVite\App::init(new Vite());
        }
    }
}
