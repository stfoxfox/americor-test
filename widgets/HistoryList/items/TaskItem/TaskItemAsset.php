<?php

namespace app\widgets\HistoryList\items\TaskItem;

use yii\web\AssetBundle;

class TaskItemAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/HistoryList/items/TaskItem/assets';

    public $css = [
        'css/style.css',
    ];

    public $js = [
    ];
    
    public $depends = [
        'app\assets\AppAsset'
    ];
}