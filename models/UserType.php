<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property int $Id
 * @property string $Name
 *
 * @property Cashier[] $cashiers
 * @property Customer[] $customers
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashiers()
    {
        return $this->hasMany(Cashier::className(), ['User_type_Id' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['User_type_Id' => 'Id']);
    }
}
