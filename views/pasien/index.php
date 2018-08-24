<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Pasien;
// use app\models\Tindakan;
use kartik\select2\Select2;

$this->title = 'Pasien';
$this->registerCss($this->render('table.css'));
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <a href="<?php echo Yii::$app->urlManager->createUrl('/pasien/create')?>" class="btn btn-primary">
                        Tambah Pasien
                        </a>
                    </div>
                    <div class="content table-responsive table-full-width">
                    <?php Pjax::begin(['enablePushState'=>false]); ?>
                        <?= GridView::widget([
                            'dataProvider'  => $dataProvider,
                            'layout'        => '{items}{pager}',
                            'filterModel'   => $searchModel,
                            'options'       => ['style' => 'padding:15px;'],
                            'columns'       => [
                                // [
                                //     'attribute' => 'no_rm',
                                //     'label'     => 'No. RM',
                                //     'headerOptions'=> ['style' => 'width:100px;'],
                                // ],

                                [
                                    'attribute' => 'no_rm',
                                    'headerOptions'=> ['style' => 'width:170px;'],
                                    'filter' => Select2::widget([
                                       'name' => 'ObjectSearch[no_rm]',
                                       'data' => ArrayHelper::map(Pasien::find()->asArray()->all(), 'no_rm','no_rm'),
                                       'model' => $searchModel,
                                       'attribute' => 'no_rm',
                                       'options' => [
                                           'placeholder' => 'Cari  No RM'
                                       ],
                                       'pluginOptions' => [
                                           'allowClear' => true
                                       ],
                                    ]),
                                ],
     
                                [
                                    'attribute' => 'nama',
                                    'headerOptions'=> ['style' => 'width:250px;'],
                                    'filter' => Select2::widget([
                                       'name' => 'ObjectSearch[nama]',
                                       'data' => ArrayHelper::map(Pasien::find()->asArray()->all(), 'nama','nama'),
                                       'model' => $searchModel,
                                       'attribute' => 'nama',
                                       'options' => [
                                           'placeholder' => 'Cari Nama Pasien'
                                       ],
                                       'pluginOptions' => [
                                           'allowClear' => true
                                       ],
                                    ]),
                                ],

                                [
                                    'attribute' => 'no_ktp',
                                    'headerOptions'=> ['style' => 'width:200px;'],
                                ],
                                [
                                    'attribute' => 'no_bpjs',
                                    'headerOptions'=> ['style' => 'width:200px;'],
                                ],
                                [
                                    'headerOptions'=> ['style' => 'width:150px;'],
                                    'attribute' => 'cara_bayar',
                                    'label'     => "Cara Pembayaran",
                                    'value'     => function($model){
                                        if ($model->cara_bayar == 0) {
                                            return "Umum";
                                        } if ($model->cara_bayar == 1) {
                                            return "BPJS";
                                        } if ($model->cara_bayar == 2) {
                                            return "Asuransi Lain";
                                        }
                                    },
                                    'filter'             => Html::activeDropDownList($searchModel, 'cara_bayar', array("0"=>"Umum","1"=>"BPJS","2"=>"Asuransi Lain"),['class'=>'form-control','prompt' => 'Semua']),
                                ],
                               [
                                'class'         => 'yii\grid\ActionColumn',
                                'header'        => "Pilihan",
                                'headerOptions' => ['style'=>'font-weight:bold;'],
                                'template'      => '{view} {print-mini} ',
                                'contentOptions'=> ['style'=>'width: 200px;text-align:center'],
                                'buttons'       => [
                                    'view' => function ($url,$model) {
                                        return Html::a(
                                        '<button type="button" class="btn btn-info"">Ubah</button>',
                                        $url = "/pasien/view/".$model->id,
                                        [
                                            'title'     => 'View',
                                            'data-pjax' => '0',
                                            'data'      => ['method' => 'post']
                                            ]
                                        );
                                    },
                                    'print-mini' => function ($url,$model) {
                                        $titleNormal = "Cetak RM Depan";
                                        $icon = " <i class='pe-7s-print'></i>";
                                        $labelNormal = $icon . ' ' . $titleNormal;
                                        // $urlMini = "print-mini?id=".$model->id;
                                        $optionsNormal = ['class'=>'btn btn-info col-lg-12', 'data-pjax' => 0,/*to prevent pjax*/ 'target'=>'_blank'];

                                        $titleMini = "Cetak RM Belakang";
                                        $labelMini = $icon . ' ' . $titleMini;
                                        $urlMini = "print-rm-belakang?id=".$model->id;
                                        $optionsMini = ['class'=>'btn btn-danger col-lg-12','data-pjax' => 0,'target'=>'_blank'];

                                        $titleResep = "Cetak RM Resep";
                                        $labelResep = $icon . ' ' . $titleResep;
                                        $urlResep = "print-resep?id=".$model->id;
                                        $optionsResep = ['class'=>'btn btn-warning col-lg-12','data-pjax' => 0,'target'=>'_blank'];


                                        return 
                                        "<div class='btn-group dropup'>
                                            <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                Print
                                            </button>
                                            <div class='dropdown-menu'>".
                                            Html::a($labelNormal, $url, $optionsNormal).
                                            Html::a($labelMini, $urlMini, $optionsMini).
                                            Html::a($labelResep, $urlResep, $optionsResep);
                                        "</div><div>";
                                    },
                                ]
                            ],],
                            ]); ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>