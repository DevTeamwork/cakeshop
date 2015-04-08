<?php

class WebsitesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
//    public function filters() {
//        return array(
//            'accessControl', // perform access control for CRUD operations
//            'postOnly + delete', // we only allow deletion via POST request
//        );
//    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
//    public function accessRules() {
//        return array(
//            array('allow', // allow all users to perform 'index' and 'view' actions
//                'actions' => array('index', 'view'),
//                'users' => array('*'),
//            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('create', 'update'),
//                'users' => array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin', 'delete'),
//                'users' => array('admin'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
//            ),
//        );
//    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {

        if (Yii::app()->session['username'] != null && Yii::app()->session['username'] != null) {
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
        } else {
            $this->render('site', array(
                'model' => $this->loadModel($id),
            ));
        }

//           $this->render("site");
//        $this->render('view', array(
//            'model' => $this->loadModel($id),
//        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
//         Yii::app()->session['username_admin'] = $users['username'];
//                    Yii::app()->session['password_admin'] = $users['password'];
//                    yii::app()->session['userid'] = $users['userid'];
        if (Yii::app()->session['userid'] != null) {
            $this->render('create', array(
                'userid' => yii::app()->session['userid'],
                'username' => Yii::app()->session['username']
            ));
        } else {
            $this->render('login');
        }

//        $this->render('create');
    }
    
    public function actionEdit($id){
        if (Yii::app()->session['userid'] != null) {
            
            $model = $this->loadModel($id);
            $this->render('edit', array(
                'model' => $model,));
            
        } else {
//            $this->render('login');
            
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
//        echo CJSON::encode($model);
        
        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionSave() {

        if (!empty($_POST)) {

            $website_id = $_POST['website_id'];

            if (empty($website_id)) {
                $website = new Websites();
            } else {
                $website = Websites::model()->findByPk($website_id);
            }
            $website->name = $_POST['name'];
            $website->userid = $_POST['userid'];
            $website->logo = $_POST["logo"];
            $website->banner = $_POST["banner"];
            $website->sel_mainpage = $_POST['sel_mainpage'];
            $website->sel_profile = $_POST['sel_profile'];
            $website->sel_editprofile = $_POST['sel_editprofile'];
            $website->sel_listuser = $_POST['sel_listuser'];
            $website->sel_portfolio = $_POST['sel_portfolio'];
            $website->sel_album = $_POST['sel_album'];
            $website->sel_published = $_POST['sel_published'];
            $website->sel_contact = $_POST['sel_contact'];
            $result = $website->save();

            echo $result;
        } else {
            echo 'fail';
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (!empty($id)) {
            echo Websites::model()->deleteByPk($id);
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        if (yii::app()->session['userid'] != null) {            
//            $this->render('index', array(
//                'username' => Yii::app()->session['username'],
//                'userid' =>Yii::app()->session['userid']
//            ));
            $this->actionCreate();
        } else {
            $this->render('info');
        }
        
    }
    public function actionAuthentication() {
        $this->render('login');
    }
    
    public function actionALL() {
        if (yii::app()->session['userid'] != null) {
            $webSites = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('Websites')
                    ->where('userid=:userid', array(':userid' => Yii::app()->session['userid']))
                    ->queryAll();
            
            $this->render('websites', array(
                'webSites' => $webSites,
                'username' => Yii::app()->session['username'],
                'userid' =>Yii::app()->session['userid']
            ));
        } else {
            $this->render('login');
        }
    }
    
    public function actionMainPageLayout(){
        $this->renderPartial('mainpages');
    }
    
    public function actionUsersListLayout($id){
        $model = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('accounts')
                    ->where('website_id=:website_id', array(':website_id' => $id))
                    ->queryAll();
        
        $this->renderPartial('usersPages', array(
                'model' => $model,
            ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Websites('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Websites']))
            $model->attributes = $_GET['Websites'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionManage($id) {
        if (!empty($id)) {
//            $model = WebSites::model()->findByPk($id);
//            $name = $model->name;
//            echo $model->name;
            //
            $this->render('manage', array(
                'model' => $this->loadModel($id),
            ));
        } else {
            echo'error';
        }
    }

    function saveImage($base64img) {

        return $file;
    }
    
    public function actionUniqueEmail(){       
        $email = $_GET['rg_email'];
        if(!empty($email)){
            $users = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('users')
                    ->where('email=:email', array(':email' => $email))
                    ->queryAll();

            if ($users == null) {
                echo 'true';
            } else {
                echo 'false'; 
            }            
        }      
    }

    public function actionRegister(){
      if(!empty($_POST)){
         // print($_POST);
            $user = new Users();
            $user->username= $_POST['rg_username'];
            $user->email = $_POST['rg_email'];
            $user->password = md5($_POST['rg_password']);
//            echo CJSON::encode($user);
            $result = $user->save();
            echo $result;
      }
    }
    public function actionLogin() {
//        print_r($_POST);
        if (!empty($_POST)) {
            $users = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('users')
                    ->where('username=:username', array(':username' => $_POST["ln_username"]))
                    ->andWhere('password=:password', array(':password' => md5($_POST["ln_password"])))
                    ->queryRow();

//            echo CJSON::encode($users);
            if ($users != null) {
                Yii::app()->session;
                Yii::app()->session['username'] = $users['username'];
                Yii::app()->session['password'] = $users['password'];
                yii::app()->session['userid'] = $users['userid'];
                Yii::app()->session['users'] = $users;  
                echo 'y';
                
            } else {
                echo 'n';
            }
        }
    }
    
    public function actionInfo() {
        $this->render('info');
    }

    public function actionLogout() {
        Yii::app()->session->clear();
        $this->render('login');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Websites the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Websites::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionUpload() {
        $this->render('upload');
    }
    public function actionSaveBanner(){
//       echo $_POST['image']; 
        
       $site_id = $_POST['website_id'];
       define('UPLOAD_DIR_Website', 'C:\\AppServ\\www\\dreamdata\\uploads\\'.$site_id.'\\');
       if(!file_exists (UPLOAD_DIR_Website)){
            mkdir(UPLOAD_DIR_Website);
       }
       define('UPLOAD_DIR', 'C:\\AppServ\\www\\dreamdata\\uploads\\'.$site_id.'\\banner\\');
       $base64img = $_POST['image'];
//        echo $img;
       if(!file_exists (UPLOAD_DIR)){
            mkdir(UPLOAD_DIR);
       }
       
	$base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
        $data = base64_decode($base64img);
        $file = uniqid(). 'Banner.jpg';
        file_put_contents(UPLOAD_DIR .$file, $data);
        //resize to 1920px

//        $file_resize= 'http://localhost:81/'.Yii::app()->request->baseUrl.'/uploads/'.$site_id.'/banner/'.$file;
        ini_set('memory_limit','500M');
        $img = Yii::app()->simpleImage->load(UPLOAD_DIR .$file);
//        $img->resizeToWidth(1280);
        $img->resize(1280,600);
        $img->save('uploads/'.$site_id.'/banner/'.$file); 
        
        $model = Websites::model()->findByPk($site_id);
        $model->banner = $file;
        $result = $model->save();
        if($result == 1){
            echo 'uploads/'.$site_id.'/banner/'.$file;
        }else{
            echo '-1';
        }
    }
    
    public function actionSaveLogo(){
//       echo $_POST['image']; 
        
       $site_id = $_POST['website_id'];
//       $file_type = $_POST['file_type'];
       $base64img = $_POST['image'];
//       print_r($file_type);
       define('UPLOAD_DIR_Website', 'C:\\AppServ\\www\\dreamdata\\uploads\\'.$site_id.'\\');
       if(!file_exists (UPLOAD_DIR_Website)){
            mkdir(UPLOAD_DIR_Website);
       }
       define('UPLOAD_DIR', 'C:\\AppServ\\www\\dreamdata\\uploads\\'.$site_id.'\\logo\\');
       if(!file_exists (UPLOAD_DIR)){
            mkdir(UPLOAD_DIR);
       }
       
        $base64img = str_replace('data:image/jpeg;base64,', '', $base64img);

        $data = base64_decode($base64img);
        $file = uniqid(). 'logo.jpeg';
        file_put_contents(UPLOAD_DIR .$file, $data);
        
        ini_set('memory_limit','500M');
        $img = Yii::app()->simpleImage->load(UPLOAD_DIR .$file);
        $img->resizeToWidth(150);
//        $img->resize(180,280);
        $img->save('uploads/'.$site_id.'/logo/'.$file); 
        
        $model = Websites::model()->findByPk($site_id);
        $model->logo = $file;
        $result = $model->save();
        if($result == 1){
            echo Yii::app()->request->baseUrl.'/uploads/'.$site_id.'/logo/'.$file;
        }else{
            echo '-1';
        }
    }
    

    public function actionWebsiteInsert() {
        if (!empty($_POST)) {
            $result = 0;
            $website_id = $_POST['website_id'];
            $userid = $_POST['userid'];

            if (empty($website_id)) {
                $website = new Websites();
            } else {
                $website = Websites::model()->findByPk($website_id);
            }
            
            if ($userid != null) {
                    $website->name = $_POST['name'];
                    $website->university = $_POST['university'];
                    $website->userid = $_POST['userid'];
                    $website->sel_mainpage = 'true';
                    $website->sel_profile = $_POST['sel_profile']==NULL ? 'false' : 'true';
                    $website->sel_editprofile = $_POST['sel_editprofile']==NULL ? 'false' : 'true';
                    $website->sel_listuser = $_POST['sel_listuser']==NULL ? 'false' : 'true';
                    $website->sel_portfolio = $_POST['sel_portfolio']==NULL ? 'false' : 'true';
                    $website->sel_album = $_POST['sel_album']==NULL ? 'false' : 'true';
                    $website->sel_published = $_POST['sel_published']==NULL ? 'false' : 'true';
                    $website->sel_contact = $_POST['sel_contact']==NULL ? 'false' : 'true';
                    
                    $website->sel_login = $_POST['sel_login']==NULL ? 'false' : 'true';
                    $website->sel_register = $_POST['sel_register']==NULL ? 'false' : 'true';
                   // $website->sel_news = $_POST['sel_news']==NULL ? 'false' : 'true';
                    $website->sel_webboad = $_POST['sel_webboad']==NULL ? 'false' : 'true';
                    $website->sel_viewsite = $_POST['sel_viewsite']==NULL ? 'false' : 'true';
                    $website->sel_accounts = $_POST['sel_accounts']==NULL ? 'false' : 'true';
                  //  $website->sel_knowledge = $_POST['sel_knowledge']==NULL ? 'false' : 'true';
                    
                    $result = $website->save();
            } else {
                $result= -1;
            }    
        } else {
            $result= -1;
        }
        echo $result;
    }

    /**
     * Performs the AJAX validation.
     * @param Websites $model the model to be validated
     */
//	protected function performAjaxValidation($model)
//	{
//		if(isset($_POST['ajax']) && $_POST['ajax']==='websites-form')
//		{
//			echo CActiveForm::validate($model);
//			Yii::app()->end();
//		}
//	}
    
   
}
