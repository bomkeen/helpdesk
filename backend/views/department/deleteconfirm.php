<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->depcode;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">

  <p><h1><font color="red"><?= $model->depname?></font></h1>


    </div>
    <div align="center">
          <p>
            <?= Html::a('ยืนยันการลบ', ['delete','id' => $model->depcode], [
                'class' => 'btn btn-danger',
                'data' => [
                //    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
               <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
    </p>



</div>
