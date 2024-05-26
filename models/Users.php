<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $address
 * @property int $id_lab
 * @property string $last_login
 * @property int $role
 * @property string $reset_token
 * @property int $status
 * @property string $img_type
 * @property string $created_at
 * @property string $updated_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'username', 'email', 'password', 'phone', 'address', 'id_lab', 'role', 'reset_token'], 'required'],
            [['name', 'username', 'email', 'password', 'phone', 'address', 'reset_token'], 'string'],
            [['id_lab', 'role', 'status'], 'integer'],
            [['last_login', 'created_at', 'updated_at'], 'safe'],
            [['img_type'], 'string', 'max' => 3000],
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
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'address' => 'Address',
            'id_lab' => 'Id Lab',
            'last_login' => 'Last Login',
            'role' => 'Role',
            'reset_token' => 'Reset Token',
            'status' => 'Status',
            'img_type' => 'Img Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
