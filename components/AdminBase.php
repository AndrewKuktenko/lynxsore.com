<?php

/**
 * Created by PhpStorm.
 * User: Andrew Kuktenko
 * Date: 07.08.2017
 * Time: 19:18
 */
abstract class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user['role'] == 'admin')
        {
            return true;
        }

        die("Access denied");
    }

}