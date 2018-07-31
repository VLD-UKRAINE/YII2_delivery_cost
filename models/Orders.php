<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id_orders
 * @property int $id_clients
 * @property int $id_avto
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
            'id_orders' => 'Id Orders',
            'id_clients' => 'Id Clients',
            'id_avto' => 'Id Avto',
            'id_staf_manager' => 'Id Staf Manager',
            'id_staff_driver' => 'Id Staff Driver',
            'time_orders' => 'Time Orders',
            'pay_orders' => 'Pay Orders',
            'summ_orders' => 'Summ Orders',
            'distance_orders' => 'Distance Orders',
            'notes_orders' => 'Notes Orders',
        ];
    }
}
