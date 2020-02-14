<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 * @property integer $role
 */
class Helpdeskuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'password_reset_token', 'email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'role'], 'integer'],
            [['username', 'email'], 'string', 'max' => 20],
            [['password_hash', 'auth_key'], 'string', 'max' => 128],
            [['password_reset_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'role' => 'Role',
        ];
    }
}
