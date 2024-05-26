<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alat;

/**
 * AlatSearch represents the model behind the search form of `app\models\Alat`.
 */
class AlatSearch extends Alat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id2', 'id_vendor', 'id_lab', 'id_penjab'], 'integer'],
            [['kode_alat', 'nama', 'pos', 'tgl_beli', 'harga', 'kondisi', 'asal_alat', 'ket', 'doc', 'gambar', 'status'], 'safe'],
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
        $query = Alat::find();

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
            'id2' => $this->id2,
            'id_vendor' => $this->id_vendor,
            'id_lab' => $this->id_lab,
            'id_penjab' => $this->id_penjab,
        ]);

        $query->andFilterWhere(['like', 'kode_alat', $this->kode_alat])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'pos', $this->pos])
            ->andFilterWhere(['like', 'tgl_beli', $this->tgl_beli])
            ->andFilterWhere(['like', 'harga', $this->harga])
            ->andFilterWhere(['like', 'kondisi', $this->kondisi])
            ->andFilterWhere(['like', 'asal_alat', $this->asal_alat])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'doc', $this->doc])
            ->andFilterWhere(['like', 'gambar', $this->gambar])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
