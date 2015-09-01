<?php
namespace LWS\CMS\SideBar;

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
        $this->assignVariable("categories", $this->viewModel->getCategories());

        return parent::parse();
    }
}