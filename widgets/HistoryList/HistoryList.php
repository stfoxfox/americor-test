<?php

namespace app\widgets\HistoryList;

use app\models\search\HistorySearch;
use app\widgets\Export\Export;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;

class HistoryList extends Widget
{

    public $dataProvider;

    public function run()
    {
        return $this->render('main', [
            'linkExport' => $this->getLinkExport(),
            'dataProvider' => $this->dataProvider
        ]);
    }

    /**
     * @return string
     */
    private function getLinkExport()
    {
        $params = \Yii::$app->getRequest()->getQueryParams();
        $params = ArrayHelper::merge([
            'site/export',
        ], $params);

        return Url::to($params);
    }
}
