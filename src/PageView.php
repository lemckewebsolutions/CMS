<?php
namespace LWS\CMS;

use LWS\Framework\Context;
use LWS\Framework\View;

class PageView extends View
{
    /**
     * @var ViewModel;
     */
    private $viewModel;

    public function __construct($templateFile, ViewModel $viewModel)
    {
        parent::__construct($templateFile);

        $this->viewModel = $viewModel;
    }

    public function parse()
    {
        $this->assignVariable("footer", $this->parseFooter());
        $this->assignVariable("head", $this->parseHead());

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
                "cssLocation" => $this->getCssLocation(),
                "header" => $this->includeTemplate(
                    static::getTemplateRoot() . "layout/header.inc.tpl",
                    [
                        "loggedIn" => ($this->viewModel->getUser() !== null),
                        "userName" => $userName
                    ]
                ),
                "websiteName" => $this->getWebsiteName()
            ]
        );
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