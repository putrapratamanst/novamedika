<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PekerjaMedis */

$this->title = $model->nama;
?>
<div class="portlet">
	<i class="glyphicon glyphicon-search"></i> Ubah Data Tenaga Medis : <?= Html::encode($this->title) ?>	
</div>

<div class="pekerja-medis-update" style="margin: 10px;padding-top: 1px;padding-bottom: 1px">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php $this->registerCss($this->render('@app/web/css/headerForm.css'));?>
