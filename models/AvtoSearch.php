<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Avto;

/**
 * AvtoSearch represents the model behind the search form of `app\models\Avto`.
 */
class AvtoSearch extends Avto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_avto', 'driver_avto'], 'integer'],
            [['model_avto', 'manipulator_avto', 'availability_avto', 'r_number_avto', 'notes_avto'], 'safe'],
            [['capacity_avto', 'space_avto'], 'number'],
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
        $query = Avto::find();

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
            'id_avto' => $this->id_avto,
            'capacity_avto' => $this->capacity_avto,
            'space_avto' => $this->space_avto,
            'driver_avto' => $this->driver_avto,
        ]);

        $query->andFilterWhere(['like', 'model_avto', $this->model_avto])
            ->andFilterWhere(['like', 'manipulator_avto', $this->manipulator_avto])
            ->andFilterWhere(['like', 'availability_avto', $this->availability_avto])
            ->andFilterWhere(['like', 'r_number_avto', $this->r_number_avto])
            ->andFilterWhere(['like', 'notes_avto', $this->notes_avto]);

        return $dataProvider;
    }
}
