<?php

use app\models\Maintenance;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MaintenanceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Maintenance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintenance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h6 class="mb-0 text-uppercase"></h6>
    <hr>
    <div class="d-flex justify-content-end py-3">
        <a href="/maintenance/create" class="bg-primary btn text-white">
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
                            <th>Tgl Maintenance</th>
                            <th>Tgl Selesai</th>
                            <th>Harga</th>
                            <th>Kerusakan</th>
                            <th>Teknisi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($dataProvider->models)): ?>
                            <?php foreach($dataProvider->models as $item): ?>
                                <tr>
                                <td><?= $item['alat']['nama'] ?? 'N/A' ?></td>
                                    <td><?= $item['tgl_mt'] ?? 'N/A' ?></td>
                                    <td><?= $item['tgl_selesai'] ?? 'N/A' ?></td>
                                    <td><?= $item['harga'] ?? 'N/A' ?></td>
                                    <td><?= $item['kerusakan'] ?? 'N/A' ?></td>
                                    <td><?= $item['teknisi'] ?? 'N/A' ?></td>
                                    <td>
                        <?php
                        $status = $item['status'];
                        $class = '';
                        switch ($status) {
                            case 'active':
                                $class = 'badge bg-success';
                                break;
                            case 'Inactive':
                                $class = 'badge bg-warning';
                                break;
                            case 'Unknown':
                                $class = 'badge bg-secondary';
                                break;
                            // Tambahkan kasus lain jika diperlukan
                        }
                        ?>
                        <span class="<?= $class ?>">
                            <?= $status ?>
                        </span>
                    </td>
                                    <td>
                                        <div class="d-flex gap-3 justify-content-center items-center">
                                            <a href="/maintenance/view?id=<?= $item['id'] ?>" class="d-flex text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-eye text-primary">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
                                            <a href="/maintenance/update?id=<?= $item['id'] ?>" class="d-flex text-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-edit text-warning">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                            </a>
                                            <button data-bs-toggle="modal" data-bs-target="#item-<?= $item['id'] ?>"
                                                class="d-flex  bg-transparent border-0 p-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-trash-2 text-danger">
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
                                                            <form action="/maintenance/delete?id=<?= $item['id'] ?>" method="post">
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

