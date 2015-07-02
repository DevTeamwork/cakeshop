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