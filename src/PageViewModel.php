<?php
namespace LWS\CMS;

use LWS\Framework\Http\Context;
use LWS\Framework\ViewModel;

class PageViewModel extends ViewModel
{
    public function __construct(\mysqli $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }

    /**
     * @return \mysqli
     */
    public function getDatabaseConnection()
    {
        return $this->databaseConnection;
    }

    /**
     * @return \LWS\Framework\Notifications\Container
     */
    public function getNotifications()
    {
        return Context::getNotifications();
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }
}