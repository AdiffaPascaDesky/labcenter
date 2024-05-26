<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lab".
 *
 * @property int $id
 * @property string $nama
 * @property string $kode
 * @property int $id_bag
 * @property int $id_subbag
 */
class Lab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'kode', 'id_bag', 'id_subbag'], 'required'],
            [['id_bag', 'id_subbag'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['kode'], 'string', 'max' => 25],
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
            'kode' => 'Kode',
            'id_bag' => 'Id Bag',
            'id_subbag' => 'Id Subbag',
        ];
    }
}
