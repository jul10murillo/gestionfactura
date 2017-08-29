<?php

namespace frontend\controllers;

use Yii;
use common\models\Factura;
use common\models\FacturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * FacturaController implements the CRUD actions for Factura model.
 */
class FacturaController extends Controller
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
     * Lists all Factura models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FacturaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Factura model.
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
     * Creates a new Factura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Factura();
        $itemsMarca=ArrayHelper::map(\common\models\Marca::find()->asArray()->all(), 'id_marca', 'descripcion');
        $itemsTemporada=ArrayHelper::map(\common\models\Temporada::find()->asArray()->all(), 'id_temporada', 'descripcion');
        $itemsMes=ArrayHelper::map(\common\models\Mes::find()->asArray()->all(), 'id_mes', 'descripcion');
        $itemsProveedor=ArrayHelper::map(\common\models\Proveedor::find()->asArray()->all(), 'id_proveedor', 'nombre');
        $itemsProducto=ArrayHelper::map(\common\models\TipoProducto::find()->asArray()->all(), 'id_tipo_producto', 'descripcion');
                
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {

            $model->attributes=$_POST['Factura'];

            $model->fecha_factura_inicial = date('Y-m-d');
            $model->id_estatus = 1;
            $model->id_usuario =Yii::$app->user->identity->id;

            $model->save();
            return $this->redirect(['index']);
//            return $this->redirect(['view', 'id' => $model->id_factura]);

        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'itemsMarca' => $itemsMarca,
                'itemsTemporada'=>$itemsTemporada,
                'itemsMes'=>$itemsMes,
                'itemsProveedor'=>$itemsProveedor,
                'itemsProducto'=>$itemsProducto,
            ]);
        }

    }

    /**
     * Updates an existing Factura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_factura]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Factura model.
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
     * Finds the Factura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Factura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Factura::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
