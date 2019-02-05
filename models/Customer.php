<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Address
 * @property string $Email
 * @property string $Password
 * @property string $NIC
 * @property int $User_type_Id
 *
 * @property UserType $userType
 * @property Invoice[] $invoices
 * @property Order[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Address', 'Password', 'NIC', 'User_type_Id'], 'required'],
            [['User_type_Id'], 'integer'],
            [['Name', 'Address', 'Email', 'Password', 'NIC'], 'string', 'max' => 45],
            ['Email','email'],
            [['Password'], 'unique'],
            [['NIC'], 'unique'],
            [['User_type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['User_type_Id' => 'Id']],
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
            'Address' => 'Address',
            'Email' => 'Email',
            'Password' => 'Password',
            'NIC' => 'Nic',
            'User_type_Id' => 'User Type  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['Id' => 'User_type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['Customer_Id' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['Customer_Id' => 'Id']);
    }
}
