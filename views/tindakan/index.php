<?php

use yii\helpers\Html;
use yii\grid\GridView;



$this->title = 'Tindakan';
// $this->params['breadcrumbs'][] = $this->title;

?>

<div class="tindakan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Tindakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                'header'=>"Pilihan",
                'headerOptions'=>['style'=>'color:#337ab7;'],
                'template' => '{view} {print}',
                'contentOptions'=>['style'=>'width: 150px;'],
                'buttons' => [
                    'view' => function ($url,$model) {
                        return Html::a(
                        '<button type="button" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></button>',

                        [
                            'title'     => 'View',
                            'data-pjax' => '0',
                            'data'      => ['method' => 'post'],
                            'target'    =>"_blank"
                            ]
                        );
                    },

                ]
            ],
        ],
    ]); ?>
</div>
