<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Tindakan;

$this->title = 'Daftar Rawat Inap';
$this->registerCss($this->render('/pasien/table.css'));

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
<div class="card">
    <div class="header">
        <a href="<?php echo  Yii::$app->urlManager->createUrl('/tindakan/create-rawat-inap')?>" class="btn btn-primary">
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


            [
                'attribute' => 'pasien.no_rm',
                'headerOptions'=> ['style' => 'width:250px;'],
                'filter' => Select2::widget([
                   'name' => 'ObjectSearch[pasien.nama]',
                   'data' => ArrayHelper::map(Tindakan::find()->where(['status'=>1])->joinWith('pasien')->asArray()->all(), 'pasien.no_rm','pasien.no_rm'),
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
                   'data' => ArrayHelper::map(Tindakan::find()->where(['status'=>1])->joinWith('pasien')->asArray()->all(), 'pasien.nama','pasien.nama'),
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
                    'headerOptions'=>['style'=>'color:#337ab7;'],
                    'template' => '{view} {print}',
                    'contentOptions'=>['style'=>'width: 150px;'],
                    'buttons' => [
                        'view' => function ($url,$model) {
                            if (Yii::$app->controller->action->id = "index-rawat-inap")
                            {
                                
                            return Html::a(
                            '<button type="button" class="btn btn-info">Ubah</button>',
                                
                                $url = "/tindakan/view-rawat-inap?id=".$model->id,

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
                                        $url = "/tindakan/print-rawat-inap?id=".$model->id,
                                        [
                                            'title'     => 'print',
                                            'target'   => '_blank',
                                            'data-pjax' => '0',
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