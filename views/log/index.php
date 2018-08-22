<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Log;
$this->registerCss($this->render('/pasien/table.css'));

?>
<div class="content">
<!--     <center>
        <h2>Tenaga Medis</h2>
    </center>
 -->    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <!-- <a href="<?php echo  Yii::$app->urlManager->createUrl('/pekerja-medis/create')?>" class="btn btn-primary"> -->
                        <!-- Tambah Tenaga Medis -->
                        <!-- </a> -->
                    </div>
                    <div class="content table-responsive table-full-width">
                        <?php Pjax::begin(); ?>
                        <?= GridView::widget([
                            'dataProvider'  => $dataProviderTenagaMedis,
                            'layout'        =>'{items}{pager}',
                            'filterModel'   => $searchModelTenagaMedis,
                            'options'       =>['style' => 'padding:15px;'],
                            'columns'       => [
                                    [
                                    'class'         => 'yii\grid\SerialColumn',
                                    'header'        => 'No', 
                                    'headerOptions' => ['style'=> 'width: 3%;text-align:center;color:#337ab7;vertical-align: middle'],
                                    'contentOptions' => ['style'=> 'text-align:center'],
                                ],


                                // 'login_time',
                                // 'nama',
                                [
                                    'attribute'=>'nama',
                                    'filter'=>false
                                ],
                                // [
                                //     'attribute' => 'logout_time',
                                //     'value' => function($data){
                                //         $today = date('2018-08-05');
                                //         // $today = date('Y-m-d');
                                //         $time = Log::find()->where(['user_id' => "1"])->where(['like','login_time',$today])->orderBy('id DESC')->asArray()->all();
                                //             echo"<pre>";print_r($time);

                                //         $new_login = [];
                                //         $new_logout = [];
                                //         $user = [];
                                //         $count = [];
                                //         $temp = [];
                                //         foreach ($time as $key => $value) 
                                //         {
                                //             $user[] = $value['user_id'];
                                //             $user = array_unique($user);
                                //             // echo"<pre>";print_r($user);
                                //             $new_login = strtotime($value['login_time']);
                                //             $new_logout = strtotime($value['logout_time']);
                                //             $count[$key] = $new_logout - $new_login;

                                //             $temp[$value['user_id']] =  $count;
                                //         }
                                //             // echo"<pre>";print_r($temp);

                                //         $counts = [];
                                //         // foreach ($temp as $keyss => $item)
                                //         // {
                                //         //         // echo"<pre>";print_r($user);
                                //         // echo"<pre>";print_r($temp[$keyss]);

                                //         // }
                                //         exit();   

                                //         // return $data->logout_time - $data->login_time;
                                //         // $logout = strtotime($time->logout_time);
                                //         // $login = strtotime($time->login_time);
                                //         // echo"<pre>";var_dump(date("i:s",$logout-$login));exit();
                                //         // $login = strtime($data->login_time);
                                //         // return array_sum($temp[$key]);
                                //     }
                                // ],

                                [
                                    'class'         => 'yii\grid\ActionColumn',
                                    'header'        => "Pilihan",
                                    'headerOptions' =>['style'=>'font-weight:bold;'],
                                    'template'      => '{view} ',
                                    'contentOptions'=>['style'=>'width: 160px;text-align:center'],
                                    'buttons'       => [
                                        'view' => function ($url,$model) {
                                            return Html::a(
                                            '<button type="button" class="btn btn-info">Lihat</button>',
                                            $url = "/log/view?id=".$model->user_id,
                                            [
                                                'title'     => 'View',
                                                'data-pjax' => '0',
                                            ]
                                            );
                                        },
                                        // 'delete' => function ($url,$model) {
                                        //     return Html::a(
                                        //     '<button type="button" class="btn btn-danger">Hapus</button>',
                                        //     $url = "/pekerja-medis/delete?id=".$model->id,
                                        //     [
                                        //         'title'     => 'delete',
                                        //         'data-pjax' => '0',
                                        //         'data' => [
                                        //                 'confirm' =>  'Apakah yakin ingin menghapus?',
                                        //                 'method' => 'post',
                                        //             ],
                                        //     ]
                                        //     );
                                        // },
                                    ]
                                ],
                            ],
                            ]); ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>