<?php namespace Hariadi\Share\Controllers;

use Flash;
use BackendMenu;
use BackendAuth;
use Backend\Classes\Controller;

/**
 * Share Back-end Controller
 */
class Share extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['october.manage_system_settings'];

    public $bodyClass = 'compact-container';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Hariadi.Share', 'share', 'share');
    }
}