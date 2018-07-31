<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contact_name_clients')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_phone_clients')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_clients')->textInput() ?>

    <?= $form->field($model, 'region_clients')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'town_clients')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street_clients')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_clients')->textInput() ?>

    <?= $form->field($model, 'korp_clients')->textInput() ?>

    <?= $form->field($model, 'email_clients')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'office_clients')->textInput() ?>

    <?= $form->field($model, 'notes_clients')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
