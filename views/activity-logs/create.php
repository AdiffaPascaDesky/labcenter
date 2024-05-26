<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ActivityLogs $model */

$this->title = 'Create Activity Logs';
$this->params['breadcrumbs'][] = ['label' => 'Activity Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
