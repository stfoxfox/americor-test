<?php

namespace app\widgets\HistoryList\items\ChangeQualityItem;

use yii\web\AssetBundle;

class ChangeQualityItemAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/HistoryList/items/ChangeQualityItem/assets';

    public $css = [
        'css/style.css',
    ];

    public $js = [
    ];
    
    public $depends = [
        'app\assets\AppAsset'
    ];
}