<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kalibrasi".
 *
 * @property int $id
 * @property int $id_alat
 * @property string $no_kalibrasi
 * @property string $tgl_kalibrasi
 * @property string $tgl_terbit
 * @property string $rencana_kalibrasi
 * @property int $id_vendor
 * @property string $harga
 * @property string $skema
 * @property string $ket
 * @property string $dokumen
 * @property string $status
 *
 * @property Alat $id0
 */
class Kalibrasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kalibrasi';
    }
  // Tambahkan ini jika belum ada


    /**
     * {@inheritdoc}
     */
    public function rules()
{
    return [
        [['id_alat', 'no_kalibrasi', 'tgl_kalibrasi', 'tgl_terbit', 'rencana_kalibrasi', 'id_vendor', 'harga', 'skema', 'ket', 'dokumen', 'status'], 'required'],
        [['id_alat', 'id_vendor'], 'integer'],
        [['ket'], 'string'],
        [['no_kalibrasi'], 'string', 'max' => 100],
        [['tgl_kalibrasi', 'tgl_terbit', 'harga', 'skema'], 'string', 'max' => 128],
        [['rencana_kalibrasi'], 'string', 'max' => 25],
        [['dokumen'], 'file'], 
        [['status'], 'string', 'max' => 32],
        [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Alat::class, 'targetAttribute' => ['id' => 'id']],
    ];
}

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_alat' => 'Kode Alat',
            'no_kalibrasi' => 'No Kalibrasi',
            'tgl_kalibrasi' => 'Tgl Kalibrasi',
            'tgl_terbit' => 'Tgl Terbit',
            'rencana_kalibrasi' => 'Rencana Kalibrasi',
            'id_vendor' => 'Id Vendor',
            'harga' => 'Harga',
            'skema' => 'Skema',
            'ket' => 'Ket',
            'dokumen' => 'Dokumen',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getAlat()
{
    return $this->hasOne(Alat::class, ['id' => 'id_alat']);
}


}
