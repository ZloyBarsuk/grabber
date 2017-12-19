<?php

namespace app\controllers;

use GuzzleHttp\Client; // подключаем Guzzle
use yii\helpers\Url;

class FitnessbarController extends \yii\web\Controller
{
    public function actionCatalog()
    {

        $client = new Client(['auth' => ['grisinevgenij007@gmail.com',
            '79816500607']]);


      //  $res = $client->get( 'http://opt.fitnessbar.ru/catalog/sportivnoe-pitanie/aminokisloty/',
        $res = $client->get( 'http://opt.fitnessbar.ru/catalog/sportivnoe-pitanie/protein/',


            ['query' => ['show_all_pages' => '1','&page_offset' => '2']]   );


        $body = $res->getBody();

        $document = \phpQuery::newDocumentHTML($body);

      //  $categories = $document->find("table.b-product.b-product--inline.b-product--order");

        $categories = $document->find(".b-product__promo");
        return $this->render('index', ['categories' => $categories]);


    }
}
