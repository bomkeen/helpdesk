<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_line_token".
 *
 * @property int $token_id
 * @property string $token
 * @property int $active
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
            [['token_id','token'], 'required'],
            [['token'], 'string', 'max' => 50],
            [['token_id', 'active'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'token_id' => 'ID',
            'token' => 'Token',
            'active' => 'เปิดใช้งาน Line Notify'
        ];
    }
}
