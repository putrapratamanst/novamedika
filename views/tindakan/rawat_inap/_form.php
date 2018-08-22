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
$dropDownList = ['RSUP. Soeradji Tirtonegoro'=>'RSUP. Soeradji Tirtonegoro','RSUD Bagas Waras'=>'RSUD Bagas Waras','Rumah Sakit Islam Klaten'=>'Rumah Sakit Islam Klaten','Rumah Sakit Cakra'=>'Rumah Sakit Cakra'];
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
            </div>
        </div>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="div_contract" style="display: none">      
                <?= $form->field($model, 'rujukan')->dropDownList($dropDownList,['prompt'=>'Pilih Rumah Sakit Rujukan'])?>
            </div>  

        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">      
            <?= $form->field($model, 'tanggal_masuk')->textInput(['maxlength' => true,'type'=>'date']) ?>
        </div>  
        <div class="col-md-4">      
            <?= $form->field($model, 'tanggal_keluar')->textInput(['maxlength' => true,'type'=>'date']) ?>
        </div>  
        <div class="col-md-4">      
            <?= $form->field($model, 'kategori_pasien_rawat_inap',['inputOptions' => ['autocomplete' => 'off']])->dropDownList(['visite'=>'Visite','status1'=>'Status 1','status2'=>'Status 2','status3'=>'Status 3','bpjs'=>'BPJS'],[
                 'prompt' => 'Pilih Kategori',])->label("Kategori Pasien")?>
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
        <?= Html::a('Kembali', ['index-rawat-inap'], ['class' => 'btn btn-primary pull-right','style'=>'margin-right:20px',]) ?>
    </div>
    </div>
</div>
    &nbsp;

    <?php ActiveForm::end(); ?>

</div>
