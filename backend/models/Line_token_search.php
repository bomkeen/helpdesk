<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Line_token;

/**
 * Line_token_search represents the model behind the search form about `app\models\Line_token`.
 */
class Line_token_search extends Line_token
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token_id','token'], 'safe'],
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
        $query = Line_token::find();

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
        $query->andFilterWhere(['like', 'token_id', $this->token_id]);
        $query->andFilterWhere(['like', 'token', $this->token]);
        return $dataProvider;
    }
}
