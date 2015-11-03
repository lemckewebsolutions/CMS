<?php
namespace LWS\CMS\SideBar;

use LWS\CMS\Url;

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

    protected function loadNavigationItems()
    {
        $categories = [];
        $categories["Algemeen"][] = new Item("Start", Url::INDEX);

        $categories["Admin"][] = new Item("Gebruikers", Url::USERS);

        $this->categories = $categories;
    }

    /**
     * @return Item[]
     */
    public function getNavigationItems()
    {
        if (isset($this->categories) === false) {
            $this->loadNavigationItems();
        }
        return $this->categories;
    }
}