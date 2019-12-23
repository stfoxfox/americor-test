<?php

namespace app\widgets\HistoryList\items\CallItem;

use yii\base\Widget;
use app\models\Call;

class CallItemWidget extends Widget
{
    /** @var History $model */
    public $model;

    public function run()
    {
        /** @var Call $call */
        $call = $this->model->call;

        /** @var boolean $answered */
        $answered = $call && $call->status == Call::STATUS_ANSWERED;

        return $this->render('item', [
            'user' => $this->model->user,
            'content' => $call->comment ?? '',
            'body' => $this->model->body,
            'footerDatetime' => $this->model->ins_ts,
            'footer' => isset($call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null,
            'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
            'iconIncome' => $answered && $call->direction == Call::DIRECTION_INCOMING
        ]);
    }

}
