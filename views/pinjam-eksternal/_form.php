<?php

use app\models\Alat;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PinjamEksternal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pinjam-eksternal-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id')->dropDownList(
    Alat::find() 
        ->select(['nama', 'id'])
        ->indexBy('id')
        ->column(), 
    ['prompt' => 'Pilih Alat','options' => ['id' => 'id']]
) ?>
    <input type="hidden" name="PinjamEksternal[id_alat]" id="id_alat" value="<?= $model['id_alat'] ?>"> 

    <?= $form->field($model, 'institusi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tujuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_pinjam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_selesai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dokumen')->textInput(['maxlength' => true]) ?>
 

    <?= $form->field($model, 'timestampp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<script lang="javascript">
 var dropdown = document.getElementById("pinjameksternal-id");
 var hiddenInput = document.getElementById("id_alat");
dropdown.addEventListener("change", function() {
    var selectedValue = this.value; 
    hiddenInput.value = selectedValue; 
});
</script>
</div>
