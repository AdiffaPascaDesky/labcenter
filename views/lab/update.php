<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lab $model */

$this->title = 'Update Lab: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
