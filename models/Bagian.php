<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bagian".
 *
 * @property int $id
 * @property string $nama
 *
 * @property SubBagian[] $subBagians
 */
class Bagian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bagian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 1024],
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
        ];
    }

    /**
     * Gets query for [[SubBagians]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubBagians()
    {
        return $this->hasMany(SubBagian::class, ['id_bagian' => 'id']);
    }
}
