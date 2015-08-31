<?php
namespace LWS\CMS;

class ViewModel
{
    /**
     * @var User;
     */
    private $user;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }
}