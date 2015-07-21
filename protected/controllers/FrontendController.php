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
}
