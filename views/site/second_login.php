<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .animated {
        background-image: url();
        background-repeat: no-repeat;
        background-position: left top;
        padding-top:20px;
        margin-bottom:20px;
        -webkit-animation-duration: 10s;
        animation-duration: 10s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
     }
     
     @-webkit-keyframes fadeIn {
        0% {opacity: 0;}
        100% {opacity: 1;}
     }
     
     @keyframes fadeIn {
        0% {opacity: 0;}
        100% {opacity: 1;}
     }
     
     .fadeIn {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;
     }
</style>

<div class="container">
    <div class="row text-center" style="padding-top: 100px">
        <font face="Times New Rowman" size="9px"><b>Login Perawat</b></font>
        <br>
        <img src="<?= Yii::getAlias('@web/theme/') ?>/img/login_logo.png?>" id="animated-example" class="animated fadeIn">
    </div>
    <div class="row" >       
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <?= $form->field($model2, 'nama',['inputOptions' => ['autocomplete' => 'off']])->textInput(['autofocus' => true]); ?>

                        <?= $form->field($model2, 'sandi')->passwordInput([]); ?>

                    <div class="form-group" align="center">
                        <?= Html::a('Beranda', ['index'], ['class' => 'btn btn-success', 'name' => 'login-button',]) ?>
                        <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary', 'name' => 'login-button',]) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

