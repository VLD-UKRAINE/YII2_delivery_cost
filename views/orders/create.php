<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = 'Создание заказа';
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('newOrder', [
        'model' => $model,
        'avto'=>$avto,
        'client'=>$client,
        'staff'=>$staff
    ]) ?>

</div>
