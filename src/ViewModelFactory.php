<?php

namespace LWS\CMS;

use LWS\CMS\SideBar\ViewModel;

abstract class ViewModelFactory
{
    const PAGE_VIEW_MODEL = "pageViewModel";
    const SIDE_BAR_VIEW_MODEL = "sideBarMViewModel";

    /**
     * @var \mysqli
     */
    private $databaseConnection;

    public function __construct(\mysqli $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }

    /**
     * @param $name
     * @return \LWS\Framework\ViewModel
     */
    public function createViewModel($name)
    {
        switch ($name) {
            case static::PAGE_VIEW_MODEL:
                return $this->createPageViewModel();
            case static::SIDE_BAR_VIEW_MODEL:
                return $this->createSideBarViewModel();
            default:
                return null;
        }
    }

    protected function createPageViewModel()
    {
        return new PageViewModel($this->databaseConnection);
    }

    /**
     * @return ViewModel
     */
    protected abstract function createSideBarViewModel();
}