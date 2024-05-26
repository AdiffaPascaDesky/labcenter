<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<head>
     <!--plugins-->
     <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet">
	<script src="assets/js/pace.min.js"></script>
    <!--Styles-->   
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/dark-theme.css" rel="stylesheet">
    <link href="assets/css/semi-dark-theme.css" rel="stylesheet">
    <link href="assets/css/minimal-theme.css" rel="stylesheet">
    <link href="assets/css/shadow-theme.css" rel="stylesheet">
     
  </head>
        </div>
        <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kode Alat</th>
                            <th>Nama Alat</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Selesai</th>
                            <th>Nama Peminjam</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($peminjaman as $item): ?>
                        <tr role="row" class="odd">
                            <td width="30" class="sorting_1">1</td>
                            <td><?= $item['alat_id'] ?></td>
                            <td><?= $item['nama_alat'] ?></td>
                            <td><?= $item['tgl_pinjam'] ?></td>
                            <td><?= $item['tgl_selesai'] ?></td>
                            <td><?= $item['name_peminjam'] ?></td>
                            <td><?= $item['status'] ?></td>
                            <td><?= $item['ket'] ?></td>
                        </tr>
                       <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        