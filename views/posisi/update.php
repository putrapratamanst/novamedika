<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Posisi */


$this->title = $model->posisi;
?>
<div class="portlet">
	<i class="glyphicon glyphicon-search"></i> Ubah Data Posisi : <?= Html::encode($this->title) ?>	
</div>
<div class="posisi-update" style="margin: 10px;padding-top: 1px;padding-bottom: 1px">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php $this->registerCss($this->render('@app/web/css/headerForm.css'));?>
