<?php
namespace Anax\Comments;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

class CommentController implements AppInjectableInterface
{
    use AppInjectableTrait;

    public function redirect()
    {
        $this->app->redirect("comments");
    }

    public function session()
    {
        $this->app->session->start();
    }

    public function post()
    {
        $array = $this->app->request->getPost();
        $this->app->comment->posted($array);
        $this->redirect();
    }

    public function delete($index)
    {
        $this->app->comment->deleted($index);
        $this->redirect();
    }

    public function refresh()
    {
        $comments = $this->app->comment->fetch();
        $this->app->view->add("framework/form", ["comments" => $comments], "main");
        $this->app->view->add("framework/list", ["comments" => $comments], "main");

        $this->app->renderPage(
            ["title" => "Kommentarer"]
        );
    }
}
