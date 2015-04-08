<?php

/**
 * This is the model class for table "webboard".
 *
 * The followings are the available columns in table 'webboard':
 * @property integer $id
 * @property string $title
 * @property string $detail
 * @property integer $userid
 * @property string $postdate
 * @property string $posttime
 * @property integer $View
 * @property integer $Reply
 * @property integer $website_id
 */
class Webboard extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'webboard';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
//	public function rules()
//	{
//		// NOTE: you should only define rules for those attributes that
//		// will receive user inputs.
//		return array(
//			array('title, detail, userid, postdate, posttime, View, Reply, website_id', 'required'),
//			array('userid, View, Reply, website_id', 'numerical', 'integerOnly'=>true),
//			array('title', 'length', 'max'=>255),
//			// The following rule is used by search().
//			// @todo Please remove those attributes that should not be searched.
//			array('id, title, detail, userid, postdate, posttime, View, Reply, website_id', 'safe', 'on'=>'search'),
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
//			'id' => 'ID',
//			'title' => 'Title',
//			'detail' => 'Detail',
//			'userid' => 'Userid',
//			'postdate' => 'Postdate',
//			'posttime' => 'Posttime',
//			'View' => 'View',
//			'Reply' => 'Reply',
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
//		$criteria->compare('id',$this->id);
//		$criteria->compare('title',$this->title,true);
//		$criteria->compare('detail',$this->detail,true);
//		$criteria->compare('userid',$this->userid);
//		$criteria->compare('postdate',$this->postdate,true);
//		$criteria->compare('posttime',$this->posttime,true);
//		$criteria->compare('View',$this->View);
//		$criteria->compare('Reply',$this->Reply);
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
	 * @return Webboard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
