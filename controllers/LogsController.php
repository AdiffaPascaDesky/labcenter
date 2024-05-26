<?php

namespace app\controllers;

use app\models\ActivityLogs;
use app\models\ActivityLogsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class LogsController extends Controller
{
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }
    public function actionIndex(){
        return $this->render('index');
    }
}