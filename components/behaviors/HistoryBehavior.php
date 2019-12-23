<?php

namespace app\components\behaviors;

use app\components\events\HistoryEventInterface;
use yii\base\Behavior;
use app\models\History;
use app\components\HistoryEventManager;

class HistoryBehavior extends Behavior
{
    /** @var String $body */
    private $body;

    /** @var String $widgetClass */
    private $widgetClass;

    /**
     * @return mixed
     */
    public function events()
    {
        return [
            History::EVENT_AFTER_FIND => 'createBody',
        ];
    }

    /**
     * @param HistoryEventInterface $event
     */
    public function setBody(HistoryEventInterface $event)
    {
        $this->body = $event->getBody();
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /** 
     * @param HistoryEventInterface $event
     */
    public function setWidgetClass(HistoryEventInterface $event)
    {
        $this->widgetClass = $event->getWidgetClass();
    }

    /**
     * @return string
     */
    public function getWidgetClass()
    {
        return $this->widgetClass;
    }

    /**
     * @param Event event
     */
    public function createBody($event)
    {
        $event->sender->trigger($event->sender->event, HistoryEventManager::buildEvent($event->sender));
    }
}
