<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Avto */

$this->title = 'Редактировать авто: ' . $model->r_number_avto;
$this->params['breadcrumbs'][] = ['label' => 'Авто', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->r_number_avto, 'url' => ['view', 'id' => $model->id_avto]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="avto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
