<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id_orders
 * @property int $id_clients
 * @property int $id_avto
 * @property string $zsd_orders
 * @property int $id_staf_manager
 * @property int $id_staff_driver
 * @property string $time_orders
 * @property int $pay_orders
 * @property double $summ_orders
 * @property double $distance_orders
 * @property string $notes_orders
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_clients', 'id_avto', 'id_staf_manager', 'id_staff_driver', 'summ_orders', 'distance_orders', 'notes_orders'], 'required'],
            [['id_clients', 'id_avto', 'id_staf_manager', 'id_staff_driver', 'pay_orders'], 'integer'],
            [['zsd_orders'], 'string'],
            [['time_orders'], 'safe'],
            [['summ_orders', 'distance_orders'], 'number'],
            [['notes_orders'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_orders' => 'Номер заказа',
            'id_clients' => 'Клиент',
            'id_avto' => 'Автомобиль',
            'zsd_orders' => 'Проезд по ЗСД',
            'id_staf_manager' => 'Сотрудник',
            'id_staff_driver' => 'Водитель',
            'time_orders' => 'Время заказа',
            'pay_orders' => 'PСтатус оплаты',
            'summ_orders' => 'Сумма заказа',
            'distance_orders' => 'Расстояние',
            'notes_orders' => 'Примечания',
        ];
    }
    public function getClient(){
        return $this->hasOne(Clients::className(), ['id_clients'=>'id_clients']);
    }

    public function getAvto(){
        return $this->hasOne(Avto::className(), ['id_avto'=>'id_avto']);
    }

    public function getStaff(){
        return $this->hasOne(Staff::className(), ['id_staff'=>'id_staf_manager']);
    }



}
