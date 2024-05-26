<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email_templates".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $data
 * @property string $created_at
 */
class EmailTemplates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email_templates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'data'], 'required'],
            [['name', 'code', 'data'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'data' => 'Data',
            'created_at' => 'Created At',
        ];
    }
}
