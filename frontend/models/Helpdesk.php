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
 * @property string $resolution
 * @property integer $result
 * @property integer $department
 * @property string $lastupdate
 * @property string $completedate
 * @property string $messages
 * @property string $order_date
 * @property string $cause
 * @property string $asset_number
 * @property integer $type
 */
class Helpdesk extends \yii\db\ActiveRecord
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
            [['subject', 'raisedby', 'priority','type', 'department'], 'required'],
            [['status', 'result', 'department', 'type'], 'integer'],
            [['resolution', 'messages', 'cause'], 'string'],
            [['lastupdate', 'completedate', 'order_date'], 'safe'],
            [['subject', 'assignee', 'raisedby'], 'string', 'max' => 100],
            [['priority', 'asset_number'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          'tickets_id' => 'เลขที่ใบแจ้งซ่อม',
          'subject' => 'หัวข้อ',
          'status' => 'สถานะ',
          'assignee' => 'มอบหมายให้',
          'raisedby' => 'ผู้แจ้ง',
          'priority' => 'ความเร่งด่วน',
          'resolution' => 'วิธีแก้ปัญหา',
          'result' => 'ผลการซ่อม',
          'department' => 'แผนก',
          'lastupdate' => 'แก้ไขเมื่อ',
          'completedate' => 'วันที่เสร็จ',
          'messages' => 'ข้อความ',
          'order_date' => 'วันที่แจ้ง',
          'cause' => 'สาเหตุ',
          'asset_number' => 'เลขที่ครุภัณฑ์',
          'type' => 'ประเภท',
        ];
    }
    public function beforeSave($insert)
         {
             if (parent::beforeSave($insert)) {
                {
                  if ($this->isNewRecord) {
                  $this->order_date = date('y-m-d');
                  $this->result = 1;
                  $this->status = 1;
                  }
                }
                 return true;
             } else {
                 return false;
             }
         }
        function getResultname()
          {
               return $this->hasOne(Helpdeskresult::className(), ['result_id' => 'result']);
          }
        function getStatusname()
          {
               return $this->hasOne(Status::className(), ['status_id' => 'status']);
          }
      function getDepartmentname()
          {
               return $this->hasOne(Department::className(), ['depcode' => 'department']);
          }
      function getStaffname()
              {
                return $this->hasOne(Staff::className(), ['staff_id' => 'assignee']);
              }
      function getTypename()
              {
                return $this->hasOne(Helpdesktype::className(), ['type_id' => 'type']);
              }
      public function getStafffullname()
          {
            if(!empty($this->assignee)){
                 return  $this->staffname->staff_name;
            }else{
                 return  '-';
            }
          }
          public function getDepfullname()
              {
                if(!empty($this->department)){
                     return  $this->departmentname->depname;
                }else{
                     return  '-';
                }
              }
      public function getOrderday()
         {
                if(!empty($this->order_date)){
                    $thai_month_arr=array(
                        "00"=>"",
                        "01"=>"ม.ค.",
                        "02"=>"ก.พ.",
                        "03"=>"มี.ค.",
                        "04"=>"เม.ย.",
                        "05"=>"พ.ค.",
                        "06"=>"มิ.ย.",
                        "07"=>"ก.ค.",
                        "08"=>"ส.ค.",
                        "09"=>"ก.ย",
                        "10"=>"ตุ.ค.",
                        "11"=>"พ.ย.",
                        "12"=>"ธ.ค."
                    );
                   return substr($this->order_date,-2,2)."-".$thai_month_arr[substr($this->order_date,-5,2)]."-".(substr($this->order_date,0,4)+543);
                 }else {
                   return '-';
                 }
          }
          public function getCompleteday()
             {
                    if(!empty($this->completedate)){
                        $thai_month_arr=array(
                            "00"=>"",
                            "01"=>"ม.ค.",
                            "02"=>"ก.พ.",
                            "03"=>"มี.ค.",
                            "04"=>"เม.ย.",
                            "05"=>"พ.ค.",
                            "06"=>"มิ.ย.",
                            "07"=>"ก.ค.",
                            "08"=>"ส.ค.",
                            "09"=>"ก.ย",
                            "10"=>"ตุ.ค.",
                            "11"=>"พ.ย.",
                            "12"=>"ธ.ค."
                        );
                       return substr($this->completedate,-2,2)."-".$thai_month_arr[substr($this->completedate,-5,2)]."-".(substr($this->completedate,0,4)+543);
                     }else {
                       return '-';
                     }
              }
              public function getLastupdateday()
                 {
                        if(!empty($this->lastupdate)){
                            $thai_month_arr=array(
                                "00"=>"",
                                "01"=>"มกราคม",
                                "02"=>"กุมภาพันธ์",
                                "03"=>"มีนาคม",
                                "04"=>"เมษายน",
                                "05"=>"พฤษภาคม",
                                "06"=>"มิถุนายน",
                                "07"=>"กรกฎาคม",
                                "08"=>"สิงหาคม",
                                "09"=>"กันยายน",
                                "10"=>"ตุลาคม",
                                "11"=>"พฤศจิกายน",
                                "12"=>"ธันวาคม"
                            );
                           return substr($this->lastupdate,-11,2)."-".$thai_month_arr[substr($this->lastupdate,-14,2)]."-".
                           (substr($this->lastupdate,0,4)+543).' เวลา '.substr($this->lastupdate,-8,2).':'.substr($this->lastupdate,-5,2).
                           ':'.substr($this->lastupdate,-2,2).' น.';
                         }else {
                           return '-';
                         }
                  }

}
