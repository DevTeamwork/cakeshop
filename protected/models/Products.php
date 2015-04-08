<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $product_id
 * @property string $name
 * @property string $discription
 * @property integer $time
 * @property double $price
 * @property string $create_date
 * @property string $create_time
 * @property integer $user_id
 * @property integer $category_id
 */
class Products extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
//	public function rules()
//	{
//		// NOTE: you should only define rules for those attributes that
//		// will receive user inputs.
//		return array(
//			array('name, discription, time, price, create_date, create_time, user_id, category_id', 'required'),
//			array('time, user_id, category_id', 'numerical', 'integerOnly'=>true),
//			array('price', 'numerical'),
//			array('name', 'length', 'max'=>255),
//			// The following rule is used by search().
//			// @todo Please remove those attributes that should not be searched.
//			array('product_id, name, discription, time, price, create_date, create_time, user_id, category_id', 'safe', 'on'=>'search'),
//		);
//	}

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
//	public function attributeLabels()
//	{
//		return array(
//			'product_id' => 'Product',
//			'name' => 'Name',
//			'discription' => 'Discription',
//			'time' => 'Time',
//			'price' => 'Price',
//			'create_date' => 'Create Date',
//			'create_time' => 'Create Time',
//			'user_id' => 'User',
//			'category_id' => 'Category',
//		);
//	}

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
//	public function search()
//	{
//		// @todo Please modify the following code to remove attributes that should not be searched.
//
//		$criteria=new CDbCriteria;
//
//		$criteria->compare('product_id',$this->product_id);
//		$criteria->compare('name',$this->name,true);
//		$criteria->compare('discription',$this->discription,true);
//		$criteria->compare('time',$this->time);
//		$criteria->compare('price',$this->price);
//		$criteria->compare('create_date',$this->create_date,true);
//		$criteria->compare('create_time',$this->create_time,true);
//		$criteria->compare('user_id',$this->user_id);
//		$criteria->compare('category_id',$this->category_id);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
