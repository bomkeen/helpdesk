<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hosinfohelpdesk;

/**
 * HosinfohelpdeskSearch represents the model behind the search form about `app\models\Hosinfohelpdesk`.
 */
class HosinfohelpdeskSearch extends Hosinfohelpdesk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tickets_id', 'status', 'result', 'department'], 'integer'],
            [['subject', 'assignee', 'raisedby', 'priority', 'remark', 'lastupdate', 'completedate', 'messages', 'order_date', 'cause'], 'safe'],
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
        $query = Hosinfohelpdesk::find();

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
            'tickets_id' => $this->tickets_id,
            'status' => $this->status,
            'result' => $this->result,
            'department' => $this->department,
            'lastupdate' => $this->lastupdate,
            'completedate' => $this->completedate,
            'order_date' => $this->order_date,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'assignee', $this->assignee])
            ->andFilterWhere(['like', 'raisedby', $this->raisedby])
            ->andFilterWhere(['like', 'priority', $this->priority])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'messages', $this->messages])
            ->andFilterWhere(['like', 'cause', $this->cause]);

        return $dataProvider;
    }
}
