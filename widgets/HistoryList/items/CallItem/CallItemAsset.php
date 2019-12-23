<?php

namespace app\widgets\HistoryList\items\CallItem;

use yii\web\AssetBundle;

class CallItemAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/HistoryList/items/CallItem/assets';

    public $css = [
        'css/style.css',
    ];

    public $js = [
    ];
    
    public $depends = [
        'app\assets\AppAsset'
    ];
}