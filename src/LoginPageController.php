<?php
namespace LWS\CMS;

use LWS\CMS\User\LoginHandler;
use LWS\Framework\Http\Context;
use LWS\Framework\Http\IGet;
use LWS\Framework\Http\IPost;
use LWS\Framework\Notifications\Notification;

class LoginPageController implements IGet, IPost
{

    public function get()
    {
        $view = new PageView(
            PageView::getTemplateRoot() . "login.tpl",
            new PageViewModel(Context::getDatabaseConnection()),
            false
        );

        $view->addCssFile("signin.css");

        Context::getResponse()->setBody($view->parse());
    }

    public function post()
    {
        $loginHandler = new LoginHandler(Context::getDatabaseConnection());
        $loginSuccessful = $loginHandler->handleLogin();

        if ($loginSuccessful === false) {
            return $this->get();
        }

        Context::addNotification(new Notification("Succesvol ingelogd!", Notification::LEVEL_NOTIFICATION));

        Context::getResponse()->setLocation("/cms");
        return null;
    }
}