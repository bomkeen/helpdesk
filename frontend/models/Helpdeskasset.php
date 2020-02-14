<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_asset".
 *
 * @property integer $asset_id
 * @property string $asset_number
 * @property string $asset_serialno
 * @property string $asset_name
 * @property string $asset_active
 */
class Helpdeskasset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_asset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asset_number'], 'string', 'max' => 20],
            [['asset_serialno'], 'string', 'max' => 50],
            [['asset_name'], 'string', 'max' => 100],
            [['asset_active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'asset_id' => 'Asset ID',
            'asset_number' => 'Asset Number',
            'asset_serialno' => 'Asset Serialno',
            'asset_name' => 'Asset Name',
            'asset_active' => 'Asset Active',
        ];
    }
    public function beforeSave($insert)
    {
    //
        if (parent::beforeSave($insert)) {
        //    $this->order_date = date('y-m-d');
            return true;
        } else {
            return false;
        }
    }

}
