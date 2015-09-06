<?php

namespace LWS\CMS;

use LWS\Framework\Http\Context;
use LWS\Framework\Http\IGet;

class IndexPageController implements IGet
{
    public function get()
    {
        $viewModel = new PageViewModel(Context::getDatabaseConnection());
        $viewModel->setUser($_SESSION["user"]);

        $view = new PageView(
            PageView::getTemplateRoot() . "index.tpl",
            $viewModel
        );

        $view->addCssFile("cms.css");

        Context::getResponse()->setBody($view->parse());
    }
}