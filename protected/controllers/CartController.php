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

    public function actionAddToCart($product_id) {

        $product = Products::model()->findByPk($product_id);

        $item = array(
            'product_id' => $product['product_id'],
            'product_name' => $product['name'],
            'product_qty' => 1,
            'product_price' => $product['price']
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

            $this->redirect('index.php?r=cart/showCart');
        }
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

}
