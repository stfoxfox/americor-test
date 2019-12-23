<?php

namespace app\components\events\call;

use app\components\events\HistoryEventInterface;
use app\widgets\HistoryList\items\CallItem\CallItemWidget;
use yii\base\Event;

class CallOutgoingEvent extends Event implements HistoryEventInterface
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
        $call = $this->model->call;
        return ($call ? $call->totalStatusText .
            ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ');
    }

    /**
     * @return string
     */
    public function getWidgetClass()
    {
        return CallItemWidget::class;
    }
}
