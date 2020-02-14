<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_role".
 *
 * @property integer $role_id
 * @property string $role_name
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'role_name'], 'required'],
            [['role_id'], 'integer'],
            [['role_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
        ];
    }
}
