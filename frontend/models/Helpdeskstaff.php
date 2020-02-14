<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_staff".
 *
 * @property string $staff_id
 * @property string $staff_name
 * @property string $staff_active
 */
class Helpdeskstaff extends \yii\db\ActiveRecord
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
            [['staff_id', 'staff_name'], 'required'],
            [['staff_id'], 'string', 'max' => 13],
            [['staff_name'], 'string', 'max' => 50],
            [['staff_active'], 'string', 'max' => 1],
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
            'staff_active' => 'Staff Active',
        ];
    }
}
