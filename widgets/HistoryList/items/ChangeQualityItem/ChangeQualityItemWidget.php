<?php

namespace app\widgets\HistoryList\items\ChangeQualityItem;

use app\models\Customer;
use yii\base\Widget;

class ChangeQualityItemWidget extends Widget
{
    /** @var History */
    public $model;

    public function run()
    {
        return $this->render('item', [
            'model' => $this->model,
            'oldValue' => Customer::getQualityTextByQuality($this->model->getDetailOldValue('quality')),
            'newValue' => Customer::getQualityTextByQuality($this->model->getDetailNewValue('quality')),
        ]);
    }
}
