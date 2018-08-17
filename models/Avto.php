<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avto".
 *
 * @property int $id_avto
 * @property string $model_avto
 * @property double $capacity_avto
 * @property double $space_avto
 * @property string $manipulator_avto
 * @property string $availability_avto
 * @property int $driver_avto
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
            [['model_avto', 'capacity_avto', 'space_avto', 'driver_avto', 'r_number_avto'], 'required'],
            [['capacity_avto', 'space_avto'], 'number'],
            [['manipulator_avto', 'availability_avto'], 'integer'],
            [['driver_avto'], 'integer'],
            [['model_avto', 'r_number_avto', 'notes_avto'], 'string', 'max' => 255],
            [['driver_avto'], 'unique'],
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
            'capacity_avto' => 'Грузопод',
            'space_avto' => 'Объем',
            'manipulator_avto' => 'Манипулятор',
            'availability_avto' => 'Доступность',
            'driver_avto' => 'Водитель',
            'r_number_avto' => 'ГосНомер',
            'notes_avto' => 'Примечания',
        ];
    }
    public function getOrders(){
        return $this->hasMany(Orders::className(), ['id_avto'=>'id_avto']);
    }
}
