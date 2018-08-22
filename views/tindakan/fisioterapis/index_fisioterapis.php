<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Pendaftaran Fisioterapis';
?>
<div class="content">
    <center><h2>Rawat Inap</h2></center>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
<div class="card">
    <div class="header">
        <a href="<?php echo  Yii::$app->urlManager->createUrl('/tindakan/create-fisioterapis')?>" class="btn btn-primary">
        <?= $this->title;?>
        </a>
    </div>
    <div class="content table-responsive table-full-width">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider'  => $dataProvider,
            'layout'        =>'{items}{pager}',
            'filterModel'   => $searchModel,
            'options'       =>['style' => 'padding:15px;'],
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'id',
                'label'    => 'Nomor Rekam Medis',
            ],

            [
                'attribute'=>'pasien.nama',
                'label'    => 'Nama Pasien',
                'value'    => function($model){
                    return $model->pasien->nama;
                }
            ],

            [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>"Actions",
                    'headerOptions'=>['style'=>'color:#337ab7;'],
                    'template' => '{view} {print}',
                    'contentOptions'=>['style'=>'width: 150px;'],
                    'buttons' => [
                        'view' => function ($url) {
                            return Html::a(
                            '<button type="button" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></button>',
                            $url,
                            [
                                'title'     => 'View',
                                'data-pjax' => '0',
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