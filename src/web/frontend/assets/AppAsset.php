<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/whitestyle.css',
        'css/jasny-bootstrap/css/jasny-bootstrap.css',
    ];
    public $js = [
        'js/jasny-bootstrap/js/jasny-bootstrap.js',
        'js/ajax-modal-popup.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
