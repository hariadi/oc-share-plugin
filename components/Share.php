<?php namespace Hariadi\Share\Components;

use Cms\Classes\ComponentBase;
use Hariadi\Share\Models\Settings;
use Illuminate\Support\Facades\Request as Request;

class Share extends ComponentBase
{
    protected $providers = array(
        'facebook',
        'twitter',
        'googleplus'
    );

    public function componentDetails()
    {
        return [
            'name'        => 'Share Component',
            'description' => 'Outputs a social share button on a page and blog post post.'
        ];
    }

    public function onRun()
    {
        $settings = Settings::instance();

        $this->addCss('/plugins/hariadi/share/assets/css/share.css');

        foreach ($this->providers as $provider) {
            $this->page[$provider] = $settings->$provider;
        }
          
        $this->page['url'] = Request::url();
    }

    public function onRender()
    {
        foreach ($this->providers as $provider) {
            $this->page[$provider] = self::config($this->property($provider));
        }
    }

    private function config($config = 'true') {
        if (empty($config)) {
            $config = 'true';
        }
        return filter_var($config, FILTER_VALIDATE_BOOLEAN);
    }

}