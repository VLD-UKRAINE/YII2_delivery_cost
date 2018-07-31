<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soname_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes_staff')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
