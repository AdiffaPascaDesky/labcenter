<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AlatSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id2') ?>

    <?= $form->field($model, 'kode_alat') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'pos') ?>

    <?php // echo $form->field($model, 'tgl_beli') ?>

    <?php // echo $form->field($model, 'id_vendor') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'id_lab') ?>

    <?php // echo $form->field($model, 'id_penjab') ?>

    <?php // echo $form->field($model, 'kondisi') ?>

    <?php // echo $form->field($model, 'asal_alat') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'doc') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
