<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SubBagian $model */

$this->title = 'Create Sub Bagian';
$this->params['breadcrumbs'][] = ['label' => 'Sub Bagians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-bagian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
