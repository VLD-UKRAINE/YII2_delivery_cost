<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clients;

/**
 * ClientsSearch represents the model behind the search form of `app\models\Clients`.
 */
class ClientsSearch extends Clients
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_clients', 'zip_clients', 'house_clients', 'korp_clients', 'office_clients'], 'integer'],
            [['contact_name_clients', 'contact_phone_clients', 'region_clients', 'town_clients', 'street_clients', 'email_clients', 'notes_clients'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Clients::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_clients' => $this->id_clients,
            'zip_clients' => $this->zip_clients,
            'house_clients' => $this->house_clients,
            'korp_clients' => $this->korp_clients,
            'office_clients' => $this->office_clients,
        ]);

        $query->andFilterWhere(['like', 'contact_name_clients', $this->contact_name_clients])
            ->andFilterWhere(['like', 'contact_phone_clients', $this->contact_phone_clients])
            ->andFilterWhere(['like', 'region_clients', $this->region_clients])
            ->andFilterWhere(['like', 'town_clients', $this->town_clients])
            ->andFilterWhere(['like', 'street_clients', $this->street_clients])
            ->andFilterWhere(['like', 'email_clients', $this->email_clients])
            ->andFilterWhere(['like', 'notes_clients', $this->notes_clients]);

        return $dataProvider;
    }
}
