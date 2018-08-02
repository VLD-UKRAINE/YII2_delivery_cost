<?php
/**
 * Created by PhpStorm.
 * User: VLAD
 * Date: 31.07.2018
 * Time: 10:23
 */

namespace app\assets;
use yii\web\AssetBundle;

class MapAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'https://api-maps.yandex.ru/2.1/?lang=ru_RU',
        //'js/multiroute_edit.js',
        'js/deliveryCalculator.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
