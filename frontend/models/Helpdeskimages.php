<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk_images".
 *
 * @property integer $ticket_id
 * @property resource $image1
 * @property resource $image2
 * @property resource $image3
 * @property resource $image4
 * @property resource $image5
 */
class Helpdeskimages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id'], 'integer'],
            [['image1', 'image2', 'image3', 'image4', 'image5'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ticket_id' => 'Ticket ID',
            'image1' => 'Image1',
            'image2' => 'Image2',
            'image3' => 'Image3',
            'image4' => 'Image4',
            'image5' => 'Image5',
        ];
    }
}
