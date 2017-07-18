<?php
//include_once ROOT.'/models/Category.php';
//include_once ROOT.'/models/Product.php';

class ProductController
{
    public function actionView($productId)
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $product = Product::getProductById($productId);

        include_once(ROOT.'/views/view/view.php');

        return true;
    }
}