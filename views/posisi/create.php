<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Posisi */

$this->title = 'Tambah Posisi';

?>
<div class="portlet">
	<i class="glyphicon glyphicon-pencil"></i> <?= Html::encode($this->title) ?>	
</div>

<div class="posisi-create" style="margin: 10px;padding-top: 1px;padding-bottom: 1px">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php $this->registerCss($this->render('@app/web/css/headerForm.css'));?>
