<?php

namespace LWS\CMS\User;

use LWS\CMS\User;

class LoginCommand
{
    /**
     * @var \mysqli
     */
    private $databaseConnection;

    public function __construct(\mysqli $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }

    public function execute($username, $password)
    {
        $db = $this->databaseConnection;

        $username = strtolower(mysqli_real_escape_string($db, $username));

        $query = "select
                    u.userid,
                    u.username,
                    u.email,
                    ur.userrole
                  from
                     cms_users u
                     inner join cms_userroles ur on ur.userroleid = u.userroleid
                  WHERE
                     (
                       lower(u.username) = '" . $username . "' or
                       lower(u.email) = '" . $username . "'
                     ) and
                     u.password = '" . $password . "'";

        $result = $db->query($query);

        $user = null;

        while ($row = $result->fetch_object())
        {
            $user = new User();
            $user->setUserName($row->username);
            $user->setAuthenticated(true);
        }

        return $user;
    }
}