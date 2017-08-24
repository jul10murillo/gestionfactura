<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use common\models\Factura;

class FacturaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider= new ActiveDataProvider([
                'query' => Factura::find(),
                'pagination' => [
                'pageSize' => 20,
              ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
