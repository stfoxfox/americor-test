<?php

namespace app\widgets\HistoryList\items\SmsItem;

use app\models\Sms;
use yii\base\Widget;
use Yii;

class SmsItemWidget extends Widget
{
    /** @var History */
    public $model;

    public function run()
    {
        /** @var Sms $sms */
        $sms = $this->model->sms;

        return $this->render('item', [
            'user' => $this->model->user,
            'body' => $this->model->body,
            'footer' => $sms->direction == Sms::DIRECTION_INCOMING ?
                Yii::t('app', 'Incoming message from {number}', [
                    'number' => $sms->phone_from ?? ''
                ]) : Yii::t('app', 'Sent message to {number}', [
                    'number' => $sms->phone_to ?? ''
                ]),
            'iconIncome' => $sms->direction == Sms::DIRECTION_INCOMING,
            'footerDatetime' => $this->model->ins_ts,
            'iconClass' => 'icon-sms bg-dark-blue'
        ]);
    }
}
