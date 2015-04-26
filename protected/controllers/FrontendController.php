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
}
