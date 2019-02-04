<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delevery_note".
 *
 * @property int $Id
 * @property int $Cashier_Id
 * @property int $invoice_id
 * @property string $Created_date
 * @property string $Description
 * @property string $Customer_Id
 * @property string $Status
 *
 * @property Invoice $cashier
 * @property Invoice $invoice
 */
class DeleveryNote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delevery_note';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Cashier_Id', 'invoice_id', 'Created_date', 'Customer_Id', 'Status'], 'required'],
            [['Cashier_Id', 'invoice_id'], 'integer'],
            [['Created_date'], 'safe'],
            [['Description'], 'string'],
            [['Customer_Id', 'Status'], 'string', 'max' => 45],
            [['Cashier_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['Cashier_Id' => 'Cashier_Id']],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Cashier_Id' => 'Cashier  ID',
            'invoice_id' => 'Invoice ID',
            'Created_date' => 'Created Date',
            'Description' => 'Description',
            'Customer_Id' => 'Customer  ID',
            'Status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashier()
    {
        return $this->hasOne(Invoice::className(), ['Cashier_Id' => 'Cashier_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['Id' => 'invoice_id']);
    }
}
