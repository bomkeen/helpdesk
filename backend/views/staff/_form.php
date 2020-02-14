<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

  <?php
      $form = ActiveForm::begin([
          'id' => 'login-form-vertical',
          'type' => ActiveForm::TYPE_VERTICAL
      ]);
  ?>

    <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_position')->textInput(['maxlength' => true]) ?>

    <?php
      $list = ['Y' => 'เปิดใช้งาน', 'N' => 'ปิดการใช้งาน'];

      echo $form->field($model, 'active')->radioList($list, ['inline'=>true]);
    ?>
    <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
              <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
    </div>
    <?php ActiveForm::end(); ?>

</div>
