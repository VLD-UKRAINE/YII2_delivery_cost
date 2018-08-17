<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->id_orders;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id_orders], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_orders], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить заказ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_orders',
            'id_clients',
            'id_avto',
            'zsd_orders',
            'id_staf_manager',
            'id_staff_driver',
            'time_orders',
            'pay_orders',
            'summ_orders',
            'distance_orders',
            'point_from',
            'point_to',
            'notes_orders',
        ],
    ]) ?>

</div>
