<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CartController
 *
 * @author mpsoft
 */
class CartController extends Controller {

    public $layout = '//layouts/frontend.layout.main';
    
    public function actionAddToCart($product_id, $greeting, $send_date, $topping_id) {

        $product = Products::model()->findByPk($product_id);
        
        $item = array(
            'product_id' => $product['product_id'],
            'product_name' => $product['name'],
            'product_qty' => 1,
            'product_price' => $product['price'],
            'greeting_text' => $greeting,
            'send_date' => $send_date,
            'topping_id' => $topping_id
        );

        $session['my_cart'] = array();
        if (!isset(Yii::app()->session['my_cart'])) {
            Yii::app()->session['my_cart'] = array();
            $session = Yii::app()->session['my_cart'];
            $session[] = $item;
            Yii::app()->session['my_cart'] = $session;
        } else {
            $session = Yii::app()->session['my_cart'];

            $is_duplicate = false;
            for ($i = 0; $i < count($session); $i++) {
                if ($session[$i]['product_id'] == $product_id) {
                    $session[$i]['product_qty'] += 1;
                    $is_duplicate = true;
                    break;
                }
            }

            if ($is_duplicate == false) {
                $session[] = $item;
            }
            Yii::app()->session['my_cart'] = $session;
        }
        $this->redirect('index.php?r=cart/showCart');
    }
    
    public function actionShowCart() {
        $this->render('add_to_cart');
    }
    
    public function actionDeleteCart($product_id) {
        $my_cart = Yii::app()->session['my_cart'];
        
        for ($i = 0; $i < count($my_cart); $i++) {
            if ($my_cart[$i]['product_id'] == $product_id) {
                $my_cart[$i] = null;
                break;
            }
        }
        $temp_cart = array();
        for ($j = 0; $j < count($my_cart); $j++) {
            if ($my_cart[$j] == null) {
                continue;
            } else {
                $temp_cart[] = $my_cart[$j];
            }
        }
        
        Yii::app()->session['my_cart'] = $temp_cart;
        $this->redirect('index.php?r=cart/showCart');
    }
    
    public function actionCalculateItem() {
        $qty = $_POST['qty'];
        $my_cart = Yii::app()->session['my_cart'];
        
        for ($i = 0; $i < count($my_cart); $i++) {
            $my_cart[$i]['product_qty'] = $qty[$i];  
        }
        Yii::app()->session['my_cart'] = $my_cart;
        $this->redirect('index.php?r=cart/showCart');
    }
    
    public function actionShowOrderCart() {
        $user_id = Yii::app()->session["user_id"];
        $customer = Users::model()->findByPk($user_id);
        $this->render('show_order_cart', array('customer' => $customer));
    }
    
    public function actionSaveOrder() {
        if (!empty($_POST)) {
            $customer_id = $_POST['customer_id'];
            $my_cart = Yii::app()->session['my_cart'];
            
            $order = new Order();
            $order->customer_id = $customer_id;
            $order->order_status = 0;
            $day = strtotime("+7 day");
            $order->limit_date = date('Y-m-d', $day);
            
            if ($order->save()) {
                for ($i = 0; $i < count($my_cart); $i++) {
                    $order_detail = new OrderDetail();
                    $order_detail->order_id = $order->order_id;
                    $order_detail->product_id = $my_cart[$i]['product_id'];
                    $order_detail->order_qty = $my_cart[$i]['product_qty'];
                    $order_detail->product_price = $my_cart[$i]['product_price'];
                    $order_detail->greeting_text = $my_cart[$i]['greeting_text'];
                    $order_detail->send_date = $my_cart[$i]['send_date'];
                    $order_detail->save();
                    
                    // insert topping
                    $topping_id_arr = explode(",", $my_cart[$i]['topping_id']);
                    $topping_temp = array();
                    foreach ($topping_id_arr as $topping_id) {
                        if (!in_array($topping_id, $topping_temp)) {
                            $topping_temp[] = $topping_id;
                        }
                    }
                    
                    foreach ($topping_temp as $temp) {
                        $orderTopping = new OrderTopping();
                        $orderTopping->order_detail_id = $order_detail->order_detail_id;
                        $orderTopping->product_id = $my_cart[$i]['product_id'];
                        $orderTopping->topping_id = $temp;
                        $orderTopping->save();
                    }
                }
                Yii::app()->session['my_cart'] = null;
                $this->actionRenderResultPage();
            } else {
                print_r($order->getErrors());
            } 
        } else {
            echo "not post";
        }   
    }
    
    public function actionRenderResultPage() {
        $this->render('save_order_result');
    }
}
