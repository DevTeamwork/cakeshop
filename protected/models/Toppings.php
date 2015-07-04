<?php

/**
 * This is the model class for table "toppings".
 *
 * The followings are the available columns in table 'toppings':
 * @property integer $toping_id
 * @property string $toping_name
 * @property string $toping_url
 * @property string $product_id
 */
class Toppings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'toppings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('toping_name, toping_url, product_id', 'required'),
			//array('toping_name, toping_url', 'length', 'max'=>255),
			//array('product_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('toping_id, toping_name, toping_url, product_id', 'safe', 'on'=>'search'),
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
			'toping_id' => 'Toping',
			'toping_name' => 'Toping Name',
			'toping_url' => 'Toping Url',
			'product_id' => 'Product',
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

		$criteria->compare('toping_id',$this->toping_id);
		$criteria->compare('toping_name',$this->toping_name,true);
		$criteria->compare('toping_url',$this->toping_url,true);
		$criteria->compare('product_id',$this->product_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Toppings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
