<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PinjamInternal $model */

$this->title = 'Update Pinjam Internal: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pinjam Internals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pinjam-internal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
