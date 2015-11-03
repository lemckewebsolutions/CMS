<?php

namespace LWS\CMS\User;

use LWS\CMS\User;
use LWS\Framework\Http\Context;

class LoginHandler
{
    public function handleLogin(\mysqli $databaseConnection)
    {
        if (isset($_POST["username"]) === false ||
            isset($_POST["password"]) === false) {
            return false;
        }

        $username = (string)$_POST["username"];
        $password = (string)$_POST["password"];

        $loginCommand = new LoginCommand($databaseConnection);
        $user = $loginCommand->execute($username, $this->saltPassword($password));

        if ($user instanceof User) {
            $_SESSION["user"] = $user;
            return true;
        }

        return false;
    }

    public function saltPassword($password)
    {
        return md5($this->getSalt() . md5($password));
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