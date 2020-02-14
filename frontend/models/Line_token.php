<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_line_token".
 *
 * @property string $token
 */
class Line_token extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_line_token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token'], 'required'],
            [['token'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'token' => 'Token',
        ];
    }
}
