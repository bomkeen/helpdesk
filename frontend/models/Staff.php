<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_staff".
 *
 * @property integer $staff_id
 * @property string $staff_name
 * @property string $staff_position
 * @property string $active
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_name'], 'required'],
            [['staff_name', 'staff_position'], 'string', 'max' => 100],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'Staff ID',
            'staff_name' => 'Staff Name',
            'staff_position' => 'Staff Position',
            'active' => 'Active',
        ];
    }
}
