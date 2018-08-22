<?php

namespace app\controllers;

use Yii;
use app\models\PekerjaMedis;
use app\models\PekerjaMedisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
/**
 * PekerjaMedisController implements the CRUD actions for PekerjaMedis model.
 */
class PekerjaMedisController extends Controller
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
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all PekerjaMedis models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main_utama';
        $searchModel = new PekerjaMedisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PekerjaMedis model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PekerjaMedis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    public function actionCreate()
    {
        $model = new PekerjaMedis();
        $model->password = self::randomPassword();
        if ($model->load(Yii::$app->request->post())) {

            // if ($model->posisi == "dokter") {

                $model->username = strtolower(preg_replace("/\s+/","",$model->nama).mt_rand(10,200));
                $model->save();
                // echo"<pre>";print_r($model);exit();
            
                //kalo dokter semakin banyak, ubah mt_rand
                $user = new User();
                $user->password = $model->password;

                $user->name  =  $model->username;
                $user->password = Yii::$app->security->generatePasswordHash($user->password);
                if($model->posisi == 1){
                    $user->user_type = "1";
                }
                if($model->posisi == 4){
                    $user->user_type = "2";
                }
                if($model->posisi == 2){
                    $user->user_type = "3";
                }
                if($model->posisi == 3){
                    $user->user_type = "4";
                }

                $user->save();
                $model->user_id = $user->user_id;
                $model->save();

            //     return $this->redirect(['view', 'id' => $model->id]);
            // }
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PekerjaMedis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PekerjaMedis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PekerjaMedis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PekerjaMedis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PekerjaMedis::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
