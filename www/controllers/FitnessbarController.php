<?php

namespace app\controllers;

use GuzzleHttp\Client; // подключаем Guzzle
use yii\helpers\Url;

class FitnessbarController extends \yii\web\Controller
{
    public function actionCatalog()
    {

        $client = new Client(['verify' => false]);



        $res = $client->request('GET', 'http://opt.fitnessbar.ru/catalog/sportivnoe-pitanie/aminokisloty/#show_all_pages=1&page_offset=2', [
                'auth' => [
                    'grisinevgenij007@gmail.com',
                    '79816500607'
                ]]
        );


        $body = $res->getBody();

        $document = \phpQuery::newDocumentHTML($body);

        $categories = $document->find("table.b-product.b-product--inline.b-product--order");

        return $this->render('catalog', ['categories' => $categories]);


    }
}
