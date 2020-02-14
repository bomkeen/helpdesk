<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Staff;

/**
 * StaffSearch represents the model behind the search form about `app\models\Staff`.
 */
class StaffSearch extends Staff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id'], 'integer'],
            [['staff_name', 'staff_position', 'active'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
            'staff_id' => $this->staff_id,
        ]);

        $query->andFilterWhere(['like', 'staff_name', $this->staff_name])
            ->andFilterWhere(['like', 'staff_position', $this->staff_position])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
