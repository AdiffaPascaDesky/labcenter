<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maintenance;

/**
 * MaintenanceSearch represents the model behind the search form of `app\models\Maintenance`.
 */
class MaintenanceSearch extends Maintenance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_alat', 'id_vendor'], 'integer'],
            [['tgl_mt', 'tgl_selesai', 'harga', 'kerusakan', 'ket', 'dokumen', 'teknisi', 'status'], 'safe'],
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
        $query = Maintenance::find();

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

        $query->andFilterWhere(['like', 'tgl_mt', $this->tgl_mt])
            ->andFilterWhere(['like', 'tgl_selesai', $this->tgl_selesai])
            ->andFilterWhere(['like', 'harga', $this->harga])
            ->andFilterWhere(['like', 'kerusakan', $this->kerusakan])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'dokumen', $this->dokumen])
            ->andFilterWhere(['like', 'teknisi', $this->teknisi])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
