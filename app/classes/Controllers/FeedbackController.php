<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\App;
use App\Feedback\Feedback;
use App\Views\Forms\FeedbackForm;
use Core\Router;
use Core\Views\Content;

class FeedbackController extends Controller
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
     * $controller = new FeedbackController();
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
        $feedbackForm = new FeedbackForm();
       if (App::$session->getUser()){
           if ($feedbackForm->isSubmitted()) {
               if ($feedbackForm->validate()) {
                   $feedback = new Feedback($feedbackForm->getSubmitData());
                   $user_id = key(App::$db->getRowsWhere('users', ['email' => App::$session->getUser()['email']]));
                   $feedback->setUserId($user_id);
                   $feedback->setFeedback($feedbackForm->getSubmitData()['feedback']);
                   $feedback->setDate(date('Y m d H:i'));
                   App::$db->insertRow('feedback', $feedback->_getData());
               }
           }
       }

        $content = new Content(['form' => $feedbackForm->render()]);
        $this->page->setTitle('Feedback');
        $this->page->setContent($feedbackForm->render());
        return $this->page->render();
    }
}
