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
        $this->render('index');
    }
    
    public function actionProducts() {
        $products = Products::model()->findAll();
        //print_r($products);
        $this->render('products', array('products' => $products));
    }
    
    public function actionCustomizeCake($product_id) {
        $product = Products::model()->findByPk($product_id);
        $this->render('customize_cake', array('product' => $product));
    }
    
    public function actionLogin(){
        $this->render('login');
    }
    
    public function actionCheckLogin(){
        if (!empty($_POST)) {
//            print_r($_POST);                 
//            if (empty($_POST['email'])) {
//                $model = new Category();
//            } else {
//                $model = Category::model()->findByPk($_POST['category_id']);
//            }

//            $model->name = $_POST['name'];
//            $result = $model->save();
                        $query = 'SELECT u. *
                    FROM  `users` u
                    WHERE u.username =  "' . $_POST['email'] . '"
                    AND u.password =  "' . $_POST['password'] . '"';
//            print_r($query);
             //md5($password)
            $user = Yii::app()->db->createCommand($query)->queryRow();
            
            Yii::app()->session["user_id"] = $user["user_id"]; 
            Yii::app()->session["username"] = $user["username"];
            Yii::app()->session["role"] = $user["role"];
//            if($_POST['email'] == "admin"){
//                $result = "admin";
//            }else{             
//                $result = "user";
//            }
            echo CJSON::encode($user);
//            echo Yii::app()->session["user_id"];
        }
    }
    
    public function actionRegister(){
        $this->render('register');
    }
    
}
