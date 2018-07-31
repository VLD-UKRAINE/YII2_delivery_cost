<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id_clients
 * @property string $contact_name_clients
 * @property string $contact_phone_clients
 * @property int $zip_clients
 * @property string $region_clients
 * @property string $town_clients
 * @property string $street_clients
 * @property int $house_clients
 * @property int $korp_clients
 * @property string $email_clients
 * @property int $office_clients
 * @property string $notes_clients
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contact_name_clients', 'contact_phone_clients', 'town_clients', 'street_clients', 'house_clients'], 'required'],
            [['zip_clients', 'house_clients', 'korp_clients', 'office_clients'], 'integer'],
            [['contact_name_clients', 'street_clients', 'email_clients', 'notes_clients'], 'string', 'max' => 255],
            [['contact_phone_clients', 'region_clients', 'town_clients'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_clients' => 'Id Clients',
            'contact_name_clients' => 'Имя',
            'contact_phone_clients' => 'Телефон',
            'zip_clients' => 'Индекс',
            'region_clients' => 'Область',
            'town_clients' => 'Город',
            'street_clients' => 'Улица',
            'house_clients' => 'Дом',
            'korp_clients' => 'Корпус',
            'email_clients' => 'Email',
            'office_clients' => 'Офис',
            'notes_clients' => 'Примечания',
        ];
    }

    public function getOrders(){
        return $this->hasMany(Orders::className(), ['id_clients'=>'id_clients']);
    }
}
