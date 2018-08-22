<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Pasien */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
    .control-label{
        color: #131212 !important;
    }
</style>
<div class="pasien-form">

    <?php $form = ActiveForm::begin();?>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <?php if($model->isNewRecord):?> 
                    <?= $form->field($model, 'nama',['inputOptions' => ['autocomplete' => 'off']])->textInput(['maxlength' => true,'onchange'=>"myFunction()",'style' => 'text-transform: uppercase']) ?>
                <?php else:?>
                    <?= $form->field($model, 'nama',['inputOptions' => ['autocomplete' => 'off']])->textInput(['maxlength' => true]) ?>
                <?php endif;?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'tanggal_lahir')->textInput(['maxlength' => true,'type'=>'date']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'kategori_pasien')->dropDownList(['prolanis' => 'Prolanis','non prolanis' => 'Non Prolanis'],['prompt'=>'Pilih Kategori Pasien']); ?>
            </div>
        </div>
    </div>

 <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'no_ktp',['inputOptions' => ['autocomplete' => 'off']])->textInput(['maxlength' => true,'class' => 'validate-key form-control']) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'no_bpjs',['inputOptions' => ['autocomplete' => 'off']])->textInput(['maxlength' => true,'class' => 'validate-key form-control']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'no_rm',['inputOptions' => ['autocomplete' => 'off']])->textInput(['maxlength' => true,'readonly'=>false,'style' => 'text-transform: uppercase']) ?>
            </div>

        </div>
    </div>
      
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'alamat',['inputOptions' => ['autocomplete' => 'off']])->textInput() ?>
        </div>

        <div class="col-md-6">
            <?php 
            $list = ['0' => 'Umum','1' => 'BPJS','2'=>'Asuransi Lain'];
                if($model->isNewRecord): ?>
                
                <?= $form->field($model, 'cara_bayar')->inline(true)->radioList($list,[ 'item' => function($index, $label, $name, $checked, $value) {
                    $return = '<label class="modal-radio">';
                    $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" id="custom_id_value_'.$index.'" >';
                    $return .= '<span>  ' . ucwords($label) . '</span>';
                    $return .= '</label>';
                    return $return;
                 }]); ?> 
        </div>
        <div class="col-md-6">
                <?php else:?>
                <?= $form->field($model, 'cara_bayar')->inline(true)->radioList($list,[ 
                    'item' => function($index, $label, $name, $checked, $value) {
                    $checked = $checked ? 'checked' : '';
                    $return = '<label class="modal-radio">';
                    $return .= "<input type='radio' {$checked} name='{$name}' value='{$value}'>";
                    $return .= '<span>  ' . ucwords($label) . '</span>';
                    $return .= '</label>';
                    return $return;
                 }]); ?> 
                <?php endif;?>
        </div>
    </div>
    </div>

<div class="col-md-12">
        <div class="col-md-6 pull-right">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success pull-right','data' => [
                    'confirm' => 'Apakah anda yakin untuk menyimpan data pasien?'
                ]]
            ) ?> 
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-primary pull-right','style'=>'margin-right:20px',]) ?>
        </div>
</div>
   &nbsp;

    <?php ActiveForm::end(); ?>

</div>

    

<?php 
$this->registerJsFile(Yii::getAlias('@web/js/') . '_form_pasien.js',['depends'=>['app\assets\AppAssetWithoutJS']]);
$this->registerJs('
$(".validate-key").keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, "");
  }
});
    ')
?>