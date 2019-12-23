<?php

namespace app\widgets\HistoryList\items\SmsItem;

use yii\web\AssetBundle;

class SmsItemAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/HistoryList/items/SmsItem/assets';

    public $css = [
        'css/style.css',
    ];

    public $js = [
    ];
    
    public $depends = [
        'app\assets\AppAsset'
    ];
}