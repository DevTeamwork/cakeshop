<?php

/**
 * This is the model class for table "banks".
 *
 * The followings are the available columns in table 'banks':
 * @property integer $bank_id
 * @property string $bank_name
 * @property string $branch
 * @property string $account_no
 * @property string $account_name
 * @property string $image
 */
class Banks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'banks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
//	public function rules()
//	{
//		// NOTE: you should only define rules for those attributes that
//		// will receive user inputs.
//		return array(
//			array('bank_name, branch, account_no, account_name, image', 'required'),
//			array('bank_name, branch, account_name, image', 'length', 'max'=>255),
//			array('account_no', 'length', 'max'=>10),
//			// The following rule is used by search().
//			// @todo Please remove those attributes that should not be searched.
//			array('bank_id, bank_name, branch, account_no, account_name, image', 'safe', 'on'=>'search'),
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
//			'bank_id' => 'Bank',
//			'bank_name' => 'Bank Name',
//			'branch' => 'Branch',
//			'account_no' => 'Account No',
//			'account_name' => 'Account Name',
//			'image' => 'Image',
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
//		$criteria->compare('bank_id',$this->bank_id);
//		$criteria->compare('bank_name',$this->bank_name,true);
//		$criteria->compare('branch',$this->branch,true);
//		$criteria->compare('account_no',$this->account_no,true);
//		$criteria->compare('account_name',$this->account_name,true);
//		$criteria->compare('image',$this->image,true);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Banks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
