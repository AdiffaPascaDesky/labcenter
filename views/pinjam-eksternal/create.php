<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PinjamEksternal $model */

$this->title = 'Create Pinjam Eksternal';
$this->params['breadcrumbs'][] = ['label' => 'Pinjam Eksternals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pinjam-eksternal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
