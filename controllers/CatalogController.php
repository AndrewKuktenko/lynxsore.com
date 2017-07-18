<?php

//include_once ROOT.'/models/Category.php';
//include_once ROOT.'/models/Product.php';
//include_once ROOT.'/components/Pagination.php';

class CatalogController
{
    public function actionIndex($page = 1)
    {

        $categories = array();
        $categories = Category::getCategoryList();

        $limit = 4;

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts($page, $limit);

        $total = Product::getTotalProducts();

        $pagination = new Pagination($total, $page,  $limit, 'page-');

        require_once(ROOT.'/views/catalog/index.php');

        return true;
    }

    public function actionCategory($category, $page = 1)
    {

        $categories = array();
        $categories = Category::getCategoryList();

        $limit = 3;

        $catalogProducts = array();
        $catalogProducts = Product::getProductListByCategory($category, $page, $limit);

        $total = Product::getTotalProductsInCategory($category);

        $pagination = new Pagination($total, $page,  $limit, 'page-');

        require_once(ROOT.'/views/catalog/category.php');

        return true;
    }
}