<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

  $this->title = $model->id;
  $this->params['breadcrumbs'][] = ['label' => 'Helpdeskusers', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;

?>

<div class="helpdeskuser-view">

    <p><h1>ยืนยันการลบ User : <font color="red"><?= $model->username ?></font></h1></p>


</div>
<div align="center">
  <p>
        <?= Html::a('ยืนยันการลบ', ['delete','id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
            //    'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
           <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
    </p>

</div>
