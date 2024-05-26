<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kalibrasi;

/**
 * KalibrasiSearch represents the model behind the search form of `app\models\Kalibrasi`.
 */
class KalibrasiSearch extends Kalibrasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_alat', 'id_vendor'], 'integer'],
            [['no_kalibrasi', 'tgl_kalibrasi', 'tgl_terbit', 'rencana_kalibrasi', 'harga', 'skema', 'ket', 'dokumen', 'status'], 'safe'],
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
        $query = Kalibrasi::find();

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
            'id_alat' => $this->id_alat,
            'id_vendor' => $this->id_vendor,
        ]);

        $query->andFilterWhere(['like', 'no_kalibrasi', $this->no_kalibrasi])
            ->andFilterWhere(['like', 'tgl_kalibrasi', $this->tgl_kalibrasi])
            ->andFilterWhere(['like', 'tgl_terbit', $this->tgl_terbit])
            ->andFilterWhere(['like', 'rencana_kalibrasi', $this->rencana_kalibrasi])
            ->andFilterWhere(['like', 'harga', $this->harga])
            ->andFilterWhere(['like', 'skema', $this->skema])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'dokumen', $this->dokumen])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
