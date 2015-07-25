<?php

/**
 * This is the model class for table "payments_comfirm".
 *
 * The followings are the available columns in table 'payments_comfirm':
 * @property integer $id
 * @property string $bank_id
 * @property string $create_date
 * @property string $create_time
 * @property integer $user_id
 * @property integer $bill_id
 * @property string $price
 * @property string $slip_imag
 * @property string $pay_date
 * @property string $pay_time
 * @property string $comment
 * @property string $bank_branch
 */
class PaymentsComfirm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payments_comfirm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('bank_id, create_date, create_time, user_id, bill_id, price, slip_imag, pay_date, pay_time, comment, bank_branch', 'required'),
			//array('user_id, bill_id', 'numerical', 'integerOnly'=>true),
			//array('bank_id, pay_date, pay_time', 'length', 'max'=>20),
			//rray('price', 'length', 'max'=>10),
			//array('slip_imag, comment, bank_branch', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id, bank_id, create_date, create_time, user_id, bill_id, price, slip_imag, pay_date, pay_time, comment, bank_branch', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'bank_id' => 'Bank',
			'create_date' => 'Create Date',
			'create_time' => 'Create Time',
			'user_id' => 'User',
			'bill_id' => 'Bill',
			'price' => 'Price',
			'slip_imag' => 'Slip Imag',
			'pay_date' => 'Pay Date',
			'pay_time' => 'Pay Time',
			'comment' => 'Comment',
			'bank_branch' => 'Bank Branch',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('bank_id',$this->bank_id,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('bill_id',$this->bill_id);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('slip_imag',$this->slip_imag,true);
		$criteria->compare('pay_date',$this->pay_date,true);
		$criteria->compare('pay_time',$this->pay_time,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('bank_branch',$this->bank_branch,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaymentsComfirm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
