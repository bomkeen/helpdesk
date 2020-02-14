<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\dialog\Dialog;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HelpdeskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Helpdesks';
//$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helpdesk-index">


<?php //echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
<?php // Html::a('Create Helpdesk', ['create'], ['class' => 'btn btn-success'])  ?>

    </p>

    <?php
    $gridColumns = [

        //['class' => 'kartik\grid\SerialColumn'],

        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'enableRowClick' => true,
            'width' => '20px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {

                return //'hello world';//Yii::$app->controller->renderPartial('_expand-row-details', ['model'=>$model]);
                        '
                  <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>

                    </thead>
                    <tbody>
                      <tr>
                        <th class="col-md-3"><span class="glyphicon glyphicon-list"></span><b> รายละเอียด</b></th>
                        <th class="col-md-3"><span class="glyphicon glyphicon-list"></span><b> ผู้รับงาน</b></th>
                        <th class="col-md-6 danger"><span class="glyphicon glyphicon-list"></span><b> สถานะการดำเนินงาน</b></th>
                      </tr>
                      <tr>
                        <td class="col-md-3">' . $model->messages . '</td>
                        <td class="col-md-3">' . $model->stafffullname . '</td>
                            <td class="col-md-6 ">' . $model->resultname->result_name . '</td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                  ';
            },
            'detailAnimationDuration' => 100,
            'expandIcon' => '<span class="fa fa-angle-right"></span>',
            'collapseIcon' => '<span class="fa fa-angle-down"></span>',
        //'headerOptions'=>['class'=>'kartik-sheet-style']
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'tickets_id',
            'label' => 'No.',
            //   'value' => 'booking_id',
            'value' => function($model, $key, $index, $column) {
                return "<b>" . $model->tickets_id . "</b>";
            },
            'format' => 'raw',
            'hAlign' => 'middle',
            'vAlign' => 'middle',
            'visible' => true,
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'order_date',
            'label' => 'วันที่แจ้งซ่อม',
            //'value' => 'booking_date',
            'value' => function($model, $key, $index, $column) {
                //return $model->title.$model->firstname.' '.$model->lastname;
                // Yii::$app->formatter->locale = 'th-TH';
                //return Yii::$app->formatter->asDate('2014-01-01');
                return "<span class=\"glyphicon glyphicon-calendar\"></span>&nbsp;วันที่ &nbsp;&nbsp;<span style=\"color:#ff5050;\">" . $model->orderday . "</span>";
            },
            'format' => 'raw',
            'hAlign' => 'middle',
            'vAlign' => 'middle',
            'group' => true,
            'groupedRow' => true, // move grouped column to a single grouped row
            'groupOddCssClass' => 'kv-grouped-row', // configure odd group cell css class
            'groupEvenCssClass' => 'kv-grouped-row', // configure even group cell css class
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'subject',
            'label' => 'เรื่อง',
            'value' => 'subject',
            'format' => 'raw',
            'hAlign' => 'middle',
            'vAlign' => 'middle',
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'department',
            'label' => 'แผนก',
            'value' => 'depfullname',
            'format' => 'raw',
            'hAlign' => 'middle',
            'vAlign' => 'middle',
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'priority',
            'label' => 'ความเร่งด่วน',
            'value' => 'priority',
            'format' => 'raw',
            'hAlign' => 'middle',
            'vAlign' => 'middle',
        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'result',
            'label' => 'สถานะ',
            'hAlign' => 'middle',
            'vAlign' => 'middle',
            'format' => 'html',
            'value' => function($model, $key, $index, $column) {

                if ($model->result == 1) {
                    return "<div class='progress'>
  <div class='progress-bar progress-bar-danger progress-bar-striped active' role='progressbar' style='width:33%'>
    รอดำเนินการ
  </div></div>";
                } else if ($model->result >= 2 && $model->result < 999) {
                    return "<div class='progress'>
<div class='progress-bar progress-bar-danger progress-bar-striped active' role='progressbar' style='width:33%'>
    รอดำเนินการ
  </div>  
<div class='progress-bar progress-bar-warning progress-bar-striped active' role='progressbar' style='width:33%'>
    อยู่หระว่างการดำเนินการ
  </div></div>";
                } else if ($model->result == 999) {
                    return "<div class='progress'>
<div class='progress-bar progress-bar-danger progress-bar-striped active' role='progressbar' style='width:33%'>
    รอดำเนินการ
  </div>
<div class='progress-bar progress-bar-warning progress-bar-striped active' role='progressbar' style='width:33%'>
    อยู่หระว่างการดำเนินการ
  </div>   
<div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar' style='width:34%'>
    ซ่อม/ดำเนินการแล้ว
  </div></div>";
                }
            }
        ],
        /*   [
          'class' => 'kartik\grid\DataColumn',
          'attribute' => 'assignee',
          'label' => 'ผู้รับงาน',
          'value'=>function($model, $key, $index, $column){
          //return $model->title.$model->firstname.' '.$model->lastname;
          // Yii::$app->formatter->locale = 'th-TH';
          //return Yii::$app->formatter->asDate('2014-01-01');

          if(isset($model->staffname->staff_name)){
          return  $model->staffname->staff_name;
          }else{
          return  '';
          }


          },
          'format'=>'raw',

          'format'=>'raw',
          'hAlign'=>'middle',
          'vAlign'=>'middle',

          ], */
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'completedate',
            'label' => 'วันที่เสร็จ',
            'value' => 'Completeday',
            'format' => 'raw',
            'hAlign' => 'middle',
            'vAlign' => 'middle',
        ],
        [
            'class' => '\kartik\grid\ActionColumn',
            //'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>',
            'template' => '{info}',
            'buttons' => [
                'info' => function ($url, $model) {
                    return Html::a('<a class="btn btn-xs btn-success active" href="index.php?r=helpdesk%2Fview&id=' . $model->tickets_id . '">เรียกดู</a>', $url, [
                                'title' => Yii::t('app', 'Info'),
                    ]);
                }
                    ],
                ],
                [
                    'class' => '\kartik\grid\ActionColumn',
                    //'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>',
                    'template' => '{update}',
                    'buttons' => [
//                                 'info' => function ($url, $model) {
//                                     return Html::a('<a class="btn btn-xs btn-success active" href="index.php?r=helpdesk%2Fupdate&id='.$model->tickets_id.'">แก้ไข</a>', $url, [
//                                                 'title' => Yii::t('app', 'Info'),
//                                     ]);
//                                 }
                    ],
                ],
            ];
//
            echo GridView::widget([
                'id' => 'helpdesk',
                ///// ทำตารางไม่ responsive
                'responsiveWrap' => false,
                ///////////
                'dataProvider' => $dataProvider,
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                'columns' => $gridColumns,
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'hover' => true,
                'pjax' => true,
                'bordered' => true,
                'striped' => false,
                'condensed' => false,
                'responsive' => true,
                'rowOptions' => ['class' => 'pointer-cursor'],
                'tableOptions' => ['class' => 'align-middle'],
                //'enableRowClick' => true,
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<i class="glyphicon glyphicon-book"></i>&nbsp;&nbsp;&nbsp;ติดตามงานซ่อม / บริการ',
                ],
                'pjax' => true,
                'toolbar' => [
                    ['content' =>
                        Html::a('<i class="glyphicon glyphicon-pencil"></i> แจ้งซ่อม', ['create'], ['data-pjax' => 0, 'class' => 'btn btn-primary', 'title' => 'แจ้งซ่อม']) . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Refresh'])
                    ],
                    '{export}',
                    '{toggleData}',
                ],
            ]);
            ?>
        </div>
            <?php
            echo Dialog::widget([
                'options' => ['draggable' => false], // custom options
            ]);
            $js = <<< JS
$("#btn-alert").on("click", function() {
           krajeeDialog.alert("This is a Krajee Dialog Alert!")
       });
$("#btn-prompt").on("click", function() {
           krajeeDialog.prompt({label:"Provide reason", placeholder:"Upto 30 characters..."}, function (result) {
                  alert("Great!");
               if (result) {
                   alert("Great! You provided a reason: " + result);
               } else {
                   alert("Oops! You declined to provide a reason!");
               }
           });
       });
$("#btn-test").click(function(){
                   alert('test')
               });
JS;
// register your javascript
            $this->registerJs($js);
            ?>
