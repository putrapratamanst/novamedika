<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Tindakan;
$this->title = 'Daftar Rawat Jalan';
$this->registerCss($this->render('/pasien/table.css'));

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
<div class="card">
    <div class="header">
        <a href="<?php echo  Yii::$app->urlManager->createUrl('/tindakan/create-rawat-jalan')?>" class="btn btn-primary">
        <?= $this->title;?>
        </a>
    </div>
    <div class="content table-responsive table-full-width">
        <?php Pjax::begin(['enablePushState'=>false]); ?>
        <?= GridView::widget([
            'dataProvider'  => $dataProvider,
            'layout'        =>'{items}{pager}',
            'filterModel'   => $searchModel,
            'options'       =>['style' => 'padding:15px;'],
            'columns' => [
                    [
                    'class'         => 'yii\grid\SerialColumn',
                    'header'        => 'No', 
                    'headerOptions' => ['style'=> 'width: 3%;text-align:center;color:#337ab7;vertical-align: middle'],
                    'contentOptions' => ['style'=> 'text-align:center'],
                ],


            // ['class' => 'yii\grid\SerialColumn'],

            // [
            //     'attribute'=>'id',
            //     'label'    => 'Nomor Rekam Medis',
            // ],

            [
                'attribute' => 'pasien.no_rm',
                'headerOptions'=> ['style' => 'width:250px;'],
                'filter' => Select2::widget([
                   'name' => 'ObjectSearch[pasien.nama]',
                   'data' => ArrayHelper::map(Tindakan::find()->where(['status'=>0])->joinWith('pasien')->asArray()->all(), 'pasien.no_rm','pasien.no_rm'),
                   'model' => $searchModel,
                   'attribute' => 'id_pasien_custom',
                   'options' => [
                       'placeholder' => 'Cari Nomor Rekam Medik'
                   ],
                   'pluginOptions' => [
                       'allowClear' => true
                   ],
                ]),
            ],

            [
                'attribute' => 'pasien.nama',
                'headerOptions'=> ['style' => 'width:250px;'],
                'filter' => Select2::widget([
                   'name' => 'ObjectSearch[pasien.nama]',
                   'data' => ArrayHelper::map(Tindakan::find()->where(['status'=>0])->joinWith('pasien')->asArray()->all(), 'pasien.nama','pasien.nama'),
                   'model' => $searchModel,
                   'attribute' => 'id_pasien',
                   'options' => [
                       'placeholder' => 'Cari Nama Pasien'
                   ],
                   'pluginOptions' => [
                       'allowClear' => true
                   ],
                ]),
            ],


            [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>"Pilihan",
                    'headerOptions'=>['style'=>'font-weight:bold;'],
                    'template' => '{view}',
                    'contentOptions'=>['style'=>'width: 150px;'],
                    'buttons' => [
                        'view' => function ($url,$model) {
                            if (Yii::$app->controller->action->id = "index-rawat-jalan")
                            {
                                
                            return Html::a(
                            '<button type="button" class="btn btn-info">Ubah</button>',
                                
                                $url = "/tindakan/view-rawat-jalan?id=".$model->id,

                                                        [
                                'title'     => 'View',
                                'data-pjax' => '0',
                                 ]
                            );
                        };
                        },
                        'print' => function ($url,$model) {
                                        return Html::a(
                                        '<button type="button" class="btn btn-success">Cetak</button>',
                                        $url = "/tindakan/print-rawat-jalan?id=".$model->id,
                                        [
                                            'title'     => 'print',
                                            'data-pjax' => '0',
                                            'target'   => '_blank',
                                            'data'      => ['method' => 'post'],
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