<?php

namespace app\components\events\sms;

use app\components\events\HistoryEventInterface;
use app\widgets\HistoryList\items\SmsItem\SmsItemWidget;
use yii\base\Event;

class SmsIncomingEvent extends Event implements HistoryEventInterface
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
        return $this->model->sms->message ? $this->model->sms->message : '';
    }

    /**
     * @return string
     */
    public function getWidgetClass()
    {
        return SmsItemWidget::class;
    }
}
