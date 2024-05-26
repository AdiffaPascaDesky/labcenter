<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PinjamEksternal $model */

$this->title = 'Update Pinjam Eksternal: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pinjam Eksternals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pinjam-eksternal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
