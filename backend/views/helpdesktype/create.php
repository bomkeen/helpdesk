<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Helpdesktype */

$this->title = 'Create Helpdesktype';
$this->params['breadcrumbs'][] = ['label' => 'Helpdesktypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helpdesktype-create">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
