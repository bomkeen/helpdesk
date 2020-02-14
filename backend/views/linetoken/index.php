<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Line_token_search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Line Tokens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="line-token-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Line Token', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
