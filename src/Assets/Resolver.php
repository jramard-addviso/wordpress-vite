<?php

namespace Juster\WordpressVite\Assets;

trait Resolver
{
    private array $manifest = [];

    /**
     * @action wp_enqueue_scripts 1
     */
    public function load(): void
    {
        $path = vite()->config()->get('manifest.path');

        if (empty($path) || ! file_exists($path)) {
            wp_die(wp_kses_post('Run <code>npm run build</code> in your application root!'));
        }

        $this->manifest = json_decode(file_get_contents($path), true);
    }

    /**
     * @filter script_loader_tag 1 3
     */
    public function module(string $tag, string $handle, string $url): string
    {
        if ((false !== strpos($url, vite()->config()->get('hmr.host'))) || (false !== strpos($url, vite()->config()->get('output')))) {
            $tag = str_replace('<script ', '<script type="module" ', $tag);
        }

        return $tag;
    }

    public function resolve(string $path): string
    {
        $url = '';

        if (! empty($this->manifest[$path])) {
            $url = vite()->config()->get('output') . "/{$this->manifest[$path]['file']}";
        }

        return apply_filters('vite_assets_resolver_url', $url, $path);
    }

    public function resolveCssDeps(string $path): array
    {
        $urls = [];

        if (! empty($this->manifest[$path])) {
            if ($stylepaths = $this->manifest[$path]['css'] ?? []) {
                foreach ($stylepaths as $stylepath) {
                    $url = vite()->config()->get('output') . "/{$stylepath}";
                    $urls[] = apply_filters('vite_assets_resolver_url', $url, $path);
                }
            }
        }

        return $urls;
    }
}
