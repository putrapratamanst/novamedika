<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\PekerjaMedis;
use app\models\Pasien;
use yii\web\View;
use dosamigos\datepicker\DatePicker;

// use kartik\widgets\Select2;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Tindakan */
/* @var $form yii\widgets\ActiveForm */
$dropDownList = ['UMUM'=>'UMUM','KIA KB'=>'KIA KB','LABORATORIUM'=>'LABORATORIUM','GIGI'=>'GIGI','FISIOTERAPIS'=>'FISIOTERAPIS'];
?>
<style type="text/css">
    .control-label{
        color: #131212 !important;
    }
</style>
 <?= Yii::$app->session->getFlash('danger');?>

<div class="tindakan-form">

    <?php $form = ActiveForm::begin(['options'=>['autocomplete'=>'off']]);?>

<div class="col-md-12">
    <div class="row">
            <div class="col-md-4">
                <?php echo $form->field($model, 'id_pasien')->widget(Select2::classname(), [
                    'data' => Pasien::findAvailablePasien(),
                    'options' => ['placeholder' => 'Pilih Nama Pasien'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label("Nama Pasien");?>
             </div>
            <div class="col-md-4">
                <?php echo $form->field($model, 'id_pekerja_medis')->widget(Select2::classname(), [
                    'data' => PekerjaMedis::FindPekerjaMedis(),
                    'options' => ['placeholder' => 'Pilih Tenaga Medis'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label("Tenaga Medis");?>

            </div>
            <div class="col-md-4">
                <?php echo $form->field($model, 'kategori_pasien_rawat_jalan')->dropDownList($dropDownList,['prompt'=>'Pilih Kategori'])->label("Kategori Rawat Jalan");?>

            </div>
            </div>
        </div>


<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'diagnosa')->textInput() ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pemeriksaan_penunjang')->textInput() ?>
        </div>
        <div class="col-md-4">        
            <?= $form->field($model, 'tindakan')->textInput() ?>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">    
            <?= $form->field($model, 'obat')->textArea() ?>
        </div>
        <div class="col-md-4">    
            <?= $form->field($model, 'biaya')->textInput() ?>
        </div>
        <div class="col-md-8 pull-right">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success pull-right','data' => [
                        'confirm' => 'Apakah anda yakin untuk menyimpan data tindakan?'
                ]]
            ) ?> 
        <?= Html::a('Kembali', ['index-rawat-jalan'], ['class' => 'btn btn-primary pull-right','style'=>'margin-right:20px',]) ?>
    </div>
    </div>
</div>
    &nbsp;

    <?php ActiveForm::end(); ?>

</div>
