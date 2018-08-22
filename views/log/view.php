<?php
use app\models\Helper; 
use app\models\Log;

$time = Log::find()->where(['user_id' => $id])->orderBy('id DESC')->asArray()->all();
if(!empty($time)){


    $new_login = [];
    $new_logout = [];
    $user = [];
    $count = [];
    $temp = [];
    foreach ($time as $key => $value) 
    {
        $user[] = $value['user_id'];
        $user = array_unique($user);
        $new_login = strtotime($value['login_time']);
        $new_logout = strtotime($value['logout_time']);
        $count[$key] = $new_logout - $new_login;

        $temp[$value['user_id']] =  $count;

    }

    $counts = [];
    foreach ($temp as $keyss => $item)
    {

    }
    ?>
    <center><h3><?=Helper::indoDateFormat(date("d-m-Y"));?></h3></center>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>Waktu Kerja</th><td>
                <?=gmdate("H:i:s",array_sum($temp[$keyss]))?></td></tr>
        </tbody>
    </table>
    <?php } else {?>
        <table id="w0" class="table table-striped table-bordered detail-view">
            <tbody>
                <tr><th>Waktu Kerja</th><td>-</td></tr>
            </tbody>
        </table>
    <?php } ?>