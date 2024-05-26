<?php

namespace app\controllers;
 
use Yii;
use yii\db\Expression;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $totalpeminjamaneksternal = (new Query())
        ->from('pinjam_eksternal')
        ->where(['status' => 'pending'])
        ->count();
        $totalpeminjamaninternal = (new Query())
        ->from('pinjam_internal')
        ->where(['status' => 'pending'])
        ->count();
        $totalpeminjaman = $totalpeminjamaneksternal + $totalpeminjamaninternal;
        $totalmaintanance = (new Query())
        ->from('maintenance')
        ->where(['status' => 'belum'])
        ->count();
        $totalkalibrasi = (new Query())
        ->from('kalibrasi')
        ->where(['status' => 'belum'])
        ->count();
        $totalalat = (new Query())
        ->from('alat') 
        ->count();
        $year = 2024;
        $kalibrasi = (new Query())
        ->select([
            'year' => new Expression('YEAR(tgl_kalibrasi)'),
            'month'=> new Expression('MONTH(tgl_kalibrasi)'),
            'jumlah' => new Expression('COUNT(*)')
        ])
        ->from('kalibrasi')
        ->where(new Expression('YEAR(tgl_kalibrasi) = :year', [':year' => $year]))
        ->groupBy([
            new Expression('YEAR(tgl_kalibrasi)'),
            new Expression('MONTH(tgl_kalibrasi)'),
        ])
        ->all(); 
        $maintenance = (new Query())
        ->select([
            'year' => new Expression('YEAR(tgl_mt)'),
            'month'=> new Expression('MONTH(tgl_mt)'),
            'jumlah' => new Expression('COUNT(*)')
        ])
        ->from('maintenance')
        ->where(new Expression('YEAR(tgl_mt) = :year', [':year' => $year]))
        ->groupBy([
            new Expression('YEAR(tgl_mt)'),
            new Expression('MONTH(tgl_mt)'),
        ])
        ->all(); 
        $pinjameksternal = (new Query())
        ->select([
            'year' => new Expression('YEAR(tgl_pinjam)'),
            'month'=> new Expression('MONTH(tgl_pinjam)'),
            'jumlah' => new Expression('COUNT(*)')
        ])
        ->from('pinjam_eksternal')
        ->where(new Expression('YEAR(tgl_pinjam) = :year', [':year' => $year]))
        ->groupBy([
            new Expression('YEAR(tgl_pinjam)'),
            new Expression('MONTH(tgl_pinjam)'),
        ])
        ->all(); 
        $pinjaminternal = (new Query())
        ->select([
            'year' => new Expression('YEAR(tgl_pinjam)'),
            'month'=> new Expression('MONTH(tgl_pinjam)'),
            'jumlah' => new Expression('COUNT(*)')
        ])
        ->from('pinjam_internal')
        ->where(new Expression('YEAR(tgl_pinjam) = :year', [':year' => $year]))
        ->groupBy([
            new Expression('YEAR(tgl_pinjam)'),
            new Expression('MONTH(tgl_pinjam)'),
        ])
        ->all(); 
        $data =  array_merge($pinjameksternal, $pinjaminternal, $kalibrasi, $maintenance);
        $combinedData = [];
 
        foreach ($data as $entry) {
            $key = $entry['year'] . '-' . $entry['month'];
            if (!isset($combinedData[$key])) {
                $combinedData[$key] = [
                    'year' => $entry['year'],
                    'month' => $entry['month'],
                    'jumlah' => 0,
                ];
            }
            $combinedData[$key]['jumlah'] += $entry['jumlah'];
        }
         
        $finalData = array_values($combinedData);
       
        // dd($finalData);
        return $this->render('index', [
            'totalpeminjamaneksternal' => $totalpeminjamaneksternal,
            'totalpeminjamaninternal' => $totalpeminjamaninternal,
            'finaldata' => $finalData,
            'totalpeminjaman' => $totalpeminjaman,
            'totalmaintanance' => $totalmaintanance,
            'totalkalibrasi' => $totalkalibrasi,
            'totalalat'=> $totalalat,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
