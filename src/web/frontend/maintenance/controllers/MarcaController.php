<?php

namespace app\maintenance\controllers;

use Yii;
use yii\web\Controller;
use app\models\MarcaSearch;
use app\models\Marca;
use yii\helpers\Url;

/**
 * Default controller for the `maintenance` module
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class MarcaController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $model        = new Marca ;
        $searchModel  = new MarcaSearch() ;
        $dataProvider = $searchModel->search(Yii::$app->request->get()) ;
        
        if (Yii::$app->request->isPost) {
            
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('success', "Marca Guardada");
            }else{
                Yii::$app->session->setFlash('error', "Marca no Guardada");
            }
        }

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel'  => $searchModel,
                    'model'  => $model,
        ]) ;
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function actionUpdate($id) {
        $model = Marca::findOne($id);
        
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('success', "Marca Actualizada");
                
                return $this->redirect(Url::to(['marca/index']));
            }else{
                Yii::$app->session->setFlash('error', "Marca no Actualizada");
            }
        }
        
        return $this->render('update', [
                    'model'  => $model,
        ]) ;
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function actionDelete($id) {
        $model = Marca::findOne($id);
        
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', "Marca Eliminada");
                
            return $this->redirect(Url::to(['marca/index']));
        }else{
            Yii::$app->session->setFlash('error', "Marca no Eliminada");
        }
    }
}
