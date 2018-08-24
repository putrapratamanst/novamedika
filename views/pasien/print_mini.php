<?php 
use app\models\Pasien;
?>
<link rel="stylesheet" href="<?= Yii::getAlias('@web/css/') ?>print.css" media="print">

<style>@page {
   size: legal landscape; 
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
    height: 730px;
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
          <ul class="alphabet" style="margin-top: 20px"><li>A</li><li>B</li><li>C</li><li>D</li><li>E</li><li>F</li><li>G</li><li>H</li><li>I</li><li>J</li><li>K</li><li>L</li><li>M</li><li>N</li><li>O</li><li>P</li><li>Q</li><li>R</li><li>S</li><li>T</li><li>U</li><li>V</li><li>W</li><li>X</li><li>Y</li><li>Z</li></ul> 

        <div class="floating-box">
          <img src="<?= Yii::getAlias('@web/theme/') ?>img/footer_logo.png?>"  style="margin-left: 30px"/>
          
          <p style="font-size: xx-small;margin-left: 30px">
          Alamat: Telukan, Wanglu, Trucuk, Klaten <br>
          novamedika@yahoo.com Telp. 085 100 850 455
        </p>
        </div>
        <div class="floating-box2" style="margin-left: 348px">
        No. RM: <h6 style="text-align: center;font-size: 25px"><?=$model->no_rm;?></h6>
        </div>     


        <table style="font-size: 12pt;margin: auto; border: 0px">
          <thead>
            <tr>
              <td style="width: 600px;border: 0px;padding-left:24px ">
                &nbsp;&nbsp;&nbsp;Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $model->nama; ?>
               </td>     

              <td style="width: 600px;border: 0px;padding-left:100px">
                Umur/Tgl. Lahir :&nbsp; <?= Pasien::getAge($model->tanggal_lahir);?> /
                <?php
                use app\models\Helper;
                echo Helper::dateFormat($model->tanggal_lahir); ?></td>
            </tr>
            <tr>
              <td style="width: 600px;border: 0px;padding-left:24px">&nbsp;&nbsp;&nbsp;No KTP &nbsp;&nbsp;: <?= $model->no_ktp; ?> </td>
              <td style="width: 600px;border: 0px;padding-left:100px">Kategori Pasien : <?php echo strtoupper($model->kategori_pasien); ?></td>
            </tr>
            <tr>
              <td style="width: 600px;border: 0px;padding-left:24px">&nbsp;&nbsp;&nbsp;Alamat&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $model->alamat; ?> </td>
            </tr>
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
