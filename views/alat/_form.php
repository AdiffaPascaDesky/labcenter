<?php


use webvimark\modules\UserManagement\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lab;
use app\models\Vendor;
use app\models\Users;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var app\models\Alat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alat-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'kode_alat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pos')->dropDownList(['Tetap' => 'Tetap', 'Mobile' => 'Mobile',], ['prompt' => 'Pilih Posisi Alat']) ?>

    <?= $form->field($model, 'tgl_beli')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'id_vendor')->dropDownList(Vendor::find()->select(['nama', 'id'])->indexBy('id')->column(), ['prompt' => 'Pilih Vendor']) ?>

    <?= $form->field($model, 'harga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_lab')->dropDownList(Lab::find()->select(['nama', 'id'])->indexBy('id')->column(), ['prompt' => 'Pilih Laboratium']) ?>

    <?= $form->field($model, 'id_penjab')->dropDownList(
    User::find()
        ->innerJoin('auth_assignment', 'user.id = auth_assignment.user_id')
        ->andWhere(['auth_assignment.item_name' => 'PJ'])
        ->select(['username', 'user.id'])
        ->indexBy('id')
        ->column(), 
    ['prompt' => 'Pilih Penanggung Jawab']
) ?>

    <?= $form->field($model, 'kondisi')->dropDownList([
        'baik' => 'Baik',
        'rusak' => 'Rusak',
        'menunggu perbaikan' => 'Menunggu Perbaikan',
    ], ['prompt' => 'Pilih kondisi']) ?>


    <?= $form->field($model, 'asal_alat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>

    <div class=" mb-3 mt-3 d-flex flex-column">
        <label for="" class="me-3">Dokumen</label>
        <div class="input-group">
            <input type="file" class="form-control" name="Alat[doc]" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
    </div>

    <div class=" mb-3 mt-3 d-flex flex-column">
        <label for="" class="me-3">Gambar</label>
        <div class="input-group">
            <input type="file" class="form-control" name="Alat[gambar]" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
    </div>

    <?= $form->field($model, 'status')->dropDownList(['active' => 'active', 'Inactive' => 'Inactive', 'Unknown' => 'Unknown'], ['prompt' => 'Status Alat']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>