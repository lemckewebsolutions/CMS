<?php
namespace LWS\CMS\SideBar;

use LWS\CMS\PageView;

class View extends \LWS\Framework\View
{
    /**
     * @var ViewModel
     */
    private $viewModel;

    /**
     * @param string $templatePath
     * @param ViewModel $viewModel
     */
    public function __construct($templatePath, ViewModel $viewModel)
    {
        parent::__construct($templatePath);

        $this->viewModel = $viewModel;
    }

    public function parse()
    {
        $this->assignVariable("categories", $this->parseCategories());

        return parent::parse();
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function parseCategories()
    {
        $categories = $this->viewModel->getCategories();
        $parsedCategories = "";

        foreach ($categories as $categoryName => $items)
        {
            $parsedCategories .= $this->includeTemplate(
                PageView::getTemplateRoot() . "layout/sidebar/category.inc.tpl",
                [
                    "categoryName" => $categoryName,
                    "items" => $items
                ]
            );
        }

        return $parsedCategories;
    }
}