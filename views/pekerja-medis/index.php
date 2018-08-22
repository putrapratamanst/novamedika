<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Posisi;

$this->registerCss($this->render('/pasien/table.css'));

?>
<div class="content">
<!--     <center>
        <h2>Tenaga Medis</h2>
    </center>
 -->    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <a href="<?php echo  Yii::$app->urlManager->createUrl('/pekerja-medis/create')?>" class="btn btn-primary">
                        Tambah Tenaga Medis
                        </a>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <?php Pjax::begin(['enablePushState'=>false]); ?>
                        <?= GridView::widget([
                            'dataProvider'  => $dataProvider,
                            'layout'        =>'{items}{pager}',
                            'filterModel'   => $searchModel,
                            'options'       =>['style' => 'padding:15px;'],
                            'columns'       => [
                                    [
                                    'class'         => 'yii\grid\SerialColumn',
                                    'header'        => 'No', 
                                    'headerOptions' => ['style'=> 'width: 3%;text-align:center;color:#337ab7;vertical-align: middle'],
                                    'contentOptions' => ['style'=> 'text-align:center'],
                                ],


                                'nama',
                                [
                                    'attribute' => 'posisi',
                                    'value'      => function($model){
                                        if($model->posisi == 1){
                                            return "Dokter";
                                        }
                                        if($model->posisi == 2){
                                            return "Fisioterapis";
                                        }
                                        if($model->posisi == 3){
                                            return "Bidan";
                                        }
                                        if($model->posisi == 4){
                                            return "Perawat";
                                        }
                                    },
                                    'filter' => Select2::widget([
                                       'name' => 'ObjectSearch[posisi]',
                                       'data' => ArrayHelper::map(Posisi::find()->asArray()->all(), 'id','posisi'),
                                       'model' => $searchModel,
                                       'attribute' => 'posisi',
                                       'options' => [
                                           'placeholder' => 'Cari Posisi'
                                       ],
                                       'pluginOptions' => [
                                           'allowClear' => true
                                       ],
                                    ]),

                                ],

                            [
                                'class'         => 'yii\grid\ActionColumn',
                                'header'        =>"Pilihan",
                                'headerOptions' =>['style'=>'font-weight:bold;'],
                                'template'      => '{view} {delete}',
                                'contentOptions'=>['style'=>'width: 160px;text-align:center'],
                                'buttons'       => [
                                    'view' => function ($url,$model) {
                                        return Html::a(
                                        '<button type="button" class="btn btn-info">Ubah</button>',
                                        $url = "/pekerja-medis/view?id=".$model->id,
                                        [
                                            'title'     => 'View',
                                            'data-pjax' => '0',
                                        ]
                                        );
                                    },
                                    'delete' => function ($url,$model) {
                                        return Html::a(
                                        '<button type="button" class="btn btn-danger">Hapus</button>',
                                        $url = "/pekerja-medis/delete?id=".$model->id,
                                        [
                                            'title'     => 'delete',
                                            'data-pjax' => '0',
                                            'data' => [
                                                    'confirm' =>  'Apakah yakin ingin menghapus?',
                                                    'method' => 'post',
                                                ],
                                        ]
                                        );
                                    },
                                ]
                            ],
                            ],
                            ]); ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>