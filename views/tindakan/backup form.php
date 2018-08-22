<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\PekerjaMedis;
use app\models\Pasien;
// use kartik\widgets\Select2;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Tindakan */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
    .control-label{
        color: #131212 !important;
    }
</style>
<div class="tindakan-form">

    <?php $form = ActiveForm::begin();?>

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
                <?php
                $url = Yii::$app->controller->action->id;
                if($url == "create-rawat-inap" ):?>

                <?= $form->field($model, 'kategori_pasien_rawat_inap',['inputOptions' => ['autocomplete' => 'off']])->dropDownList(['visite'=>'Visite','status1'=>'Status 1','status2'=>'Status 2','status3'=>'Status 3','bpjs'=>'BPJS'],[
                     'prompt' => 'Pilih Kategori',])->label("Kategori Pasien")?>

                <?php  else:?>
                                <?php 
            $url = Yii::$app->controller->action->id;
            if($url == "create" || $url == "update" || $url == "update-rawat-jalan" || $url == "update-rawat-inap"):
            $list = ['0' => 'Rawat Jalan', '1' => 'Rawat Inap','2'=>'Rujuk',3=>'Pulang'];
            if($model->isNewRecord): ?>
            
        <div class="col-md-12">
            <?= $form->field($model, 'status')->inline(true)->radioList($list,[ 'item' => function($index, $label, $name, $checked, $value) {
                $return = '<label class="modal-radio">';
                $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="custom_id_value_'.$index.'" >';
                $return .= '<span>  ' . ucwords($label) . '</span>';
                $return .= '</label>';
                return $return;
             }]); ?> 
        </div>

            <?php else:?>
        <div class="col-md-12">
            <?= $form->field($model, 'status')->inline(true)->radioList($list,[ 
                'item' => function($index, $label, $name, $checked, $value) {
                $checked = $checked ? 'checked' : '';
                $return = '<label class="modal-radio">';
                $return .= "<input type='radio' {$checked} name='{$name}' value='{$value}'>";
                $return .= '<span>  ' . ucwords($label) . '</span>';
                $return .= '</label>';
                return $return;
             }]); ?> 
            <?php endif;?>
            <?php endif;?>
        </div>
                 <?php endif;?>
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
            <?= $form->field($model, 'obat')->textInput() ?>
        </div>
        <div class="col-md-4">    
            <?= $form->field($model, 'biaya')->textInput() ?>
        </div>
        <div class="col-md-8 pull-right">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success pull-right','data' => [
                        'confirm' => 'Apakah anda yakin untuk menyimpan data tindakan?'
                ]]
            ) ?> 
        <?= Html::a('Kembali', ['/'], ['class' => 'btn btn-primary pull-right','style'=>'margin-right:20px',]) ?>
    </div>
    </div>
</div>
    &nbsp;

    <?php ActiveForm::end(); ?>

</div>
