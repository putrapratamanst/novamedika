<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Helper;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Tindakan;
use kartik\date\DatePicker;

$this->registerCss($this->render('/pasien/table.css'));

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                         <a href="<?php echo  Yii::$app->urlManager->createUrl('/tindakan/create')?>" class="btn btn-primary">
                        Pemeriksaan &amp; Tindakan
                        </a>
                    </div>
                    <div class="content table-responsive table-full-width">
                    <?php Pjax::begin(['enablePushState'=>false]); ?>
                         <?= GridView::widget([
                            'dataProvider' => $dataTindakan,
                            'filterModel'  => $tindakan,
                            'layout'       =>'{items}{pager}',
                            'options'      =>
                                [
                                    'style'=> 'padding:15px;'
                                ],

                            'columns'      => 
                            [
                                    [
                                    'class'         => 'yii\grid\SerialColumn',
                                    'header'        => 'No', 
                                    'headerOptions' => ['style'=> 'width: 3%;text-align:center;color:#337ab7;vertical-align: middle'],
                                    'contentOptions' => ['style'=> 'text-align:center'],
                                ],


                                // [
                                //     'attribute'      => 'id_pasien_custom',
                                //     'label'          => 'Nomor Rekam Medis',
                                //     'value'          => 'pasien.no_rm'
                                // ],

                                [
                                    'attribute' => 'pasien.no_rm',
                                    'headerOptions'=> ['style' => 'width:250px;'],
                                    'filter' => Select2::widget([
                                       'name' => 'ObjectSearch[pasien.nama]',
                                       'data' => ArrayHelper::map(Tindakan::find()->joinWith('pasien')->asArray()->all(), 'pasien.no_rm','pasien.no_rm'),
                                       'model' => $tindakan,
                                       'attribute' => 'id_pasien_custom',
                                       'options' => [
                                           'placeholder' => 'Cari Nomor Rekam Medik'
                                       ],
                                       'pluginOptions' => [
                                           'allowClear' => true
                                       ],
                                    ]),
                                ],


                                // [
                                //     'attribute'      => 'id_pasien',
                                //     'label'          => 'Nama Pasien',
                                //     'value'          => 'pasien.nama'
                                // ],

                                [
                                    'attribute' => 'pasien.nama',
                                    'headerOptions'=> ['style' => 'width:250px;'],
                                    'filter' => Select2::widget([
                                       'name' => 'ObjectSearch[pasien.nama]',
                                       'data' => ArrayHelper::map(Tindakan::find()->joinWith('pasien')->asArray()->all(), 'pasien.nama','pasien.nama'),
                                       'model' => $tindakan,
                                       'attribute' => 'id_pasien',
                                       'options' => [
                                           'placeholder' => 'Cari Nama Pasien'
                                       ],
                                       'pluginOptions' => [
                                           'allowClear' => true
                                       ],
                                    ]),
                                ],

                                // [
                                //     'attribute'      => 'created_date',
                                //     'label'          => 'Tanggal Tindakan',
                                //     'value'          => function($model)
                                //         {
                                //             return Helper::indoDateFormat($model->created_date);
                                //         },
                                //     // 'filterOptions' => ['style'=>'']
                                // ],
                                // [
                                //     'attribute'      => 'created_date',
                                //     'label'          => 'Tanggal Tindakan',
                                //     'value'          => function($model)
                                //         {
                                //             return Helper::indoDateFormat($model->created_date);
                                //         },
                                //     'filter' => yii\jui\DatePicker::widget(['name' => 'created_date'])
                                // ],
                                [
                                    'attribute'      => 'created_date',
                                    'label'          => 'Tanggal Tindakan',
                                    'headerOptions'  => ['style' => 'width:230px;'],
                                    'format'         => 'html',
                                    'value'          => function($model)
                                        {
                                            return Helper::indoDateFormat($model->created_date);
                                        },
                                    'filter'        => \yii\jui\DatePicker::widget([
                                                        'model'         => $tindakan,
                                                        'attribute'     => 'created_date',
                                                        'dateFormat'    => 'yyyy-MM-dd',
                                                        'language'      => 'id',
                                                        'options'       => ['placeholder' => 'Masukkan tanggal tindakan']
                                                        ]),
                                ],

                                [
                                        'class'         => 'yii\grid\ActionColumn',
                                        'header'        => 'Pilihan',
                                        'headerOptions' => ['style' =>'font-weight:bold;text-align:center'],
                                        'template'      => '{view} {print}',
                                        'contentOptions'=>
                                            [
                                                'style' =>'width: 150px;text-align:center'
                                            ],
                                        'buttons'       => 
                                        [
                                            'view'      => function ($url,$model)
                                                {
                                                    return Html::a
                                                    (
                                                        '<button type="button" class="btn btn-info">Ubah</button>',
                                                        $url = "/tindakan/view/".$model->id,
                                                        [
                                                            'title'     => 'View',
                                                            'data-pjax' => '0',
                                                            'data'      => 
                                                            [
                                                                'method'=> 'post'
                                                            ]
                                                        ]
                                                    );
                                                },

                                            'print'     => function ($url,$model) 
                                                {
                                                    // if($model->status==0)
                                                    // {

                                                    // return Html::a
                                                    // (
                                                    //     '<button type="button" class="btn btn-success"  target="_blank">Cetak</button>',
                                                    //     $url = "/tindakan/print-rawat-jalan?id=".$model->id,
                                                    //     [
                                                    //         'title'     => 'print',
                                                    //         'data-pjax' => '0',
                                                    //         'data'      => ['method' => 'post',],
                                                    //         'target'    =>"_blank",
                                                    //     ]
                                                    // );
                                                    // }
                                                    if($model->status == 1){
                                                        return Html::a
                                                    (
                                                        '<button type="button" class="btn btn-success"  target="_blank">Cetak</button>',
                                                        $url = "/tindakan/print-rawat-inap?id=".$model->id,
                                                        [
                                                            'title'     => 'print',
                                                            'data-pjax' => '0',
                                                            'data'      => ['method' => 'post',],
                                                            'target'    =>"_blank",
                                                        ]
                                                    );
                                                    }
                                                },
                                            ],
                                        ],
                                    ],
                                ]
                            ); 
                        ?>
                    <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="theme/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){

        // demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: " <b>Sistem Informasi Klinik Nova Medika</b>"

        },{
            type: 'info',
            timer: 1000
        });

    });
</script>