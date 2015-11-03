<?php

namespace LWS\CMS;

use LWS\Framework\Http\Context;
use LWS\Framework\Http\IGet;
use LWS\Framework\Http\IPost;

class UsersPageController implements IGet, IPost
{
    public function get()
    {
        $viewModel = new UsersPageViewModel(Context::getDatabaseConnection());
        $viewModel->setUser($_SESSION["user"]);

        $view = new UsersPageView(
            PageView::getTemplateRoot() . "users.tpl",
            $viewModel
        );

        $view->addCssFile("cms.css");

        Context::getResponse()->setBody($view->parse());
    }

    public function post()
    {

    }
}