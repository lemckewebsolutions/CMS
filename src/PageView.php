<?php
namespace LWS\CMS;

use LWS\CMS\SideBar\ViewModel;
use LWS\Framework\Http\Context;
use LWS\Framework\View;

class PageView extends View
{
    private $cssFiles = [];

    public function __construct($templateFile, PageViewModel $viewModel, $parseSideBar = true)
    {
        parent::__construct($templateFile);

        $this->viewModel = $viewModel;
        $this->parseSideBar = (bool)$parseSideBar;
    }

    public function parse()
    {
        $this->assignVariable("websiteName", $this->getWebsiteName());
        $this->assignVariable("footer", $this->parseFooter());
        $this->assignVariable("head", $this->parseHead());
        $this->assignVariable("notifications", $this->parseNotifications());

        if ($this->parseSideBar === true) {
            $this->assignVariable("sideBar", $this->parseSideBar());
        }

        return parent::parse();
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function parseFooter()
    {
        return $this->includeTemplate(static::getTemplateRoot() . "layout/footer.inc.tpl");
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function parseHead()
    {
        $userName = "";
        if ($this->viewModel->getUser() !== null) {
            $userName = $this->viewModel->getUser()->getUserName();
        }

        return $this->includeTemplate(
            static::getTemplateRoot() . "layout/head.inc.tpl",
            [
                "cssFiles" => $this->cssFiles,
                "cssLocation" => $this->getCssLocation(),
                "header" => $this->includeTemplate(
                    static::getTemplateRoot() . "layout/header.inc.tpl",
                    [
                        "loggedIn" => ($this->viewModel->getUser() !== null),
                        "logOutUrl" => Url::LOG_OUT,
                        "userName" => $userName
                    ]
                )
            ]
        );
    }

    /**
     * @return string
     */
    private function parseNotifications()
    {
        $notifications = "";

        while ($notification = array_shift($this->viewModel->getNotifications()))
        {
            $notifications .= $this->includeTemplate(
                static::getTemplateRoot() . "layout/notification.inc.tpl",
                [
                    "message" => $notification->getMessage(),
                    "level" => $notification->getLevel()
                ]
            );
        }

        return $notifications;
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function parseSideBar()
    {
        if (isset($this->sidebarViewModel) === false ||
            ($this->sidebarViewModel instanceof ViewModel) === false)
        {
            throw new \Exception("side bar view model not set correctly");
        }

        $view = new SideBar\View(
            static::getTemplateRoot() . "layout/sidebar/sidebar.inc.tpl",
           $this->sidebarViewModel
        );

        return $view->parse();
    }

    public function addCssFile($filePath)
    {
        if (in_array($filePath, $this->cssFiles) === false) {
            $this->cssFiles[] = $filePath;
        }
    }

    private function getCssLocation()
    {
        $configuration = Context::getConfiguration();

        return $configuration["CMS"]["CssLocation"];
    }

    public static function getTemplateRoot()
    {
        $configuration = Context::getConfiguration();

        return $configuration["CMS"]["TemplateRoot"];
    }

    private function getWebsiteName()
    {
        $configuration = Context::getConfiguration();

        return $configuration["CMS"]["WebsiteName"];
    }
}