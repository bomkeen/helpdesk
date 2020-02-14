<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_categories".
 *
 * @property integer $categories_id
 * @property string $categories_name
 */
class Helpdeskcategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categories_id', 'categories_name'], 'required'],
            [['categories_id'], 'integer'],
            [['categories_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categories_id' => 'Categories ID',
            'categories_name' => 'Categories Name',
        ];
    }
}
