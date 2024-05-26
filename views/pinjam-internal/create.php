<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PinjamInternal $model */

$this->title = 'Create Pinjam Internal';
$this->params['breadcrumbs'][] = ['label' => 'Pinjam Internals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pinjam-internal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
