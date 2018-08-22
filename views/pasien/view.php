<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Helper;
/* @var $this yii\web\View */
/* @var $model app\models\Pasien */

$this->title = $model->nama;
?>
<style type="text/css">
	.btn{
		padding: 3px 10px
	}
</style>
<div class="pasien-view" style="margin: 10px;padding-top: 1px;padding-bottom: 1px">  
	<p class="pull-left">

		<?= Html::a('<span class="btn-label"></span>Kembali',['index'],
			[
					'class' => 'btn btn-labeled btn-info m-b-5 pull-left',
					'title' => 'Cancel'
			]) ?>&nbsp; 
			<?= Html::a('Ubah Data Pasien', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => 
			[
				'nama',
				[
						'attribute'=>'tanggal_lahir',
						'label'    =>'Tanggal Lahir',
						'value'    =>function($data)
							{
									$helper = new Helper;
									$tanggal_lahir = $helper->indoDateFormat($data->tanggal_lahir);
									return $tanggal_lahir;
							}
				],
				'no_rm',
				'no_ktp',
				'no_bpjs',
				'alamat:ntext',
				 [
					'attribute'=>'cara_bayar',
					'label'=>"Cara Pembayaran",
					'value'=>function($model)
						{
							if($model->cara_bayar == 0){
									return "Umum";
							}if($model->cara_bayar == 1){
									return "BPJS";
							}if($model->cara_bayar == 2){
									return "Asuransi Lain";
							}
						}
				],
				
				'kategori_pasien',
			],
		]) 
	?>
	<p class="pull-right">
		<?= Html::a('<i class="pe-7s-print"></i> Cetak RM Normal', ['/pasien/print', 'id' => $model->id], ['class' => 'btn btn-danger','target'=>'_blank']) ?>
		<?= Html::a('<i class="pe-7s-print"></i> Cetak RM Mini', ['/pasien/print-mini', 'id' => $model->id], ['class' => 'btn btn-info','target'=>'_blank']) ?>
		<?= Html::a('<i class="pe-7s-print"></i> Cetak Resep', ['/pasien/print-resep', 'id' => $model->id], ['class' => 'btn btn-warning','target'=>'_blank'])?>
	</p>
		<br>
		<br>

</div>

<?php 
$this->registerCss($this->render('pasien.css'));
$this->registerCss($this->render('@app/web/css/DetailView.css'));
/*$this->registerCss($this->render('jquery.pulsate.min.js'));
$this->registerJS('

    $(document).ready(function(){

        $.notify({
            icon: "pe-7s-paperclip",
            message: "<b>Data telah tersimpan</b>"

        },{
            type: "info",
            timer: 1000
        });

    });
');*/
?>

