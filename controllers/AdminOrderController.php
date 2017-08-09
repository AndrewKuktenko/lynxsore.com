<?php

/**
 * Created by PhpStorm.
 * User: Andrew Kuktenko
 * Date: 09.08.2017
 * Time: 20:28
 */
class AdminOrderController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $ordersList = Order::getOrdersList();

        include_once ROOT.'/views/admin_order/index.php';

        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        $id = intval($id);

        if (isset($_POST['submit']))
        {
            Order::deleteOrderById($id);

            header("Location: admin/order");
        }

        include_once ROOT.'/views/admin_order/delete.php';

        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $order = Order::getOrderById($id);

        if (isset($_POST['submit']))
        {
            $errors = false;

            $order['user_name'] = $_POST['userName'];
            $order['user_phone'] = $_POST['userPhone'];
            $order['user_comment'] = $_POST['userComment'];
            $order['date'] = $_POST['date'];
            $order['status'] = $_POST['status'];

            if (!isset($order['user_name']) || empty($order['user_name']))
            {
                $errors[] = 'Fill the name';
            }

            if ($errors == false)
            {
                Order::updateOrder($order,$id);

                header('Location: admin/order');
            }
        }

        include_once ROOT.'/views/admin_order/update.php';

        return true;
    }

    public function actionView($id)
    {
        self::checkAdmin();

        $order = Order::getOrderById($id);

        $productsQuantity = json_decode($order['products'],true);

        $productsIds = array_keys($productsQuantity);

        $products = Product::getProductsByIdsAdmin($productsIds);

        require_once ROOT.'/views/admin_order/view.php';

        return true;
    }
}