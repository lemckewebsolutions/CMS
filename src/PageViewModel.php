<?php
namespace LWS\CMS;

class PageViewModel
{
    /**
     * @var \mysqli
     */
    private $databaseConnection;

    /**
     * @var User;
     */
    private $user;

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