<?php
namespace LWS\CMS\SideBar;

class ViewModel extends \LWS\Framework\ViewModel
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

    private function loadCategories()
    {
        $categories = [];
        if ($this->loggedIn === false) {
            $item = new Item("Inloggen", "/cms");
            $item->setSelected(true);

            $categories["Algemeen"] = [];
            array_push($categories["Algemeen"], $item);

            $this->categories = $categories;
        }
    }

    /**
     * @return Item[]
     */
    public function getCategories()
    {
        if ($this->categories === null) {
            $this->loadCategories();
        }
        return $this->categories;
    }
}