<?php


namespace App\Controller\Admin;

use \App;
use Core\Auth\DBAuth;

class AppController extends \App\Controller\AppController
{
    protected $template = 'admin/default';

    public function __construct()
    {
        parent::__construct();
        $app = App::getInstance();

        $auth = new DBAuth($app->getDb());
        if (!$auth->logged()) {
            $this->forbidden();
        }
        if (!$auth->isAdmin()) {
            $this->notAllowed();
        }
    }
}