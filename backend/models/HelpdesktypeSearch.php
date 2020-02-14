<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Helpdesktype;

/**
 * HelpdesktypeSearch represents the model behind the search form about `app\models\Helpdesktype`.
 */
class HelpdesktypeSearch extends Helpdesktype
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'type_point'], 'integer'],
            [['type_name', 'type_discription'], 'safe'],
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
        $query = Helpdesktype::find();

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
            'type_id' => $this->type_id,
            'type_point' => $this->type_point,
        ]);

        $query->andFilterWhere(['like', 'type_name', $this->type_name])
            ->andFilterWhere(['like', 'type_discription', $this->type_discription]);

        return $dataProvider;
    }
}
