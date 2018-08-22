<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$namaDokter = Yii::$app->user->identity->name
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="title pull-right"> username :  <?php echo "<b>$namaDokter</b>";?>
                        	<br> password &nbsp;: 123123</div>
                          </a>
                         <h4 class="title">Data Pasien</h4>
                        <p class="category">Klik tombol mata untuk mengedit  data <b> "Report Tindakan Medis"</b></p>
                         </a>
                    </div>
                    <div class="content table-responsive table-full-width">
                    <?php Pjax::begin(); ?>
                         <?= GridView::widget([
                            'dataProvider' => $dataTindakan,
                            'filterModel' => $tindakan,
                            'options'=>['style' => 'padding:15px;'],
                            'columns' => [
                               [
                                    'class'          => 'yii\grid\SerialColumn',
                                    'header'         =>'No',
                                    'headerOptions'  =>['style'=>   
                                                                'color:#1DC7EA;
                                                                 padding-left:2px;
                                                                 padding-right:2px;
                                                                 text-align:center'],
                                    'contentOptions'=>['style'=>'text-align:center']
                                 ], 

                                [
                                    'attribute'=>'id_pasien',
                                    'label'    => 'Nomor Rekam Medis',
                                ],

                                [
                                    'attribute'=>'pasien.nama',
                                    'label'    => 'Nama Pasien',
                                    'headerOptions'=>['style'=>'color:#1DC7EA;'],
                                    'value'    => function($model){
                                        return $model->pasien->nama;
                                    }
                                ],

                                [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header'=>"Actions",
                                        'headerOptions'=>['style'=>'color:#1DC7EA;text-align:center'],
                                        'template' => '{view} {print}',
                                        'contentOptions'=>['style'=>'width: 130px;text-align:center'],
                                        'buttons' => [
                                            'view' => function ($url,$model) {
                                                return Html::a(
                                                '<button type="button" class="btn btn-info"><i class="glyphicon glyphicon-eye-open" style="padding: 3px 2px;"></i></button>',
                                                $url = "/tindakan/view/".$model->id,
                                                [
                                                    'title' => 'View',
                                                    'data-pjax' => '0',
                                                    'data' => [
                                                            'method' => 'post',
                                                        ]
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
  <script src="theme/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: "Selamat Datang di <b>Dashboard Nova Medika</b>."

        },{
            type: 'info',
            timer: 1000
        });

    });
</script>