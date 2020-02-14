<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseVarDumper;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Select2;
use app\models\Department;
use app\models\Helpdesk;
use app\models\Helpdeskpriority;
use app\models\Helpdeskresult;
use app\models\Status;
use app\models\Tiggersubject;
use app\models\Helpdeskasset;
use app\models\Staff;
use app\models\Helpdesktype;
use kartik\widgets\TypeaheadBasic;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
use kartik\markdown\MarkdownEditor;
use kartik\form\ActiveField;
use kartik\datecontrol\DateControl;


//use kartik\editable\Editable;
/* @var $this yii\web\View */
/* @var $model app\models\Helpdesk */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
// widget with default options
echo Dialog::widget(
/*
  [
  'libName' => 'krajeeDialogCust', // a custom lib name
  'options' => [  // customized BootstrapDialog options
  'size' => Dialog::SIZE_LARGE, // large dialog text
  'type' => Dialog::TYPE_SUCCESS, // bootstrap contextual color
  'title' => 'ยืนยันการแจ้งซ่อม',
  'message' => 'This is an entirely customized bootstrap dialog from scratch. Click buttons below to test this:',
  'buttons' => [
  [
  'id' => 'cust-btn-1',
  'label' => 'Button 1',
  'action' => new JsExpression("function(dialog) {

  }")
  ],
  [
  'id' => 'cust-btn-2',
  'label' => 'Button 2',
  'action' => new JsExpression("function(dialog) {
  dialog.setTitle('Title 2');
  dialog.setMessage('This is a custom message for button number 2');
  }")
  ],

  ]
  ]
  ] */
);

$form = kartik\widgets\ActiveForm::begin(
                [
                    'id' => 'Ticket-form',
                    'enableAjaxValidation' => false,
                    'fieldConfig' => [
                        'autoPlaceholder' => true
                    ]
        ]);
?>
<div class="helpdesk-form">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
            <b>รายละเอียด</b>
        </div>
        <div class="panel-body">
              <div class="row">
        <div class="col-md-6">
            <?php
            $data = [
                'เปิดไม่ติด'
            ];
            echo '<label class="control-label">เรื่อง</label>';
            echo $form->field($model, 'subject')->widget(TypeaheadBasic::classname(), [
                'data' => ArrayHelper::map(Tiggersubject::find()->all(), 'subject_name', 'subject_name'),
                'options' => ['placeholder' => 'แจ้งปัญหาเรื่อง ...'],
                'pluginOptions' => [
                    'highlight' => true,
                    'width' => '100px',
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo '<label class="control-label">รายละเอียด</label>'; ?>
            <?= $form->field($model, 'messages')->textarea(['rows' => 6]) ?>
            <?php
            //        echo $form->field($model, 'messages')->widget(
            //        	MarkdownEditor::classname(),
//          	['height' => 300, 'encodeLabels' => false]
//          );
            ?>
        </div>
        <div class="col-md-6">

        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php
            echo '<label class="control-label">แผนก</label>';
            echo $form->field($model, 'department')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Department::find()->all(), 'depcode', 'depname'),
                'options' => [
                    'placeholder' => 'เลือกแผนก ...',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                    'width' => '300px',
                ],
            ]);
            ?>
        </div>
        <div class="col-md-8">
<?php
echo '<label class="control-label">ความเร่งด่วน</label>';
$model->priority = 'ต่ำ';
echo $form->field($model, 'priority')->radioButtonGroup(ArrayHelper::map(Helpdeskpriority::find()->all(), 'priority', 'priority'), [
    'class' => 'btn-group-sm',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-warning']]
]);
?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
<?php
echo '<label class="control-label">ประเภท</label>';
echo $form->field($model, 'type')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Helpdesktype::find()->all(), 'type_id', 'type_name'),
    'options' => [
        'placeholder' => 'เลือกประเภท ...',
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'width' => '300px',
    ],
]);
?>
        </div>
        <div class="col-md-8">
            <?php
            ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo '<label class="control-label">ผุ้แจ้ง</label>'; ?>
<?= $form->field($model, 'raisedby')->textInput() ?>
        </div>
        <div class="col-md-6">
<?php
//$form->field($model, 'order_date')->hiddenInput(['value'=>$model->order_date==Null? date('y-m-d'):$this->order_date])->label(false);
?>
        </div>
    </div>
    <div class="form-group">
            <?php //Html::submitButton($model->isNewRecord ? 'ส่งเรื่อง' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'btn-submit',"style"=>"display: none"]) ?>

        <button type="button" id="btn-custom" class="btn btn-success">ส่งเรื่อง</button>
    </div>
        </div>
    </div>
 

   
        <div id="demo" class="<?php 
        if ($user_role == 'Admin') {
		echo 'collapse in';
	}
	else if ($user_role == 'Staff') {
		echo 'collapse in';
	}
	else {
		echo 'collapse out';
	}
        ?>">
          
            <div class="panel panel-info">
                <div class="panel-heading">
                 
                <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                รายละเอียดการซ่อม (เฉพาะช่าง)
            
                </div>
                <div class="panel-body">
                    <div class="row">
                <div class="col-md-6">
<?php echo '<label class="control-label">สาเหตุ</label>' ?>

<?php
echo Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 2,
    'attributes' => [
        'cause' => ['type' => Form::INPUT_TEXTAREA
            , 'label' => 'สาเหตุการเสีย'
            , 'size' => 'lg'
            , 'options' => ['rows' => 10
                , 'disabled' => $user_role < 2 ? true : false
                , 'placeholder' => 'อาการเสีย']
        ],
    ]
]);
?>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
<?php echo '<label class="control-label">วิธีแก้ปัญหา</label>'; ?>
<?php
echo Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 2,
    'attributes' => [
        'resolution' => ['type' => Form::INPUT_TEXTAREA
            , 'label' => 'สาเหตุการเสีย'
            , 'size' => 'lg'
            , 'options' => ['rows' => 10
                , 'disabled' => $user_role == 1 ? true : false
                , 'placeholder' => 'สาเหตุการเสีย']
        ],
    ]
]);
?>

                    <?php
                    //        echo $form->field($model, 'messages')->widget(
                    //        	MarkdownEditor::classname(),
                    //          	['height' => 300, 'encodeLabels' => false]
                    //          );
                    ?>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
<?php
echo '<label class="control-label">ผลการซ่อม</label>';
echo $form->field($model, 'result')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Helpdeskresult::find()->all(), 'result_id', 'result_name'),
    'options' => [
        'placeholder' => 'ผลการซ่อม...'
        , 'disabled' => $user_role == 1 ? true : false
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'width' => '300px',
    ],
]);
?>
                </div>
                <div class="col-md-8">
                    <?php
                    echo '<label class="control-label">สถานะ</label>';

                    echo $form->field($model, 'status')->radioButtonGroup(ArrayHelper::map(Status::find()->all(), 'status_id', 'status_name'), [
                        'class' => 'btn-group-sm',
                        'disabledItems' => [$user_role == 1 ? 1 : 0, $user_role == 1 ? 2 : 0]
                            //    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-primary']]
                    ]);
                    ?>

                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <?php
                    $data1 = [
                        '-'
                    ];
                    echo '<label class="control-label">เลขที่ครุภัณฑ์</label>';
                    echo $form->field($model, 'asset_number')->widget(TypeaheadBasic::classname(), [
                        'data' => ArrayHelper::map(Helpdeskasset::find()->all(), 'asset_number', 'asset_number'),
                        'options' => ['placeholder' => 'เลขที่ครุภัณฑ์ (ไม่ต้องใส่กรณีที่ไม่มี) ...', 'disabled' => $user_role == 1 ? true : false],
                        'pluginOptions' => [
                            'highlight' => true,
                            'width' => '100px',
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">


                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
<?php
echo '<label class="control-label">ผู้รับงาน</label>';
echo $form->field($model, 'assignee')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Staff::find()->all(), 'staff_id', 'staff_name'),
    'options' => [
        'placeholder' => 'ผู้รับงาน...'
        , 'disabled' => $user_role == 1 ? true : false
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'width' => '300px',
    ],
]);
?>
                </div>
                <div class="col-md-6">


                    <?= $form->field($model, 'lastupdate')->hiddenInput(['value' => date('y-m-d')])->label(false); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p><?php
                    echo '<label class="control-label">วันที่เสร็จ</label>';
                    echo $form->field($model, 'completedate')->widget(DateControl::classname(), [
                        'type' => DateControl::FORMAT_DATE,
                        'ajaxConversion' => false,
                        //    'displayTimezone'=>'Asia/Bangkok',
                        'displayFormat' => 'dd/MM/yyyy',
                        'saveFormat' => 'yyyy-MM-dd',
                        'Locale' => 'th_TH',
                        //          'saveTimezone'=>'UTC',
                        'options' => [
                            'pluginOptions' => [
                                'autoclose' => true
                            ]
                        ]
                    ]);
                    ?></p></br>  </br>
                </div>
                <div class="col-md-6">
                    </br>  </br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                        <?php //Html::submitButton($model->isNewRecord ? 'ส่งเรื่อง' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'btn-submit',"style"=>"display: none"]) ?>

                    <button type="button" id="btn-custom1" class="btn btn-success" <?php echo $user_role == 1 ? 'disabled' : '' ?>>บันทึก</button>

                </div>
                </div>
            </div> 
                </div>
            </div>
           
        </div>
  
    
<?php ActiveForm::end(); ?>

</div>

                    <?php
                    $js = <<< JS
$("#btn-custom").on("click", function() {
  krajeeDialog.confirm("กดปุ่ม OK เพื่อส่งซ่อม", function (result) {

      if (result) {
          $("#Ticket-form").submit();
      } else {
           alert("ยกเลิกการแจ้งซ่อม");
      }
  });
       });
       $("#btn-custom1").on("click", function() {
         krajeeDialog.confirm("กดปุ่ม OK เพื่อส่งซ่อม", function (result) {

             if (result) {
                 $("#Ticket-form").submit();
             } else {
                  alert("ยกเลิกการแจ้งซ่อม");
             }
         });
              });
JS;

// register your javascript
                    $this->registerJs($js);
                    ?>



<?php
/*    // javascript for triggering the dialogs
  $js = <<< JS
  $("#Ticket-form").on("submits",function(e) {
  krajeeDialog.confirm("Are you sure you want to proceed?", function (result) {
  if (result) {
  $("#Ticket-forsm").submit();
  } else {
  alert("ยกเลิกการแจ้งซ่อม");
  }
  });
  });
  $("#btn-alert").on("click", function() {
  krajeeDialog.alert("This is a Krajee Dialog Alert!")
  });
  $("#btn-test").click(function(){
  alert('test')
  });
  $("#btn-saves").on("click", function() {
  krajeeDialog.prompt({label:"กรุณาระบุหมายเลขโทรศัพท์ของแผนก", placeholder:"1180"}, function (result) {
  if (result) {
  submit();

  } else {
  alert("ยกเลิกการแจ้งซ่อม");
  }
  });
  });
  $("#btn-custom").on("click", function() {
  krajeeDialogCust.dialog(
  "Welcome to a customized Krajee Dialog! Click the close icon on the top right to exit.",
  function(result) {
  // do something
  }
  );.

  });
  $("#btn-savse").on("click",function(){
  krajeeDialog.confirm("ยืนยันการบันทึกข้อมูลการซ่อม", function (result) {
  if (result) {
  $("#btn-submit").click();
  } else {
  alert("ยกเลิกการแจ้งซ่อม");
  }
  });
  $("#btn-dialog").on("click", function() {
  krajeeDialog.dialog(
  'This is a <b>custom dialog</b>. The dialog box is <em>draggable</em> by default and <em>closable</em> ' +
  '(try it). Note that the Ok and Cancel buttons will do nothing here until you write the relevant JS code ' +
  'for the buttons within "options". Exit the dialog by clicking the cross icon on the top right.',
  function (result) {alert(result);}
  );
  });

  JS;

  // register your javascript
  $this->registerJs($js);
 */
?>
