<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_orders') ?>

    <?= $form->field($model, 'id_clients') ?>

    <?= $form->field($model, 'id_avto') ?>

    <?= $form->field($model, 'id_staf_manager') ?>

    <?= $form->field($model, 'id_staff_driver') ?>

    <?php // echo $form->field($model, 'time_orders') ?>

    <?php // echo $form->field($model, 'pay_orders') ?>

    <?php // echo $form->field($model, 'summ_orders') ?>

    <?php // echo $form->field($model, 'distance_orders') ?>

    <?php // echo $form->field($model, 'notes_orders') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
