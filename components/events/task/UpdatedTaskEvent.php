<?php

namespace app\components\events\task;

use app\components\events\HistoryEventInterface;
use app\widgets\HistoryList\items\TaskItem\TaskItemWidget;
use yii\base\Event;

class UpdatedTaskEvent extends Event implements HistoryEventInterface
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
        $task = $this->model->task;
        return $this->model->eventText . ': ' . ($task->title ?? '');
    }

    /**
     * @return string
     */
    public function getWidgetClass()
    {
        return TaskItemWidget::class;
    }
}
