<?php 
use yii\helpers\Url;
// $path = Url::current();
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$path = "/".$controller."/".$action;
// echo"<pre>";print_r($path);exit();
?>
<div class="sidebar" data-color="white" data-image="/theme/img/sidebar-4.jpg">    
    <div class="sidebar-wrapper">
             <a href="<?php echo Yii::$app->urlManager->createUrl("/")?>">
                <img src ="<?= Yii::getAlias('@web/theme/') ?>img/navbar_logo.png?>" style="padding-left: 1.5px">
            </a>
 
        <ul class="nav">
            <li <?php
            if ($path == "/pasien/index"){
                echo 'class= active';
            }
            if ($path == "/pasien/create"){
                echo 'class= active';
            }
            if ($path == "/pasien/update"){
                echo 'class= active';
            }
            if ($path == "/pasien/view"){
                echo 'class= active';
            }else{
                'class= ';
            }?>>
                <a href="<?php echo Yii::$app->urlManager->createUrl('/pasien/index')?>">
                    <i class="pe-7s-plugin"></i>
                    <p>Pendaftaran Pasien</p>
                </a>
            </li>

        <li <?php
            if ($path == "/site/index"){
                echo 'class= active';
            }
            if ($path == "/tindakan/create"){
                echo 'class= active';
            }
            if ($path == "/tindakan/view"){
                echo 'class= active';
            }
            if ($path == "/tindakan/update"){
                echo 'class= active';
            }else{
                'class= ';
            }?>>                

            <a href="<?php echo Yii::$app->urlManager->createUrl('/site/index')?>">
                    <i class="pe-7s-refresh-2"></i>
                    <p>Pemeriksaan</p>
                </a>
            </li>
            <li <?php
                if ($path == "/tindakan/index-rawat-jalan"){
                    echo 'class= active';
                }
                if ($path == "/tindakan/create-rawat-jalan"){
                    echo 'class= active';
                }
                if ($path == "/tindakan/view-rawat-jalan"){
                    echo 'class= active';
                }
                if ($path == "/tindakan/update-rawat-jalan"){
                    echo 'class= active';
                }else{
                    'class= ';
                }?>>                <a href="<?php echo Yii::$app->urlManager->createUrl('/tindakan/index-rawat-jalan')?>">
                    <i class="pe-7s-id"></i>
                    <p>Rawat Jalan</p>
                </a>
            </li>
            <li <?php
                if ($path == "/tindakan/index-rawat-inap"){
                    echo 'class= active';
                }
                if ($path == "/tindakan/create-rawat-inap"){
                    echo 'class= active';
                }
                if ($path == "/tindakan/view-rawat-inap"){
                    echo 'class= active';
                }
                if ($path == "/tindakan/update-rawat-inap"){
                    echo 'class= active';
                }else{
                    'class= ';
                }?>>                <a href="<?php echo Yii::$app->urlManager->createUrl('/tindakan/index-rawat-inap')?>">
                    <i class="pe-7s-note2"></i>
                    <p>Rawat Inap</p>
                </a>
            </li>
<!--             <li <?php echo $path == "/tindakan/index-fisioterapis" && "/tindakan/index-fisioterapis" ? 'class= active': ''?>>
                <a href="<?php echo Yii::$app->urlManager->createUrl('/tindakan/index-fisioterapis')?>">
                    <i class="pe-7s-news-paper"></i>
                    <p>Fisioterapis</p>
                </a>
            </li> -->
<!--             <li>
                <a href="r?m=peminjaman&s=peminjaman">
                    <i class="pe-7s-notebook"></i>
                    <p>KAI / KB </p>
                </a>
            </li>
            <li>
                <a href="r?m=history&s=history">
                    <i class="pe-7s-folder"></i>
                    <p>BPJS</p>
                </a>
            </li>  -->
            <?php if(Yii::$app->user->identity->user_type == 0){?>
            <li <?php
            if ($path == "/pekerja-medis/index"){
                echo 'class= active';
            }
            if ($path == "/pekerja-medis/create"){
                echo 'class= active';
            }
            if ($path == "/pekerja-medis/view"){
                echo 'class= active';
            }
            if ($path == "/pekerja-medis/update"){
                echo 'class= active';
            }else{
                'class= ';
            }?>>
                <a href="/pekerja-medis">
                    <i class="pe-7s-settings"></i>
                    <p>Tenaga Medis</p>
                </a>
            </li>

            <li <?php
            if ($path == "/posisi/index"){
                echo 'class= active';
            }
            if ($path == "/posisi/create"){
                echo 'class= active';
            }
            if ($path == "/posisi/view"){
                echo 'class= active';
            }
            if ($path == "/posisi/update"){
                echo 'class= active';
            }else{
                'class= ';
            }?>>
                <a href="/posisi">
                    <i class="pe-7s-pen"></i>
                    <p>Posisi</p>
                </a>
            </li>

            <li <?php
            if ($path == "/log/index"){
                echo 'class= active';
            }
            if ($path == "/log/view"){
                echo 'class= active';
            }else{
                'class= ';
            }?>>
                <a href="/log">
                    <i class="pe-7s-clock"></i>
                    <p>Waktu Kerja</p>
                </a>
            </li>
        <?php }?>
        </ul>
    </div>
</div>