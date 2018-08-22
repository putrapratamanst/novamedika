<?php

use yii\helpers\Html;

$this->title = $model->pasien->nama;

?>
<div class="portlet">
	<i class="glyphicon glyphicon-search"></i> Ubah Data Rawat Jalan	
</div>
<div class="pasien-update" style="margin: 10px;padding-top: 1px;padding-bottom: 1px">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php $this->registerCss($this->render('@app/web/css/headerForm.css'));?>
