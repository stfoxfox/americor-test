<?php

namespace app\widgets\Export;

use kartik\export\ExportMenu;

class Export extends ExportMenu
{
    public function init()
    {
        $this->exportType = self::FORMAT_CSV;
        $this->showColumnSelector = false;
        $this->triggerDownload = true;
        parent::init();
    }
}
