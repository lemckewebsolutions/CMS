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

        $requestUri = strtok($_SERVER["REQUEST_URI"],'?');

        switch ($requestUri) {
            case Url::USERS:
                return "LWS\\CMS\\UsersPageController";
            default:
                return "";
        }
    }
}