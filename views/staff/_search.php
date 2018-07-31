<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaffSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_staff') ?>

    <?= $form->field($model, 'name_staff') ?>

    <?= $form->field($model, 'soname_staff') ?>

    <?= $form->field($model, 'phone_staff') ?>

    <?= $form->field($model, 'email_staff') ?>

    <?php // echo $form->field($model, 'home_staff') ?>

    <?php // echo $form->field($model, 'role_staff') ?>

    <?php // echo $form->field($model, 'notes_staff') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
