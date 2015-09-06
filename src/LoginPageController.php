<?php
namespace LWS\CMS;

use LWS\CMS\User\LoginHandler;
use LWS\Framework\Http\Context;
use LWS\Framework\Http\IGet;
use LWS\Framework\Http\IPost;

class LoginPageController implements IGet, IPost
{

    public function get()
    {
        $view = new PageView(
            PageView::getTemplateRoot() . "login.tpl",
            new PageViewModel($this->getDatabaseConnection())
        );

        $view->addCssFile("signin.css");

        Context::getResponse()->setBody($view->parse());
    }

    public function post()
    {
        $loginHandler = new LoginHandler($this->getDatabaseConnection());
        $loginSuccessful = $loginHandler->handleLogin();

        if ($loginSuccessful === true) {
            return $this->get();
        }

        Context::getResponse()->setLocation("/cms");
        return null;
    }

    /**
     * @return \mysqli
     */
    private function getDatabaseConnection()
    {
        $config = Context::getConfiguration();

        return new \mysqli(
            $config["database"]["host"],
            $config["database"]["username"],
            $config["database"]["password"],
            $config["database"]["database"]
        );
    }
}