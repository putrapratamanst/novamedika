<?php

namespace app\controllers;

use Yii;
use app\models\Pasien;
use app\models\Tindakan;
use app\models\PasienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Helper;
/**
 * PasienController implements the CRUD actions for Pasien model.
 */
class PasienController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pasien models.
     * @return mixed
     */
    public function actionPrintResep($id)
    {   
        $this->layout = "print";
         return $this->render('print_resep', [
             'model' => $this->findModel($id),
        ]);
    } 

    public function actionPrintMini($id)
    {   
        $this->layout = "print";
         return $this->render('print_mini', [
             'model' => $this->findModel($id),
        ]);
    }
    
    public function actionIndex()
    {
        $this->layout = 'main_utama';
        $searchModel = new PasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

      public function actionPrint($id)
    {   
        $this->layout = 'print';
        return $this->render('print', [
             'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Pasien model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        
        $tindakan = Tindakan::find()->where(['id_pasien'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'tindakan'=>$tindakan
        ]);
    }

    public function actionMaxId()
    {
        $id = Pasien::find()->select('id')->max('id');
        
        return $id+1;
    }
    /**
     * Creates a new Pasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $this->layout = "main_utama";
        $model = new Pasien();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal_lahir = Helper::converDate($model->tanggal_lahir);
            $model->save();

            \Yii::$app->session->setFlash('info', "Data Pasien berhasil dibuat");
             return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = "main_utama";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('info', "Data Pasien telah di update");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pasien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/site/index']);
    }

    /**
     * Finds the Pasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pasien::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
