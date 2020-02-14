<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = 'Update Department: ' . $model->depcode;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->depcode, 'url' => ['view', 'id' => $model->depcode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="department-update">

    <h1><?php //echo  Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
