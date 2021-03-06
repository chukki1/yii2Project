<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "administrator".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Email
 * @property string $Password
 * @property int $User_type_Id
 *
 * @property Shipment[] $shipments
 */
class Administrator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'administrator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Password', 'User_type_Id'], 'required'],
            [['User_type_Id'], 'integer'],
            [['Name', 'Email', 'Password'], 'string', 'max' => 45],
            [['Name'], 'unique'],
            [['Password'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
            'Email' => 'Email',
            'Password' => 'Password',
            'User_type_Id' => 'User Type  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipments()
    {
        return $this->hasMany(Shipment::className(), ['Administrator_Id' => 'Id']);
    }
}
