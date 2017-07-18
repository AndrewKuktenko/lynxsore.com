<?php

//include_once ROOT.'/models/Category.php';
//include_once ROOT.'/models/Product.php';

class SiteController
{
    public function actionIndex($page = 1)
    {

        $categories = array();
        $categories = Category::getCategoryList();

        $latestProducts = array();

        $limit = 3;

        $latestProducts = Product::getLatestProducts($page, $limit);


        $total = Product::getTotalProducts();
        $pagination = new Pagination($total,$page, $limit, 'page-');

        require_once(ROOT.'/views/site/index.php');

        return true;
    }

    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit']))
        {
            $userEmail = $_POST['userEmail'];
//            echo $userEmail;
            $userText = $_POST['userText'];

//            echo $userEmail;
//
//            echo print_r($userText);

            $errors = false;



            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Wrong email';
            }


            if ($errors == false)
            {
//                $adminEmail = 'postal.dias@gmail.com';
//                $message = "Text: {$userText}. From: {$userEmail}";
//                echo print_r($userText);
//                echo print_r($userEmail);
//                $subject = "Subject";
//                $result = mail($adminEmail, $subject, $message);
//                $result = true;

            }
        }

        require_once ROOT.'/views/contacts/contact.php';

        return true;

    }
}