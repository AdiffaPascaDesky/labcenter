<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lab $model */

$this->title = 'Create Lab';
$this->params['breadcrumbs'][] = ['label' => 'Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
