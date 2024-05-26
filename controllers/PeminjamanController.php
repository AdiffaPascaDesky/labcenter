<?php

namespace app\controllers;

use app\models\EmailTemplates;
use app\models\EmailTemplatesSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PeminjamanController extends Controller{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function actionIndex()
    {
        $queryinternal = new Query;
        $peminjaman_internal = $queryinternal->select('alat.nama as nama_alat, alat.id as alat_id, pinjam_internal.tgl_pinjam, pinjam_internal.tgl_selesai, pinjam_internal.ket, pinjam_internal.status, users.name as name_peminjam')
        ->from('pinjam_internal')
        ->leftJoin('alat', 'pinjam_internal.id_alat = alat.id')
        ->leftJoin('users', 'pinjam_internal.id_user = users.id')
        ->all();
        
        // $peminjaman_internal = $queryinternal->select('maintanance.*, alat.nama as nama_alat')
        // ->from('maintenance')
        // ->leftJoin('alat', 'pinjam_internal.id_alat = alat.id')
        // ->where('maintenance.tgl_selesai', null)
        // ->all();
        
        $queryeksternal = new Query;
        $peminjaman_eksternal = $queryeksternal->select('alat.nama as nama_alat, alat.id as alat_id, pinjam_eksternal.tgl_pinjam, pinjam_eksternal.tgl_selesai, pinjam_eksternal.ket, pinjam_eksternal.status, pinjam_eksternal.nama as name_peminjam')
        ->from('pinjam_eksternal')
        ->leftJoin('alat', 'pinjam_eksternal.id_alat = alat.id') 
        ->all();
        $peminjaman = array_merge($peminjaman_internal, $peminjaman_eksternal);
        usort($peminjaman, array($this, 'compareTanggal'));
        // dd($peminjaman);
        return $this->render('index', [ 
            'peminjaman' => $peminjaman
        ]);
    }
    public function compareTanggal($a, $b) {
        return strtotime($a['tgl_pinjam']) - strtotime($b['tgl_pinjam']);
    }
}