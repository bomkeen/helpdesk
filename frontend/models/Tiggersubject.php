<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_tigger_subject".
 *
 * @property integer $subject_id
 * @property string $subject_name
 */
class Tiggersubject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_tigger_subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name' => 'Subject Name',
        ];
    }
}
