<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Posisi;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\PekerjaMedis */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
    .control-label{
        color: #131212 !important;
    }
</style>

<div class="pekerja-medis-form">

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

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posisi',['template' => "{label}<div class='input-group col-sm-5'>{input}<span class='input-group-addon'>
        <a href=/posisi/create>Tambah Posisi?</a></span></div>",
        ])->dropDownList(ArrayHelper::map(Posisi::find()->all(),'id','posisi'),['prompt'=>'Pilih Posisi']); ?>



    <div class="form-group">
        <label class="control-label col-sm-5"></label>
        <div class="col-sm-6">
             <?= Html::a('<span class="btn-label"></span>Kembali',
                ['index'],
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
