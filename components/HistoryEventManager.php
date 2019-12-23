<?php

namespace app\components;

use app\components\events\call\CallIncomingEvent;
use app\components\events\call\CallOutgoingEvent;
use app\components\events\customer\CustomerChangeQualityEvent;
use app\components\events\customer\CustomerChangeTypeEvent;
use app\components\events\fax\FaxIncomingEvent;
use app\components\events\fax\FaxOutgoingEvent;
use app\components\events\HistoryEventInterface;
use app\components\events\sms\SmsIncomingEvent;
use app\components\events\sms\SmsOutgoingEvent;
use app\components\events\task\CompletedTaskEvent;
use app\components\events\task\CreatedTaskEvent;
use app\components\events\task\UpdatedTaskEvent;
use yii\base\Component;
use app\models\History;

class HistoryEventManager extends Component
{

    /**
     * @return mixed
     */
    private static function getEventBody()
    {
        return [
            History::EVENT_CREATED_TASK => CreatedTaskEvent::class,
            History::EVENT_UPDATED_TASK => UpdatedTaskEvent::class,
            History::EVENT_COMPLETED_TASK => CompletedTaskEvent::class,
            History::EVENT_INCOMING_SMS => SmsIncomingEvent::class,
            History::EVENT_OUTGOING_SMS => SmsOutgoingEvent::class,
            History::EVENT_CUSTOMER_CHANGE_TYPE => CustomerChangeTypeEvent::class,
            History::EVENT_CUSTOMER_CHANGE_QUALITY => CustomerChangeQualityEvent::class,
            History::EVENT_OUTGOING_CALL => CallIncomingEvent::class,
            History::EVENT_INCOMING_CALL => CallOutgoingEvent::class,
            History::EVENT_INCOMING_FAX => FaxIncomingEvent::class,
            History::EVENT_OUTGOING_FAX => FaxOutgoingEvent::class,
        ];
    }


    /**
     * @param History $model
     * @return HistoryEventInterface
     */
    public static function buildEvent($model) : HistoryEventInterface
    {
        foreach (self::getEventBody() as $key => $value) {
            if ($model->event == $key) {
                $event = new $value;
                $event->setModel($model);
                return $event;
            }
        }
    }
}