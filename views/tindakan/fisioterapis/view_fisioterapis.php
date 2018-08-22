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

    <h3>Nomor Rekam Medis: <?= Html::encode($this->title) ?></h3>

    <p>
        <?php if(!Yii::$app->user->identity->user_type == "1"){?>
        <?= Html::a('<span class="btn-label"></span>Kembali',
                ['/'],
                [
                    'class' => 'btn btn-labeled btn-info m-b-5 pull-left',
                    'style'=> 'padding: 3px 10px',
                    'title' => 'Cancel'
                ]) ?>&nbsp;
        <?= Html::a('Ubah', ['update-rawat-jalan', 'id' => $model->id], ['class' => 'btn btn-primary','style'=> 'padding: 3px 10px',]) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style'=> 'padding: 3px 10px',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
         <a href="/tindakan/print?id=<?php echo $model->id ?>  " target="_blank" style="padding: 3px 10px"; class="btn btn-default pull-right">
            <i class="pe-7s-print"></i> Print
        </a>
    </p>
<?php } ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'pasien.nama',
            'dokter.nama_dokter',
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
                        return "Fisioterapis";
                    }if($data->status == 3){
                        return "Pulang";
                    }
                }
            ]
            // 'created_date',
            // 'updated_date',
        ],
    ]) ?>

</div>
