<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Avto */

$this->title = $model->r_number_avto;
$this->params['breadcrumbs'][] = ['label' => 'Авто', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id_avto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_avto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить авто?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_avto',
            'model_avto',
            'capacity_avto',
            'space_avto',
            'manipulator_avto',
            'availability_avto',
            'driver_avto',
            'r_number_avto',
            'notes_avto',
        ],
    ]) ?>

</div>
