<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pinjam_eksternal".
 *
 * @property int $id
 * @property int $id_alat
 * @property string $institusi
 * @property string $tujuan
 * @property string $tgl_pinjam
 * @property string $tgl_selesai
 * @property string $nama
 * @property string $hp
 * @property string $email
 * @property string $alamat
 * @property string $ket
 * @property string $dokumen 
 * @property string $timestampp
 *
 * @property Alat $alat
 * @property Alat $id0
 */
class PinjamEksternal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc} 
     */
    public static function tableName()
    {
        return 'pinjam_eksternal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alat', 'institusi', 'tujuan', 'tgl_pinjam', 'tgl_selesai', 'nama', 'hp', 'email', 'alamat', 'ket', 'dokumen' ], 'required'],
            [['id_alat'], 'integer'],
            [['ket'], 'string'],
            [['timestampp'], 'safe'],
            [['institusi', 'nama', 'dokumen'], 'string', 'max' => 256],
            [['tujuan'], 'string', 'max' => 1024],
            [['tgl_pinjam', 'tgl_selesai', 'email'], 'string', 'max' => 128],
            [['hp'], 'string', 'max' => 32],
            [['alamat'], 'string', 'max' => 512], 
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Alat::class, 'targetAttribute' => ['id' => 'id']],
            [['id_alat'], 'exist', 'skipOnError' => true, 'targetClass' => Alat::class, 'targetAttribute' => ['id_alat' => 'id']],
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
            'institusi' => 'Institusi',
            'tujuan' => 'Tujuan',
            'tgl_pinjam' => 'Tgl Pinjam',
            'tgl_selesai' => 'Tgl Selesai',
            'nama' => 'Nama',
            'hp' => 'Hp',
            'email' => 'Email',
            'alamat' => 'Alamat',
            'ket' => 'Ket',
            'dokumen' => 'Dokumen', 
            'timestampp' => 'Timestampp',
        ];
    }

    /**
     * Gets query for [[Alat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlat()
    {
        return $this->hasOne(Alat::class, ['id' => 'id_alat']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Alat::class, ['id' => 'id']);
    }
}
