<?php
namespace LWS\CMS;

use LWS\Framework\Context;
use LWS\Framework\IGet;

class LoginPageController implements IGet
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