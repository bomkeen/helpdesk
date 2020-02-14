<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_department".
 *
 * @property integer $depcode
 * @property string $depname
 * @property integer $depgroup
 * @property string $inhospital
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['depgroup'], 'integer'],
            [['depname'], 'string', 'max' => 100],
            [['inhospital'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'depcode' => 'Depcode',
            'depname' => 'Depname',
            'depgroup' => 'Depgroup',
            'inhospital' => 'Inhospital',
        ];
    }
}
