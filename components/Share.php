<?php namespace Hariadi\Share\Components;

use Cms\Classes\ComponentBase;
use Hariadi\Share\Models\Settings;
use Illuminate\Support\Facades\Request as Request;

class Share extends ComponentBase
{
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

        $this->page['facebook'] = $settings->facebook;
        $this->page['twitter'] = $settings->twitter;
        $this->page['googleplus'] = $settings->googleplus;
          
        $this->page['url'] = Request::url();
    }

}