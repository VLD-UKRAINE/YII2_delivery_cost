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
            [
                'attribute'=>'id_avto',
                'label'=>'Авто',
                'headerOptions'=>[
                    'style'=>'text-align: center;',
                ],
                'contentOptions'=>[
                    'style'=>'text-align: right;',
                ],
                'headerOptions' => ['width' => '120'],
                'content'=>function($dataProvider){
                    return $dataProvider->avto['model_avto'].' </br>'.$dataProvider->avto['r_number_avto'];
                }
            ],
            [
                'attribute'=>'id_staf_manager',
                'headerOptions'=>[
                    'style'=>'text-align: center;',
                ],
                'contentOptions'=>[
                    'style'=>'text-align: right;',
                ],
                'content'=>function($dataProvider){
                    return $dataProvider->staff['soname_staff'];
                }
            ],
            [
                'attribute'=>'id_staff_driver',
                'headerOptions'=>[
                    'style'=>'text-align: center;',
                ],
                'contentOptions'=>[
                    'style'=>'text-align: right;',
                ],
                'content'=>function($dataProvider){
                    return $dataProvider->staff['soname_staff'];
                }
            ],

            'time_orders',
            [
                'attribute' => 'pay_orders',
                'options' => ['placeholder' => 'Статус'],
                'contentOptions'=>['text-align'=>'center'],
                'content'=>function($dataProvider){
                    if($dataProvider->pay_orders==0){
                        return 'Не оплачен';
                    }else{
                        return 'Оплачен';
                    }

                },
                'filter' => ['0' => 'Не оплачен', '1' => 'Оплачен'],
                'filterInputOptions' => ['prompt' => '', 'class' => 'form-control', 'id' => null],

            ],

            'summ_orders',
            'distance_orders',
            'point_from',
            'point_to',
            'notes_orders',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
