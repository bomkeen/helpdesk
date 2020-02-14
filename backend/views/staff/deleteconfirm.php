<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->staff_id;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">

    <p><h1><font color="red"><?= $model->staff_name?></font></h1>


    </div>
    <div align="center">
          <p>
        <?= Html::a('ยืนยันการลบ', ['delete','staff_id' => $model->staff_id,'staff_name'=> $model->staff_name], [
            'class' => 'btn btn-danger',
            'data' => [
            //    'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
         ?>
             <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
    </p>



</div>
