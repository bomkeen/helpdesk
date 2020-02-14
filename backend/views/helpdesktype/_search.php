<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HelpdesktypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="helpdesktype-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'type_name') ?>

    <?= $form->field($model, 'type_discription') ?>

    <?= $form->field($model, 'type_point') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
