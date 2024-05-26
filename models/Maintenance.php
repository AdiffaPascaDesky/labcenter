<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maintenance".
 *
 * @property int $id
 * @property int $id_alat
 * @property string $tgl_mt
 * @property string $tgl_selesai
 * @property int $id_vendor
 * @property string $harga
 * @property string $kerusakan
 * @property string $ket
 * @property string $dokumen
 * @property string $teknisi
 * @property string $status
 *
 * @property Alat $id0
 * @property Vendor $vendor
 */
class Maintenance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    public static function tableName()
    {
        return 'maintenance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alat', 'tgl_mt', 'tgl_selesai', 'id_vendor', 'harga', 'kerusakan', 'ket', 'dokumen', 'teknisi', 'status'], 'required'],
            [['id_alat', 'id_vendor'], 'integer'],
            [['ket'], 'string'],
            [['tgl_mt', 'status'], 'string', 'max' => 32],
            [['tgl_selesai', 'harga', 'teknisi'], 'string', 'max' => 128],
            [['kerusakan'], 'string', 'max' => 1024],
            [['dokumen'], 'string', 'max' => 256],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Alat::class, 'targetAttribute' => ['id' => 'id']],
            [['id_vendor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::class, 'targetAttribute' => ['id_vendor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_alat' => 'Id Alat',
            'tgl_mt' => 'Tgl Mt',
            'tgl_selesai' => 'Tgl Selesai',
            'id_vendor' => 'Id Vendor',
            'harga' => 'Harga',
            'kerusakan' => 'Kerusakan',
            'ket' => 'Ket',
            'dokumen' => 'Dokumen',
            'teknisi' => 'Teknisi',
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

    /**
     * Gets query for [[Vendor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::class, ['id' => 'id_vendor']);
    }
}
