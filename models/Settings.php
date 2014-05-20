<?php namespace Hariadi\Share\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'hariadi_share_settings';
    public $settingsFields = 'fields.yaml';

    public function initSettingsData()
    {
        $this->facebook = true;
        $this->twitter = true;
        $this->googleplus = true;
    }

}