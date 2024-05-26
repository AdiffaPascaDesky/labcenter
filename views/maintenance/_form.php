<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Maintenance $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="maintenance-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'id_alat')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Alat::find()->all(), 'id', 'nama'),
        ['prompt' => 'Select Alat']
    ) ?>
    
<?= $form->field($model, 'tgl_mt')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]) ?>

<?= $form->field($model, 'tgl_selesai')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]) ?>

<?= $form->field($model, 'id_vendor')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Vendor::find()->all(), 'id', 'nama'),
        ['prompt'=>'Pilih Vendor']
    ) ?>

    <?= $form->field($model, 'harga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kerusakan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dokumen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teknisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
