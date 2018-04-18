<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EnergySources;

/**
 * EnergySourcesSearch represents the model behind the search form of `app\models\EnergySources`.
 */
class EnergySourcesSearch extends EnergySources
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'energySourceType_id'], 'integer'],
            [['name'], 'safe'],
            [['qMax', 'pumpPressureNominal', 'pumpPressureWorkQmax'], 'number'],
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
        $query = EnergySources::find();

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
            'id' => $this->id,
            'energySourceType_id' => $this->energySourceType_id,
            'qMax' => $this->qMax,
            'pumpPressureNominal' => $this->pumpPressureNominal,
            'pumpPressureWorkQmax' => $this->pumpPressureWorkQmax,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
