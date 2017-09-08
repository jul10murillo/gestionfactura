<?php

namespace frontend\controllers;

use Yii;
use common\models\Pago;
use common\models\PagoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagoController implements the CRUD actions for Pago model.
 */
class PagoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pago models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
  
    /**
     * Displays a single Pago model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pago model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pago();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pago]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pago model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model3 = \common\models\CondicionPago::findOne($id);
        
//        $factura=  $model3->id_factura;

        $model2 = \common\models\Factura::findOne(['id_factura'=> $model3->id_factura]);

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            
            $model->save();
            
            $acumulado=0;

            $pagos = \common\models\Pago::find()->where(['id_cuota'=>$model->id_cuota])->all();
            
            foreach ($pagos as $rowp) {
                $acumulado= $acumulado + $rowp->monto_pago;
            }
           
            if ($model3->monto_estimado_pago == $acumulado) {
               $model3->id_estatus_pago= 3; 
            }else{
               $model3->id_estatus_pago= 2; 
               
            }
            
            $model3->save();
            
            $cuotas = \common\models\CondicionPago::find()->where(['id_factura'=>$model3->id_factura])->all();
            
            $pendientes=0;

            foreach ($cuotas as $rowc) {
                if ($rowc->id_estatus_pago == 2 or $rowc->id_estatus_pago == 1 ) {
                    $pendientes= $pendientes + 1;
                }
            }
            
            if ($pendientes >= 1 ) {
                $model2->id_estatus= 2; 
            }else {
                $model2->id_estatus= 3; 
               
            }

            $model2->save();
            
            Yii::$app->session->setFlash('success','Pago modificado satisfactoriamente'); 
            
            return $this->redirect(['index']);
//            return $this->redirect(['view', 'id' => $model->id_pago]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'model2' => $model2,
                'model3' => $model3,
            ]);
        }
    }

    /**
     * Deletes an existing Pago model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pago model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pago the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pago::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
