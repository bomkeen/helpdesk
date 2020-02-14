<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosinfo_helpdesk".
 *
 * @property integer $tickets_id
 * @property string $subject
 * @property integer $status
 * @property string $assignee
 * @property string $raisedby
 * @property string $priority
 * @property string $remark
 * @property integer $result
 * @property integer $department
 * @property string $lastupdate
 * @property string $completedate
 * @property string $messages
 * @property string $order_date
 * @property string $cause
 */
class HosinfoHelpdesk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosinfo_helpdesk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'raisedby', 'priority'], 'required'],
            [['status', 'result', 'department'], 'integer'],
            [['remark', 'messages', 'cause'], 'string'],
            [['lastupdate', 'completedate', 'order_date'], 'safe'],
            [['subject', 'assignee', 'raisedby'], 'string', 'max' => 100],
            [['priority'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tickets_id' => 'Tickets ID',
            'subject' => 'Subject',
            'status' => 'Status',
            'assignee' => 'Assignee',
            'raisedby' => 'Raisedby',
            'priority' => 'Priority',
            'remark' => 'Remark',
            'result' => 'Result',
            'department' => 'Department',
            'lastupdate' => 'Lastupdate',
            'completedate' => 'Completedate',
            'messages' => 'Messages',
            'order_date' => 'Order Date',
            'cause' => 'Cause',
        ];
    }
}
