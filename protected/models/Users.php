<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property string $nickname
 * @property string $birthday
 * @property string $address
 * @property string $tel
 * @property string $identification_card
 * @property string $image_profile
 * @property string $rote
 * @property string $active
 * @property string $latitude
 * @property string $longtitude
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, firstname, lastname, nickname, birthday, address, tel, identification_card, image_profile, rote, active, latitude, longtitude', 'required'),
			array('username, password, firstname, lastname, nickname', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			array('address, image_profile', 'length', 'max'=>255),
			array('tel, latitude, longtitude', 'length', 'max'=>15),
			array('identification_card', 'length', 'max'=>13),
			array('rote', 'length', 'max'=>5),
			array('active', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, username, password, email, firstname, lastname, nickname, birthday, address, tel, identification_card, image_profile, rote, active, latitude, longtitude', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'nickname' => 'Nickname',
			'birthday' => 'Birthday',
			'address' => 'Address',
			'tel' => 'Tel',
			'identification_card' => 'Identification Card',
			'image_profile' => 'Image Profile',
			'rote' => 'Rote',
			'active' => 'Active',
			'latitude' => 'Latitude',
			'longtitude' => 'Longtitude',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('identification_card',$this->identification_card,true);
		$criteria->compare('image_profile',$this->image_profile,true);
		$criteria->compare('rote',$this->rote,true);
		$criteria->compare('active',$this->active,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longtitude',$this->longtitude,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
