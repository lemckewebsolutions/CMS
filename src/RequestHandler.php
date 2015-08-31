<?php
namespace LWS\CMS;

class RequestHandler extends \LWS\Framework\RequestHandler
{
    public function __construct()
    {
        session_start();
    }

    protected function getController()
    {
        if ($_SESSION["user"] === null) {
            return "LWS\\CMS\\LoginPageController";
        }

        return "LWS\\CMS\\IndexPageController";
    }
}