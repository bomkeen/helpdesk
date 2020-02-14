 <?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Helpdesk */

$this->title = 'รายการแจ้งซ่อมที่ ' . $model->tickets_id;
//$this->params['breadcrumbs'][] = ['label' => 'Helpdesks', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helpdesk-view">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-edit"></span>  แก้ไข', ['update', 'id' => $model->tickets_id], ['class' => 'btn btn-primary']) ?>
        
        <?php 
        if($userrole!='User'){
        echo Html::a('<span class="glyphicon glyphicon-remove"></span>  ลบ', ['delete', 'id' => $model->tickets_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); 
        }
        ?>
          <?= Html::a('<span class="glyphicon glyphicon-print"></span>  พิมพ์', ['report', 'id' => $model->tickets_id], ['class' => 'btn btn-warning']) ?>
          <?= Html::a('<span class="glyphicon glyphicon-home"></span>  ย้อนกลับ', ['index'], ['class' => 'btn btn-success']) ?>
    </p>


<?php
// DetailView Attributes Configuration
$attributes = [
    [
        'group'=>true,
        'label'=>'<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> รายละเอียดการแจ้งซ่อม',
        'rowOptions'=>['class'=>'info']
    ],

    [
        'columns' => [
            [
              'label'=>'เลขที่ใบแจ้งซ่อม',
              'attribute'=>'tickets_id',
              'format'=>'raw',
              'value'=>$model->tickets_id,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
            ],
        ],
    ],
    [
        'columns' => [
            [
              'label'=>'วันที่แจ้ง',
              'attribute'=>'orderday',
              'format'=>'raw',
              'value'=>$model->orderday,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
            ],
        ],
    ],
    [
        'columns' => [
            [
              'label'=>'ความเร่งด่วน',
              'attribute'=>'priority',
              'format'=>'raw',
              'value'=>$model->priority,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
            ],
        ],
    ],
    [
        'columns' => [
            [
              'label'=>'หน่วยงานที่แจ้งซ่อม',
              'attribute'=>'department',
              'format'=>'raw',
              'value'=>$model->depfullname,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
            ],

        ],
    ],

    [
        'columns' => [
          [
            'attribute'=>'raisedby',
            'label'=>'ผู้แจ้ง',
            'format'=>'raw',
            'value'=>$model->raisedby,
            'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],
    [
        'columns' => [
            [
              'label'=>'หัวข้อ',
              'attribute'=>'subject',
              'format'=>'raw',
              'value'=>$model->subject,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
            ],
        ],
    ],
    [
        'columns' => [
          [
              'attribute'=>'messages',
              'label'=>'รายละเอียด',
              'format'=>'raw',
              'value'=>$model->messages,
              'displayOnly'=>true,
              'type'=>DetailView::INPUT_HTML5_INPUT,
              'options'=>['rows'=>4],
              'widgetOptions' => [
                   'pluginOptions' => [
                       'onText' => 'Yes',
                       'offText' => 'No',
                   ]
               ],
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],
    [
        'columns' => [
          [
              'attribute'=>'type',
              'label'=>'ประเภท',
              'format'=>'raw',
              'value'=>$model->typename->type_name,
              'displayOnly'=>true,
              'type'=>DetailView::INPUT_HTML5_INPUT,
              'options'=>['rows'=>4],
              'widgetOptions' => [
                   'pluginOptions' => [
                       'onText' => 'Yes',
                       'offText' => 'No',
                   ]
               ],
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],
    [
        'group'=>true,
        'label'=>'<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> รายละเอียดการซ่อม',
        'rowOptions'=>['class'=>'danger']
    ],
    [
        'columns' => [
            [
              'label'=>'ผู้รับงาน',
              'attribute'=>'assignee',
              'format'=>'raw',
              'value'=>$model->stafffullname,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
            ],
        ],
    ],
    [
        'columns' => [
          [
              'attribute'=>'asset_number',
              'label'=>'เลขที่ครุภัณฑ์',
              'format'=>'raw',
              'value'=>$model->asset_number,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],
    [
        'columns' => [
            [
              'label'=>'วันที่ซ่อมเสร็จ',
              'attribute'=>'completedate',
              'format'=>'raw',
              'value'=>$model->Completeday,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
            ],
        ],
    ],
    [
        'columns' => [
          [
              'attribute'=>'status',
              'label'=>'สถานะ',
              'format'=>'raw',
              'value'=>$model->statusname->status_name,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],

    [
        'columns' => [
          [
              'attribute'=>'cause',
              'label'=>'สาเหตุการเสีย',
              'format'=>'raw',
              //'value'=>'cause',
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],
    [
        'columns' => [
          [
              'attribute'=>'cause',
              'label'=>'สาเหตุ',
              'format'=>'raw',
              //'value'=>'cause',
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],
    [
        'columns' => [
          [
              'attribute'=>'resolution',
              'label'=>'วิธีแก้ปัญหา',
              'format'=>'raw',
              //'value'=>'cause',
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],

    [
        'columns' => [
          [
              'attribute'=>'result',
              'label'=>'ผลการซ่อม',
              'format'=>'raw',
              'value'=>$model->resultname->result_name,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],
    [
        'columns' => [
          [
              'attribute'=>'lastupdate',
              'label'=>'ปรับปรุงเมื่อ',
              'format'=>'raw',
              'value'=>$model->lastupdateday,
              'displayOnly'=>true,
              'labelColOptions'=>['style'=>'width:15%'],
              'valueColOptions'=>['style'=>'width:85%']
          ],
        ],
    ],
];

// View file rendering the widget
echo DetailView::widget([
                  'model'=>$model,
                  'condensed'=>true,
                  'mode'=>DetailView::MODE_VIEW,
                  'panel'=>[
                      'heading'=>'<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> รายละเอียดการแจ้งซ่อม' ,
                      'type'=>DetailView::TYPE_PRIMARY,
                  ],
                  'attributes'=> $attributes,
                   'bordered' =>true,
                   'striped' => true,
                   'condensed' => true,
                   'responsive' =>true,
                   'hover' => true,
                   'hAlign'=>'left',
                   'enableEditMode'=>false,
                   'vAlign'=>'top',
                   'fadeDelay'=>true,
    'deleteOptions'=>[ // your ajax delete parameters
        'params' => ['id' => 1000, 'kvdelete'=>true],
    ],
    'container' => ['id'=>'kv-demo'],
    'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
]);

 ?>
</div>
