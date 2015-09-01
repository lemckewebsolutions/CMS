<?php
namespace LWS\CMS\SideBar;

class ViewModel
{
    private $categories;

    /**
     * @var bool
     */
    private $loggedIn = false;

    /**
     * @var \mysqli
     */
    private $databaseConnection;

    /**
     * @param \mysqli $databaseConnection
     * @param bool $loggedIn
     */
    public function __construct(\mysqli $databaseConnection, $loggedIn)
    {
        $this->databaseConnection = $databaseConnection;
        $this->loggedIn = (bool)$loggedIn;
    }

    private function loadCategories()
    {
        $categories = [];
        if ($this->loggedIn === false) {
            $item = new Item("Inloggen", "/cms");
            $item->setSelected(true);

            array_push($categories["Algemeen"], $item);

            return $categories;
        }

        return [];
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        if ($this->categories === null) {
            $this->loadCategories();
        }
        return $this->categories;
    }
}