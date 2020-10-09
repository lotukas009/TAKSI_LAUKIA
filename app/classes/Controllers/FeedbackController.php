<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\App;
use App\Feedback\Feedback;
use App\Views\Forms\FeedbackForm;
use App\Views\Tables\FeedbackTable;
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
        $feedbackTable = new FeedbackTable();

        if (!App::$session->getUser()) {

            $feedbackMessage = 'Your feedback is appreciated. Please register and leave it here!';
            $link = Router::getUrl('register');

            $content = new Content(['link' => $link, 'feedbackMessage' => $feedbackMessage, 'table' => $feedbackTable->render('table.tpl.php')]);

        } else {

            $feedbackForm = new FeedbackForm();

            if ($feedbackForm->isSubmitted()) {
                if ($feedbackForm->validate()) {
                    $feedback = new Feedback($feedbackForm->getSubmitData());

                    $user = App::$db->getRowsWhere('users', ['email' => App::$session->getUser()['email']]);
                    foreach ($user as $user_key => $user_value) {
                        $user_id = $user_key;
                    }
                    $feedback->setUserId($user_id);
                    $feedback->setFeedback($feedbackForm->getSubmitData()['feedback']);
                    $feedback->setDate(date('Y m d'));
                    App::$db->insertRow('feedback', $feedback->_getData());

                }
            }
            $content = new Content(['form' => $feedbackForm->render() ?? null, 'table' => $feedbackTable->render('table.tpl.php')]);

        }

        $this->page->setTitle('Feedback');
        $this->page->setContent($content->render('feedback.tpl.php'));
        return $this->page->render();

    }
}












//
//    function index(): ?string
//    {
//        $table = new FeedbackTable();
//
//        if (!App::$session->getUser()) {
//
//            $feedbackMessage = 'Your feedback is appreciated. Please register and leave it here!';
//            $link = Router::getUrl('register');
//
//            $content = new Content(['link' => $link, 'feedbackMessage' => $feedbackMessage, 'table' => $table->render('table.tpl.php')]);
//
//        } else {
//
//            $feedbackForm = new FeedbackForm();
//
//            if ($feedbackForm->isSubmitted()) {
//                if ($feedbackForm->validate()) {
//                    $feedback = new Feedback($feedbackForm->getSubmitData());
//                    $user_id = key(App::$db->getRowsWhere('users', ['email' => App::$session->getUser()['email']]));
//                    $feedback->setUserId($user_id);
//                    $feedback->setFeedback($feedbackForm->getSubmitData()['feedback']);
//                    $feedback->setDate(date('Y m d'));
//                    App::$db->insertRow('feedback', $feedback->_getData());
//                }
//            }
//
//            $content = new Content(['form' => $feedbackForm->render(), 'table' => $table->render('table.tpl.php')]);
//
//        }
//        $this->page->setTitle('Feedback');
//        $this->page->setContent($content->render('feedback.tpl.php'));
//        return $this->page->render();
//
//    }
//}