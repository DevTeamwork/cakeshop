<?php

class BanksController extends Controller {

    public $layout = '//layouts/cakeshop.layout.main';

    public function actionIndex() {
        $model = Banks::model()->findAll();

        $this->render("index", array(
            'model' => $model
        ));
    }

    public function actionSave() {
        if (!empty($_POST)) {
//            print_r($_POST);                 
            if (empty($_POST['bank_id'])) {
                $model = new Banks();
            } else {
                $model = Banks::model()->findByPk($_POST['bank_id']);
            }

            $model->bank_name = $_POST['bank_name'];
            $model->branch = $_POST['branch'];
            $model->account_no = $_POST['account_no'];
            $model->account_name = $_POST['account_name'];
            $model->image = $_POST['image'];
            $result = $model->save();

            echo $result;
        }
    }

    public function actionDelete($id) {
        Banks::model()->deleteByPk($id);
        echo 1;
    }
    
    public function actionChangeProfileImage() {
//       echo $_POST['image']; 
        if (!empty($_POST)) {
            $base64img = $_POST['image'];
//       print_r($_POST);
            define('UPLOAD_DIR', 'C:\\AppServ\\www\\dreamdata\\uploads\\');
            if (!file_exists(UPLOAD_DIR)) {
                mkdir(UPLOAD_DIR);
            }
            
            $data = base64_decode(str_replace('data:image/jpeg;base64,', '', $base64img));
            $file = 'profile_'.uniqid(). '.jpeg';
            file_put_contents(UPLOAD_DIR . $file, $data);

            ini_set('memory_limit','500M');
            $img = Yii::app()->simpleImage->load(UPLOAD_DIR .$file);
            $img->resizeToWidth(150);
    //        $img->resize(180,280);
            $img->save('uploads/'.$file); 
//        print_r($file);
          echo Yii::app()->request->baseUrl . '/uploads/' . $file;
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
