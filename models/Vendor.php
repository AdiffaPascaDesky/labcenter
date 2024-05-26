<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property int $id
 * @property string $nama
 * @property string $pic
 * @property string $email
 * @property int $hp
 * @property string $alamat
 *
 * @property Maintenance[] $maintenances
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'pic', 'email', 'hp', 'alamat'], 'required'],
            [['hp'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'pic'], 'string', 'max' => 256],
            [['email'], 'string', 'max' => 128],
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
            'pic' => 'Pic',
            'email' => 'Email',
            'hp' => 'Hp',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * Gets query for [[Maintenances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenances()
    {
        return $this->hasMany(Maintenance::class, ['id_vendor' => 'id']);
    }
}
