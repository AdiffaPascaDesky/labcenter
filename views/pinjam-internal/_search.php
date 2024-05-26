<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PinjamInternalSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pinjam-internal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_alat') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_lab') ?>

    <?= $form->field($model, 'tujuan') ?>

    <?php // echo $form->field($model, 'tgl_pinjam') ?>

    <?php // echo $form->field($model, 'tgl_selesai') ?>

    <?php // echo $form->field($model, 'dokumen') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'timestampp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
