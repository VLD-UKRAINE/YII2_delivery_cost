<?php
 use app\models\Avto;
/* @var $this yii\web\View */


$this->title = 'Главная';

\app\assets\MapAssets::register($this);
?>
<div class="container">
    <h3>
         Выбор автомобиля.

    </h3>
    <h3>
         Выбор маршрута.

    </h3>


</div>
<div id="map">



</div>
<div class="container">
<h3>
    Расчет стоимости.

</h3>
</div>