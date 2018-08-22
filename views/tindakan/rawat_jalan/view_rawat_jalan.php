<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tindakan */

$this->title = $model->id_pasien;
// $this->params['breadcrumbs'][] = ['label' => 'Tindakan', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="tindakan-view"  style="margin: 10px;padding-top: 1px;padding-bottom: 1px">
    <p>
        <?= Html::a('<span class="btn-label"></span>Kembali',
                ['index-rawat-jalan'],
                [
                    'class' => 'btn btn-labeled btn-info m-b-5 pull-left',
                    'style'=> 'padding: 3px 10px',
                    'title' => 'Cancel'
                ]) ?>&nbsp;
        <?= Html::a('Ubah Data Tindakan', ['update-rawat-jalan', 'id' => $model->id], ['class' => 'btn btn-primary','style'=> 'padding: 3px 10px',]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            // 'pasien.nama',
            [
                'attribute'=>'pasien.nama',
                'label'=>'Nama Pasien',
            ],
            [
                'attribute'=>'pekerjaMedis.nama',
                'label'=>'Nama Tenaga Medis',
            ],
            // 'pekerjaMedis.nama',
            'pemeriksaan_penunjang:ntext',
            'obat:ntext',
            'diagnosa:ntext',
            'tindakan:ntext',
            'biaya:ntext',
            [
                'attribute'=>'status',
                'value'    => function($data){
                    if($data->status == 0){
                        return "Rawat Jalan";
                    }if($data->status == 1){
                        return "Rawat Inap";
                    }if($data->status == 2){
                        return "Rujuk";
                    }if($data->status == 3){
                        return "Pulang";
                    }
                }
            ],
            [
                'attribute'=>'kategori_pasien_rawat_jalan',
                'label'=>'Rawat Jalan',
            ],

            // 'kategori_pasien_rawat_jalan',
            // 'updated_date',
        ],
    ]) ?>
    <p class="pull-right">
            <?= Html::a('<i class="pe-7s-print"></i> Cetak Data Tindakan', ['/tindakan/print-rawat-jalan', 'id' => $model->id], ['class' => 'btn btn-success','target'=>"_blank",'data-pjax' => 0,'style'=>'display:none']) ?>
    </p>
<br>
</div>
<?php $this->registerCss($this->render('@app/web/css/DetailView.css'));?>
