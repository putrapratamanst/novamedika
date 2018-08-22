<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TindakanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tindakan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pemeriksaan_fisik') ?>

    <?= $form->field($model, 'anamnesa') ?>

    <?= $form->field($model, 'diagnosa') ?>

    <?= $form->field($model, 'terapi') ?>

    <?php // echo $form->field($model, 'biaya') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'id_pasien') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
