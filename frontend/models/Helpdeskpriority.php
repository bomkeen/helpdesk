<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_priority".
 *
 * @property string $priority
 */
class Helpdeskpriority extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_priority';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['priority'], 'required'],
            [['priority'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'priority' => 'Priority',
        ];
    }
}
