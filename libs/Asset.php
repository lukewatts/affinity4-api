<?php namespace Affinity4API;

/**
 * Handle styles for Affinity4API
 */
class Asset
{
    public $assets_dir = 'assets/';
    public $css = [
                'affinity4api' => [
                    'src'   => 'css/style.css',
                    'deps'  => [],
                    'ver'   => '1.0.0',
                    'media' => 'all'
                ]
            ];

    public $js = [
                // 'affinity4api' => [
                //     'src'       => 'js/script.js',
                //     'deps'      => ['jquery'],
                //     'ver'       => '1.0.0',
                //     'in_footer' => true||false
                // ]
            ];

    public function __construct()
    {
        if (array_keys($this->css)) {
            add_action('wp_enqueue_scripts', [$this, 'css']);
        }

        if (array_keys($this->js)) {
            add_action('wp_enqueue_scritps', [$this, 'js']);
        }

    }

    public function css()
    {
        foreach ($this->css as $id => $property) {
            wp_enqueue_style($id, plugins_url('/affinity4-api/') . $this->assets_dir . $property['src'], $property['deps'], $property['ver'], $property['media']);
        }
    }

    public function js()
    {
        foreach ($this->js as $id => $property) {
            wp_enqueue_script($id, plugins_url('/affinity4-api/') . $this->assets_dir . $property['src'], $property['deps'], $property['ver'], $property['in_footer']);
        }
    }
}

new Asset;
