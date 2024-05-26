<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_bagian".
 *
 * @property int $id
 * @property string $nama
 * @property string $kode_subbag
 * @property int $id_bagian
 *
 * @property Bagian $bagian
 */
class SubBagian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_bagian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'kode_subbag', 'id_bagian'], 'required'],
            [['id_bagian'], 'integer'],
            [['nama'], 'string', 'max' => 256],
            [['kode_subbag'], 'string', 'max' => 25],
            [['id_bagian'], 'exist', 'skipOnError' => true, 'targetClass' => Bagian::class, 'targetAttribute' => ['id_bagian' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'kode_subbag' => 'Kode Subbag',
            'id_bagian' => 'Id Bagian',
        ];
    }

    /**
     * Gets query for [[Bagian]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBagian()
    {
        return $this->hasOne(Bagian::class, ['id' => 'id_bagian']);
    }
}
