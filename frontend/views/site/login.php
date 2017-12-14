<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
// use yii\bootstrap\ActiveForm;
use kartik\form\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">


    
</div>

<div class="login-box">
  <div class="login-logo">
    <img src="<?= Yii::getAlias('@web/uploads/')?>logo.png">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

   <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


               <?php 
                echo $form->field($model, 'username', [
                    'feedbackIcon' => [
                        'default' => 'user',
                        'success' => 'ok',
                        'error' => 'exclamation-sign',
                        'defaultOptions' => ['class'=>'text-primary']
                    ]
                ])->textInput(['autofocus' => true,]);
                    ?>


                <?php 
                echo $form->field($model, 'password', [
                    'feedbackIcon' => [
                        'default' => 'lock',
                        'success' => 'ok',
                        'error' => 'exclamation-sign',
                        'defaultOptions' => ['class'=>'text-primary']
                    ]
                ])->passwordInput([]);
                    ?>


                <!--<?= $form->field($model, 'rememberMe')->checkbox() ?>-->

           <!--      <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div> -->

                <div class="form-group" align="center">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button',]) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>


    <!-- /.social-auth-links -->

    

  </div>
  <!-- /.login-box-body -->
</div>
