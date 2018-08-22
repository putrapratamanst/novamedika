<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tindakan */

$this->title = $model->id_pasien;
?>
<div class="tindakan-view"  style="margin: 10px;padding-top: 1px;padding-bottom: 1px">
    <p>
        <?= Html::a('<span class="btn-label"></span>Kembali',
                ['/'],
                [
                    'class' => 'btn btn-labeled btn-info m-b-5 pull-left',
                    'style'=> 'padding: 3px 10px',
                    'title' => 'Cancel'
                ]) ?>&nbsp;
        <?php //echo if(Yii::$app->user->identity->user_type == "0"){?>
        <?= Html::a('Ubah Data Tindakan', ['update', 'id' => $model->id], ['class' => 'btn btn-primary','style'=> 'padding: 3px 10px',]) ?>
    </p>
 <?php // } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'pasien.nama',
            [
                'attribute'=>'pekerjaMedis.nama',
                'label'    =>'Tenaga medis'

            ],
            'pemeriksaan_penunjang:ntext',
            'obat:ntext',
            'diagnosa:ntext',
            'tindakan:ntext',
            'biaya:ntext',
            [
                'attribute'=>'status',
                'format'=>'raw',
                'value'    => function($data){
                    if($data->status == 0){
                        return "Rawat Jalan";
                    }if($data->status == 1){
                        return "Rawat Inap";
                    }if($data->status == 2){
                        return "Rujuk". " ke ". "<b>".$data->rujukan."</b>";
                    }if($data->status == 3){
                        return "Pulang";
                    }
                }
            ]
            // 'created_date',
            // 'updated_date',
        ],
    ]) ?>
    <?php if($model->status == 0){ ?>
        <p class="pull-right" style="display: none;">
                <?= Html::a('<i class="pe-7s-print"></i> Cetak Data Tindakan', ['tindakan/print-rawat-jalan', 'id' => $model->id], ['class' => 'btn btn-success','target'=>"_blank",'data-pjax' => 0]) ?>
        </p>
    <?php }if($model->status == 1){ ?>
        <p class="pull-right" >
                <?= Html::a('<i class="pe-7s-print"></i> Cetak Data Tindakan', ['tindakan/print-rawat-inap', 'id' => $model->id], ['class' => 'btn btn-success','target'=>"_blank",'data-pjax' => 0]) ?>
        </p>
    <?php } ?>

<br>
</div>
<?php $this->registerCss($this->render('@app/web/css/DetailView.css'));?>
