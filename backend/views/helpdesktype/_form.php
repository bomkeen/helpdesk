<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Helpdesktype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="helpdesktype-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'type_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_discription')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
