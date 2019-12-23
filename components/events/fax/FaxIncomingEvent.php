<?php

namespace app\components\events\fax;

use app\components\events\HistoryEventInterface;
use app\widgets\HistoryList\items\FaxItem\FaxItemWidget;
use yii\base\Event;

class FaxIncomingEvent extends Event implements HistoryEventInterface
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
        return $this->model->eventText;
    }

    /**
     * @return string
     */
    public function getWidgetClass()
    {
        return FaxItemWidget::class;
    }
}
