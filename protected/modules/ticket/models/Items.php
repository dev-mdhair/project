<?php

/**
 * This is the model class for table "items".
 *
 * The followings are the available columns in table 'items':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $image
 * @property string $price
 * @property string $shipment_price
 * @property string $commission_purchase
 * @property string $total
 * @property integer $status
 * @property string $create_at
 * @property integer $users_id
 *
 * The followings are the available model relations:
 * @property Users $users
 * @property TicketItem[] $ticketItems
 */
class Items extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id', 'required'),
			array('status, users_id', 'numerical', 'integerOnly'=>true),
			array('title, image', 'length', 'max'=>255),
			array('price, shipment_price, commission_purchase, total', 'length', 'max'=>128),
			array('text, create_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, text, image, price, shipment_price, commission_purchase, total, status, create_at, users_id', 'safe', 'on'=>'search'),
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
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'ticketItems' => array(self::HAS_MANY, 'TicketItem', 'items_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'text' => 'Text',
			'image' => 'Image',
			'price' => 'Price',
			'shipment_price' => 'Shipment Price',
			'commission_purchase' => 'Commission Purchase',
			'total' => 'Total',
			'status' => 'Status',
			'create_at' => 'Create At',
			'users_id' => 'Users',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('shipment_price',$this->shipment_price,true);
		$criteria->compare('commission_purchase',$this->commission_purchase,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('users_id',$this->users_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Items the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
