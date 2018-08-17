<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_clients')->textInput() ?>

    <?= $form->field($model, 'zsd_orders')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_avto')->textInput() ?>

    <?= $form->field($model, 'id_staf_manager')->textInput() ?>

    <?= $form->field($model, 'id_staff_driver')->textInput() ?>

    <?= $form->field($model, 'time_orders')->textInput() ?>

    <?= $form->field($model, 'pay_orders')->textInput() ?>

    <?= $form->field($model, 'summ_orders')->textInput() ?>

    <?= $form->field($model, 'distance_orders')->textInput() ?>

    <?= $form->field($model, 'point_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'point_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes_orders')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
