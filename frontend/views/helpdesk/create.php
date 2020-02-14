<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Helpdesk */

$this->title = 'แจ้งปัญหา / ขอรับบริการ';
//$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helpdesk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user_role' => $user_role,
    ]) ?>

</div>
