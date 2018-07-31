<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_clients') ?>

    <?= $form->field($model, 'contact_name_clients') ?>

    <?= $form->field($model, 'contact_phone_clients') ?>

    <?= $form->field($model, 'zip_clients') ?>

    <?= $form->field($model, 'region_clients') ?>

    <?php // echo $form->field($model, 'town_clients') ?>

    <?php // echo $form->field($model, 'street_clients') ?>

    <?php // echo $form->field($model, 'house_clients') ?>

    <?php // echo $form->field($model, 'korp_clients') ?>

    <?php // echo $form->field($model, 'email_clients') ?>

    <?php // echo $form->field($model, 'office_clients') ?>

    <?php // echo $form->field($model, 'notes_clients') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
