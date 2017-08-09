<?php

/**
 * Created by PhpStorm.
 * User: Andrew Kuktenko
 * Date: 08.08.2017
 * Time: 23:02
 */
class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {

        self::checkAdmin();

        $categoryList = Category::getCategoryListAdmin();

        require_once ROOT.'/views/admin_category/index.php';
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        if (isset($_POST['submit']))
        {

            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];


            $errors = false;

            if (!isset($options['name']) || empty($options['name']))
            {
                $errors[] = 'Fill category name';
            }

            if (!isset($options['sort_order']) || empty($options['sort_order']))
            {
                $errors[] = 'Fill category sort order';
            }

            if ($errors == false)
            {
                Category::createCategory($options);

                header("Location: /admin/category");
            }

        }

        require_once ROOT.'/views/admin_category/create.php';

        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit']))
        {
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            Category::updateCategoryById($id, $options);


            header("Location: /admin/category");
        }

        require_once ROOT.'/views/admin_category/update.php';

        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit']))
        {
            Category::deleteCategoryById($id);

            header("Location: /admin/category");
        }

        require_once ROOT.'/views/admin_category/delete.php';

        return true;
    }
}