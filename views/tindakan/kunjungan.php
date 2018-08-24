<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use app\models\Helper;



$this->title = 'Kunjungan';
// $this->params['breadcrumbs'][] = $this->title;

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
<div class="tindakan-index">
<div class="card">

    <div class="content table-responsive table-full-width">
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // [
            //     'attribute'=>'id',
            //     'label'    => 'Nomor Rekam Medis',
            // ],

            [
                'attribute'=>'pasien.nama',
                'label'    => 'Nama Pasien',
                'value'    => function($model){
                    return $model->pasien->nama;
                }
            ],

            [
                'attribute'=>'status',
                'label'=>"Status",
                'value'=>function($model)
                    {
                        if($model->status == 0){
                                return "Rawat Jalan";
                        }if($model->status == 1){
                                return "Rawat Inap";
                        }
                    }
            ],

            [
                'attribute'      => 'created_date',
                'label'          => 'Tanggal Kunjungan',
                'headerOptions'  => ['style' => 'width:230px;'],
                'format'         => 'html',
                'value'          => function($model)
                    {
                        return Helper::indoDateFormat($model->created_date);
                    },
            ],

        ],
    ]); ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
