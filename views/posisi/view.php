<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PekerjaMedis */

$this->title = 'Posisi';
?>
<div class="pekerja-medis-view" style="margin: 10px;padding-top: 1px;padding-bottom: 1px">
    <p class="pull-left">
        <?= Html::a('<span class="btn-label"></span>Kembali',['/pekerja-medis'],
            [
                    'class' => 'btn btn-labeled btn-info m-b-5 pull-left',
                    'style'=> 'padding: 3px 10px',
                    'title' => 'Cancel'
            ]) ?>&nbsp; 
            <?= Html::a('Ubah Data Pekerja Medis', ['update', 'id' => $model->id], ['class' => 'btn btn-primary','style'=> 'padding: 3px 10px',]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'posisi',
           
        ],
    ]) ?>

</div>

<?php 
$this->registerCss($this->render('/pasien/pasien.css'));
$this->registerCss($this->render('@app/web/css/DetailView.css'));
$this->registerCss($this->render('/pasien/jquery.pulsate.min.js'));
$this->registerJS('

    // $(document).ready(function(){

    //     $.notify({
    //         icon: "pe-7s-paperclip",
    //         message: "<b>Data telah tersimpan</b>"

    //     },{
    //         type: "info",
    //         timer: 1000
    //     });

    // });
');
?>

