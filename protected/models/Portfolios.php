<?php

/**
 * This is the model class for table "portfolios".
 *
 * The followings are the available columns in table 'portfolios':
 * @property integer $portfolio_id
 * @property string $tilte
 * @property string $detail
 * @property string $postdated
 * @property integer $website_id
 */
class Portfolios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'portfolios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
//	public function rules()
//	{
//		// NOTE: you should only define rules for those attributes that
//		// will receive user inputs.
//		return array(
//			array('tilte, detail, postdated, website_id', 'required'),
//			array('website_id', 'numerical', 'integerOnly'=>true),
//			array('tilte', 'length', 'max'=>255),
//			// The following rule is used by search().
//			// @todo Please remove those attributes that should not be searched.
//			array('portfolio_id, tilte, detail, postdated, website_id', 'safe', 'on'=>'search'),
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
//			'portfolio_id' => 'Portfolio',
//			'tilte' => 'Tilte',
//			'detail' => 'Detail',
//			'postdated' => 'Postdated',
//			'website_id' => 'Website',
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
//		$criteria->compare('portfolio_id',$this->portfolio_id);
//		$criteria->compare('tilte',$this->tilte,true);
//		$criteria->compare('detail',$this->detail,true);
//		$criteria->compare('postdated',$this->postdated,true);
//		$criteria->compare('website_id',$this->website_id);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Portfolios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
