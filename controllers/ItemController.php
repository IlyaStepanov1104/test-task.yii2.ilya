<?php

namespace app\controllers;

use app\models\Currency;
use app\models\Items;
use yii\db\Expression;
use yii\db\Query;
use yii\web\Controller;

class ItemController extends Controller
{
    const CATEGORY = 3;
    const COUNT = 10;

    public function actionGetTenItems()
    {
        $time = microtime(true);
        $items = (new Query())->select(['`items`.name', '`items`.category', '`items`.price', '`items`.currency', '(`currency`.date) AS dateCur', '(price * value) AS priceRUB'])
            ->rightJoin( 'currency', '`items`.`currency` = `currency`.`currency` AND `currency`.date = CURDATE()')
            ->from('items')
            ->andWhere(['category' => self::CATEGORY])
            ->limit(self::COUNT)
            ->all()
            ;
        $items = (new Query())->select(['`items`.name', '`items`.category', '`items`.price', '`items`.currency', '`currency`.value'])
            ->rightJoin( 'currency', '`items`.`currency` = `currency`.`currency` AND `currency`.date = CURDATE()')
            ->from('items')
            ->andWhere(['category' => self::CATEGORY])
            ->limit(self::COUNT)
            ->all();
        for ($i = 0; $i < self::COUNT; $i++) {
            $items[$i]['priceRUB'] = $items[$i]['price'] * $items[$i]['value'];
            unset($items[$i]['value']);
        }
        $time = microtime(true) - $time;
        return $this->asJson(array('time' => $time, 'result' => $items));
    }
}