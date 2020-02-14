<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HelpdeskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="helpdesk-search">
<?php
    $form = ActiveForm::begin([
        'id' => 'search-form',
        'action' => ['index'],
        'method' => 'get',
        'type' => ActiveForm::TYPE_INLINE,
        'formConfig' => ['showErrors' => true]
    ]);
?>

    <p><?php echo '<label class="control-label">ค้นหา</label>'; ?></p>
    <?= $form->field($model, 'tickets_id') ?>
    <p><?php echo '<label class="control-label">หัวข้อ</label>'; ?></p>
    <?= $form->field($model, 'subject') ?>

    <div class="form-group">

        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

</div>
