<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kalibrasi $model */

$this->title = 'Update Kalibrasi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kalibrasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kalibrasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
