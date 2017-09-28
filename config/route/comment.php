<?php


$app->router->add("comments/**", [$app->controller, "session"]);

$app->router->add("comments", [$app->controller, "refresh"]);

$app->router->post("comments/post", [$app->controller, "post"]);

$app->router->get("comments/delete/{index:digit}", [$app->controller, "delete"]);
