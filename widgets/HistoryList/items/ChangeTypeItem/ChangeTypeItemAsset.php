<?php

namespace app\widgets\HistoryList\items\ChangeTypeItem;

use yii\web\AssetBundle;

class ChangeTypeItemAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/HistoryList/items/ChangeTypeItem/assets';

    public $css = [
        'css/style.css',
    ];

    public $js = [
    ];
    
    public $depends = [
        'app\assets\AppAsset'
    ];
}