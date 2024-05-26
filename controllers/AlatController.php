<?php

namespace app\controllers;

use app\models\Alat;
use app\models\AlatSearch;
use GuzzleHttp\Psr7\Query;
use webvimark\modules\UserManagement\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * AlatController implements the CRUD actions for Alat model.
 */
class AlatController extends Controller
{
    /**
     * @inheritDoc
     */
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

    /**
     * Lists all Alat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlatSearch(); 
        $dataProvider =  (new \yii\db\Query())
        ->select('*')
        ->from('alat')
        ->all();
        for ($i=0; $i < count($dataProvider); $i++) { 
            $a = (new \yii\db\Query()) 
            ->from('kalibrasi')
            ->where(['id' => $dataProvider[$i]['id'], 'status' => 'belum'])
            ->count();
            $b = (new \yii\db\Query()) 
            ->from('maintenance')
            ->where(['id' => $dataProvider[$i]['id'], 'status' => "belum"])
            ->count();
            $c = (new \yii\db\Query()) 
            ->from('pinjam_eksternal')
            ->where(['id' => $dataProvider[$i]['id'], 'status' => "pending"])
            ->count();
            $d = (new \yii\db\Query()) 
            ->from('pinjam_internal')
            ->where(['id' => $dataProvider[$i]['id'], 'status' => "pending"])
            ->count();
            if ($a > 0) { 
                $dataProvider[$i]['status_lainnya'] = 'kalibrasi';
            }
            if ($b > 0) { 
                $dataProvider[$i]['status_lainnya'] = 'maintenance';
            }
            if ($c > 0) { 
                $dataProvider[$i]['status_lainnya'] = 'pinjam_eksternal';
            }
            if ($d > 0) { 
                $dataProvider[$i]['status_lainnya'] = 'pinjam_internal';
            } 
            if ($a < 1 && $b < 1 && $c < 1 && $d < 1) {
                $dataProvider[$i]['status_lainnya'] = 'Tersedia';
                
            }
        }
        // dd($dataProvider);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alat model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
{
    $model = $this->findModel($id);
    
    // Mengambil data kalibrasi
    $kalibrasiQuery = (new \yii\db\Query())
        ->select('kalibrasi.*, vendor.nama as vendor')
        ->from('kalibrasi')
        ->leftJoin('vendor', 'kalibrasi.id_vendor = vendor.id')
        ->where(['kalibrasi.id' => $id]);
    $kalibrasi = $kalibrasiQuery->all();
    
    // Mengambil data maintenance
    $maintenanceQuery = (new \yii\db\Query())
        ->select('maintenance.*, vendor.nama as vendor')
        ->from('maintenance')
        ->leftJoin('vendor', 'maintenance.id_vendor = vendor.id')
        ->where(['maintenance.id' => $id]);
    $maintenance = $maintenanceQuery->all();
    
    return $this->render('view', [
        'model' => $model,
        'kalibrasi' => $kalibrasi,
        'maintenance' => $maintenance,
    ]);
}


    /**
     * Creates a new Alat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
{
    (Yii::$app->request->post());

    $model = new Alat();
    // dd($this->request);
    if ($this->request->isPost) {
        $model->gambar = UploadedFile::getInstance($model, 'gambar');
        $model->doc = UploadedFile::getInstance($model, 'doc');

        // Pastikan gambar dan dokumen diunggah
        if ($model->gambar && $model->doc) {
            // Tetapkan nama unik untuk gambar dan dokumen
            $gambarFileName = Yii::$app->security->generateRandomString() . '.' . $model->gambar->extension;
            $docFileName = Yii::$app->security->generateRandomString() . '.' . $model->doc->extension;

            // Simpan gambar ke direktori '/uploads/'
            $model->gambar->saveAs(Yii::getAlias('@webroot/uploads/') . $gambarFileName);
            // Simpan dokumen ke direktori '/uploads/doc/'
            $model->doc->saveAs(Yii::getAlias('@webroot/uploads/doc/') . $docFileName);

            // Simpan path file ke dalam model
            $model->gambar = 'uploads/' . $gambarFileName;
            $model->doc = '/uploads/doc/' . $docFileName;

            // Load data post ke model dan simpan
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}

    // public function actionCreate()
    // {
    //     $model = new Alat();
    //     // dd($this->request);
    //     if ($this->request->isPost) {
    //         $model->gambar = UploadedFile::getInstance($model, 'gambar');

    //         if ($model->gambar = UploadedFile::getInstance($model, 'gambar')) {
    //             $model->gambar->saveAs('uploads/' . $model->gambar);
    //             //save the path in DB..
    //             $model->gambar = 'uploads/' . $model->gambar;
    //             // $this->request->post('Alat')['gambar'] = ;
    //             $data = $this->request->post();
    //             $data['Alat']['gambar'] =$model->gambar;
    //             // dd($data);
    //             if ($model->load($data) && $model->save()  ) {
    //                 return $this->redirect(['view', 'id' => $model->id]);
    //             }
    //         }
           
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing Alat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
{
    // Memuat model Alat berdasarkan id
    $model = $this->findModelupdate($id);
    // dd($model);
    // Memuat data dari permintaan POST ke model Alat
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        // Jika penyimpanan berhasil, redirect ke halaman view dengan id yang sesuai
        return $this->redirect(['view', 'id' => $model->id]);
    }

    // Jika tidak, tampilkan kembali halaman update dengan model yang dimuat
    return $this->render('update', [
        'model' => $model,
    ]);
}


    /**
     * Deletes an existing Alat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModelupdate($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Alat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    // Melakukan kueri untuk mendapatkan data alat berdasarkan ID yang diberikan
    // Bergabung dengan tabel-tabel lain (vendor, users, lab, bagian, sub_bagian) menggunakan left join
    // Memilih kolom-kolom yang diinginkan dari setiap tabel
    // dan hanya mengambil satu baris data sesuai dengan ID yang diberikan
    protected function findModel($id)
    {
        
        $query = new Alat();
        if (($model = Alat::find()
        ->select('alat.*, lab.nama AS lab , vendor.nama as vendor , user.username as pj, user.phone as kontak_pj ,bagian.nama as bagian,sub_bagian.nama as sub_bagian')
        ->from('alat')
        ->leftJoin('vendor', 'alat.id_vendor = vendor.id')
        ->leftJoin('user', 'alat.id_penjab = user.id')
        ->leftJoin('lab', 'alat.id_lab = lab.id')
        ->leftJoin('bagian', 'lab.id_bag =  bagian.id')
        ->leftJoin('sub_bagian', 'sub_bagian.id = lab.id_subbag')
        ->where(['alat.id' => $id])
        ->asArray()
        ->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelupdate($id)
    {
        
        if (($model = Alat::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
