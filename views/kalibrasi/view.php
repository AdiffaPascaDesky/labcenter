<?php use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var yii\web\View $this */
/* @var app\models\Kalibrasi $model */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kalibrasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kalibrasi-view">
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
            'no_kalibrasi',
            'tgl_kalibrasi',
            'tgl_terbit',
            'rencana_kalibrasi',
            'id_vendor',
            'harga',
            'skema',
            'ket:ntext',
            [
                'attribute' => 'dokumen',
                'format' => 'raw',
                'value' => function ($model) {
                    if (!empty($model->dokumen)) {
                        return Html::a('Lihat Dokumen', $model->dokumen, ['target' => '_blank']);
                    }
                    return 'Tidak ada dokumen yang diunggah.';
                },
            ],
            'status',
        ],
    ]) ?>
</div>