<?php

use app\models\Kalibrasi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\KalibrasiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kalibrasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="/assets/css/extra-icons.css" rel="stylesheet">
<div class="kalibrasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h6 class="mb-0 text-uppercase"></h6>
    <hr>
    <div class="d-flex justify-content-end py-3">
        <a href="/kalibrasi/create" class="bg-primary btn text-white">
            Tambah
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Alat</th>
                            <th>No Kalibrasi</th>
                            <th>Tgl kalibrasi</th>
                            <th>Tgl Terbit</th>
                            <th>Skema</th>
                            <th>Ket</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dataProvider->models)): ?>
                        <?php foreach($dataProvider->models as $item): ?>
                        <tr>
                            <td><?= $item['alat']['nama'] ?? 'N/A' ?></td>
                            <td><?= $item['no_kalibrasi'] ?? 'N/A' ?></td>
                            <td><?= $item['tgl_kalibrasi'] ?? 'N/A' ?></td>
                            <td><?= $item['tgl_terbit'] ?? 'N/A' ?></td>
                            <td><?= $item['skema'] ?? 'N/A' ?></td>
                            <td><?= $item['ket'] ?? 'N/A' ?></td>
                            <td>
                                <div class="d-flex gap-3 justify-content-center items-center">
                                    <?php if ($item['status'] == 'belum'): ?>
                                    <a href="/kalibrasi/updatestatus?id=<?= $item['id'] ?>" class="d-flex"
                                        style="color:none;text-decoration:none;">
                                        <i class="animated text-success bx bx-badge-check"
                                            style="font-size:22px;margin-top:-4px"></i>
                                    </a>
                                    <?php else: ?>
                                    <?php endif; ?>
                                    <a href="/kalibrasi/viewdocument?id=<?= $item['id'] ?>" class="d-flex text-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text text-info">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <line x1="10" y1="9" x2="8" y2="9"></line>
            </svg>
        </a>    
                                    <a href="/kalibrasi/update?id=<?= $item['id'] ?>" class="d-flex text-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit text-warning">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>
                                    <button data-bs-toggle="modal" data-bs-target="#item-<?= $item['id'] ?>"
                                        class="d-flex  bg-transparent border-0 p-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash-2 text-danger">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>

                                    </button>
                                    <div class="modal fade" id="item-<?= $item['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">Yakin ya?</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">y</button>
                                                    <form action="/kalibrasi/delete?id=<?= $item['id'] ?>"
                                                        method="post">
                                                        <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken); ?>
                                                        <input type="hidden" value="<?= $item['id'] ?>" name="id">
                                                        <button type="submit" class="btn btn-primary">yakin</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="7">Tidak ada data yang tersedia.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>