<?php

namespace LWS\JufThirza\Commands;

use LWS\CMS\User;
use LWS\Framework\Database\MySqlCommand;

class RetrieveUsersCommand extends MySqlCommand
{
    public function execute()
    {
        $db = $this->getDatabaseConnection();

        $query = "
            select
              u.userid,
              u.username
            from
              cms_users u
            order by
              u.username
        ";

        $result = $db->query($query);
        $users = [];

        while ($row = $result->fetch_object()) {
            $user = new User();
            $user->setUserId($row->userId);
            $user->setUserName($row->userName);

            $users[$row->userid] = $user;
        }

        return $users;
    }
}