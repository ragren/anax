<?php

namespace Anax\App;

/**
 * An App class to wrap the resources of the framework.
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class App
{
    /**
     * Redirect
     *
     * @param String $url URL
     * @return void
     */
    public function redirect($url)
    {
        $this->response->redirect($this->url->create($url));
        exit;
    }
    /**
     * Render a standard web page using a specific layout.
     * @param  $data
     * @param  $status
     */
    public function renderPage($data, $status = 200)
    {
        $data["stylesheets"] = [
            "https://bootswatch.com/cosmo/bootstrap.css",
            "css/style.css",
            "css/remserver.css"
        ];
        // Add common header, navbar and footer
        $this->view->add("framework/header", [], "header");
        $this->view->add("framework/navbar", [], "navbar");
        $this->view->add("framework/footer", [], "footer");
        // Add layout, render it, add to response and send.
        $this->view->add("framework/layout", $data, "layout");
        $body = $this->view->renderBuffered("layout");
        $this->response->setBody($body)
                       ->send($status);
        exit;
    }
}
