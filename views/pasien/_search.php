<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PasienSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
    #pasien-search {
    margin-left: 280px;
    width: 50%;
    border: 0px solid grey;
    padding: 10px;
}
</style>
<div class="pasien-search col-sm-6" id="pasien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'layout'=>'horizontal',
        'method' => 'get',
           'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
                'autoComplete'=>false,
            ],
        ],
    ]); ?>

 
    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'no_ktp') ?>

    <?= $form->field($model, 'no_bpjs') ?>

    <div class="form-group" style="text-align: center">
        <?= Html::a('<span class="btn-label"><i class=""></i></span>Kembali',
                ['/'],
                [
                    'class' => 'btn btn-label btn-info m-b-5',
                    'style'=> 'padding: 3px 10px',
                    'title' => 'Kembali'
                ]) ?>&nbsp;
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary','style'=> 'padding: 3px 10px']) ?>
        <?= Html::a('Reset',['index'],['class' => 'btn btn-default','style'=> 'padding: 3px 10px']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
