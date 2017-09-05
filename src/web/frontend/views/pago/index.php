<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Collapse;
use yii\helpers\ArrayHelper;
//use common\components\GDhelper;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pago';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pago-index">

    <!--<h1><? = Html::encode($this->title) ?></h1>-->
     <?php echo Collapse::widget([
        'items' => [
            [
                'label' => 'Búsqueda Global (provee al usuario de una búsqueda a partir de un criterio, la cual se ejecutará en todos los datos relacionados a pagos de una factura)',
                'content' => $this->render('_search', ['model' => $searchModel]) ,
            ],
        ]
    ]);
    ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--<? = Html::a('Create Pago', ['create'], ['class' => 'btn btn-success']) ?>-->
        
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-refresh"></span>'), Url::toRoute(['pago/index']), ['title' => 'Limpiar Búsqueda','class' => 'btn btn-success btn-factura']) ?>
        <?=Html::a('<span class="glyphicon glyphicon-plus"></span>',
                    ['/pago/create'], 
                    [
                        'title' => 'Registrar Pago',
                        'class' => 'btn btn-success btn-factura'
                    ]
                   );
        ?>
    </p>
    <div class="container-grid">   
        <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'showPageSummary' => true ,
                'responsive'=> false,
                'pageSummaryRowOptions' => ['class' => 'kv-page-summary danger'],
        //        'showFooter'=>true,
        //        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
                'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-','thousandSeparator' => '.','decimalSeparator' => ',','currencyCode' => '$'],
                'columns' => [
                    ['class' => '\kartik\grid\SerialColumn'],
                    [
                    'attribute' => 'idCuota.idFactura.id_factura',
                    'value' => 'idCuota.idFactura.nro_factura',
                    'format' => 'text',
                    'filter' => Html::activeTextInput($searchModel, 'idFactura', ['class' => 'form-control']),
                    'label' => 'Factura',
                    ],
                    [
                    'attribute' => 'idCuota.idFactura.idProveedor.nombre',
                    'format' => 'text',
                    'filter' => Html::activeDropDownList($searchModel, 'idProveedor', ArrayHelper::map(common\models\Proveedor::find()->asArray()->all(), 'nombre', 'nombre'),['class'=>'form-control','prompt' => '']),    
                    'label' => 'Proveedor',
                    ],
                    ['attribute' => 'idCuota.porcentaje',
                    'filter' => Html::activeTextInput($searchModel, 'idPorcentaje', ['class' => 'form-control']),
                    'label' => 'Porcentaje %',
                    ],
                    [
                    'attribute' => 'idCuota.dias_credito',
                    'filter' => Html::activeTextInput($searchModel, 'idCredito', ['class' => 'form-control']),
                    'label' => 'Días de Crédito',
                    ], 
                    [
                    'attribute' => 'idCuota.monto_estimado_pago',
                    'filter' => Html::activeTextInput($searchModel, 'idMonto', ['class' => 'form-control']),
                    'format' => 'currency',
                    'label' => 'Monto Estimado pago',
                    'pageSummary' => true
                    ],
                    [
                    'attribute' => 'idCuota.fecha_estimada_pago',
                    'filter' => Html::activeTextInput($searchModel, 'idFecha', ['class' => 'form-control']),
                    'label' => 'Fecha vencimiento cuota',
//                    'format' => ['date', 'php:d-m-Y']
                    ],
                    [
                    'attribute' => 'monto_pago',
                    'format' => 'currency',
                    'pageSummary' => true
        //            'footer'=> GDhelper::pageTotal($dataProvider->models,'monto_pago'),
                    ],           
                    [
                    'attribute' => 'fecha_pago', 
                    'label' => 'Fecha de pago',
//                    'format' => ['date', 'php:d-m-Y']
                    ],
                    [
                    'class' => '\kartik\grid\FormulaColumn',
                    'label'=>'Monto pendiente por pagar',
                    'pageSummary' => true,
                    'format' => 'currency',
                    'value' => function ($model, $key, $index, $widget) {
                        $p = compact('model', 'key', 'index');
                        // Write your formula below
                        return $widget->col(5, $p) - $widget->col(7, $p);
                    }
                    ],
                    [
                    'attribute' => 'idCuota.idEstatusPago.descripcion_pago',
                    'format' => 'text',
                    'filter' => Html::activeDropDownList($searchModel, 'idEstatusPago', ArrayHelper::map(common\models\EstatusPago::find()->asArray()->all(), 'descripcion_pago', 'descripcion_pago'),['class'=>'form-control','prompt' => '']),
                    'label' => 'Estatus Cuota',
                    ],
                    ['class' => 'kartik\grid\ActionColumn',
                     'header'=>'Acción', 
                     'headerOptions' => ['width' => '3%'],
                     'template'=>'{update}',
                    ],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
