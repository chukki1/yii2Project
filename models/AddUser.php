<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cashier".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Email
 * @property string $Password
 * @property int $User_type_Id
 */
class AddUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cashier';
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
            ['Email','email'],
            [['Name'], 'unique'],
            [['Password'], 'validatePassword'],
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
    public function validatePassword()
    {
        $user = User::findByUsername($this->Name);

        if (!$user || !$user->validatePassword($this->Password)) {
            $this->addError('Password', 'Incorrect username or password.');
        }
    }
}
