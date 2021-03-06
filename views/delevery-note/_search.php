<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DeleveryNoterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delevery-note-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Cashier_Id') ?>

    <?= $form->field($model, 'invoice_id') ?>

    <?= $form->field($model, 'Created_date') ?>

    <?= $form->field($model, 'Description') ?>

    <?php // echo $form->field($model, 'Customer_Id') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
