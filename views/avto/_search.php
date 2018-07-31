<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AvtoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_avto') ?>

    <?= $form->field($model, 'model_avto') ?>

    <?= $form->field($model, 'capacity_avto') ?>

    <?= $form->field($model, 'space_avto') ?>

    <?= $form->field($model, 'manipulator_avto') ?>

    <?php // echo $form->field($model, 'availability_avto') ?>

    <?php // echo $form->field($model, 'driver_avto') ?>

    <?php // echo $form->field($model, 'r_number_avto') ?>

    <?php // echo $form->field($model, 'notes_avto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
