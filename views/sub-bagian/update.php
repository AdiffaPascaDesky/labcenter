<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SubBagian $model */

$this->title = 'Update Sub Bagian: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sub Bagians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-bagian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
