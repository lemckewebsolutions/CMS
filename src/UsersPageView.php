<?php

namespace LWS\CMS;

/**
 * Class UsersPageView
 * @package LWS\CMS
 * @property UsersPageViewModel $viewModel
 */
class UsersPageView extends PageView
{
    public function __construct($templateFile, UsersPageViewModel $viewModel)
    {
        parent::__construct($templateFile, $viewModel);
    }

    public function parse()
    {
        $this->assignVariable("newUserModal", "");
        $this->assignVariable("users", $this->viewModel->getUsers());

        return parent::parse();
    }
}