<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Alat $model */

$this->title = 'Tambah Alat';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Alat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
