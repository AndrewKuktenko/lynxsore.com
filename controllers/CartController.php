<?php

/**
 * Created by PhpStorm.
 * User: Andrew Kuktenko
 * Date: 18.07.2017
 * Time: 14:26
 */
class CartController
{
    public function actionAdd($id)
    {

        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];

        header("Location: $referrer");

        return true;
    }

    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);

        return true;
    }

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        $productsInCart = Cart::getProducts();


        if ($productsInCart) {
            $prductsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($prductsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once ROOT.'/views/cart/index.php';

        return true;

    }

    public function actionCheckout()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $result = false;



        if (isset($_POST['submit']))
        {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $errors = false;

            if (!User::checkNmae($userName)) {
                $errors[] = 'Wrong name!';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Wrong phone!';
            }

            if ($errors == false) {
                $productsInCart = Cart::getProducts();

                if (!User::isGuest()) {
                    $userId = 0;

                } else {
                    $userId = User::checkLogged();
                }
                //Save order to DB

                $result = Order::save($userName,$userPhone,$userComment,$userId,$productsInCart);

                if ($result) {
                    $adminEmail = 'postal.dias@gmail.com';
                    $message = 'http://lynxstore.com/admin/orders';
                    $subject = 'New Order';
                    mail($adminEmail, $subject, $message);

                    Cart::clear();
                }

            } else {
                $productsInCart = Cart::getProducts();

                $productsIds = array_keys($productsInCart);
//                echo print_r($productsIds);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }


        } else {
            $productsInCart = Cart::getProducts();

            if ($productsInCart == false) {
                header("Location: /");
            } else {
                $productsIds = array_keys($productsInCart);
                //echo print_r($productsIds);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;

                if (!User::isGuest()) {

                } else {
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);

                    $userName = $user['name'];

                }
            }
        }

        require_once ROOT.'/views/cart/checkout.php';

        return true;
    }

    public function actionDelete($productId)
    {

        Cart::deleteProduct($productId);


        header('Location: /cart/');

        return true;
    }

    public function actionLess($productId)
    {
        Cart::less($productId);


        header('Location: /cart/');

        return true;
    }

}