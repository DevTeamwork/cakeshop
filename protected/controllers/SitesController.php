<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SitesController extends Controller {

    public $layout = '//layouts/columnSites';

//    public $layout = '//layouts/columnView';
    /*
      public function actionIndex($id) {
      if (Yii::app()->session['username'] != null && Yii::app()->session['username'] != null || Yii::app()->session['username_admin'] != null) {
      $this->render('index', array(
      'model' => $this->loadModel($id),
      ));
      } else {
      $this->render('site', array(
      'model' => $this->loadModel($id),
      ));
      }
      }
     */

    public function actionIndex($id) {

        $websites = $this->loadModel($id);
        $userid = Yii::app()->session['userid'];
        /*
          if(Yii::app()->session['userid'] == NULL){
          $userid = 0;
          $is_admin = FALSE;
          }else{
          $this->isAdmin($userid, $websites->website_id);
          $is_admin = Yii::app()->session['is_admin'];
          } */

        if (Yii::app()->session['userid'] == NULL) {
            $userid = 0;
            $is_admin = 0;
        } else {
            $is_admin = $this->isAdmin($userid, $id);
        }
        //Get ALL Bebboads
        $webboards = Yii::app()->db->createCommand()
                ->select('a.username, w.*')
                ->from('webboard w')
                ->join('users a', 'a.userid = w.userid')
                ->where('w.website_id=:id', array(':id' => $id))
                ->queryAll();
        //Total knowledges
        $totalKnowledges = Yii::app()->db->createCommand()
                ->select('COUNT(*) as total')
                ->from('gallerys')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryAll();
        //Total News
        $totalNews = Yii::app()->db->createCommand()
                ->select('COUNT(*) as total')
                ->from('publisheds')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryAll();
        //Total Users Register
        $totalUsers = Yii::app()->db->createCommand()
                ->select('COUNT(*) as total')
                ->from('users u')
                ->join('registers r', 'u.userid = r.userid')
                ->where('r.website_id=:id', array(':id' => $id))
                ->queryAll();

        //Increment View Website
        $this->websiteUpdate($id);

        //Tatal View Website
        $totalview = Yii::app()->db->createCommand()
                ->select('view')
                ->from('websites')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryRow();

        $this->render('index', array(
            'websites' => $websites,
            'userid' => $userid,
            'is_admin' => $is_admin,
            'webboards' => $webboards,
            'totalKhowledges' => $totalKnowledges,
            'totalNews' => $totalNews,
            'totalUsers' => $totalUsers,
            'totalview' => $totalview
        ));
//        echo CJSON::encode($websites);
    }

    public function actionUniqueEmail() {
        $email = $_GET['rg_email'];
        if (!empty($email)) {
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

    public function actionUserProfile($id) {
        if (!empty($id)) {
            $userid = Yii::app()->session['userid'];
            $model = Users::model()->findByPk($id);
            $websites = Websites::model()->findByPk(yii::app()->session['website_id']);

            $is_admin = Yii::app()->session['is_admin'];
            $this->render('userProfileDetail', array(
                'model' => $model,
                'websites' => $websites,
                'userid' => $id,
                'is_admin' => $is_admin
            ));
//            echo CJSON::encode($model);
        }
    }

    public function actionUserProfileEdit($id) {
        if (!empty($id)) {

            $website_id = Yii::app()->session['website_id'];
            $model = Users::model()->findByPk($id);
            $websites = Websites::model()->findByPk($website_id);
            $is_admin = Yii::app()->session['is_admin'];
            $this->render('userProfileEdit', array(
                'model' => $model,
                'websites' => $websites,
                'userid' => $id,
                'is_admin' => $is_admin
            ));
//            echo CJSON::encode($model);
        }
    }

    public function actionUserProfileUpdate() {
        if (!empty($_POST)) {
//            print_r($_POST);           
            if (empty($_POST['userid'])) {
                $account = new Users();
            } else {
                $account = Users::model()->findByPk($_POST['userid']);
            }

            $account->firstname = $_POST['firstname'];
            $account->lastname = $_POST['lastname'];
            $account->nickname = $_POST['nickname'];
            $account->birthday = $_POST['birthday'];
            $account->address_contact = $_POST['address_contact'];
            $account->address = $_POST['address'];
            $account->address_office = $_POST['address_office'];
            $account->tel = $_POST['tel'];
           // $account->email = $_POST['email'];
            $account->student_no = $_POST['student_no'];
            $account->faculty = $_POST['faculty'];
            $account->department = $_POST['department'];
            $account->generation_no = $_POST['generation_no'];
            $account->year_start = $_POST['year_start'];
            $result = $account->save();

            echo $result;
        }
    }
    
    public function actionAddUser($id) {
        if (!empty($id)) {
            $userid = Yii::app()->session['userid'];
            $is_admin = Yii::app()->session['is_admin'];
            $this->render('adduser', array(
                'websites' => $this->loadModel($id),
                'userid' => $userid,
                'is_admin' => $is_admin
            ));
        }
    }
    

    public function actionRegisterForm($id) {
        if (!empty($id)) {
            $userid = Yii::app()->session['userid'];
            $is_admin = Yii::app()->session['is_admin'];
            $this->render('register', array(
                'websites' => $this->loadModel($id),
                'userid' => $userid,
                'is_admin' => $is_admin
            ));
        }
    }

    public function actionRegisterSettings($id) {
        if (!empty($id)) {
            $userid = Yii::app()->session['userid'];
            $is_admin = Yii::app()->session['is_admin'];
            $this->render('registerSettings', array(
                'websites' => $this->loadModel($id),
                'userid' => $userid,
                'is_admin' => $is_admin
            ));
        }
    }

    public function actionCustomRegister($id) {
        if (!empty($id)) {
            $this->render('login', array(
                'model' => $this->loadModel($id),
            ));
        }
    }

    public function actionNewsAll($id) {
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('news')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryAll();

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('newsAll', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionNews($id) {
        $postdated = date("Y-m-d"); //2014-11-03
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('news')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->andWhere('postdated=:postdated', array(':postdated' => $postdated))
                ->queryAll();
//       echo CJSON::encode($model);
        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('news', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
//        echo $userid;
    }

    public function actionNewsDetail($id) {

        $model = News::model()->findByPk($id);
        $websites = Websites::model()->findByPk($model->website_id);
//        print_r($model);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('newsDetail', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionPortfolios($id) {
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('portfolios')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->order('postdated DESC ,posttime DESC')
                ->queryAll();

        $this->render('portfolios', array(
            'websites' => Websites::model()->findByPk($id),
            'model' => $model,
            'userid' => Yii::app()->session['userid'],
            'is_admin' => Yii::app()->session['is_admin']
        ));
    }

    //PortfolioManager
    public function actionPortfolioManager($id) {

        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('portfolios')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->order('postdated DESC ,posttime DESC')
                ->queryAll();

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];

        $this->render('portfolioManager', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionPortfolioDetail($id) {

        $model = Portfolios::model()->findByPk($id);
        $websites = Websites::model()->findByPk($model->website_id);
//        print_r($model);
//        $userid = Yii::app()->session['userid'];
        $this->render('portfolioDetail', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => Yii::app()->session['userid'],
            'is_admin' => Yii::app()->session['is_admin']
        ));
    }

    public function actionUpload() {

       $website_id =  yii::app()->session['website_id'];
       define('UPLOAD_DIR_Website', 'D:\\AppServ\\www\\dreamdata\\uploads\\' . $website_id . '\\');
        if (!file_exists(UPLOAD_DIR_Website)) {
            mkdir(UPLOAD_DIR_Website);
        }
        define('UPLOAD_DIR', 'D:\\AppServ\\www\\dreamdata\\uploads\\' . $website_id . '\\files\\');
        if (!file_exists(UPLOAD_DIR)) {
            mkdir(UPLOAD_DIR);
        }
            $funcNum = $_GET['CKEditorFuncNum'] ;
            $message = "";
            $url = "";
        if (file_exists(UPLOAD_DIR . $_FILES["upload"]["name"])) {
            $message = $_FILES["upload"]["name"] . " already exists please choose another image. ";
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
        } else {
            move_uploaded_file($_FILES["upload"]["tmp_name"], UPLOAD_DIR . $_FILES["upload"]["name"]);
//            echo "Stored in: " . UPLOAD_DIR_IMAGE . $_FILES["upload"]["name"];
            
             $url =  'http://localhost:82/dreamdata/uploads/'.$website_id.'/files/'.$_FILES["upload"]["name"];
             echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
        }
    }

    public function actionPortfolioCreate($id) {
        $websites = Websites::model()->findByPk($id);
        $this->render('portfolioCreate', array(
            'websites' => $websites,
            'userid' => Yii::app()->session['userid'],
            'is_admin' => Yii::app()->session['is_admin']
        ));
    }

    public function actionPortfolioEdit($id) {
        $model = Portfolios::model()->findByPk($id);
        $websites = Websites::model()->findByPk($model->website_id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('portfolioEdit', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionPortfolioInsert() {
        if (!empty($_POST)) {
            if (empty($_POST['id'])) {
                $portfolio = new Portfolios();
            } else {
                $portfolio = Portfolios::model()->findByPk($_POST['id']);
            }
            $portfolio->title = $_POST['title'];
            $portfolio->detail = $_POST['editor1'];
            $portfolio->website_id = $_POST['website_id'];
            $model->postdated = date("Y-m-d");
            $model->posttime = date("H:i:s");
            $portfolio->save();
            echo 'success';
        }
    }

    public function actionPortfolioDelete($id) {
        Portfolios::model()->deleteByPk($id);
        echo 'success';
    }

    public function actionNewsManager($id) {
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('news')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryAll();

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('newsManager', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionNewsCreate($id) {
//        $model = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('news')
//                ->where('website_id=:website_id', array(':website_id' => $id))
//                ->queryAll();

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('newsCreate', array(
            'websites' => $websites,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionNewsInsert() {
//        print_r($_POST);
        if (!empty($_POST)) {
            if (empty($_POST['id'])) {
                $model = new News();
            } else {
                $model = News::model()->findByPk($_POST['id']);
            }
            $model->title = $_POST['title'];
            $model->detail = $_POST['editor1'];
            $model->website_id = $_POST['website_id'];
            $model->postdated = date("Y-m-d");
            $model->posttime = date("H:i:s");
            $result = $model->save();
            echo $result;
        }
    }

    //NewsDelete
    public function actionNewsDelete($id) {
        if (!empty($id)) {
            echo News::model()->deleteByPk($id);
        }
    }

    public function actionNewsEdit($id) {
        $model = News::model()->findByPk($id);
//        print_r($model);
        $websites = Websites::model()->findByPk($model->website_id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('newsEdit', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionKnowledges($id) {
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('knowledges')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryAll();

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('knowledges', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    //KhowledgeDetail
    public function actionKhowledgeDetail($id) {

        $model = Knowledges::model()->findByPk($id);
        $websites = Websites::model()->findByPk($model->website_id);
//        print_r($model);
        $userid = Yii::app()->session['userid'];
        $this->render('knowledgeDetail', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid
        ));
    }

    public function actionKhowledgeManager($id) {
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('knowledges')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->order('postdated')
                ->queryAll();

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('knowledgeManager', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionKhowledgeCreate($id) {
        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('khowledgeCreate', array(
            'websites' => $websites,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionKhowledgeInsert() {
//        print_r($_POST);
        if (!empty($_POST)) {
            if (empty($_POST['id'])) {
                $model = new Knowledges();
            } else {
                $model = Knowledges::model()->findByPk($_POST['id']);
            }
            $model->title = $_POST['title'];
            $model->detail = $_POST['editor1'];
            $model->website_id = $_POST['website_id'];
            $model->postdated = date("Y-m-d");
            $model->posttime = date("H:i:s");
            $result = $model->save();
            echo $result;
        }
    }

    //NewsDelete
    public function actionKhowledgeDelete($id) {
        if (!empty($id)) {
            echo Knowledges::model()->deleteByPk($id);
        }
    }

    public function actionKhowledgeEdit($id) {
        $model = Knowledges::model()->findByPk($id);
        $websites = Websites::model()->findByPk($model->website_id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('khowledgeEdit', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionUsers($id) {
//        $model = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('accounts')
//                ->where('website_id=:website_id', array(':website_id' => $id))
//                ->queryAll();
//        print_r(CJSON::encode($model));

        $query = 'SELECT u. * , r. * 
                    FROM  `users` u
                    INNER JOIN registers r ON r.userid = u.userid
                    AND r.website_id ="' . $id . '"';

        $model = Yii::app()->db->createCommand($query)->queryAll();
//        echo $model[2]['userid'];
//        print_r(CJSON::encode($model));
        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('users', array(
            'model' => $model,
            'websites' => $websites,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

//    public function actionGetUsers($id) {
//        $model = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('accounts')
//                ->where('website_id=:website_id', array(':website_id' => $id))
//                ->queryAll();
//        echo CJSON::encode($model);
//    }

    public function actionUserDetail($id) {

        $model = Users::model()->findByPk($id);
        $websites = Websites::model()->findByPk(yii::app()->session['website_id']);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('userDetail', array(
            'model' => $model,
            'websites' => $websites,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    public function actionCkeditorUpload() {
        print($_FILES['upload']['name']);
        
//        $upload_dir = '/uploads/data/';
//        
//// HERE PERMISSIONS FOR IMAGE
//        $imgsets = array(
//            'maxsize' => 2000, // maximum file size, in KiloBytes (2 MB)
//            'maxwidth' => 900, // maximum allowed width, in pixels
//            'maxheight' => 800, // maximum allowed height, in pixels
//            'minwidth' => 10, // minimum allowed width, in pixels
//            'minheight' => 10, // minimum allowed height, in pixels
//            'type' => array('bmp', 'gif', 'jpg', 'jpe', 'png')        // allowed extensions
//        );
//
//        $re = '';
//
//        if (isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) {
//            $upload_dir = trim($upload_dir, '/') . '/';
//            $img_name = basename($_FILES['upload']['name']);
//
//            // get protocol and host name to send the absolute image path to CKEditor
//            $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
//            $site = $protocol . $_SERVER['SERVER_NAME'] . '/';
//
//            $uploadpath = $_SERVER['DOCUMENT_ROOT'] . '/' . $upload_dir . $img_name;       // full file path
//            $sepext = explode('.', strtolower($_FILES['upload']['name']));
//            $type = end($sepext);       // gets extension
//            list($width, $height) = getimagesize($_FILES['upload']['tmp_name']);     // gets image width and height
//            $err = '';         // to store the errors
//            // Checks if the file has allowed type, size, width and height (for images)
//            if (!in_array($type, $imgsets['type']))
//                $err .= 'The file: ' . $_FILES['upload']['name'] . ' has not the allowed extension type.';
//            if ($_FILES['upload']['size'] > $imgsets['maxsize'] * 1000)
//                $err .= '\\n Maximum file size must be: ' . $imgsets['maxsize'] . ' KB.';
//            if (isset($width) && isset($height)) {
//                if ($width > $imgsets['maxwidth'] || $height > $imgsets['maxheight'])
//                    $err .= '\\n Width x Height = ' . $width . ' x ' . $height . ' \\n The maximum Width x Height must be: ' . $imgsets['maxwidth'] . ' x ' . $imgsets['maxheight'];
//                if ($width < $imgsets['minwidth'] || $height < $imgsets['minheight'])
//                    $err .= '\\n Width x Height = ' . $width . ' x ' . $height . '\\n The minimum Width x Height must be: ' . $imgsets['minwidth'] . ' x ' . $imgsets['minheight'];
//            }
//
//            // If no errors, upload the image, else, output the errors
//            if ($err == '') {
//                if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
//                    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
//                    $url = $site . $upload_dir . $img_name;
//                    $message = $img_name . ' successfully uploaded: \\n- Size: ' . number_format($_FILES['upload']['size'] / 1024, 3, '.', '') . ' KB \\n- Image Width x Height: ' . $width . ' x ' . $height;
//                    $re = "window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')";
//                } else
//                    $re = 'alert("Unable to upload the file")';
//            } else
//                $re = 'alert("' . $err . '")';
//        }
//        echo "<script>$re;</script>";
    }

    public function actionChangeProfileImage() {
//       echo $_POST['image']; 
        if (!empty($_POST)) {
            $site_id = $_POST['website_id'];
            $userid = $_POST['userid'];
            $base64img = $_POST['image'];
//       print_r($_POST);

            define('UPLOAD_DIR_Website', 'C:\\AppServ\\www\\dreamdata\\uploads\\' . $site_id . '\\');
            if (!file_exists(UPLOAD_DIR_Website)) {
                mkdir(UPLOAD_DIR_Website);
            }
            define('UPLOAD_DIR', 'C:\\AppServ\\www\\dreamdata\\uploads\\' . $site_id . '\\profile\\');
            if (!file_exists(UPLOAD_DIR)) {
                mkdir(UPLOAD_DIR);
            }

            $base64img = str_replace('data:image/jpeg;base64,', '', $base64img);

            $data = base64_decode($base64img);
            $file = $userid . '_' . uniqid() . '_profile.jpeg';
            file_put_contents(UPLOAD_DIR . $file, $data);

            ini_set('memory_limit','500M');
            $img = Yii::app()->simpleImage->load(UPLOAD_DIR .$file);
            $img->resizeToWidth(150);
    //        $img->resize(180,280);
            $img->save('uploads/'.$site_id.'/profile/'.$file); 
//        print_r($file);

            $model = Users::model()->findByPk($userid);
//        print_r($model);
            $model->image_profile = $file;
            $result = $model->save();
//        print_r($file);

            if ($result == 1) {
                echo Yii::app()->request->baseUrl . '/uploads/' . $site_id . '/profile/' . $file;
            } else {
                echo '-1';
            }

            /**/
        }
    }

    //UserEdit
    public function actionUserEdit($id) {

        $model = Users::model()->findByPk($id);
//        print_r(CJSON::encode($model));
//        print_r(CJSON::encode($websites));
        $userid = Yii::app()->session['userid'];
        $website_id = Yii::app()->session['website_id'];
        $is_admin = Yii::app()->session['is_admin'];
        $websites = Websites::model()->findByPk($website_id);
        $this->render('userEdit', array(
            'model' => $model,
            'websites' => $websites,
            'userid' => $userid,
            'is_admin' => $is_admin,
            'website_id' => $website_id
        ));
    }

    public function actionUserDelete($id) {
//        $model = Users::model()->findByPk($id);
//
//        $websites = Websites::model()->findByPk($model->website_id);
//        $userid = Yii::app()->session['userid'];
//        $is_admin = Yii::app()->session['is_admin'];
//        $this->render('userEdit', array(
//            'model' => $model,
//            'websites' => $websites,
//            'userid' => $userid,
//            'is_admin' => $is_admin
//        ));
        if (!empty($id)) {
            $result = Users::model()->deleteByPk($id);
            if ($result == 1) {
                echo Registers::model()->deleteAll('userid=:userid', array(':userid' => $id));
            } else {
                echo 0;
            }
        }
    }

//Published
    public function actionPublished($id) {
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('publisheds')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryAll();

//        print_r($model);
        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];

        $this->render('published', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

//PublishedCreate
    public function actionPublishedCreate($id) {
//        $model = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('publisheds')
//                ->where('website_id=:website_id', array(':website_id' => $id))
//                ->queryAll();
//        print_r($model);
        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];

        $this->render('publishedCreate', array(
            'websites' => $websites,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    //PublishedInsert
    public function actionPublishedInsert() {
//        print_r($_POST);
        if (!empty($_POST)) {
            if (empty($_POST['id'])) {
                $model = new Publisheds();
            } else {
                $model = Publisheds::model()->findByPk($_POST['id']);
            }
            $model->title = $_POST['title'];
            $model->detail = $_POST['editor1'];
            $model->website_id = $_POST['website_id'];
            $model->postdated = date("Y-m-d");
            $model->posttime = date("H:i:s");
            $result = $model->save();
            echo $result;
//            print_r($model);
        }
    }

    //PublishedDetail
    public function actionPublishedDetail($id) {

        $model = Publisheds::model()->findByPk($id);
        $websites = Websites::model()->findByPk($model->website_id);
//        print_r($model);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('publishedDetail', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    //PublishedManager
    public function actionPublishedManager($id) {
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('publisheds')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryAll();

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('publishedManager', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    //PublishedEdit
    public function actionPublishedEdit($id) {
        $model = Publisheds::model()->findByPk($id);
//        print_r($model);
        $websites = Websites::model()->findByPk($model->website_id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('publishedEdit', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    //PubishedDelete
    public function actionPubishedDelete($id) {
        if (!empty($id)) {
            echo Publisheds::model()->deleteByPk($id);
        }
    }

    //Webboads
    public function actionWebboards($id) {
//        $webboards = Yii::app()->db->createCommand()
//                    ->select('a.username, w.webboard_id')
//                    ->from('webboard w')
//                    ->join('accounts a', 'a.userid = w.userid')
//                    ->where('w.website_id=:id', array(':id' => $id))
//                    ->order('w.webboard_id DESC')
//                    ->queryAll();

        $query = 'SELECT a.username, w.id,w.title,w.detail,w.postdated,w.posttime,w.view,w.reply 
                FROM webboard w
                INNER JOIN users a ON a.userid = w.userid
                WHERE w.website_id =' . $id . '
                ORDER BY w.`postdated` DESC ,`posttime` DESC';


//        $query ='SET @rank =0;
//                SELECT @rank := @rank +1 AS ROW , w.`webboard_id` , w.`title` , w.`detail` , w.`userid` , w.`postdated` , w.`posttime` , w.`view` , w.`reply` , w.`website_id` , u.username
//                    FROM webboard w
//                        INNER JOIN users u ON u.userid = w.userid
//                            WHERE  `website_id` =' . $id . '
//                            ORDER BY  `postdated` DESC ,  `posttime` DESC';

        $webboards = Yii::app()->db->createCommand($query)->query();

//           print_r(CJSON::encode($webboards));

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];

        $this->render('webboards', array(
            'websites' => $websites,
            'webboards' => $webboards,
            'userid' => $userid,
            'is_admin' => $is_admin));
    }

    public function actionWebboadDetail($id) {
        $model = Webboard::model()->findByPk($id);
        $model->view +=1;
        $model->save();

        $websites = Websites::model()->findByPk($model->website_id);
//        print_r(CJSON::encode($model));
        $query = 'SELECT r. * , a.username
                    FROM reply r
                        INNER JOIN users a ON a.userid = r.userid
                    WHERE  r.`webboard_id` =' . $id . '
                  ORDER BY  r.`postdated` DESC ';
        $replys = Yii::app()->db->createCommand($query)->query();
//        print_r(CJSON::encode($replys));
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $username = Yii::app()->session['username'];
        $this->render('webboadDetail', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'username' => $username,
            'is_admin' => $is_admin,
            'replys' => $replys
        ));
    }

    public function actionWebboardCreate($id) {
        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $this->render('webboardCreate', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid));
    }

    public function actionWebboardEdit($id) {
        $model = Webboard::model()->findByPk($id);
        $websites = Websites::model()->findByPk($model->website_id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('webboardEdit', array(
            'websites' => $websites,
            'model' => $model,
            'is_admin' => $is_admin,
            'userid' => $userid));
    }

    public function actionWebboardDelete($id) {//
        if (!empty($id)) {
            //print_r($id);
            echo Webboard::model()->deleteByPk($id);
        }
    }

    //WebboardInsert
    public function actionWebboardInsert() {
//        print_r($_POST);
        if (!empty($_POST)) {
            if (empty($_POST['id'])) {
                $model = new Webboard();
            } else {
                $model = Webboard::model()->findByPk($_POST['id']);
            }
            $model->title = $_POST['title'];
            $model->detail = $_POST['editor1'];
            $model->website_id = $_POST['website_id'];
            $model->postdated = date("Y-m-d");
            $model->posttime = date("H:i:s");
            $model->userid = Yii::app()->session['userid'];
            $result = $model->save();
            echo $result;
        }
    }

    public function actionReplyInsert() {
//        print_r($_POST);
        //upldate reply + 1


        if (!empty($_POST)) {

            $model = Webboard::model()->findByPk($_POST['webboard_id']);
            $model->reply +=1;
            $model->save();

            if (Yii::app()->session['userid'] == null) {
                echo -1;
            } else {
                $model = new Reply();
                $model->detail = $_POST['editor1'];
                $model->website_id = $_POST['website_id'];
                $model->webboard_id = $_POST['webboard_id'];
                $model->postdated = $_POST['postdated'];
                $model->posttime = $_POST['posttime'];
                $model->userid = Yii::app()->session['userid'];
                $result = $model->save();
                echo $result;
            }
        }
    }

    public function actionGallerys($id) {
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('gallerys')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryAll();

        $this->render('gallerys', array(
            'websites' => Websites::model()->findByPk($id),
            'model' => $model,
            'userid' => Yii::app()->session['userid'],
            'is_admin' => Yii::app()->session['is_admin']
        ));
    }

    public function actionGalleryAdd($id) {
        Yii::app()->session['website_id'] = $id;
        $this->render('galleryAdd', array(
            'websites' => Websites::model()->findByPk($id),
            'userid' => Yii::app()->session['userid'],
            'is_admin' => Yii::app()->session['is_admin']
        ));
//        $this->render('galleryAdd');
    }

    public function actionUploadImage() {
        // A list of permitted file extensions
        $allowed = array('png', 'jpg', 'gif', 'zip');
        $website_id = Yii::app()->session['website_id'];
        define('UPLOAD_DIR', "D:\\AppServ\\www\\dreamdata\\uploads\\" . $website_id . "\\gallery\\");
//        echo ''.UPLOAD_DIR;
        if (!file_exists(UPLOAD_DIR)) {
            mkdir(UPLOAD_DIR);
        }
        if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {

            $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

            if (!in_array(strtolower($extension), $allowed)) {
                echo '{"status":"error"}';
                exit;
            }

            if (move_uploaded_file($_FILES['upl']['tmp_name'], UPLOAD_DIR . $_FILES['upl']['name'])) {


                $model = new Gallerys();
                $model->image_path = $_FILES['upl']['name'];
                $model->website_id = $website_id;
                $model->save();
                echo '{"status":"success"}';
                exit;
            }
        }

        echo '{"status":"error"}';
        exit;
    }

    //galleryManager
    public function actionGalleryManager($id) {
        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from('gallerys')
                ->where('website_id=:website_id', array(':website_id' => $id))
                ->queryAll();

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('galleryManager', array(
            'websites' => $websites,
            'model' => $model,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
    }

    //GalleryDelete
    public function actionGalleryDelete($id) {
        if (!empty($id)) {
            echo Gallerys::model()->deleteByPk($id);
        }
    }

    //ContactAdmin
    public function actionContactAdmin($id) {
//        $model = Yii::app()->db->createCommand()
//                        ->select('*')
//                        ->from('gallerys')
//                        ->where('website_id=:website_id', array(':website_id' => $id))
//                        ->queryAll();

        $websites = Websites::model()->findByPk($id);
        $userid = Yii::app()->session['userid'];
        $is_admin = Yii::app()->session['is_admin'];
        $this->render('contactAdmin', array(
            'websites' => $websites,
            'userid' => $userid,
            'is_admin' => $is_admin
        ));
//         print_r(CJSON::encode($websites));
//        print_r($websites->contact);
    }

    public function actionContactAdminUpdate() {
//        print($_POST);
        if (!empty($_POST)) {

            $website_id = $_POST['website_id'];

            if (empty($website_id)) {
                $website = new Websites();
            } else {
                $website = Websites::model()->findByPk($website_id);
            }
            $website->contact = $_POST['editor1'];
            $result = $website->save();

            echo $result;
        } else {
            echo 'fail';
        }
    }

    public function loadModel($id) {
        $model = Websites::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function ActiveUser($userid) {
        $query = 'UPDATE`users`
                    SET `active` = "y"
                    WHERE `userid` =  "' . $userid . '"';
        Yii::app()->db->createCommand($query)->query();
    }
    
    public function isAdmin($userid, $website_id) {
        //ถ้า userid ตรงกับ userid ที่สร้างเว็บแสดงว่าเป็น Admin
        yii::app()->session['website_id'] = $website_id;
        $owner = Yii::app()->db->createCommand()
                ->select('*')
                ->from('websites')
                ->where('userid=:userid', array(':userid' => $userid))
                ->andWhere('website_id=:website_id', array(':website_id' => $website_id))
                ->queryRow();


        if ($owner != NULL) {
            Yii::app()->session['is_admin'] = 1;
            return 1;
        } else {
            Yii::app()->session['is_admin'] = 0;
            return 0;
        }
    }

    public function saveSession($website_id, $userid, $isAdmin) {
        Yii::app()->session['website_id'] = $website_id;
        Yii::app()->session['is_admin'] = $userid;
        Yii::app()->session['userid'] = $userid;
    }

    public function websiteUpdate($website_id) {
        $totalview = Yii::app()->db->createCommand()
                ->select('view')
                ->from('websites')
                ->where('website_id=:website_id', array(':website_id' => $website_id))
                ->queryRow();

        $website = Websites::model()->findByPk($website_id);
        $website->view = $totalview['view'] + 1;
        $result = $website->save();
        return $result;
    }

    public function WebboardViewUppdate($model) {
        if (!empty($model)) {

//            if (empty($_POST['id'])) {
//                $model = new Webboard();
//            } else {
//                $model = Webboard::model()->findByPk($id);
//            }


            $model->view = $model->view + 1;
            $result = $model->save();
            return $result;
        }
    }

//    public function sessionAccount($website_id, $userid, $username, $is_admin) {
//        Yii::app()->session;
//        Yii::app()->session['username'] = $username;
//        yii::app()->session['userid'] = $userid;
//        yii::app()->session['website_id'] = $website_id;
//        Yii::app()->session['is_admin'] = $is_admin;
//    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        /*
          SELECT u. * , r. *
          FROM  `users` u
          INNER JOIN registers r ON r.userid = u.userid
          WHERE u.username =  'joke'
          AND u.password =  'e10adc3949ba59abbe56e057f20f883e'
          AND r.website_id =11
         *           */
        if (!empty($_POST)) {

            $username = $_POST["ln_username"];
            $password = $_POST["ln_password"];
            $website_id = $_POST['website_id'];
            $active = 'n';
            $result = 'n';
            $userid = 0;
            //Step 2
            // 1 Login 
            $query = 'SELECT u. *
                    FROM  `users` u
                    WHERE u.username =  "' . $username . '"
                    AND u.password =  "' . md5($password) . '"';
//            print_r($query);
            $user = Yii::app()->db->createCommand($query)->queryRow();
//            print_r(CJSON::encode($user));
            // 2 Check Is Admin

            if ($user != NULL) {
                $userid = $user['userid'];
                $is_admin = $this->isAdmin($user['userid'], $website_id);
                if ($is_admin == 0) {
                    // 3 check is Account website 
                    $query2 = 'SELECT u. * , r. * 
                            FROM  `users` u
                            INNER JOIN registers r ON r.userid = u.userid
                            WHERE u.username =  "' . $username . '"
                            AND u.password =  "' . md5($password) . '"
                            AND r.website_id ="' . $website_id . '"';

                    $account = Yii::app()->db->createCommand($query2)->queryRow();

                    if ($account['userid'] != null) {
                        Yii::app()->session;
                        Yii::app()->session['username'] = $username;
                        yii::app()->session['userid'] = $account['userid'];
                        $active = $account['active'];
                        if($active == 'n'){
                            $this->ActiveUser($account['userid']);
                        }
                        $result = 'y';
                    } else {
                        $result = 'n';
                    }
                } else if ($is_admin == 1) {
                    Yii::app()->session;
                    Yii::app()->session['username'] = $username;
                    yii::app()->session['userid'] = $user['userid'];
                    $result = 'y';
                }
            } else {
                $result = 'n';
                $userid = 0;
            }
            if ($result == 'y') {
                echo $is_admin . ' ' . $userid. ' '.$active;
            } else {
                echo $result;
            }
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        $websiteid = yii::app()->session['website_id'];
        Yii::app()->session['username'] = NULL;
        Yii::app()->session['userid'] = NULL;

        Yii::app()->session->clear();
        Yii::app()->session->destroy();

//        $this->render('site', array(
//                'model' => $this->loadModel($websiteid),
//            ));

        echo $websiteid;
    }
//AddUser
    
    public function actionRegister() {
        if (!empty($_POST)) {

            $username = $_POST["rg_username"];
            $password = $_POST["rg_password"];
            $website_id = $_POST['rg_websiteid'];
            $email = $_POST['rg_email'];

            $user = new Users();
            $user->username = $username;
            $user->email = $email;
            $user->password = md5($password);
            $user->active = 'n';
            $result = $user->save();

            //find userid 
            if ($result == 1) {
                $query = "SELECT * FROM `users`
                            WHERE `username`='" . $username . "'
                                and `password`='" . md5($password) . "'
                                  and `email`='" . $email . "'";

                $account = Yii::app()->db->createCommand($query)->queryRow();
//                            print_r(CJSON::encode($account));
//                            echo $account['userid'];
                $register = new Registers();
                $register->userid = $account['userid'];
                $register->website_id = $website_id;
                $result2 = $register->save();

                echo $result2;
            } else {
                echo 0;
            }
        }
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
