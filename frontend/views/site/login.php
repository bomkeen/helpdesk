<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

$this->title = 'เข้าสู่ระบบ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
    <?php
        $form = ActiveForm::begin([
            'id' => 'login-form-horizontal',
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
        ]);
    ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('เริ่มใหม่', ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

    </div></div>

</div>
