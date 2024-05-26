<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PinjamEksternal $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pinjam Eksternals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pinjam-eksternal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_alat',
            'institusi',
            'tujuan',
            'tgl_pinjam',
            'tgl_selesai',
            'nama',
            'hp',
            'email:email',
            'alamat',
            'ket:ntext',
            'dokumen',
            'status',
            'timestampp',
        ],
    ]) ?>

</div>
