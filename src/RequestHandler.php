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
        if (isset($_SESSION["user"]) === false) {
            return "LWS\\CMS\\LoginPageController";
        }

        return "";
    }
}