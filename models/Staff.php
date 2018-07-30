<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff". Таблица сотрудников.
 *
 * @property int $id_staff
 * @property string $name_staff
 * @property string $soname_staff
 * @property string $phone_staff
 * @property string $notes_staff
 * @property string $email_staff
 * @property string $home_staff
 * @property string $role_staff
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
            [['id_staff', 'name_staff','phone_staff','role_staff'], 'required'],
            [['id_staff'], 'integer'],
            [['name_staff', 'soname_staff', 'phone_staff'], 'string', 'max' => 100],
            [['notes_staff', 'email_staff', 'home_staff'], 'string', 'max' => 255],
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
            'notes_staff' => 'Примечания',
            'email_staff' => 'Email',
            'home_staff' => 'Домашний адресс',
            'role_staff' => 'Роль',
        ];
    }
}
