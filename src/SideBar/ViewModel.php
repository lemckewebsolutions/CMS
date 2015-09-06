<?php
namespace LWS\CMS\SideBar;

abstract class ViewModel extends \LWS\Framework\ViewModel
{
    /**
     * @param \mysqli $databaseConnection
     * @param bool $loggedIn
     */
    public function __construct(\mysqli $databaseConnection, $loggedIn)
    {
        $this->databaseConnection = $databaseConnection;
        $this->loggedIn = (bool)$loggedIn;
    }

    protected abstract function loadCategories();

    /**
     * @return Item[]
     */
    public function getCategories()
    {
        if (isset($this->categories) === false) {
            $this->loadCategories();
        }
        return $this->categories;
    }
}