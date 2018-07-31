<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Avto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avto-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'model_avto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacity_avto')->textInput() ?>

    <?= $form->field($model, 'space_avto')->textInput() ?>

    <?= $form->field($model, 'manipulator_avto')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'availability_avto')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'driver_avto')->textInput() ?>

    <?= $form->field($model, 'r_number_avto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes_avto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
