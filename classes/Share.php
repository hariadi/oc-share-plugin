<?php namespace Hariadi\Share\Classes;

use Hariadi\Share\Models\Settings;

class Share
{
    protected static $instance;

    public function init()
    {
    	$settings = Settings::instance();

        $this->facebook = $settings->facebook;
        $this->twitter = $settings->twitter;
        $this->googleplus = $settings->googleplus;
        $this->tumblr = $settings->tumblr;
    }
}
