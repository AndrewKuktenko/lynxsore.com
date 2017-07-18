<?php

/**
 * Created by PhpStorm.
 * User: Andrew Kuktenko
 * Date: 13.07.2017
 * Time: 18:07
 */
class UserController
{
    public function actionRegister()
    {

        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

        }

        $errors = false;

        if (!User::checkNmae($name)) {
            $errors[] = 'Name less than 2';
        }

        if (!User::checkEmail($email)) {
            $errors[] = 'Wrong email';
        }

        if (!User::checkPassword($password)) {
            $errors[] = 'Wrong password';
        }

        if (User::checkEmailExists($email))
        {
            $errors[] = 'Email exist';
        }

        if ($errors == false)
        {
            $result = User::register($name,$email,$password);
        }

        include_once ROOT.'/views/user/register.php';

        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Wrong email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Wrong password';
            }

            $userId = User::checkUserData($email,$password);

            if ($userId == false) {
                $errors[] = 'Такого пользователя нет';
            } else {
                User::auth($userId);

                header("Location: /cabinet/");
            }

        }

        include_once ROOT.'/views/user/login.php';

        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header("Location: /");
    }
}