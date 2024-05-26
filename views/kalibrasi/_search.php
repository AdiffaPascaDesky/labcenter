<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\KalibrasiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kalibrasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_alat') ?>

    <?= $form->field($model, 'no_kalibrasi') ?>

    <?= $form->field($model, 'tgl_kalibrasi') ?>

    <?= $form->field($model, 'tgl_terbit') ?>

    <?php // echo $form->field($model, 'rencana_kalibrasi') ?>

    <?php // echo $form->field($model, 'id_vendor') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'skema') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'dokumen') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
