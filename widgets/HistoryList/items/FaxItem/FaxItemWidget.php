<?php

namespace app\widgets\HistoryList\items\FaxItem;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;

class FaxItemWidget extends Widget
{
    /** @var History */
    public $model;

    public function run()
    {
        /** @var Fax */
        $fax = $this->model->fax;

        return $this->render('item', [
            'user' => $this->model->user,
            'body' => $this->model->body,
            'footer' => Yii::t('app', '{type} was sent to {group}', [
                'type' => $fax ? $fax->getTypeText() : 'Fax',
                'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
            ]),
            'footerDatetime' => $this->model->ins_ts,
            'iconClass' => 'fa-fax bg-green'
        ]);
    }
}
