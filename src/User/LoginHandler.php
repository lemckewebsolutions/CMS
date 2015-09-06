<?php

namespace LWS\CMS\User;

use LWS\CMS\User;
use LWS\Framework\Http\Context;

class LoginHandler
{
    /**
     * @var \mysqli
     */
    private $databaseConnection;

    public function __construct(\mysqli $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }

    public function handleLogin()
    {
        if (isset($_POST["username"]) === false ||
            isset($_POST["password"]) === false) {
            return false;
        }

        $username = (string)$_POST["username"];
        $password = (string)$_POST["password"];

        $loginCommand = new LoginCommand($this->databaseConnection);
        $user = $loginCommand->execute($username, $password, $this->getSalt());

        if ($user instanceof User) {
            $_SESSION["user"] = $user;
            return true;
        }

        return false;
    }

    private function getSalt()
    {
        $config = Context::getConfiguration();

        if (isset($config["CMS"]["Salt"]) === true)
        {
            return $config["CMS"]["Salt"];
        }

        return "";
    }
}