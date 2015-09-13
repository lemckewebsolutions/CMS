<?php
namespace LWS\CMS\SideBar;

class Item
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    public function __construct($name, $url)
    {
        $this->name = (string)$name;
        $this->url = (string)$url;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return boolean
     */
    public function isSelected()
    {
        return (rtrim(strtok($_SERVER["REQUEST_URI"],'?'), "/") === $this->getUrl());
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}