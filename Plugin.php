<?php namespace Hariadi\Share;

use System\Classes\PluginBase;

/**
 * Share Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Social Share',
            'description' => 'Provides share button to blog post .',
            'author'      => 'Hariadi Hinta',
            'icon'        => 'icon-share-alt-square'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Hariadi\Share\Components\Share' => 'shares'
        ];
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label' => 'Social Share',
                'icon' => 'icon-share-alt-square',
                'description' => 'Configure social share options.',
                'class' => 'Hariadi\Share\Models\Settings',
                'order' => 100
            ]
        ];
    }

}
