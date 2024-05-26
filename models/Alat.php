<?php

namespace app\models;

use webvimark\modules\UserManagement\models\User;
use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "alat".
 *
 * @property int $id
 * @property int $id2
 * @property string $kode_alat
 * @property string $nama
 * @property string $pos
 * @property string $tgl_beli
 * @property int $id_vendor
 * @property string $harga
 * @property int $id_lab
 * @property int $id_penjab
 * @property string $kondisi
 * @property string $asal_alat
 * @property string $ket
 * @property string $doc
 * @property string $gambar
 * @property string $status
 *
 * @property Kalibrasi $kalibrasi
 * @property Maintenance $maintenance
 * @property PinjamEksternal $pinjamEksternal
 * @property PinjamEksternal[] $pinjamEksternals
 * @property PinjamInternal $pinjamInternal
 */
class Alat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alat';
    }

    /**
     * {@inheritdoc}
     */   
    public function rules()
    
    {
    return [
        [['kode_alat', 'nama', 'pos', 'tgl_beli', 'id_vendor', 'harga', 'id_lab', 'id_penjab', 'kondisi', 'asal_alat', 'ket', 'doc', 'status'], 'required'],
        [['id2', 'id_vendor', 'id_lab', 'id_penjab'], 'integer'],
        [['id2'], 'safe'], // Tetapkan aturan 'safe' untuk kolom id2 agar dapat disimpan tanpa diisi
        [['pos'], 'string'],
        [['gambar'], 'file'], // Ubah aturan untuk memungkinkan input berupa string
        [['kode_alat'], 'string', 'max' => 256],
        [['nama', 'ket'], 'string', 'max' => 1024],
        [['tgl_beli', 'harga', 'kondisi'], 'string', 'max' => 128],
        [['asal_alat'], 'string', 'max' => 32],
        [
            ['doc'], 'file',
            'extensions' => 'pdf',
            'skipOnEmpty' => true,
        ],
    //    [['doc'], 'string', 'max' => 512],
        [['status'], 'string', 'max' => 12],
        [['kondisi'], 'in', 'range' => ['baik', 'rusak', 'menunggu perbaikan']],
    ];
} 


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Kode Alat', //1
            'id2' => 'Id2',
            'kode_alat' => 'Kode',
            'nama' => 'Nama Alat', //2
            'pos' => 'Posisi Alat',
            'tgl_beli' => 'Tanggal Beli', 
            'id_vendor' => 'Nama Vendor', 
            'harga' => 'Harga', 
            'id_lab' => 'Laboratium', //3
            'id_penjab' => 'Penanggung Jawab', 
            'kondisi' => 'Kondisi',//4
            'asal_alat' => 'Asal Alat',

            'ket' => 'Ket',//5
            'doc' => 'Doc',
            'gambar' => 'Gambar',
            'status' => 'Status',//6
        ];
    }

    /**
     * Gets query for [[Kalibrasi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKalibrasi()
    {
        return $this->hasOne(Kalibrasi::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[Maintenance]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenance()
    {
        return $this->hasOne(Maintenance::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[PinjamEksternal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPinjamEksternal()
    {
        return $this->hasOne(PinjamEksternal::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[PinjamEksternals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPinjamEksternals()
    {
        return $this->hasMany(PinjamEksternal::class, ['id_alat' => 'id']);
    }

    /**
     * Gets query for [[PinjamInternal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPinjamInternal()
    {
        return $this->hasOne(PinjamInternal::class, ['id' => 'id']);
    }
    public function getLab()
    {
        return $this->hasOne(Lab::className(), ['id' => 'id_lab']);
    }
    public function getPenanggungJawab()
{
    return $this->hasOne(User::className(),  ['id' => 'id_penjab']);
}
public function getVendor()
{
    return $this->hasOne(Vendor::class, ['id' => 'id_vendor']);
}
public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
        if ($insert) {
            // Cari nilai id2 terakhir
            $lastId2 = static::find()->max('id2');

            // Jika tidak ada data sebelumnya, atur nilai id2 menjadi 1
            $this->id2 = $lastId2 !== null ? $lastId2 + 1 : 1;
        }
        return true;
    }
    return false;
}


}
