<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\LoginForm2;
use app\models\Log;
use app\models\ContactForm;
use app\models\User;
use app\models\PekerjaMedis;
use app\models\PasienSearch;
use app\models\TindakanSearch;
use yii\data\ActiveDataProvider;

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
                    'logout' => ['get'],
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
        $this->layout = "main_utama";
        if(!Yii::$app->user->isGuest){

            // if(!Yii::$app->user->isGuest && Yii::$app->user->identity->user_type == 0 || Yii::$app->user->identity->user_type == 2 || Yii::$app->user->identity->user_type == 3){
            // if(!Yii::$app->user->isGuest && Yii::$app->user->identity->user_type == 0 ){
                $pasien     = new PasienSearch();
                $dataPasien = $pasien->searchIndex(Yii::$app->request->queryParams);


                $tindakan     = new TindakanSearch();
                $dataTindakan = $tindakan->search(Yii::$app->request->queryParams);


                return $this->render('index',[
                    'dataPasien'=>$dataPasien,
                    'dataTindakan'=>$dataTindakan,
                    'pasien'=>$pasien,
                    'tindakan'=>$tindakan,
                ]);
            // }
            $name = Yii::$app->user->identity->name;
            $dokter = PekerjaMedis::find()->select('username')->where(['username'=>$name])->one();
            if(!Yii::$app->user->isGuest && Yii::$app->user->identity->user_type == 1 && $dokter){
     
                $tindakan     = new TindakanSearch();
                $dataTindakan = $tindakan->searchDokter(Yii::$app->request->queryParams);


                return $this->render('dokter-index',[
                     'dataTindakan'=>$dataTindakan,
                     'tindakan'=>$tindakan,
                ]);
            }
        } else {
            return $this->redirect(['login']);
        }
    }  
    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {   
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $log = new Log();
        $log->login_time = date("Y:m:d h:i:s");
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $log->user_id = Yii::$app->user->identity->user_id;
            $log->save();
            return $this->redirect('/pasien/create');
            // return $this->redirect('index');
        }

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
        $logout = Log::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->orderBy('id DESC')->one();
        $logout->logout_time = date("Y:m:d h:i:s");
        $logout->save();

        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
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
