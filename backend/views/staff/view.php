<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = $model->staff_id;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-view">

    <div class="jumbotron">

    <?php
          echo DetailView::widget([
              'model'=>$model,
              'condensed'=>true,
              'hover'=>true,
              'mode'=>DetailView::MODE_VIEW,
              'panel'=>[
                  'heading'=>'รหัส # '.$model->staff_id,
                  'type'=>DetailView::TYPE_PRIMARY,
              ],
              'attributes'=>[
                'staff_name',
                'staff_position',
                'active',

              ]
          ]);
     ?>

</div>
<div class="form-group">
         <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
</div>
</div>
