<?php

namespace app\components\events;

interface HistoryEventInterface
{
    public function setModel($model);
    public function getBody();
    public function getWidgetClass();
}
