<?php 
use app\models\Pasien;
?>
<link rel="stylesheet" href="<?= Yii::getAlias('@web/css/') ?>print.css"  media="print">

<style>@page {
   /*size: A4 ; */
   size: legal landscape; 
   /*size: A5 ; */
 }

.alphabet{
      white-space: pre-line;
}
.alphabet li {
    display: inline-block;
    width: 27px;
    height: 27px;
    text-align: center;
    border: solid 1px #888;
}
.floating-box {
    float: left;
    /*width: 150px;*/
    height: 75px;
    margin: 10px;
}.floating-box2 {
    float: left;
    width: 150px;
    height: 60px;
    margin: 10px;
    border: solid 1px #888;
}
.myinfo {
    /*width: 150px;*/
    height: 750px;
    float: left;
    border-left: 2px solid black;
    /*padding-left: 10px;*/
}
.myinfo:last-child {
    border-right: 2px solid black;
}
</style>

<!-- <body> -->
<body onload="window.print();" class="A4">

   
  <!-- Main content -->
  <section class="sheet padding-2mm">
    <!-- /.row -->

    <div class="row">
      
      <div class="col-xs-12 table-responsive">

        <div class="floating-box">
          <img src="<?= Yii::getAlias('@web/theme/') ?>img/logo_with_text.png?>"  style="margin-left: 30px" width="200px"/>

          
        </div>
        <div class="floating-box2" style="margin-left: 348px">
        No. RM: <h6 style="text-align: center;font-size: 25px"><?=$model->no_rm;?></h6>
        </div>     


        <table style="font-size: 12pt;margin: auto; border: 0px">
          <thead>
            </thead>
        </table>
        <div class="gabungan" style="padding-left: 34px;font-size: 13pt">
        <div class='myinfo'><table style="border: solid 2px black;width: 200px;"><tr><td style="text-align: center;">Tanggal</td></tr></table></div>
        <div class='myinfo'><table style="border: solid 2px black"><tr><td>Anamnesis / Pemeriksaan / Diagnosis</td></tr></table></div>
        <div class='myinfo'><table style="border: solid 2px black;width: 200px"><tr><td style="text-align: center;">Pengobatan</td></tr></table></div>
      </div>
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
