<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Helpdesk */

$this->title = 'รายการแจ้งซ่อม/บริการ เลขที่ : ' . $model->tickets_id;
$this->params['breadcrumbs'][] = ['label' => 'Helpdesks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tickets_id, 'url' => ['view', 'id' => $model->tickets_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="helpdesk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user_role' => $user_role,
    ]) ?>

</div>
