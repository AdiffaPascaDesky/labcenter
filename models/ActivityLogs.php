<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity_logs".
 *
 * @property int $id
 * @property string $title
 * @property string $user
 * @property string $ip_address
 * @property string $created_at
 * @property string $updated_at
 */
class ActivityLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'user', 'ip_address'], 'required'],
            [['title', 'user', 'ip_address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'user' => 'User',
            'ip_address' => 'Ip Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
