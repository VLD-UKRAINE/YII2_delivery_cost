<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id_staff
 * @property string $name_staff
 * @property string $soname_staff
 * @property string $phone_staff
 * @property string $email_staff
 * @property string $home_staff
 * @property string $role_staff
 * @property string $notes_staff
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_staff', 'soname_staff', 'phone_staff', 'email_staff', 'home_staff', 'role_staff', 'notes_staff'], 'required'],
            [['name_staff', 'soname_staff', 'phone_staff'], 'string', 'max' => 100],
            [['email_staff', 'home_staff', 'notes_staff'], 'string', 'max' => 255],
            [['role_staff'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_staff' => 'Id Staff',
            'name_staff' => 'Имя',
            'soname_staff' => 'Фамилия',
            'phone_staff' => 'Телефон',
            'email_staff' => 'Email',
            'home_staff' => 'Домашний адр',
            'role_staff' => 'Роль',
            'notes_staff' => 'Примечания',
        ];
    }

    public function getOrders(){
        return $this->hasMany(Orders::className(), ['id_staff_manager'=>'id_staff']);
    }
}
