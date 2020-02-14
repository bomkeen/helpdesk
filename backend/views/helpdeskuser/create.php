<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Helpdeskuser */

$this->title = 'เพิ่มผู้ใช้งาน';
$this->params['breadcrumbs'][] = ['label' => 'Helpdeskusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helpdeskuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
