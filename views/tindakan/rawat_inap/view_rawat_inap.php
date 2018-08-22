<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Tindakan */

$this->title = $model->id_pasien;
// $this->params['breadcrumbs'][] = ['label' => 'Tindakan', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="tindakan-view"  style="margin: 10px;padding-top: 1px;padding-bottom: 1px">

    <!-- <h3>Nomor Rekam Medis: <?= Html::encode($this->title) ?></h3> -->

    <p>
        <?= Html::a('<span class="btn-label"></span>Kembali',
                ['index-rawat-inap'],
                [
                    'class' => 'btn btn-labeled btn-info m-b-5 pull-left',
                    'style'=> 'padding: 3px 10px',
                    'title' => 'Cancel'
                ]) ?>&nbsp;
        <?= Html::a('Ubah Rawat Inap', ['update-rawat-inap', 'id' => $model->id], ['class' => 'btn btn-primary','style'=> 'padding: 3px 10px',]) ?>
        <!-- <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style'=> 'padding: 3px 10px',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            [
                'attribute'=>'pasien.nama',
                'label'=>'Nama Pasien',
            ],
            [
                'attribute'=>'pekerjaMedis.nama',
                'label'=>'Nama Tenaga Medis',
            ],
            'kategori_pasien_rawat_inap',
            'pemeriksaan_penunjang:ntext',
            'obat:ntext',
            'diagnosa:ntext',
            'tindakan:ntext',
            'biaya:ntext',
            // [
            //     'attribute'=>'status',
            //     'value'    => function($data){
            //         if($data->status == 0){
            //             return "Rawat Jalan";
            //         }if($data->status == 1){
            //             return "Rawat Inap";
            //         }if($data->status == 2){
            //             return "Rujuk";
            //         }if($data->status == 3){
            //             return "Pulang";
            //         }
            //     }
            // ],
            [
                'attribute'=>'tanggal_masuk',
                'value'    => function($data){
                    return Helper::indoDateFormat($data->tanggal_masuk);
                },
            ],
            [
                'attribute'=>'tanggal_keluar',
                'value'    => function($data){
                    return  "-";
                },
            ],
        ],
    ]) ?>
    &nbsp;
<?= Html::a('<i class="pe-7s-print"></i> Cetak Rawat Inap', ['tindakan/print-rawat-inap', 'id' => $model->id], ['class' => 'btn btn-success pull-right','target'=>"_blank",'data-pjax' => 0]) ?>
</div>
<?php $this->registerCss($this->render('@app/web/css/DetailView.css'));?>
