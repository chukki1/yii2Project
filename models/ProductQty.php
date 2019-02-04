<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_qty".
 *
 * @property int $id
 * @property int $product_id
 * @property int $Available_Qty
 * @property int $Re_orderLevel
 *
 * @property Product $product
 */
class ProductQty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_qty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'Available_Qty', 'Re_orderLevel'], 'required'],
            [['product_id', 'Available_Qty', 'Re_orderLevel'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'Available_Qty' => 'Available  Qty',
            'Re_orderLevel' => 'Re Order Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['Id' => 'product_id']);
    }
}
