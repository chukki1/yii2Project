<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shipment".
 *
 * @property int $Id
 * @property string $Description
 * @property string $Supplier
 * @property int $Administrator_Id
 * @property string $Date
 * @property string $Time
 * @property string $Item_name
 * @property int $Item_Id
 * @property int $Quantity
 * @property double $Buying_price
 *
 * @property Administrator $administrator
 * @property Product $item
 */
class Shipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Description'], 'string'],
            [['Administrator_Id', 'Date', 'Time', 'Item_name', 'Item_Id', 'Quantity', 'Buying_price'], 'required'],
            [['Administrator_Id', 'Item_Id', 'Quantity'], 'integer'],
            [['Date', 'Time'], 'safe'],
            [['Buying_price'], 'number'],
            [['Supplier'], 'string', 'max' => 45],
            [['Item_name'], 'string', 'max' => 100],
            [['Administrator_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Administrator::className(), 'targetAttribute' => ['Administrator_Id' => 'Id']],
            [['Item_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['Item_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Description' => 'Description',
            'Supplier' => 'Supplier',
            'Administrator_Id' => 'Administrator  ID',
            'Date' => 'Date',
            'Time' => 'Time',
            'Item_name' => 'Item Name',
            'Item_Id' => 'Item  ID',
            'Quantity' => 'Quantity',
            'Buying_price' => 'Buying Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrator()
    {
        return $this->hasOne(Administrator::className(), ['Id' => 'Administrator_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Product::className(), ['Id' => 'Item_Id']);
    }
}
