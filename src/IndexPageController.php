<?php

namespace LWS\CMS;

use LWS\Framework\Http\Context;
use LWS\Framework\Http\IGet;

class IndexPageController implements IGet
{
    public function get()
    {
        $view = new PageView(
            PageView::getTemplateRoot() . "index.tpl",
            new PageViewModel(Context::getDatabaseConnection())
        );

        $view->addCssFile("cms.css");

        Context::getResponse()->setBody($view->parse());
    }
}