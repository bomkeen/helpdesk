<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Line_token */

$this->title = 'Line Token';?>
<div class="line-token-update">
  <h1>
    <img src="../web/images/LINE_logo.png" width="80" height="80"  alt="" >
    <?= Html::encode($this->title) ?>
  </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
