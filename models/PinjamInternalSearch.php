<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PinjamInternal;

/**
 * PinjamInternalSearch represents the model behind the search form of `app\models\PinjamInternal`.
 */
class PinjamInternalSearch extends PinjamInternal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_alat', 'id_user', 'id_lab'], 'integer'],
            [['tujuan', 'tgl_pinjam', 'tgl_selesai', 'dokumen', 'ket', 'status', 'timestampp'], 'safe'],
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
        $query = PinjamInternal::find();

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
            'id_user' => $this->id_user,
            'id_lab' => $this->id_lab,
            'timestampp' => $this->timestampp,
        ]);

        $query->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'tgl_pinjam', $this->tgl_pinjam])
            ->andFilterWhere(['like', 'tgl_selesai', $this->tgl_selesai])
            ->andFilterWhere(['like', 'dokumen', $this->dokumen])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
