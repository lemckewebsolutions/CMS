<?php

namespace LWS\CMS;

use LWS\CMS\Commands\RetrieveUsersCommand;

class UsersPageViewModel extends PageViewModel
{
    public function getUsers()
    {
        if ($this->users === null) {
            $retrieveUsersCommand = new RetrieveUsersCommand(
                $this->getDatabaseConnection()
            );

            $this->users = $retrieveUsersCommand->execute();
        }

        return $this->users;
    }
}