<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DeleveryNoterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delevery Notes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delevery-note-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Delevery Note', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Cashier_Id',
            'invoice_id',
            'Created_date',
            'Description:ntext',
            //'Customer_Id',
            //'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
