<?php

namespace app\controllers;

use Yii;
use app\models\Tindakan;
use app\models\TindakanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TindakanController implements the CRUD actions for Tindakan model.
 */
class TindakanController extends Controller
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
     * Lists all Tindakan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TindakanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionKunjungan()
    {
        $this->layout = "main_utama";
        $searchModel = new TindakanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('kunjungan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Tindakan model.
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

    //begin rawat jalan
    public function actionIndexRawatJalan()
    {
        $this->layout = 'main_utama';
        $searchModel = new TindakanSearch();
        $dataProvider = $searchModel->searchRawatJalan(Yii::$app->request->queryParams);

        return $this->render('/tindakan/rawat_jalan/index_rawat_jalan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateRawatJalan()
    {
        $this->layout = 'main_utama';
        $model = new Tindakan();
        $model->scenario = "rawat-jalan";
        $title = "Rawat Jalan";
        $model->status = "0";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // \Yii::$app->session->setFlash('success', "Tindakan Medis berhasil dibuat");
            return $this->redirect(['view-rawat-jalan', 'id' => $model->id]);
        }

        return $this->render('rawat_jalan/create_rawat_jalan', [
            'model' => $model,
            'title' => $title,
        ]);
    }

    public function actionViewRawatJalan($id)
    {
        return $this->render('/tindakan/rawat_jalan/view_rawat_jalan', [
            'model' => $this->findModel($id),
        ]);
    } 
    // end rawat jalan

    // begin rawat inap
    public function actionIndexRawatInap()
    {
        $this->layout = 'main_utama';
        $searchModel = new TindakanSearch();
        $dataProvider = $searchModel->searchRawatInap(Yii::$app->request->queryParams);

        return $this->render('/tindakan/rawat_inap/index_rawat_inap', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateRawatInap()
    {
        $this->layout = 'main_utama';
        $model = new Tindakan();
        $title = "Rawat Inap";
        $model->status = "1";
        $model->scenario = "rawat-inap";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // \Yii::$app->session->setFlash('success', "Tindakan Medis berhasil dibuat");
            return $this->redirect(['view-rawat-inap', 'id' => $model->id]);
        }

        return $this->render('rawat_inap/create_rawat_inap', [
            'model' => $model,
            'title' => $title,
        ]);
    }
    public function actionViewRawatInap($id)
    {
        return $this->render('/tindakan/rawat_inap/view_rawat_inap', [
            'model' => $this->findModel($id),
        ]);
    }
    // end rawat inap

    public function actionIndexFisioterapis()
    {
        $this->layout = 'main_utama';
        $searchModel = new TindakanSearch();
        $dataProvider = $searchModel->searchFisioterapis(Yii::$app->request->queryParams);

        return $this->render('/tindakan/fisioterapis/index_fisioterapis', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreateFisioterapis()
    {
        $model = new Tindakan();
        $title = "Fisioterapis";
        $model->status = "2";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // \Yii::$app->session->setFlash('success', "Tindakan Medis berhasil dibuat");
            return $this->redirect(['view-fisioterapis', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'title' => $title,
        ]);
    }
    public function actionViewFisioterapis($id)
    {
        return $this->render('/tindakan/fisioterapis/view_fisioterapis', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionPrintRawatJalan($id)
    {   
        $this->layout = "print";
         return $this->render('print_rawat_jalan', [
             'model' => $this->findModel($id),
        ]);
    }

    public function actionPrintRawatInap($id)
    {   
        $this->layout = "print";
         return $this->render('print_rawat_inap', [
             'model' => $this->findModel($id),
        ]);
    }

    public function actionPrintResep($id)
    {   
        $this->layout = "print";
         return $this->render('print_resep', [
             'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Tindakan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "main_utama";
        $model = new Tindakan();
        $model->scenario = "tindakan";

        if ($model->load(Yii::$app->request->post())) {
            if ($model->status == 2){
                $model->tanggal_masuk = "0000:00:00";
                $model->tanggal_keluar = "0000:00:00";
                if (empty($model->rujukan)){
                    \Yii::$app->session->setFlash('danger', "Rumah Sakit RUjukan harus dipilih");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            } else {
                $model->rujukan = null;
            }

            if ($model->status == 1){
                $model->rujukan = null;
                if (empty($model->tanggal_masuk)){
                    \Yii::$app->session->setFlash('danger', "Tanggal masuk harus diisi");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
                // if (empty($model->tanggal_keluar)){
                //     $model->rujukan = null;
                //     \Yii::$app->session->setFlash('danger', "Tanggal keluar harus diisi");
                //     return $this->render('create', [
                //         'model' => $model,
                //     ]);
                // }
                // if (empty($model->tanggal_keluar && $model->tanggal_masuk)){
                //     $model->rujukan = null;
                //     \Yii::$app->session->setFlash('danger', "Tanggal masuk & keluar harus diisi");
                //     return $this->render('create', [
                //         'model' => $model,
                //     ]);
                // }

                if (empty($model->kategori_pasien_rawat_inap)){
                    $model->rujukan = null;
                    \Yii::$app->session->setFlash('danger', "Kategori Pasien harus diisi");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            } else {
                $model->tanggal_masuk = null;
                $model->tanggal_keluar = null;
                $model->kategori_pasien_rawat_inap = null;
            }
            
            if ($model->status == 0){
                $model->tanggal_masuk = "0000:00:00";
                $model->tanggal_keluar = "0000:00:00";
                $model->rujukan = null;
                if (empty($model->kategori_pasien_rawat_jalan)){
                    \Yii::$app->session->setFlash('danger', "Kategori Rawat Jalan tidak boleh kosong");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            } else {
                $model->kategori_pasien_rawat_jalan = null;
            }

            $model->save();
            \Yii::$app->session->setFlash('success', "Tindakan Medis berhasil ditambah");
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    

    

    /**
     * Updates an existing Tindakan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = "main_utama";
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
            if ($model->status == 2){
                $model->tanggal_masuk = "0000:00:00";
                $model->tanggal_keluar = "0000:00:00";
                $model->kategori_pasien_rawat_jalan=null;
                if (empty($model->rujukan)){
                    \Yii::$app->session->setFlash('danger', "Rumah Sakit Rujukan harus dipilih");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            } else {
                $model->rujukan = null;
            }

            if ($model->status == 1){
                $model->rujukan = null;
                $model->kategori_pasien_rawat_jalan = null;
                if (empty($model->tanggal_masuk)){
                    \Yii::$app->session->setFlash('danger', "Tanggal masuk harus diisi");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
                if (empty($model->tanggal_keluar)){
                    $model->rujukan = null;
                    $model->kategori_pasien_rawat_jalan = null;
                    \Yii::$app->session->setFlash('danger', "Tanggal keluar harus diisi");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
                if (empty($model->tanggal_keluar && $model->tanggal_masuk)){
                    $model->rujukan = null;
                    $model->kategori_pasien_rawat_jalan = null;
                    \Yii::$app->session->setFlash('danger', "Tanggal masuk & keluar harus diisi");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

                if (empty($model->kategori_pasien_rawat_inap)){
                    $model->rujukan = null;
                    $model->kategori_pasien_rawat_jalan;
                    \Yii::$app->session->setFlash('danger', "Kategori Pasien harus diisi");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                } else {
                    $model->kategori_pasien_rawat_inap = null;
                    $model->tanggal_masuk = null;
                    $model->keluar = null;
                }
            }

            if ($model->status == 0){
                $model->tanggal_masuk = "0000:00:00";
                $model->tanggal_keluar = "0000:00:00";
                $model->rujukan = null;
                if (empty($model->kategori_pasien_rawat_jalan)){
                    \Yii::$app->session->setFlash('danger', "Kategori Rawat Jalan tidak boleh kosong");
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            } else {
                $model->kategori_pasien_rawat_jalan = null;
            }

            $model->save();
             // \Yii::$app->session->setFlash('info', "Tindakan Medis telah di update");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdateRawatJalan($id)
    {
        $this->layout = 'main_utama';
        $model = $this->findModel($id);
        $title = "Rawat Jalan";
        $model->status = "0";
        if ($model->load(Yii::$app->request->post())){
            $model->save();
             \Yii::$app->session->setFlash('info', "Tindakan Medis telah di update");
            return $this->redirect(['view-rawat-jalan', 'id' => $model->id]);
        }

        return $this->render('rawat_jalan/update_rawat_jalan', [
            'model' => $model,
            'title' => $title,
        ]);
    }
    public function actionUpdateRawatInap($id)
        {
            $this->layout = 'main_utama';
            $model = $this->findModel($id);
            $title = "Rawat Inap";
            $model->status = "1";
            $model->scenario = "rawat-inap";
            
            if ($model->load(Yii::$app->request->post())){
                $model->save();
                 // \Yii::$app->session->setFlash('info', "Tindakan Medis telah di update");
                return $this->redirect(['view-rawat-inap', 'id' => $model->id]);
            }

            return $this->render('rawat_inap/update_rawat_inap', [
                'model' => $model,
                'title' => $title,
            ]);
        }

    /**
     * Deletes an existing Tindakan model.
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
     * Finds the Tindakan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tindakan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tindakan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
