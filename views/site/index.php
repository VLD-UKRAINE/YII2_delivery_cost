<?php
    use app\models\Avto;
    use yii\helpers\Html;
    //use yii\widgets\ActiveForm;
    use kartik\select2\Select2;
    use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */


$this->title = 'Главная';

\app\assets\MapAssets::register($this);
?>
<div class="container" id="avto">
<?php $form = ActiveForm::begin([
    'id' => 'avto-form',
    'action' =>'@web/index.php/orders/create',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ]
]); ?>
        <?= $form->field($model, 'id_avto')->widget(Select2::classname(), [
            'data' => $data,
            'theme'=>'krajee',
            'options' => ['placeholder' => 'Выберите авто'],
            'pluginOptions' => [
                'allowClear' => true,
                'label'=>false,
            ],
        ]);
        ?>

    <?= $form->field($model, 'zsd_orders')->checkbox(['0', '1',]) ?>


</div>
<div id="map">

</div>
<div class="container">
    <?= $form->field($model, 'distance_orders')->hiddenInput(['value'=> ''])->label(false)?>
    <?= $form->field($model, 'summ_orders')->hiddenInput(['value'=> ''])->label(false)?>
    <?= $form->field($model, 'point_from')->hiddenInput(['value'=> ''])->label(false)?>
    <?= $form->field($model, 'point_to')->hiddenInput(['value'=> ''])->label(false)?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <p>
            *сохранение работает только для простого маршрута
        </p>
    </div>
    <?php ActiveForm::end(); ?>
</div>
