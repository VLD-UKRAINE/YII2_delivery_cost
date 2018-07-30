<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avto". Таблица автомобилей.
 *
 * @property int $id_avto
 * @property string $model_avto
 * @property double $capacity_avto
 * @property int $manipulator_avto
 * @property int $availability_avto
 * @property string $driver_avto
 * @property string $r_number_avto
 * @property string $notes_avto
 */
class Avto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'avto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_avto', 'model_avto', 'capacity_avto'], 'required'],
            [['id_avto', 'manipulator_avto', 'availability_avto'], 'integer'],
            [['capacity_avto'], 'number'],
            [['model_avto', 'driver_avto', 'r_number_avto', 'notes_avto'], 'string', 'max' => 255],
            [['id_avto'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_avto' => 'Id Avto',
            'model_avto' => 'Модель',
            'capacity_avto' => 'Грузоподъемность',
            'manipulator_avto' => 'Манипулятор',
            'availability_avto' => 'Доступность',
            'driver_avto' => 'Водитель',
            'r_number_avto' => 'ГосНомер',
            'notes_avto' => 'Примечания',
        ];
    }
}
