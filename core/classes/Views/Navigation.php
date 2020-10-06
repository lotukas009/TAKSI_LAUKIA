<?php

namespace Core\Views;

use App\App;
use Core\Router;
use Core\View;

class Navigation extends View
{

    public function __construct()
    {
        $nav = [
            'home' => [
                'url' => Router::getUrl('index'),
                'class' => 'active',
                'title' => 'Home',
            ],
        ];
        if (App::$session->getUser()) {
            $nav[] = [
                'url' => Router::getUrl('add'),
                'title' => 'Add',
            ];
            $nav[] = [
                'url' => Router::getUrl('logout'),
                'title' => 'Logout',
            ];
            $nav[] = [
                'url' => Router::getUrl('my'),
                'title' => 'My Pixels',
            ];
        } else {
            $nav[] = [
                'url' => Router::getUrl('register'),
                'title' => 'Register',
            ];
            $nav[] = [
                'url' =>Router::getUrl('login'),
                'title' => 'Login',
            ];
        }

        parent::__construct($nav);
    }

    public function render(string $template_path = ROOT . '/core/templates/nav.tpl.php')
    {
        return parent::render($template_path);
    }
}