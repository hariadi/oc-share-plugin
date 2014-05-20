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
            'description' => 'Outputs a social share button on a blog post post.'
        ];
    }

    public function facebook()
    {
        return Settings::get('facebook');
    }

    public function twitter()
    {
        return Settings::get('twitter');
    }

    public function googleplus()
    {
        return Settings::get('googleplus');
    }

    public function onRun()
{
    // This code will be executed when the page or layout is
    // loaded and the component is attached to it.
    $this->addCss('/plugins/hariadi/share/assets/css/share.css'); 

    $settings = Settings::instance();

    $this->page['facebook'] = $settings->facebook;
    $this->page['twitter'] = $settings->twitter;
    $this->page['googleplus'] = $settings->googleplus;
      
    $this->page['url'] = Request::url();
}

}