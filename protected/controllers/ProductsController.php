<?php

class ProductsController extends Controller
{
    public $layout = '//layouts/cakeshop.layout.main';
	public function actionIndex()
	{
            $model = Products::model()->findAll();
            
            $this->render("index", array(
                'model' => $model
            ));
	}
        
        public function actionAdd(){
            $model = Products::model()->findAll();
            $category = Category::model()->findAll();
            $this->render("add", array(
                'model' => $model,
                'category' => $category
            ));
//            print_r(CJSON::encode($category));
        }
        
        public function actionCategory(){
            $model = Category::model()->findAll();
            $this->render("category", array(
                'model' => $model
            ));
//            
//            print_r(CJSON::encode($model));
            
        }
        
        public function actionNew(){
            $model = Products::model()->findAll();
            
            $this->render("new", array(
                'model' => $model
            ));
        }
        
        public function actionBestsellers(){

            $model = Products::model()->findAll();            
            $this->render("bestsellers", array(
                'model' => $model
            ));
        }
        
        public function actionSave(){
            if (!empty($_POST)) {
//            print_r($_POST);                 
            if (empty($_POST['product_id'])) {
                $model = new Products();
            } else {
                $model = Products::model()->findByPk($_POST['product_id']);
            }
            
            $model->name = $_POST['name'];
            $model->discription = $_POST['discription'];
            $model->time = $_POST['time'];
            $model->price = $_POST['price'];
            $model->create_date = date("Y-m-d");
            $model->create_time = date("H:i:s");
            $model->user_id = $_POST['user_id'];
            $model->category_id = $_POST['category_id'];
            $model->size = $_POST['size'];
            $result = $model->save();

            echo $result;
        }
        }
        
        public function actionDelete($id) {
            Products::model()->deleteByPk($id);
            echo 1;
        }


        // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}