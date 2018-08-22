<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PekerjaMedis */

$this->title = 'Tambah Tenaga Medis';
?>
<div class="portlet">
	<i class="glyphicon glyphicon-pencil"></i> <?= Html::encode($this->title) ?>	
</div>

<div class="pekerja-medis-create" style="margin: 10px;padding-top: 1px;padding-bottom: 1px">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php $this->registerCss($this->render('@app/web/css/headerForm.css'));?>
