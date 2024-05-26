<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pinjam_internal".
 *
 * @property int $id
 * @property int $id_alat
 * @property int $id_user
 * @property int $id_lab
 * @property string $tujuan
 * @property string $tgl_pinjam
 * @property string $tgl_selesai
 * @property string $dokumen
 * @property string $ket
 * @property string $status
 * @property string $timestampp
 *
 * @property Alat $id0
 */
class PinjamInternal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pinjam_internal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alat', 'id_user', 'id_lab', 'tujuan', 'tgl_pinjam', 'tgl_selesai', 'dokumen', 'ket', 'status'], 'required'],
            [['id_alat', 'id_user', 'id_lab'], 'integer'],
            [['ket'], 'string'],
            [['timestampp'], 'safe'],
            [['tujuan'], 'string', 'max' => 256],
            [['tgl_pinjam', 'tgl_selesai'], 'string', 'max' => 32],
            [['dokumen'], 'string', 'max' => 128],
            [['status'], 'string', 'max' => 12],
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
            'id_alat' => 'Id Alat',
            'id_user' => 'Id User',
            'id_lab' => 'Id Lab',
            'tujuan' => 'Tujuan',
            'tgl_pinjam' => 'Tgl Pinjam',
            'tgl_selesai' => 'Tgl Selesai',
            'dokumen' => 'Dokumen',
            'ket' => 'Ket',
            'status' => 'Status',
            'timestampp' => 'Timestampp',
        ];
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
    public function getAlat()
{
    return $this->hasOne(Alat::class, ['id' => 'id_alat']);
}
}
