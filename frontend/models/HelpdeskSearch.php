<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Helpdesk;

/**
 * HelpdeskSearch represents the model behind the search form about `app\models\Helpdesk`.
 */
class HelpdeskSearch extends Helpdesk
{
  /**
   * @inheritdoc
   */
  public function rules()
  {
      return [
          [['tickets_id', 'status', 'result', 'department'], 'integer'],
          [['subject', 'assignee', 'raisedby', 'priority', 'resolution', 'lastupdate', 'completedate', 'messages', 'order_date', 'cause','asset_number'], 'safe'],
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
      $query = Helpdesk::find();

      // add conditions that should always apply here

      $dataProvider = new ActiveDataProvider([
          'query' => $query,
           'sort'=> ['defaultOrder' => ['order_date'=>SORT_DESC]]
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
          'asset_number' => $this->asset_number,
      ]);

      $query->andFilterWhere(['like', 'subject', $this->subject])
          ->andFilterWhere(['like', 'assignee', $this->assignee])
          ->andFilterWhere(['like', 'raisedby', $this->raisedby])
          ->andFilterWhere(['like', 'priority', $this->priority])
          ->andFilterWhere(['like', 'resolution', $this->resolution])
          ->andFilterWhere(['like', 'messages', $this->messages])
          ->andFilterWhere(['like', 'cause', $this->cause])
          ->andFilterWhere(['like', 'asset_number', $this->asset_number])

          ;

      return $dataProvider;
  }
}
