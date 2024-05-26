<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PinjamEksternal;

/**
 * PinjamEksternalSearch represents the model behind the search form of `app\models\PinjamEksternal`.
 */
class PinjamEksternalSearch extends PinjamEksternal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_alat'], 'integer'],
            [['institusi', 'tujuan', 'tgl_pinjam', 'tgl_selesai', 'nama', 'hp', 'email', 'alamat', 'ket', 'dokumen', 'status', 'timestampp'], 'safe'],
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
        $query = PinjamEksternal::find();

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
            'timestampp' => $this->timestampp,
        ]);

        $query->andFilterWhere(['like', 'institusi', $this->institusi])
            ->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'tgl_pinjam', $this->tgl_pinjam])
            ->andFilterWhere(['like', 'tgl_selesai', $this->tgl_selesai])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'dokumen', $this->dokumen])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
