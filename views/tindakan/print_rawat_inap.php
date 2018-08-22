<?php 
use app\models\Pasien;
use app\models\Helper;
?>

  <link rel="stylesheet" href="<?= Yii::getAlias('@web/css/') ?>print.css">

  <style>@page {
   size: A4 ; 
 }

.myinfo {
    /*width: 150px;*/
    height: 900px;
    float: left;
    border-left: 1px solid black;
    font-size: 9pt;
    /*padding-left: 10px;*/
}
.myinfo:last-child {
    border-right: 1px solid black;
}
.myinfo td{
    text-align: center;
    border-bottom: 1.4px solid black; 
    border-top: 1px solid black; 
    border-left: 0px solid black; 
    border-right: 0px solid black; 
}
</style>

<!-- <body> -->
<body onload="window.print();" class="A4">

   
  <!-- Main content -->
  <section class="sheet padding-2mm">
    <!-- /.row -->

    <div class="row">
      
      <div class="col-xs-12 table-responsive">
        <center>
          <img src="<?= Yii::getAlias('@web/theme/') ?>img/logobesartext.png?>"  height="160" width="4000"/>
        </center>
        <div id = "no-rm" class="pull-right" style="padding-right: 40px;font-size: 10pt"">
            <b>No.RM : <?=$model->pasien->no_rm; ?> 
        </div><br>
        <center>
            <b style="font-size: 12pt">DOKUMEN REKAM MEDIS RAWAT INAP</b> 
        </center>



        <table style="font-size: 11pt;margin: auto; border: 0px">
          <thead>
            <tr>
              <td style="width: 600px;border: 0px;padding-left:24px">&nbsp;&nbsp;&nbsp;Nama Pasien &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?=$model->pasien->nama; ?> 
              </td>
              <td style="width: 600px;border: 0px;padding-left:170px">&nbsp;&nbsp;&nbsp;Umur  &nbsp;&nbsp;:&nbsp;
                <?= Pasien::getAge($model->pasien->tanggal_lahir);?> tahun </td>
            </tr>
            <tr>
                <td style="width: 600px;border: 0px;padding-left:24px">&nbsp;&nbsp;&nbsp;Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?=$model->pasien->alamat; ?> 
                </td>
              <td style="width: 600px;border: 0px;padding-left:170px">&nbsp;&nbsp;&nbsp;Jam &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;...................................... </td>
            </tr>
            <tr>
              <td style="width: 800px;border: 0px;padding-left:24px">&nbsp;&nbsp;&nbsp;Tanggal Masuk &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?= 
              Helper::indoDateFormat($model->tanggal_masuk);?> </td>
            </tr>
            <tr>
              <td style="width: 800px;border: 0px;padding-left:24px">&nbsp;&nbsp;&nbsp;Tanggal Keluar &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; ...................................... </td>
            </tr>
            </thead>
        </table>
        <br>
        <div class="gabungan" style="padding-left: 34px;font-size: 13pt">

        <div class='myinfo'>
            <table style="border: solid 1px black;width: 130px;"><tr><td>Tanggal / Jam<br> &nbsp;</td></tr>
            </table>
        </div>

        <div class='myinfo'>
            <table style="border: solid 1px black;width: 270px"><tr><td>Anamnesis / Pemeriksaan / <br>Diagnosis</td></tr>
            </table>
        </div>

        <div class='myinfo'>
            <table style="border: solid 1px black;width: 180px"><tr><td>Pengobatan <br> (Tindakan)</td></tr
                ></table>
        </div>

        <div class='myinfo'>
            <table style="border: solid 1px black;width: 120px"><tr><td>Paraf<br> &nbsp;</td></tr>
            </table>
        </div>

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
