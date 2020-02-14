
<?php
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'ระบบหลังบ้าน';
?>
<div class="site-index">
    <div align="center">
      <h2>ระบบงานแจ้งซ่อม/บริการ งานไอที</h2>

      <p><img src="../web/images/Backend.png"  alt="" ></p>
      <p>
          <?php
            if (Yii::$app->user->isGuest) {
           echo  Html::button('<h4><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;&nbsp;<b>เข้าสู่ระบบ</b></h4>',  ['value'=>Url::to('index.php?r=site/login'),'class' => 'btn btn-danger','id'=>'modalButton']);
          }
           ?>
      </p>
    </div>

</div>
<?php
Modal::begin([
   'header'=>'เข้าสู่ระบบ',
   'id'=>'modal',
   'size'=>'modal-sg',
]);
echo "<div id='modalContent'></div>";
Modal::end();1

 ?>
