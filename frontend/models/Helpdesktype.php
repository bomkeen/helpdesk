<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_type".
 *
 * @property integer $type_id
 * @property string $type_name
 * @property string $type_discription
 * @property integer $type_point
 */
class Helpdesktype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'type_name'], 'required'],
            [['type_id', 'type_point'], 'integer'],
            [['type_name'], 'string', 'max' => 100],
            [['type_discription'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_name' => 'Type Name',
            'type_discription' => 'Type Discription',
            'type_point' => 'Type Point',
        ];
    }
}
