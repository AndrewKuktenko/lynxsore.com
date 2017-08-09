<?php

/**
 * Created by PhpStorm.
 * User: Andrew Kuktenko
 * Date: 07.08.2017
 * Time: 19:32
 */
class AdminProductController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $productList = Product::getProductsList();

        require_once ROOT.'/views/admin_product/index.php';

        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        $categoryList = Category::getCategoryListAdmin();


        if (isset($_POST['submit']))
        {

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['is_new'] = $_POST['is_new'];
            $options['description'] = $_POST['description'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;

            if (!isset($options['name']) || empty($options['name']))
            {
                $errors[] = 'Fill product name';
            }

            if ($errors == false)
            {
                $id = Product::createProduct($options);


                if ($id) {
                   // echo '<pre>'; print_r($_FILES['image']); die();
                    if (is_uploaded_file($_FILES['image']['tmp_name']))
                    {
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/images/product/{$id}.jpg");
                    }
                }

                header("Location: /admin/product");
            }

        }

        require_once ROOT.'/views/admin_product/create.php';

        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $categoryList = Category::getCategoryListAdmin();

        $product = Product::getProductById($id);

        if (isset($_POST['submit']))
        {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['is_new'] = $_POST['is_new'];
            $options['description'] = $_POST['description'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            if (Product::updateProductById($id, $options))
            {
                if (is_uploaded_file($_FILES['image']['tmp_name']))
                {
                    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/images/product/{$id}.jpg");
                }
            }

            header("Location: /admin/product");

        }


        require_once ROOT.'/views/admin_product/update.php';

        return true;
    }


    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit']))
        {
            Product::deleteProductById($id);

            header("Location: /admin/product");
        }

        require_once ROOT.'/views/admin_product/delete.php';

        return true;
    }
}