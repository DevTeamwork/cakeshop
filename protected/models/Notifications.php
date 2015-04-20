<?php

/**
 * This is the model class for table "notifications".
 *
 * The followings are the available columns in table 'notifications':
 * @property integer $notificatioin_id
 * @property string $create_date
 * @property string $create_time
 * @property integer $user_id
 * @property integer $bill_id
 */
class Notifications extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'notifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
//	public function rules()
//	{
//		// NOTE: you should only define rules for those attributes that
//		// will receive user inputs.
//		return array(
//			array('create_date, create_time, user_id, bill_id', 'required'),
//			array('user_id, bill_id', 'numerical', 'integerOnly'=>true),
//			// The following rule is used by search().
//			// @todo Please remove those attributes that should not be searched.
//			array('notificatioin_id, create_date, create_time, user_id, bill_id', 'safe', 'on'=>'search'),
//		);
//	}

	/**
	 * @return array relational rules.
	 */
//	public function relations()
//	{
//		// NOTE: you may need to adjust the relation name and the related
//		// class name for the relations automatically generated below.
//		return array(
//		);
//	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
//	public function attributeLabels()
//	{
//		return array(
//			'notificatioin_id' => 'Notificatioin',
//			'create_date' => 'Create Date',
//			'create_time' => 'Create Time',
//			'user_id' => 'User',
//			'bill_id' => 'Bill',
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
//		$criteria->compare('notificatioin_id',$this->notificatioin_id);
//		$criteria->compare('create_date',$this->create_date,true);
//		$criteria->compare('create_time',$this->create_time,true);
//		$criteria->compare('user_id',$this->user_id);
//		$criteria->compare('bill_id',$this->bill_id);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notifications the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
