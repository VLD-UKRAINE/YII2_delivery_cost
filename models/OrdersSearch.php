<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_orders', 'id_clients', 'id_avto', 'id_staf_manager', 'id_staff_driver', 'pay_orders'], 'integer'],
            [['time_orders', 'notes_orders'], 'safe'],
            [['summ_orders', 'distance_orders'], 'number'],
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
        $query = Orders::find()
            ->with('client')
            ->with('avto')
            ->with('staff');

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
            'id_orders' => $this->id_orders,
            'id_clients' => $this->id_clients,
            'id_avto' => $this->id_avto,
            'id_staf_manager' => $this->id_staf_manager,
            'id_staff_driver' => $this->id_staff_driver,
            'time_orders' => $this->time_orders,
            'pay_orders' => $this->pay_orders,
            'summ_orders' => $this->summ_orders,
            'distance_orders' => $this->distance_orders,
        ]);

        $query->andFilterWhere(['like', 'notes_orders', $this->notes_orders]);

        return $dataProvider;
    }
}
