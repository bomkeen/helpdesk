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
 * @property string $password
 * @property string $updated_at
 * @property integer $status
 * @property integer $role

 */
class Helpdeskuser extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $password;

    public static function tableName() {
        return 'hosinfo_helpdesk_user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'email', 'fullname', 'hosinfo_department_id'], 'required'],
            [['created_at', 'updated_at','role'], 'safe'],
            [['status', 'hosinfo_department_id',], 'integer'],
            [['cid'], 'string', 'min' => 13],
            [['username', 'password', 'email'], 'string', 'max' => 200],
            [['password_hash', 'auth_key'], 'string', 'max' => 128],
            [['password_reset_token', 'fullname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
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
            'password' => 'password',
            'fullname' => 'ชื่อ - สกุล',
            'hosinfo_department_id' => 'หน่วยงาน',
            'cid' => 'เลขที่บัตรประชาชน'
        ];
    }

    public function beforeSave($insert) {
        date_default_timezone_set('Asia/Bangkok');
        if (parent::beforeSave($insert)) { {
                if ($this->isNewRecord) {
                    $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
                    $this->password_reset_token = '';
                    $this->auth_key = Yii::$app->security->generateRandomString();
                    $this->status = 10;
                    $this->created_at = date('y-m-d G:i:s');
                    $this->updated_at = date('y-m-d G:i:s');
                } else {
                    if ($this->password <> '') {
                        $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
                        $this->updated_at = date('y-m-d G:i:s');
                    }
                }
            }
            return true;
        } else {
            return false;
        }
    }

 
 

}
