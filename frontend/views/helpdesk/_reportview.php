<?php
use yii\helpers\Html;
?>
<div class="table-responsive">
  <p>
<table width="100%">
    <tr >
      <td align="center">
        <?php //Html::img(Yii::getAlias('@frontend').'/web/LOGO.png', ['width' => 80 ])?>
        <p>&nbsp;</p>
        <h2>แบบฟอร์มแจ้งซ่อม</h2>
        <p>&nbsp;</p>
      </td>
    </tr>
</table>
</p>



</div>

<table class="table_bordered" width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td colspan="4">
      <strong><i>โรงพยาบาลสมเด็จพระสังฆราช วาสนมหาเถระ (นครหลวง)</i></strong><br />
      <small>200 ม.2 ต.บ่อโพง อ.นครหลวง จ.พระนครศรีอยุธยา</small><br />
    </td>
    <td colspan="1" align="center" >
      <b>เลขที่ใบแจ้งซ่อม<b>
      <p><h1><?php echo $model->tickets_id; ?></h1></p>
    </td>
  </tr>

  <tr>
    <td colspan="2"><b>วันที่แจ้งซ่อม : <b><br /> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $model->orderday; ?></td>
    <td colspan="3"><b>หน่วยงานที่แจ้งซ่อม : <b><br /> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $model->departmentname->depname; ?></td>

  </tr>
  <tr>
    <td colspan="4"><b>หัวข้อ : </b><br />&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $model->subject; ?></td>
    <td colspan="1"><b>ความเร่งด่วน : </b><br />&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $model->priority; ?></td>
  </tr>
  <tr>
    <td colspan="5"><b>
      รายละเอียด : </b><br />&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $model->messages; ?>
    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
    </td>

  </tr>

</table>

<table width="100%">
  <tr>
    <td width="70%"></td>
    <td width="30%" align="left"><b>ลงชื่อ</b></td>
  </tr>
  <tr>
    <td width="70%"></td>
    <td width="30%" align="center"><p>&nbsp;</p><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="70%"></td>
    <td width="30%" align="center">(<b><?php echo $model->raisedby; ?></b>)</td>
  </tr>
  <tr>
    <td width="70%"></td>
    <td width="30%" align="center"><b>ผู้แจ้ง</b></td>
  </tr>
</table>
