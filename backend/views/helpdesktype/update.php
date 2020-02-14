<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Helpdesktype */

$this->title = 'Update Helpdesktype: ' . $model->type_id;
$this->params['breadcrumbs'][] = ['label' => 'Helpdesktypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_id, 'url' => ['view', 'id' => $model->type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="helpdesktype-update">

    <h1><?php //echo  Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
