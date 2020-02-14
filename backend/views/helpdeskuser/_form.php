<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\models\Department;
use yii\helpers\ArrayHelper;
use app\models\Helpdeskuser;
use backend\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model app\models\Helpdeskuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="helpdeskuser-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>
       <?= 
            $form->field($model, 'hosinfo_department_id')->widget(Select2::classname(), [
    'language' => 'th',
    'data' => ArrayHelper::map(Department::find()->all(), 'depcode', 'depname'),
    'options' => ['placeholder' => 'เลือกแผนก'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'password')->passwordinput() ?>


<?php
 
    $check=  Helpdeskuser::findOne(\Yii::$app->user->identity->getId());
//echo $check->role;
    if($check->role=='Admin'){
    ?>
<?= $form->field($model, 'role')->dropDownList(
                    ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'), ['prompt' => 'ระดับการเข้าใช้งาน']
            )
?>
    <?php } ; ?>  
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
