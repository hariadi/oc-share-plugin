<?php namespace Hariadi\Share\Components;

use Cms\Classes\ComponentBase;
use Hariadi\Share\Models\Settings;
use Illuminate\Support\Facades\Request as Request;

class Share extends ComponentBase
{
    protected $providers = [
        'facebook',
        'twitter',
        'googleplus',
        'tumblr',
        'linkedin',
        'reddit',
        'digg',
    ];

    public function componentDetails()
    {
        return [
            'name'        => 'Share Component',
            'description' => 'Outputs a social share button on a page and blog post post.'
        ];
    }

    public function defineProperties()
    {
        $providers = [];
        $settings = Settings::instance();

        foreach ($this->providers as $provider) {
            $providers[$provider] = [
                'title'       => ucfirst($provider),
                'description' => 'Enable social share button for ' . ucfirst($provider),
                'type'        => 'checkbox',
                'default'     => $settings->$provider,
                'group'       => 'Providers',
            ];
        }

        return $providers;
    }

    public function onRun()
    {
        $settings = Settings::instance();

        $this->addCss('/plugins/hariadi/share/assets/css/share.css');

        foreach ($this->providers as $provider) {
            $this->page[$provider] = $this->property($provider) ?: $settings->$provider;
        }

        $this->page['url'] = Request::url();
    }

    public function onRender()
    {
        foreach ($this->providers as $provider) {
            $this->page[$provider] = $this->checkConfig($this->property($provider));
        }
    }

    private function checkConfig($config = '1') {
        return filter_var($config, FILTER_VALIDATE_BOOLEAN);
    }

}
