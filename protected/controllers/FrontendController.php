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
            $query = 'SELECT *
                FROM users 
                WHERE email =  "' . $_POST['email'] . '"
                AND password =  "' . $_POST['password'] . '"';
            $user = Yii::app()->db->createCommand($query)->queryRow();
            
            var_dump($user);
            if ($user) {
                Yii::app()->session["user_id"] = $user["user_id"]; 
                Yii::app()->session["username"] = $user["username"];
                Yii::app()->session["role"] = $user["rote"];
            } else {
                Yii::app()->session['error_login'] = 'Y';
            }
//            if($_POST['email'] == "admin"){
//                $result = "admin";
//            }else{             
//                $result = "user";
//            }
            //echo CJSON::encode($user);
            //echo Yii::app()->session["user_id"];
        }
        //var_dump($_POST)
        //;
        
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
            //echo "save user";
            //var_dump($user->getErrors());
            //var_dump($user);
        }
        
        $this->redirect('index.php?r=frontend');
    }
    
    public function actionLogout() {
        Yii::app()->session["user_id"] = null; 
        Yii::app()->session["username"] = null;
        Yii::app()->session["role"] = null;
        
        $this->redirect('index.php?r=frontend');
    }
    
}
