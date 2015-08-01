<?php

class SiteController extends Controller
{
    public $layout = '//layouts/cakeshop.layout.main';
	public function actionIndex()
	{
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
            
            
            $payment = Yii::app()->db->createCommand()
                ->select('p.*,u.*')
                ->from('payments_comfirm p')
                ->join('users u', 'u.user_id  = p.user_id')
                ->queryAll();
            
            //payment
            
//            echo CJSON::encode($send);
            
             $this->render("index",array(
                    "model"=> $model,
                    "payment"=>$payment
             ));
            
             
//		$this->render('index',array("send"));
                
//        $this->render('index', array(
//            'totalProduct' => $websites,
//            'totalBill' => $userid,
//            'is_admin' => $is_admin,
//            'webboards' => $webboards,
//            'totalKhowledges' => $totalKnowledges,
//            'totalNews' => $totalNews,
//            'totalUsers' => $totalUsers,
//            'totalview' => $totalview
//        ));
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