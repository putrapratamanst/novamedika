<?php

use yii\helpers\Html;

$this->title = 'Pemeriksaan & Tindakan';

?>
<div class="portlet">
	<i class="glyphicon glyphicon-pencil"></i> <?= Html::encode($this->title) ?>	
</div>
<div class="tindakan-create" style="margin: 10px;padding-top: 1px;padding-bottom: 1px">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php $this->registerCss($this->render('@app/web/css/headerForm.css'));?>
