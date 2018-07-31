<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_clients',
            'contact_name_clients',
            'contact_phone_clients',
            'zip_clients',
            'region_clients',
            'town_clients',
            'street_clients',
            'house_clients',
            'korp_clients',
            'email_clients:email',
            'office_clients',
            'notes_clients',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
