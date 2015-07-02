<?php

class ProductsController extends Controller {

    public $layout = '//layouts/cakeshop.layout.main';

    public function actionIndex() {
        $model = Products::model()->findAll();

        $this->render("index", array(
            'model' => $model
        ));
    }

    public function actionAdd() {
        $model = Products::model()->findAll();
        $category = Category::model()->findAll();
        $this->render("add", array(
            'model' => $model,
            'category' => $category
        ));
//            print_r(CJSON::encode($category));
    }

    public function actionCategory() {
        $model = Category::model()->findAll();
        $this->render("category", array(
            'model' => $model
        ));
//            
//            print_r(CJSON::encode($model));
    }

    public function actionCategorySave() {
        if (!empty($_POST)) {
//            print_r($_POST);                 
            if (empty($_POST['category_id'])) {
                $model = new Category();
            } else {
                $model = Category::model()->findByPk($_POST['category_id']);
            }

            $model->name = $_POST['name'];
            $model->photo = $_POST['photo'];
            $result = $model->save();

            echo $result;
        }
    }
    
    public function actionCategoryDelete($id) {
        Category::model()->deleteByPk($id);
        echo 1;
    }

    public function actionNew() {
        $model = Products::model()->findAll();

        $this->render("new", array(
            'model' => $model
        ));
    }

    public function actionBestsellers() {

        $model = Products::model()->findAll();
        $this->render("bestsellers", array(
            'model' => $model
        ));
    }

    public function actionSave() {
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
            $model->photo = $_POST['photo'];
            $result = $model->save();

            echo $result;
        }
    }

    public function actionDelete($id) {
        Products::model()->deleteByPk($id);
        echo 1;
    }
    
    public function actionUploadPhoto() {
//       echo $_POST['image']; 
        if (!empty($_POST)) {
            $base64img = $_POST['image'];
//       print_r($_POST);
            define('UPLOAD_DIR', 'C:\\AppServ\\www\\cakeshop\\images\\products');
            if (!file_exists(UPLOAD_DIR)) {
                mkdir(UPLOAD_DIR);
            }
            
            $data = base64_decode(str_replace('data:image/jpeg;base64,', '', $base64img));
            $file = 'product'.uniqid(). '.jpeg';
            file_put_contents(UPLOAD_DIR . $file, $data);

            ini_set('memory_limit','500M');
            $img = Yii::app()->simpleImage->load(UPLOAD_DIR .$file);
            $img->resizeToWidth(960);
    //        $img->resize(180,280);
            $img->save('images/products/'.$file); 
//        print_r($file);
          echo Yii::app()->request->baseUrl . '/images/products/' . $file;
        }
    }
    
    public function actionUploadCategoryPhoto() {
//       echo $_POST['image']; 
        if (!empty($_POST)) {
            $base64img = $_POST['image'];
//       print_r($_POST);
            define('UPLOAD_DIR', 'C:\\AppServ\\www\\cakeshop\\images\\categorys');
            if (!file_exists(UPLOAD_DIR)) {
                mkdir(UPLOAD_DIR);
            }
            
            $data = base64_decode(str_replace('data:image/jpeg;base64,', '', $base64img));
            $file = 'product'.uniqid(). '.jpeg';
            file_put_contents(UPLOAD_DIR . $file, $data);

            ini_set('memory_limit','500M');
            $img = Yii::app()->simpleImage->load(UPLOAD_DIR .$file);
            $img->resizeToWidth(960);
    //        $img->resize(180,280);
            $img->save('images/categorys/'.$file); 
//        print_r($file);
          echo Yii::app()->request->baseUrl . '/images/categorys/' . $file;
        }
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
