<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новый заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_orders',
            [
               'attribute'=>'id_clients',
                'headerOptions'=>[
                    'style'=>'text-align: center;',
                ],
                'contentOptions'=>[
                    'style'=>'text-align: right;',
                ],
                'content'=>function($dataProvider){
                    return $dataProvider->client['contact_name_clients'];
                }
            ],

            'id_avto',
            'id_staf_manager',
            'id_staff_driver',
            'time_orders',
            'pay_orders',
            'summ_orders',
            'distance_orders',
            'notes_orders',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
