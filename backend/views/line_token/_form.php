<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Line_token */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="line-token-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'active')->checkbox(); ?>
    <?= $form->field($model, 'token')->textInput(['maxlength' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
