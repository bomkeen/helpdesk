<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = 'Update Staff: ' . $model->staff_id;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->staff_id, 'url' => ['view', 'staff_id' => $model->staff_id, 'staff_name' => $model->staff_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staff-update">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
