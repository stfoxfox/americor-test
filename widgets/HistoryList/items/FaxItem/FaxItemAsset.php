<?php

namespace app\widgets\HistoryList\items\FaxItem;

use yii\web\AssetBundle;

class FaxItemAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/HistoryList/items/FaxItem/assets';

    public $css = [
        'css/style.css',
    ];

    public $js = [
    ];
    
    public $depends = [
        'app\assets\AppAsset'
    ];
}