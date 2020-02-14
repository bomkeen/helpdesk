<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HelpdesktypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประเภท';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helpdesktype-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <?php
          Modal::begin([
             'header'=>'ประเภท',
             'id'=>'modal',
             'size'=>'modal-sg',
         ]);
         echo "<div id='modalContent'></div>";
          Modal::end();

          Modal::begin([
             'header'=>'ยืนยันการลบ',
             'id'=>'modaldelete',
             'size'=>'modal-sg',
             'class'=>'danger'

         ]);
         echo "<div id='modalContent'></div>";
          Modal::end();
           ?>
           <?php Pjax::begin(); ?>

  <?php
    $gridColumns = [
     [
         'label'=>'รหัส',
         'attribute'=>'type_id',
         'value'=>function ($model, $key, $index, $widget) {
             return $model->type_id;
         },
         'width'=>'10%',
         'filterWidgetOptions'=>[
             'showDefaultPalette'=>false,

         ],
         'vAlign'=>'middle',
         'hAlign'=>'center',
         'format'=>'raw',

     ],
     [
         'label'=>'ชื่อประเภท',
         'attribute'=>'type_name',
         'value'=>function ($model, $key, $index, $widget) {
             return $model->type_name;
         },
         'width'=>'30%',
         'filterWidgetOptions'=>[
             'showDefaultPalette'=>false,

         ],
         'vAlign'=>'middle',
         'format'=>'raw',

     ],
     [
         'label'=>'คำอธิบาย',
         'attribute'=>'type_discription',
         'value'=>function ($model, $key, $index, $widget) {
             return $model->type_discription;
         },
         'width'=>'60%',
         'filterWidgetOptions'=>[
             'showDefaultPalette'=>false,

         ],
         'vAlign'=>'middle',
         'format'=>'raw',

     ],

     [
       //index.php?r=staff%2Fview&staff_id='.$model->staff_id.'&staff_name='.$model->staff_name.'
                        'class' => '\kartik\grid\ActionColumn',
                       //'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>',
                       'template' => '{update},{deleteconfirm}',
                       'buttons' => [


                       'view' => function ($url, $model) {
                             return  Html::button('<i class="glyphicon glyphicon-eye-open"></i>',['value'=>Url::to($url),'class'=>'activity-view-link']);
                              /*  [
                                  'type'=>'button',
                                  'href'=>$url,
                                  'title'=>Yii::t('kvgrid', 'เรียกดู'),
                                  'class'=>'activity-view-link',
                                  'onclick'=>'$("#pModal").modal("show")
                                             .find(".modal-content")
                                             .load($(this).attr("href"));'
                                ]*/

                         },
                       'update' => function ($url, $model) {
                           return  Html::button('<i class="glyphicon glyphicon-pencil"></i>',  ['value'=>Url::to($url),'class'=>'activity-update-link']);
                           /*Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                              [
                                'id'=>'modal-button',
                                'type'=>'button',
                                'href'=>'index.php?r=staff%2Fview&staff_id='.$model->staff_id.'&staff_name='.$model->staff_name,
                                'title'=>Yii::t('kvgrid', 'แก้ไข'),
                                'class'=>'btn btn-warning',
                                'value'=>Url::to($url),

                              ]) ; */
                       },
                       'deleteconfirm' => function ($url, $model) {

                            return  Html::button('<i class="glyphicon glyphicon-remove"></i>',
                             ['value'=>Url::to($url),
                             'class'=>'activity-delete-link',

                             ]);

                       },
                     'delete' => function ($url, $model) {

                         return  Html::button('<i class="glyphicon glyphicon-remove"></i>',
                            [
                              'type'=>'button',
                              'href'=>$url,
                              'title'=>Yii::t('kvgrid', 'ลบ'),
                              'class'=>'btn btn-danger',
                              'data-confirm' => Yii::t('yii', 'ต้องการลบข้อมูลใช่หรือไม่?'),
                              'data-method' => 'post',
                            ]) ;

                    }
                   ],
    ],
    /*  [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{info}',
                'buttons' => [
                    'info' => function ($url, $model) {
                                     return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url , ['class' => 'view', 'data-pjax' => '0']);
                                },
                ],

     ]*/
    ];
    echo GridView::widget([
      'dataProvider'=> $dataProvider,
      'bordered'=>false,
        'striped'=>false,
        'condensed'=>false,
         'responsive'=>true,
      'columns' => $gridColumns,
      'pjax'=>true,
      'pjaxSettings'=>[
          'neverTimeout'=>true,
      ],
      'toolbar'=> [
              ['content'=>


                  Html::button('<i class="glyphicon glyphicon-plus"> เพิ่มประเภท</i>',  ['value'=>Url::to('index.php?r=helpdesktype/create'),'class' => 'btn btn-success','id'=>'modalButton']). ' '.
                  Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Refresh'])
              ],
              '{export}',
              '{toggleData}',
          ],
      'panel'=>[
             'type'=>GridView::TYPE_PRIMARY,
             'heading'=>'<b>ประเภท</b>',
         ],
         'persistResize'=>false,
  ]);




   ?>
   <?php PJax::end(); ?>

</div>
