<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PinjamInternal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pinjam-internal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_alat')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_lab')->textInput() ?>

    <?= $form->field($model, 'tujuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_pinjam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_selesai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dokumen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'timestampp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
