<?php

/**
 * This is the model class for table "order_topping".
 *
 * The followings are the available columns in table 'order_topping':
 * @property integer $order_topping_id
 * @property integer $order_detail_id
 * @property integer $product_id
 * @property integer $topping_id
 */
class OrderTopping extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_topping';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('order_detail_id, product_id, topping_id', 'required'),
			//array('order_detail_id, product_id, topping_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('order_topping_id, order_detail_id, product_id, topping_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_topping_id' => 'Order Topping',
			'order_detail_id' => 'Order Detail',
			'product_id' => 'Product',
			'topping_id' => 'Topping',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('order_topping_id',$this->order_topping_id);
		$criteria->compare('order_detail_id',$this->order_detail_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('topping_id',$this->topping_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderTopping the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
