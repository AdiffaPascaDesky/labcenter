<?php

use app\models\PinjamEksternal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PinjamEksternalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pinjam Eksternals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pinjam-eksternal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h6 class="mb-0 text-uppercase"></h6>
    <hr>
    <div class="d-flex justify-content-end py-3">
        <a href="/pinjam-eksternal/create" class="bg-primary btn text-white">
            Tambah
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Alat</th>
                            <th>Nama Alat</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Selesai</th>
                            <th>Nama Peminjam</th>
                            <th>Status</th>
                            <th>Ket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dataProvider->models)): ?>
                            <?php foreach ($dataProvider->models as $item): ?>
                                <tr>
                                    <td><?= $item['id_alat'] ?? 'N/A' ?></td>
                                    <td><?= $item['alat']['nama'] ?? 'N/A' ?></td>
                                    <td><?= $item['tgl_pinjam'] ?? 'N/A' ?></td>
                                    <td><?= $item['tgl_selesai'] ?? 'N/A' ?></td>
                                    <td><?= $item['nama'] ?? 'N/A' ?></td>
                                    <td> <button data-bs-toggle="modal" data-bs-target="#edit-<?= $item['id'] ?>"
                                    class="d-flex btn btn-warning border-0 " >
                                    <?= $item['status'] ?? 'N/A' ?>
                                </button></td>
                            <td><?= $item['ket'] ?? 'N/A' ?></td>
                            <div class="modal fade" id="edit-<?= $item['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">asdasda?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="pinjam-eksternal/updatelainnya?id=<?= $item['id'] ?>" method="post">
                                        <div class="card px-3 py-2">
                                            <div class="card-body">
                                                <label for="asda" class="fs-6 mb-2">Pilih Status</label>
                                                <select class="form-select mb-3" id="asda" name="status" aria-label="Default select example">
                                                    <option selected>Pilih Status</option>
                                                    <option value="selesai">Selesai</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="rejected">Rejected</option>
                                                </select>
                                                <label for="asda" class="fs-6 mb-2">Keterangan</label>

                                                <input class="form-control mb-3" type="text" placeholder="Masukkan Keterangan" name="ket" aria-label="default input example">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button> 
                                                <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken); ?>
                                                <input type="hidden" value="<?= $item['id'] ?>" name="id">
                                                <button type="submit" class="btn btn-primary">Save</button> 
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                                    <td class="d-flex gap-3 justify-content-center items-center">
                                        <a href="/pinjam-eksternal/update?id=<?= $item['id'] ?>" class="d-flex text-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-edit text-warning">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </a>
                                        <button data-bs-toggle="modal" data-bs-target="#item-<?= $item['id'] ?>"
                                            class="d-flex bg-transparent border-0 p-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-trash-2 text-danger">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
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
                                                            data-bs-dismiss="modal">Tidak</button>
                                                        <form action="/pinjam-eksternal/delete?id=<?= $item['id'] ?>" method="post">
                                                            <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken); ?>
                                                            <input type="hidden" value="<?= $item['id'] ?>" name="id">
                                                            <button type="submit" class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
