<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use app\models\Helper;

$this->title = 'Kunjungan';
// $this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .table > thead > tr > th {
        border-bottom-width: 1px;
        font-size: 12px;
        text-transform: uppercase;
        color: #337ab7;
        font-weight: 400;
        padding-bottom: 5px;
    }
    a {
        color: #337ab7;
    }
</style>

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
                                'summary' => "",
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    [
                                        'attribute'=>'pasien.nama',
                                        'label'    => 'Nama Pasien',
                                        'value'    => function($model){
                                            return $model->pasien->nama;
                                        }
                                    ],

                                    [
                                        'attribute'=>'pasien.cara_bayar',
                                        'label'    => 'Cara Pembayaran',
                                        'value'    => function($model){
                                            {
                                                if($model->pasien->cara_bayar == 0){
                                                        return "Umum";
                                                }if($model->pasien->cara_bayar == 1){
                                                        return "BPJS";
                                                }if($model->pasien->cara_bayar == 2){
                                                        return "Asuransi Lain";
                                                }
                                            }
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
