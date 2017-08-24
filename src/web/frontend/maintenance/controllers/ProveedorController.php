<?php

namespace app\maintenance\controllers;

use yii\web\Controller;
use app\models\ProveedorQuery;
use app\models\Proveedor;
use app\models\ProveedorSearch;

/**
 * Default controller for the `maintenance` module
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class ProveedorController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model        = new Proveedor ;
        $searchModel  = new ProveedorSearch() ;
        $dataProvider = $searchModel->search(Yii::$app->request->get()) ;
        
        if (Yii::$app->request->isPost) {
            
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('success', "Proveedor Guardado");
            }else{
                Yii::$app->session->setFlash('error', "Proveedor no Guardado");
            }
        }

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel'  => $searchModel,
                    'model'  => $model,
        ]) ;
    }
}
