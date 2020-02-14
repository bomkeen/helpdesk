<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->type_id;
$this->params['breadcrumbs'][] = ['label' => 'Helpdesktypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">

    <p><h1><font color="red"><?= $model->type_name?></font></h1></p>


</div>
<div align="center">
  <p>
        <?= Html::a('ยืนยันการลบ', ['delete','id' => $model->type_id], [
            'class' => 'btn btn-danger',
            'data' => [
            //    'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
           <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
    </p>

</div>
