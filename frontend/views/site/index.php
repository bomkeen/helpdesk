<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\jui\ProgressBar;

/* @var $this yii\web\View */

$this->title = 'Backoffice';
?>
<div class="site-index">
    <div class="row">

        <div class="container container-fluid">
            <div class="col-md-6 col-lg-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                        <h3>ระบบงานแจ้งซ่อม/บริการ</h3>
                    </div>
                    <div class="panel-body">
                                   <!--<p class="lead"><span class="glyphicon glyphicon-earphone"></span>โทรศัพท์ 1180 มือถือ 092 223 2122</p>-->
            <!--<p><img src="../web/images/Logo.jpg" width="450px" height="300px" alt="" ></p>-->
                        <a class="btn btn-lg btn-block btn-success" href="index.php?r=helpdesk/create"><span class="glyphicon glyphicon-pencil"></span>  แจ้งปัญหา</a>
                        <br><br>
                        <a class="btn btn-lg btn-block btn-warning" href="index.php?r=helpdesk/index"><span class="glyphicon glyphicon-eye-open"></span>  ติดตามงาน</a>
                        <?php
                        if (Yii::$app->user->isGuest) {
                            echo '<br><br>';
                            echo Html::button('<h7><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;&nbsp;เข้าสู่ระบบ</h7>', ['value' => Url::to('index.php?r=site/login'), 'class' => 'btn btn-lg btn-danger', 'id' => 'modalButton']);
                        } else {
                            echo '<br><br>';
                             if($userrole=='Admin' || $userrole=='Staff' || $userrole=='Office' ){
                            echo "<a class='btn btn-lg btn-info' href='../../../helpdesk/backend/web/'><span class='glyphicon glyphicon-wrench'></span>  ตั้งค่า</a>";
                            }
                            echo " ";
                            echo "<a class='btn btn-lg btn-danger' href='index.php?r=site/logout'><span class='glyphicon glyphicon-log-out'></span>  ออกจากระบ</a>";
                        }
                        ?>
                    </div>
                </div>
<?php 
//if(Yii::$app->user->isGuest){
//    $bar='';
//    $test='';
//}else {
//  $p = \Yii::$app->user->identity->getId() ;  
//  echo $p;
//}

?>
            </div>    
            <div class="col-md-6 col-lg-6 col-sm-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">

                        <h3>ระบบจัดซื้อจัดจ้าง</h3>
                    </div>
                    <div class="panel-body">
       
                    </div>
                </div>

            </div>  
        </div>
    </div>



</div>
<?php
Modal::begin([
    'header' => 'เข้าสู่ระบบ',
    'id' => 'modal',
    'size' => 'modal-sg',
]);
echo "<div id='modalContent'></div>";
Modal::end();
1
?>
