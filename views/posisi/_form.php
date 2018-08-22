<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Posisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posisi-form">

	<?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options'=>['autoComplete'=>'off'],
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-4',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]);?>

    <?= $form->field($model, 'posisi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <label class="control-label col-sm-5"></label>
        <div class="col-sm-6">
             <?= Html::a('<span class="btn-label"></span>Kembali',
                ['/posisi/index'],
                [
                    'class' => 'btn btn-label btn-info m-b-5 pull-left',
                    'title' => 'Kembali',
                    'style'=> 'padding: 3px 10px'
                ]) ?>&nbsp;
           <?= Html::submitButton('Simpan', ['class' => 'btn btn-success','style'=> 'padding: 3px 10px','data' => [
                        'confirm' => 'Apakah anda yakin untuk menyimpan data pekerja medis?'
                           ]]
            ) ?>
        </div>
    </div>&nbsp;

    <?php ActiveForm::end(); ?>

</div>
