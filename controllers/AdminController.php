<?php

/**
 * Created by PhpStorm.
 * User: Andrew Kuktenko
 * Date: 07.08.2017
 * Time: 19:04
 */
class AdminController extends AdminBase
{
    public function actionIndex()
    {

        self::checkAdmin();

        require_once ROOT.'/views/admin/index.php';
        return true;
    }
}