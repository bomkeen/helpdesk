<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_status".
 *
 * @property integer $status_id
 * @property string $status_name
 */
class Helpdeskstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id', 'status_name'], 'required'],
            [['status_id'], 'integer'],
            [['status_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_name' => 'Status Name',
        ];
    }
}
