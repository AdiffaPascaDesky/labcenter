<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Kalibrasi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kalibrasi-form">
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id_alat')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Alat::find()->all(), 'id', 'nama'),
        ['prompt' => 'Select Alat']
    ) ?>

   <?= $form->field($model, 'no_kalibrasi')->textInput(['maxlength' => true]) ?>
   

    <?= $form->field($model, 'tgl_kalibrasi')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]) ?>

<?= $form->field($model, 'tgl_terbit')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]) ?>

<?= $form->field($model, 'rencana_kalibrasi')->widget(DatePicker::classname(), [
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
    <input type="hidden" value="belum" name="Kalibrasi[status]"> 
    <?= $form->field($model, 'harga')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'skema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?> 
    <div class=" mb-3 mt-3 d-flex flex-column">
    <label for="" class="me-3">Dokumen</label>
        <div class="input-group">
            <input type="file" class="form-control" name="Kalibrasi[dokumen]" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
