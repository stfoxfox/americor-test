<?php

namespace app\components\events\customer;

use app\components\events\HistoryEventInterface;
use app\models\Customer;
use app\widgets\HistoryList\items\ChangeQualityItem\ChangeQualityItemWidget;
use yii\base\Event;

class CustomerChangeQualityEvent extends Event implements HistoryEventInterface
{
    /** @var History $model */
    private $model;

    /**
     * @param History $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getBody() : string
    {
        return $this->model->eventText . ' ' .
            (Customer::getQualityTextByQuality($this->model->getDetailOldValue('quality')) ?? "not set") . ' to ' .
            (Customer::getQualityTextByQuality($this->model->getDetailNewValue('quality')) ?? "not set");
    }

    /**
     * @return string
     */
    public function getWidgetClass()
    {
        return ChangeQualityItemWidget::class;
    }
}
