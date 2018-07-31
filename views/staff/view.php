<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = $model->name_staff;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id_staff], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_staff], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены что хотиту продать раба :) ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id_staff',
            'name_staff',
            'soname_staff',
            'phone_staff',
            'email_staff:email',
            'home_staff',
            'role_staff',
            'notes_staff',
        ],
    ]) ?>

</div>
