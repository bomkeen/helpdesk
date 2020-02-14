<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_result".
 *
 * @property integer $result_id
 * @property string $result_name
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['result_name'], 'required'],
            [['result_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'result_id' => 'Result ID',
            'result_name' => 'Result Name',
        ];
    }
}
