<?php

namespace App\Controllers\Auth;

use App\Abstracts\Controller;
use App\Users\User;
use App\Views\Forms\RegisterForm;
use App\Views\Pages\BasePage;
use App\App;
use Core\Router;
use Core\Views\Content;

class RegisterController extends Controller
{

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create() (form for creating),
     * edit() (form for editing)
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * add.php:
     * $controller = new PixelsController();
     * print $controller->add();
     *
     *
     * my.php:
     * $controller = new ProductsController();
     * print $controller->my();
     *
     * @return string|null
     */
    function index(): ?string
    {
        $register = new RegisterForm();

        if ($register->isSubmitted()) {
            if ($register->validate()) {
                $user = new User($register->getSubmitData());

                App::$db->insertRow('users', $user->_getData());
                header('Location:'. Router::getUrl('login'));
                exit();
            }
        }
        $content = new Content(['form' => $register->render()]);
        $this->page->setTitle('Registration');
        $this->page->setContent($register->render());
        return $this->page->render();
    }
}