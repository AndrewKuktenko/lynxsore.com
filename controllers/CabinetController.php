<?php

/**
 * Created by PhpStorm.
 * User: Andrew Kuktenko
 * Date: 17.07.2017
 * Time: 23:11
 */
class CabinetController
{
    public function actionIndex()
    {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        include_once ROOT.'/views/cabinet/index.php';

        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $password = $_POST['password'];

        }

        $errors = false;

        if (!User::checkNmae($name)) {
            $errors[] = 'Name less than 2';
        }


        if (!User::checkPassword($password)) {
            $errors[] = 'Wrong password';
        }


        if ($errors == false)
        {
            $result = User::edit($userId, $name,$password);
        }

        include_once ROOT.'/views/cabinet/edit.php';

        return true;
    }
}