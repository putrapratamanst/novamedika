<?php 
use app\models\Pasien;
?>
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/css/') ?>print.css">

  <style>@page {
   size: A5 ; 
 }

</style>

<!-- <body> -->
<body onload="window.print();" class="A4">

   
  <!-- Main content -->
  <section class="sheet padding-2mm">
    <!-- /.row -->

    <div class="row" style="margin:auto;">
      <div class="col-xs-12 table-responsive">
        <div class="floating-box">
          <br>
          <img src="<?= Yii::getAlias('@web/theme/') ?>img/logoresep.png?>" width="4000"/>
          Dokter: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Tanggal: 
          <?php
               use app\models\Helper;
                echo Helper::indoDateFormat(date("Y:m:d h:i:s ")); ?>
                  <img src="<?= Yii::getAlias('@web/theme/') ?>img/garis.png?>" width="4000"/>

        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <img src="<?= Yii::getAlias('@web/theme/') ?>img/garis.png?>" width="4000"/>
        <br>
        Pro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $model->nama;?><br>
        Umur &nbsp;: <?= Pasien::getAge($model->tanggal_lahir);?> tahun
        <br>
        <br>
        <br>
        <br>
      </div>
     </div>
   </section>
 </body>
<script type="text/javascript">
window.print();
// window.onfocus=function(){
 window.close();
// }
</script>
