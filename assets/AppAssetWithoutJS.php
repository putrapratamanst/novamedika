<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetWithoutJS extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        // 'css/login.css',
        'theme/css/bootstrap.min.css',
        'theme/css/animate.min.css',
        'theme/css/light-bootstrap-dashboard.css?v=1.4.0', //todo, error untuk ngeluarin datepicker
        'theme/css/font-awesome.min.css',
        'theme/css/pe-icon-7-stroke.css',
      
    ];
    public $js = [
        // 'theme/js/jquery.3.2.1.min.js',
        'theme/js/bootstrap.min.js',
        'theme/js/chartist.min.js',
        'theme/js/bootstrap-notify.js',
        'theme/js/light-bootstrap-dashboard.js?v=1.4.0',
        'theme/js/demo.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
