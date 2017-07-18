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
}