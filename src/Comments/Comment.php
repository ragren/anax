<?php
namespace Anax\Comments;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

class Comment implements AppInjectableInterface
{
    use AppInjectableTrait;
    public function fetch()
    {
        $comments = $this->app->session->get("array");
        $comments = is_array($comments) ? $comments : [];

        return $comments;
    }

    public function posted($array)
    {
        $comments = $this->fetch();
        array_push($comments, $array);

        $this->app->session->set("array", $comments);
    }

    public function deleted($index)
    {
        $comments = $this->fetch();
        foreach ($comments as $key => $post) {
            if ($post["index"] == $index) {
                unset($comments[$key]);
            }
        }

        $this->app->session->set("array", $comments);
    }
}
