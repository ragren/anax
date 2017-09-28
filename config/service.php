<?php
/**
 * Add and configure services and return the $app object.
 */
// Add all resources to $app
$app = new \Anax\App\App();
$app->request    = new \Anax\Request\Request();
$app->response   = new \Anax\Response\Response();
$app->url        = new \Anax\Url\Url();
$app->router     = new \Anax\Route\RouterInjectable();
$app->view       = new \Anax\View\ViewContainer();
$app->textfilter = new \Anax\TextFilter\TextFilter();
$app->session    = new \Anax\Session\SessionConfigurable();
$app->rem        = new \Anax\RemServer\RemServer();
$app->remController = new \Anax\RemServer\RemServerController();

$app->controller   = new \Anax\Comments\CommentController();
$app->comment   = new \Anax\Comments\Comment();

$app->db = new \Anax\Database\DatabaseConfigure();


// Init REM Server
$app->rem->configure("remserver.php");
$app->rem->inject(["session" => $app->session]);
// Init controller for the REM Server
$app->remController->setApp($app);

// Configure comments
$app->controller->setApp($app);
$app->comment->setApp($app);

// Configure Database
$app->db->configure("database.php");

// Configure request
$app->request->init();
// Configure router
$app->router->setApp($app);
// Configure session
$app->session->configure("session.php");
// Configure url
$app->url->setSiteUrl($app->request->getSiteUrl());
$app->url->setBaseUrl($app->request->getBaseUrl());
$app->url->setStaticSiteUrl($app->request->getSiteUrl());
$app->url->setStaticBaseUrl($app->request->getBaseUrl());
$app->url->setScriptName($app->request->getScriptName());
$app->url->configure("url.php");
$app->url->setDefaultsFromConfiguration();

// Configure view
$app->view->setApp($app);
$app->view->configure("view.php");

//assets
$app->stylesheet = $app->request->getBaseUrl() . $app->url->asset("css/style.css");
$app->stylesheetmdl = $app->request->getBaseUrl() . $app->url->asset("css/stylemdl.css");
/* $app->logo = $app->request->getBaseUrl() . $app->url->asset("image/oophplogo.png?w=40");
 */
// Return the populated $app
return $app;
