<?php

/**
 * This is the model class for table "websites".
 *
 * The followings are the available columns in table 'websites':
 * @property integer $website_id
 * @property string $name
 * @property integer $userid
 * @property string $logo
 * @property string $banner
 * @property string $sel_mainpage
 * @property string $sel_profile
 * @property string $sel_editprofile
 * @property string $sel_listuser
 * @property string $sel_portfolio
 * @property string $sel_album
 * @property string $sel_published
 * @property string $sel_contact
 * @property string $created
 */
class Websites extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'websites';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
//	public function rules()
//	{
//		// NOTE: you should only define rules for those attributes that
//		// will receive user inputs.
//		return array(
//			array('name, userid, logo, banner, sel_mainpage, sel_profile, sel_editprofile, sel_listuser, sel_portfolio, sel_album, sel_published, sel_contact, created', 'required'),
//			array('userid', 'numerical', 'integerOnly'=>true),
//			array('name', 'length', 'max'=>200),
//			array('logo, banner', 'length', 'max'=>255),
//			array('sel_mainpage, sel_profile, sel_editprofile, sel_listuser, sel_portfolio, sel_album, sel_published, sel_contact', 'length', 'max'=>5),
//			// The following rule is used by search().
//			// @todo Please remove those attributes that should not be searched.
//			array('website_id, name, userid, logo, banner, sel_mainpage, sel_profile, sel_editprofile, sel_listuser, sel_portfolio, sel_album, sel_published, sel_contact, created', 'safe', 'on'=>'search'),
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
//			'website_id' => 'Website',
//			'name' => 'Name',
//			'userid' => 'Userid',
//			'logo' => 'Logo',
//			'banner' => 'Banner',
//			'sel_mainpage' => 'Sel Mainpage',
//			'sel_profile' => 'Sel Profile',
//			'sel_editprofile' => 'Sel Editprofile',
//			'sel_listuser' => 'Sel Listuser',
//			'sel_portfolio' => 'Sel Portfolio',
//			'sel_album' => 'Sel Album',
//			'sel_published' => 'Sel Published',
//			'sel_contact' => 'Sel Contact',
//			'created' => 'Created',
//		);
//	}
//
//	/**
//	 * Retrieves a list of models based on the current search/filter conditions.
//	 *
//	 * Typical usecase:
//	 * - Initialize the model fields with values from filter form.
//	 * - Execute this method to get CActiveDataProvider instance which will filter
//	 * models according to data in model fields.
//	 * - Pass data provider to CGridView, CListView or any similar widget.
//	 *
//	 * @return CActiveDataProvider the data provider that can return the models
//	 * based on the search/filter conditions.
//	 */
//	public function search()
//	{
//		// @todo Please modify the following code to remove attributes that should not be searched.
//
//		$criteria=new CDbCriteria;
//
//		$criteria->compare('website_id',$this->website_id);
//		$criteria->compare('name',$this->name,true);
//		$criteria->compare('userid',$this->userid);
//		$criteria->compare('logo',$this->logo,true);
//		$criteria->compare('banner',$this->banner,true);
//		$criteria->compare('sel_mainpage',$this->sel_mainpage,true);
//		$criteria->compare('sel_profile',$this->sel_profile,true);
//		$criteria->compare('sel_editprofile',$this->sel_editprofile,true);
//		$criteria->compare('sel_listuser',$this->sel_listuser,true);
//		$criteria->compare('sel_portfolio',$this->sel_portfolio,true);
//		$criteria->compare('sel_album',$this->sel_album,true);
//		$criteria->compare('sel_published',$this->sel_published,true);
//		$criteria->compare('sel_contact',$this->sel_contact,true);
//		$criteria->compare('created',$this->created,true);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Websites the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
