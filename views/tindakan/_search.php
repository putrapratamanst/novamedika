<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
// use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TindakanSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
<div class="tindakan-index">


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

    <?php  echo $form->field($model, 'created_date')->widget(\yii\jui\DatePicker::class,[
    'dateFormat'    => 'yyyy-MM-dd',
    'language'      => 'id',
    'options'       => ['placeholder' => 'Masukkan tanggal Kunjungan','style' => 'width: 30%',],
    ])->label('Tanggal Masuk') ?>

    <?php  echo $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::class,[
    'dateFormat'    => 'yyyy-MM-dd',
    'language'      => 'id',
    'options'       => ['placeholder' => 'Masukkan tanggal Kunjungan','style' => 'width: 30%',],
    ])->label('Tanggal Keluar') ?>

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['/tindakan/kunjungan'], ['class' => 'btn btn-danger','style'=>'margin-right:20px',]) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</div>
</div>
