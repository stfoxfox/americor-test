<?php

namespace app\widgets\HistoryList\items\TaskItem;

use yii\base\Widget;

class TaskItemWidget extends Widget
{
    /** @var History */
    public $model;

    public function run()
    {
        /** @var Task task */
        $task = $this->model->task;

        echo $this->render('item', [
            'user' => $this->model->user,
            'body' => $this->model->body,//$this->model->eventText. ': ' . ($task->title ?? ''),
            'iconClass' => 'fa-check-square bg-yellow',
            'footerDatetime' => $this->model->ins_ts,
            'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
        ]);
    }
}
