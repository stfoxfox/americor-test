<?php

namespace app\controllers;

use app\models\search\HistorySearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'export' => ['post']
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
        $model = new HistorySearch();
        $dataProvider = $model->search(\Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }


    /**
     * @param integer $customerId
     * @param string $exportType
     * @return string
     */
    public function actionExport()
    {
        $filename = 'history';
        $filename .= '-' . time();

        $model = new HistorySearch();

        return $this->render('export', [
            'dataProvider' => $model->search(\Yii::$app->request->queryParams),
            'filename' => $filename
        ]);
    }
}
