<?php
namespace LWS\CMS\SideBar;

class Item
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $selected = false;

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
        return $this->selected;
    }

    /**
     * @param boolean $selected
     */
    public function setSelected($selected)
    {
        $this->selected = (bool)$selected;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}