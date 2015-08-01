<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrontendController
 *
 * @author mpsoft
 */
class FrontendController extends Controller {
    //put your code here
    public $layout = '//layouts/frontend.layout.main';
    
    public function actionIndex() {
        $products = Products::model()->findAll(array('limit' => '3'));
        $this->render('index', array('products' => $products));
    }
    
    public function actionProducts() {
        $products = Products::model()->findAll();
        //print_r($products);
        $this->render('products', array('products' => $products));
    }
    
    public function actionCustomizeCake($product_id) {
        $product = Products::model()->findByPk($product_id);
        //$toppings = Toppings::model()->findByAttributes(array('product_id' => $product_id));
        $topping_sql = "SELECT * FROM toppings WHERE product_id = '" . $product_id . "'";
        $toppings = Yii::app()->db->createCommand($topping_sql)->queryAll();
        
        $this->render('customize_cake', array(
            'product' => $product, 
            'toppings' => $toppings
        ));
    }
    
    public function actionLogin(){
        $this->render('login');
    }
    
    public function actionCheckLogin(){
        if (!empty($_POST)) {
            $query = 'SELECT *
                FROM users 
                WHERE email =  "' . $_POST['email'] . '"
                AND password =  "' . $_POST['password'] . '"';
            $user = Yii::app()->db->createCommand($query)->queryRow();
            
           // var_dump($user);
            if ($user) {
                Yii::app()->session["user_id"] = $user["user_id"]; 
                Yii::app()->session["username"] = $user["username"];
                Yii::app()->session["role"] = $user["rote"];
                if($user["rote"] == "admin"){
                    $this->redirect('index.php?r=site');
                }else{
                    $this->redirect('index.php?r=frontend');
                }
            } else {
                Yii::app()->session['error_login'] = 'Y';
            }
        }
        
        $this->redirect('index.php?r=frontend');
    }
    
    public function actionRegister(){
        $this->render('register');
    }
    
    public function actionSaveRegister() {
        if (!empty($_POST)) {
            $user = new Users();
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];
            $user->email = $_POST['email'];
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->rote = 'cust';
            $user->active = 'y';
            $user->save();
        }
        $this->redirect('index.php?r=frontend');
    }
    
    public function actionLogout() {
        Yii::app()->session["user_id"] = null; 
        Yii::app()->session["username"] = null;
        Yii::app()->session["role"] = null;
        
        $this->redirect('index.php?r=frontend');
    }
    
    public function actionSelectSendDate($product_id) {
        $product = Products::model()->findByPk($product_id);
        $this->render('select_send_date', array('product' => $product));
    }
    
    public function actionShowOrderPayment() {
        
        $user_id = Yii::app()->session["user_id"];
        $orders = "";
        $message = "";
        if (!empty($user_id)) {
            $order_query = "SELECT *, ("
                    . "SELECT SUM(product_price * order_qty) FROM order_detail "
                    . "WHERE order_id = ord.order_id GROUP BY order_id "
                    . ") AS price  FROM cakeshop_db.order AS ord "
                    . "LEFT JOIN users AS u ON ord.customer_id = u.user_id "
                    . "WHERE ord.order_status IN(0, 1) "
                    . "AND ord.customer_id = $user_id";
            $orders = Yii::app()->db->createCommand($order_query)->queryAll();
        } else {
            $message = 'กรุณาเข้าสู่ระบบก่อนแจ้งชำระเงิน';
        }
        $this->render('order_payment', array(
            'orders' => $orders,
            'message' =>  $message,
        ));
    }
    
    public function actionPaymentForm($order_id) {
        $user = Users::model()->findByPk(Yii::app()->session["user_id"]);
        $order = Order::model()->findByPk($order_id);
        $banks = Banks::model()->findAll();
        
        $this->render('payment_form', array(
            'user' => $user,
            'order' => $order,
            'banks' => $banks
        ));
    }
    
    public function actionSavePayment() {
        $destination =  $_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/images/slips/';

        if (!empty($_FILES['slip_image']['name'])) {
            //var_dump($_FILES);
            $file = $_FILES['slip_image']['name'];
            $file_arr = explode(".", $file);
            $filename = 'slip'.uniqid(). '.' . $file_arr[1] ;
            move_uploaded_file($_FILES['slip_image']['tmp_name'], $destination . $filename);
            //copy($_FILES['slip_image']['tmp_name'], $destination . $filename);
        }
        
        if (!empty($_POST)) {
            $payment = new PaymentsComfirm();
            $payment->bank_id = $_POST['bank_id'];
            $payment->bill_id = $_POST['order_id'];
            $payment->user_id = Yii::app()->session["user_id"];
            $payment->price = $_POST['pay_price'];
            $payment->pay_date = $_POST['pay_date'];
            $payment->pay_time = $_POST['pay_time'];
            $payment->comment = $_POST['comment'];
            $payment->slip_imag = $destination . $filename;
            $payment->bank_branch = $_POST['bank_branch'];
            $payment->create_date = date('Y-m-d');
            $payment->create_time = date('H:i', time());
            $payment->save();
            
            $order = Order::model()->findByPk($_POST['order_id']);
            $order->order_status = 2;
            $order->save();
            Yii::app()->user->setFlash('success', 'บันทึกข้อมูลการชำระเงินเรียบร้อยแล้ว');
        }
       
        $this->redirect('index.php?r=frontend/showOrderPayment');
    }
}
