<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Alat $model */

$this->title = 'Data Alat';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Alat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="d-flex gap-5 pe-2">
        <div class=" col-4">
            <div class="w-full bg-white shadow-sm border  p-3 ">
                <img src="/<?= $model['gambar'] ?>" style="width:100%" alt="">
            </div>
        </div>
        <div class="flex-fill">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center with-border">
                    <h3 class="card-title"><a href="http://localhost:8080/alat"
                            class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;
                            Alat</a></h3>
                    <div class="card-tools">
                        <a href="https://alat" class="btn btn-flat btn-danger btn-sm"><i
                                class="fa fa-print"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td colspan="2" class="text-center"><strong>Detail Alat</strong></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Kode Alat</strong></td>
                                <td><?= $model['kode_alat'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Nama Alat</strong></td>
                                <td><?= $model['nama'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%  "><strong>Bagian</strong></td>
                                <td><?= $model['bagian'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Sub Bagian</strong></td>
                                <td><?= $model['sub_bagian']?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Laboratorium</strong></td>
                                <td><?= $model['lab']?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Penanggung Jawab</strong></td>
                                <td><?= $model['pj']?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Kontak Penanggung Jawab</strong></td>
                                <td><?= $model['kontak_pj']?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Tgl Pembelian</strong></td>
                                <td><?= $model['tgl_beli']?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Vendor</strong></td>
                                <td><?= $model['vendor']?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Kondisi</strong></td>
                                <td><?= $model['kondisi']?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Keterangan</strong></td>
                                <td><?= $model['ket']?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Dokumen</strong></td>
                                <td>
                                    <iframe src="<?= $model['doc']?>" frameborder="0"></iframe>
                                </td>
                                <!-- <td></td> -->
                            </tr>

                            <!-- Riwayat Kalibrasi -->
                            <tr>
                                <td colspan="2" class="text-center"><strong>Riwayat Kalibrasi</strong></td>
                            </tr>
                            <?php foreach ($kalibrasi as $item): ?>
                                <tr>
                                <td width="30%"><strong>Tgl Kalibrasi</strong></td>
                                <td><?= $item['tgl_kalibrasi'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Vendor</strong></td>
                                <td><?= $item['vendor'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Biaya</strong></td>
                                <td><?= $item['harga'] ?></td>
                            </tr> 
                            <tr>
                                <td width="30%"><strong>Keterangan</strong></td>
                                <td><?= $item['ket'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Dokumen</strong></td>
                                <td>
                                <iframe src="<?= $item['dokumen'] ?>" frameborder="0"></iframe>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            
                            <tr>
                                <td colspan="2" class="text-center"><strong>Riwayat Maintenance</strong></td>
                            </tr>
                            <?php foreach ($maintenance as $item): ?>
                            <tr>
                                <td width="30%"><strong>Tgl Maintenance</strong></td>
                                <td><?= $item['tgl_mt'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Vendor</strong></td>
                                <td><?= $item['vendor'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Biaya</strong></td>
                                <td><?= $item['harga'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Kerusakan</strong></td>
                                <td><?= $item['kerusakan'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Teknisi</strong></td>
                                <td><?= $item['teknisi'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Keterangan</strong></td>
                                <td><?= $item['ket'] ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Dokumen</strong></td>
                                <td>
                                <iframe src="<?= $item['dokumen'] ?>" frameborder="0"></iframe>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <!-- Riwayat Peminjaman -->
                            <tr>
                                <td colspan="2" class="text-center"><strong>Riwayat Peminjaman</strong></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Tgl Pinjam</strong></td>
                                <td>2023-11-09</td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Tgl Kembali</strong></td>
                                <td>2023-11-10</td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Peminjam</strong></td>
                                <td>individu</td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Tujuan</strong></td>
                                <td>tes</td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Keterangan</strong></td>
                                <td></td>
                            </tr>
                            <!-- Add a button for viewing the document -->


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
  
 
</div>