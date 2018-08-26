<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
// use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TindakanSearch */
/* @var $form yii\widgets\ActiveForm */
$rawatJalan = ['0' => 'Rawat Jalan', '1' => 'Rawat Inap', '2' => 'Rujuk', '3' => 'Pulang'];
$list = ['0' => 'Umum','1' => 'BPJS','2'=>'Asuransi Lain'];
?>
<style type="text/css">
    hr {
        border: 1px solid black;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">  
                        Pendaftar hari ini : <span class="badge"><?= $model->total_pasien; ?></span>
                        </div>  
                        <div class="col-md-4">      
                        Rawat Jalan hari ini : <span class="badge"><?= $model->total_jalan; ?></span>  
                        </div>  
                        <div class="col-md-4">      
                        Rawat Inap hari ini :  <span class="badge"><?= $model->total_inap; ?></span>
                        </div>  
                    </div>
                </div>
                <br>
                <hr>
                <div class="tindakan-search">
                    <?php $form = ActiveForm::begin([
                        'action' => ['kunjungan'],
                        'method' => 'get',
                        'options' => ['autoComplete'=>'off'],
                        'fieldConfig' => [
                            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                            'horizontalCssClasses' => [
                                'label' => 'col-sm-3',
                                'wrapper' => 'col-sm-9',
                                'error' => '',
                                'hint' => '',
                            ],
                        ],
                    ]); ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">      
                                <?php  echo $form->field($model, 'created_date')->widget(\yii\jui\DatePicker::class,[
                                'dateFormat'    => 'yyyy-MM-dd',
                                'language'      => 'id',
                                'options'       => [
                                    'class' => 'form-control',
                                    'placeholder'   => 'Masukkan tanggal masuk', 
                                ],
                                ])->label('Tanggal Masuk') ?>
                            </div>  
                            <div class="col-md-4">      
                                <?php  echo $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::class,[
                                'dateFormat'    => 'yyyy-MM-dd',
                                'language'      => 'id',
                                'options'       => [
                                    'class'       => 'form-control',
                                    'placeholder' => 'Masukkan tanggal keluar'
                                ],
                                ])->label('Tanggal Keluar') ?>
                            </div>  
                            <div class="col-md-4">      
                                <?php echo $form->field($model, 'status')->dropDownList($rawatJalan,['prompt'=>'Pilih Status'])->label("Status Rawat");?>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="col-md-4">      
                                <?php echo $form->field($model, 'cara_bayar')->dropDownList($list,['prompt'=>'Pilih Cara Bayar'])->label("Cara Bayar");?>
                            </div>
                        <div class="row">
                        </div>
                    </div>

                    <div class="form-group" style="text-align: center;">
                        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Hapus', ['/tindakan/kunjungan'], ['class' => 'btn btn-danger']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
