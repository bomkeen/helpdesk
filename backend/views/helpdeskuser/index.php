<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use app\models\Department;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ใช้งาน';
?>

<div id="content" class="container-fluid fill">




      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



      <?php
      Modal::begin([
         'header'=>'ผู้ใช้งาน',
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
           'label'=>'เลขที่',
           'attribute'=>'id',
           'value'=>function ($model, $key, $index, $widget) {
               return $model->id;
           },
           'width'=>'8%',
           'filterWidgetOptions'=>[
               'showDefaultPalette'=>false,

           ],
           'vAlign'=>'middle',
           'hAlign'=>'center',
           'format'=>'raw',

       ],
       [
           'label'=>'Username',
           'attribute'=>'username',
           'value'=>function ($model, $key, $index, $widget) {
               return $model->username;
           },
           'width'=>'20%',
           'filterWidgetOptions'=>[
               'showDefaultPalette'=>false,

           ],
           'vAlign'=>'middle',
           'format'=>'raw',

       ],
       [
           'label'=>'ชื่อ - สกุล',
           'attribute'=>'fullname',
           'value'=>function ($model, $key, $index, $widget) {
               return $model->fullname;
           },
           'width'=>'20%',
           'filterWidgetOptions'=>[
               'showDefaultPalette'=>false,

           ],
           'vAlign'=>'middle',
           'format'=>'raw',

       ],
                   [
           'label'=>'แผนก',
           'attribute'=>'hosinfo_department_id',
           'value'=>function ($model, $key, $index, $widget) {
              
               $dep=  Department::findOne($model->hosinfo_department_id);
               return $dep->depname;
           },
           'width'=>'30%',
           'filterWidgetOptions'=>[
               'showDefaultPalette'=>false,

           ],
           'vAlign'=>'middle',
           'format'=>'raw',

       ],
       [
           'label'=>'สถานะ',
           'attribute'=>'status',
           'hAlign' => 'ALIGN_CENTER' ,
           'vAlign' => 'ALIGN_MIDDLE' ,
           'value'=>function ($model, $key, $index, $widget) {
               if ($model->status == '10') {
                  return '<center><h4><span class="glyphicon glyphicon-ok-sign fa-5x" aria-hidden="true" style="color:green"></span></h4></center>';
               }else{
                  return '<center><h4><span class="glyphicon glyphicon-remove-sign  fa-lg" aria-hidden="true" style="color:red"></span></h4></center>';
               }
           },
           'width'=>'10%',
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
                      /* 'delete' => function ($url, $model) {

                            return  Html::button('<i class="glyphicon glyphicon-remove"></i>',
                             ['value'=>Url::to($url),
                             'class'=>'activity-delete-link',

                             ]);

                       }*/
                     ],
      ],

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
                      Html::button('<i class="glyphicon glyphicon-plus"> เพิ่มผู้ใช้งาน</i>',  ['value'=>Url::to('index.php?r=helpdeskuser/create'),'class' => 'btn btn-success','id'=>'modalButton']). ' '.
                      Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Refresh'])
                  ],
                  '{export}',
                  '{toggleData}',
              ],
          'panel'=>[
                 'type'=>GridView::TYPE_PRIMARY,
                 'heading'=>'<b>ผู้ใช้งาน</b>',
             ],
             'persistResize'=>false,
      ]);




       ?>
       <?php PJax::end(); ?>

  </div>




</div>
