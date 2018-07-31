<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Staff;

/**
 * StaffSearch represents the model behind the search form of `app\models\Staff`.
 */
class StaffSearch extends Staff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_staff'], 'integer'],
            [['name_staff', 'soname_staff', 'phone_staff', 'email_staff', 'home_staff', 'role_staff', 'notes_staff'], 'safe'],
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
        $query = Staff::find();

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
            'id_staff' => $this->id_staff,
        ]);

        $query->andFilterWhere(['like', 'name_staff', $this->name_staff])
            ->andFilterWhere(['like', 'soname_staff', $this->soname_staff])
            ->andFilterWhere(['like', 'phone_staff', $this->phone_staff])
            ->andFilterWhere(['like', 'email_staff', $this->email_staff])
            ->andFilterWhere(['like', 'home_staff', $this->home_staff])
            ->andFilterWhere(['like', 'role_staff', $this->role_staff])
            ->andFilterWhere(['like', 'notes_staff', $this->notes_staff]);

        return $dataProvider;
    }
}
