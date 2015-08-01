<?php

class ReportsController extends Controller
{
        public $layout = '//layouts/cakeshop.layout.main';
        
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionNotification(){
            $model = Notifications::model()->findAll();
            $this->render("notification", array(
                'model' => $model
            ));
        }
        
        public function  actionBillsLimitdate(){
            /*
SELECT o. * , DATEDIFF( DATE( o.`limit_date` ) , CURDATE( ) ) AS  'diff', u. * 
FROM  `order` o
INNER JOIN users u ON o.`customer_id` = u.user_id
WHERE DATEDIFF( DATE(  `limit_date` ) , CURDATE( ) ) =1
             *              */
            $query = 'SELECT o. * , DATEDIFF( DATE( o.`limit_date` ) , CURDATE( ) ) AS  "diff", u. * 
                        FROM  `order` o
                            INNER JOIN users u ON o.`customer_id` = u.user_id
                        WHERE DATEDIFF( DATE(  `limit_date` ) , CURDATE( ) ) =1';

        $model = Yii::app()->db->createCommand($query)->queryAll();
        
        //echo CJSON::encode($model);
        $this->render("billsLimitdate",array(
            "model" => $model
         ));
        
        }
        
        public function actionSendMail(){
//        print($_POST["email"]);
        if($_POST){   
           
//            $url = "http://localhost/dreamdata/index.php?r=sites/Resetpassword&id=".$model["userid"]."";
            $path = "C:\\AppServ\\www\\cakeshop\\protected\\controllers\\class.phpmailer.php";
           // $body = "<b>รีเซตระหัสผ่าน :<a href='".$url."'>คลิก</a></b>";
            $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
        <style></style>
    </head>
    <body>
        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                        <tr>
                            <td align="center" valign="top">
                                This is where my content goes.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>';
            
            include $path; // include the class name
                    $mail = new PHPMailer(); // create a new object
                    $mail->IsSMTP(); // enable SMTP
                    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                    $mail->SMTPAuth = true; // authentication enabled
                    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = 465; // or 587
                    $mail->IsHTML(true);
                    $mail->Username = "dreamdata.reset@gmail.com";
                    $mail->Password = "dreamdata123456";
                    $mail->SetFrom("dreamdata.reset@gmail.com");
                    $mail->Subject = "Reset Password";
                    $mail->Body = $message;
                    $mail->AddAddress($_POST["email"]);
                     if(!$mail->Send()){
                            echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                    else{
                            echo 1;
                    }
           
        }    
    }
        
        public function actionOrders(){  
            $order = Yii::app()->db->createCommand()
                ->select('o.order_id, u.firstname, u.lastname, o.order_date, o.order_status')
                ->from('order o')
                ->join('users u', 'u.user_id  = o.customer_id')
                ->queryAll();
//            echo CJSON::encode($order);
            
            $this->render("orders", array(
                'model' => $order
            ));
        }
        
        public function actionGetOrders(){
            $order = Yii::app()->db->createCommand()
                ->select('o.order_id, u.firstname, u.lastname, o.order_date, o.order_status')
                ->from('order o')
                ->join('users u', 'u.user_id  = o.customer_id')
                ->queryAll();
            echo CJSON::encode($order);
        }
        
        public function actionOderDetail($id) {            
            $order = Yii::app()->db->createCommand()
            ->select('d.*,p.*')
            ->from('order_detail d')
            ->join('products p', 'p.product_id  = d.product_id')
            ->where('order_id=:order_id', array(':order_id' => $id))
            ->queryAll();
            
//            echo CJSON::encode($order);
            
            $this->render("orderDetails", array(
                'model' => $order
            ));
        }
        
        public function actionComfirmPayment(){
            $model = Yii::app()->db->createCommand()
                ->select('p.*,u.*')
                ->from('payments_comfirm p')
                ->join('users u', 'u.user_id  = p.user_id')
                ->queryAll();
            
//            echo CJSON::encode($model);
            
            $this->render("comfirmPayment", array(
                'model' => $model
            ));
        }
        
        public function actionSendbyDate($date){
//            $date = date("Y-m-d"); 
            echo date("Y-m-d");
            $model = Yii::app()->db->createCommand()
                ->select('od.*,u.*,o.*,p.*')
                ->from('order_detail od')
                ->join('order o', 'od.order_id  = o.order_id')
                ->join('users u','o.customer_id = u.user_id')
                ->join('products p','od.product_id = p.product_id')
                ->where('od.send_date=:send_date', array(':send_date' => $date))
                ->queryAll();
            
            echo CJSON::encode($model);
        }
        
        public function actionSendbyCurrentDate(){
            $date = date("Y-m-d"); 
//            echo date("Y-m-d");
            $model = Yii::app()->db->createCommand()
                ->select('od.*,u.*,o.*,p.*')
                ->from('order_detail od')
                ->join('order o', 'od.order_id  = o.order_id')
                ->join('users u','o.customer_id = u.user_id')
                ->join('products p','od.product_id = p.product_id')
                ->where('od.send_date=:send_date', array(':send_date' => $date))
                ->queryAll();
            
//            echo CJSON::encode($model);
            $this->render("sendbyCurrentDate",array(
                    "model"=>$model
                ));
        }
        public function actionSummary(){
            $model = Yii::app()->db->createCommand()
                    ->select("*")
                    ->from("payments_comfirm")
                    ->queryAll();
//            echo CJSON::encode($model);
            $this->render("summary",array(
                    "model"=>$model
            ));
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