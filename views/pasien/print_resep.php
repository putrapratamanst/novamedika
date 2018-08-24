<?php 
use app\models\Pasien;
?>
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/css/') ?>print.css" media="print">

  <style>@page {
   size: legal landscape;  
   /*size: A5 ; */
 }

</style>

<!-- <body> -->
<body onload="window.print();" class="A4">

   
  <!-- Main content -->
  <section class="sheet padding-0mm">
    <!-- /.row -->

    <div class="row" style="margin:auto;">
      <div class="col-xs-12 table-responsive" style="font-size: 20px">
        <div class="floating-box">
          <br>
          <img src="<?= Yii::getAlias('@web/theme/') ?>img/logoresep.png?>" width="970px"/><br>
                  <img src="<?= Yii::getAlias('@web/theme/') ?>img/garis.png?>" width="385px"/><br>

        Dokter:<br>
          Tanggal: 
          <?php
               use app\models\Helper;
               // echo "Kamis, 22 September 2018"
                echo Helper::indoDateFormat(date("Y:m:d h:i:s ")); 
               ?><br>
                  <img src="<?= Yii::getAlias('@web/theme/') ?>img/garis.png?>" width="385px"/>

        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <img src="<?= Yii::getAlias('@web/theme/') ?>img/garis.png?>" width="385px"/>
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
