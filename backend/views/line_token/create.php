<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Line_token */

$this->title = 'Create Line Token';
$this->params['breadcrumbs'][] = ['label' => 'Line Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="line-token-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
