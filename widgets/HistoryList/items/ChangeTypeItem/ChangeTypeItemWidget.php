<?php

namespace app\widgets\HistoryList\items\ChangeTypeItem;

use yii\base\Widget;
use app\models\Customer;

class ChangeTypeItemWidget extends Widget
{
    /** @var History */
    public $model;

    public function run()
    {
        return $this->render('item', [
            'model' => $this->model,
            'oldValue' => Customer::getTypeTextByType($this->model->getDetailOldValue('type')),
            'newValue' => Customer::getTypeTextByType($this->model->getDetailNewValue('type'))
        ]);
    }
}
