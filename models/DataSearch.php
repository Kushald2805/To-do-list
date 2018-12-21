<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Data;

/**
 * DataSearch represents the model behind the search form of `app\models\Data`.
 */
class DataSearch extends Data
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gt_id', 'gt_customersid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['gt_mobile', 'gt_email', 'auth_key', 'password_hash', 'password_reset_token', 'gt_deviceid', 'gt_mobile_session_token', 'gt_log'], 'safe'],
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
        $query = Data::find();

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
            'gt_id' => $this->gt_id,
            'gt_customersid' => $this->gt_customersid,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'gt_mobile', $this->gt_mobile])
            ->andFilterWhere(['like', 'gt_email', $this->gt_email])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'gt_deviceid', $this->gt_deviceid])
            ->andFilterWhere(['like', 'gt_mobile_session_token', $this->gt_mobile_session_token])
            ->andFilterWhere(['like', 'gt_log', $this->gt_log]);

        return $dataProvider;
    }
}
