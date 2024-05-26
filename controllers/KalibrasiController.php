<?php

namespace app\controllers;

use app\models\Kalibrasi;
use app\models\KalibrasiSearch;
use yii\web\Controller;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * KalibrasiController implements the CRUD actions for Kalibrasi model.
 */
class KalibrasiController extends Controller
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
     * Lists all Kalibrasi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KalibrasiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kalibrasi model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kalibrasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
    $model = new Kalibrasi(); 
    // dd($this->request);
    if ($this->request->isPost) { 
        $model->dokumen = UploadedFile::getInstance($model, 'dokumen');

        // Pastikan gambar dan dokumen diunggah
        if ( $model->dokumen) {
            // Tetapkan nama unik untuk gambar dan dokumen
            $docFileName = Yii::$app->security->generateRandomString() . '.' . $model->dokumen->extension;

            // Simpan dokumen ke direktori '/uploads/doc/'
            $model->dokumen->saveAs(Yii::getAlias('@webroot/uploads/doc/') . $docFileName);

            // Simpan path file ke dalam model
            $model->dokumen = '/uploads/doc/' . $docFileName;
             
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

    /**
     * Deletes an existing Kalibrasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kalibrasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Kalibrasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatestatus($id){
        // dd($id);
        // $data = Kalibrasi::findOne($id);
        // dd($data);
        Yii::$app->db->createCommand("UPDATE kalibrasi SET status='selesai' WHERE id=".$id)->execute();
        // if ($data !== null) {
        //     // $data['status'] = 'selesai';
        //     $data->update(['status' => 'selesai']);
        //     dd($data);
        //     $a = 'berhasil';
        // } 
        // dd($a);
        return $this->redirect(['kalibrasi/index']);
    }
    protected function findModel($id)
    {
        if (($model = Kalibrasi::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionViewdocument($id){
        $model = $this->findModel($id);

        if ($model && !empty($model->dokumen)) {
            $filePath = Yii::getAlias('@webroot') . '/' . $model->dokumen;
            if (file_exists($filePath)) {
                return Yii::$app->response->sendFile($filePath);
            }
    }
    throw new \yii\web\NotFoundHttpException('The requested file does not exist.');
    }
    
}