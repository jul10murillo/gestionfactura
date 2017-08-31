<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Collapse;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FacturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Factura';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factura-index">

    <!--<h1><? = Html::encode($this->title) ?></h1>-->
    <?php echo Collapse::widget([
        'items' => [
            [
                'label' => 'Búsqueda Global (provee al usuario de una búsqueda a partir de un criterio, la cual se ejecutará en todos los datos relacionados a una factura)',
                'content' => $this->render('_search', ['model' => $searchModel]) ,
            ],
        ]
    ]);
    //  echo $this->render('_search', ['model' => $searchModel]);
    ?>
    <p>
        <!--<? = Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['create'], ['class' => 'btn btn-success btn-factura']) ?>-->
        <?=Html::a('<span class="glyphicon glyphicon-plus"></span>',
                    ['/factura/create'], 
                    [
                        'title' => 'Registrar Factura inicial',
                        'data-toggle'=>'modal',
                        'data-target'=>'#modalvote',
                        'class' => 'btn btn-success btn-factura'
                    ]
                   );?>
    </p>
    
    <div class="modal remote fade" id="modalvote">
        <div class="modal-dialog">
            <div class="modal-content loader-lg"></div>
        </div>
    </div>

<?php Pjax::begin(); ?>    

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-','thousandSeparator' => '.','decimalSeparator' => ',','currencyCode' => '$'],
        'columns' => [
//            ['class' => 'yii\grid\CheckboxColumn'],
            [
            'attribute' => 'nro_factura',
//            'format' => 'text',
            'label' => 'Factura',
            ],            
            [
            'attribute' => 'idEstatus.descripcion',
            'format' => 'text',
            'filter' => Html::activeDropDownList($searchModel, 'idEstatus', ArrayHelper::map(common\models\EstatusFactura::find()->asArray()->all(), 'descripcion', 'descripcion'),['class'=>'form-control','prompt' => '']),
            'label' => 'Estatus',
            ],   
            [
            'attribute' => 'monto_factura_inicial',
            'format' => 'currency',
            'label' => 'Monto Inicial',
            ],
            [
            'attribute' => 'unidades_factura_inicial',
            'label' => 'Unidades Inicial',
            ],
            [
            'attribute' => 'monto_factura_final',
            'format' => 'currency',
            'label' => 'Monto Final',
            ],
            [
            'attribute' => 'unidades_factura_final',
            'label' => 'Unidades Final',
            ],
            [
            'attribute' => 'idMarca.descripcion',
            'format' => 'text',
            'filter' => Html::activeDropDownList($searchModel, 'idMarca', ArrayHelper::map(common\models\Marca::find()->asArray()->all(), 'descripcion', 'descripcion'),['class'=>'form-control','prompt' => '']),    
//            'filter' => Html::activeTextInput($searchModel, 'idMarca', ['class' => 'form-control']),
            'label' => 'Marca',
            ],
            [
            'attribute' => 'idTemporada.descripcion',
            'format' => 'text',
            'filter' => Html::activeDropDownList($searchModel, 'idTemporada', ArrayHelper::map(common\models\Temporada::find()->asArray()->all(), 'descripcion', 'descripcion'),['class'=>'form-control','prompt' => '']),    
            'label' => 'Temporada',
            ],
            
            [
            'attribute' => 'idMes.descripcion',
            'format' => 'text',
            'filter' => Html::activeDropDownList($searchModel, 'idMes', ArrayHelper::map(common\models\Mes::find()->asArray()->all(), 'descripcion', 'descripcion'),['class'=>'form-control','prompt' => '']),    
            'label' => 'Mes',
            ],
            [
            'attribute' =>'ano',
            'label' => 'Año',
            ],
            [
            'attribute' =>'idProveedor.nombre',
            'format' => 'text',
            'filter' => Html::activeDropDownList($searchModel, 'idProveedor', ArrayHelper::map(common\models\Proveedor::find()->asArray()->all(), 'nombre', 'nombre'),['class'=>'form-control','prompt' => '']),   
            'label' => 'Proveedor',
            ],
            [
            'attribute' => 'idTipoProducto.descripcion',
            'format' => 'text',
            'filter' => Html::activeDropDownList($searchModel, 'idTipoProducto', ArrayHelper::map(common\models\TipoProducto::find()->asArray()->all(), 'descripcion', 'descripcion'),['class'=>'form-control','prompt' => '']),   
            'label' => 'Producto',
            ],
            ['class' => 'yii\grid\ActionColumn',
                    'header'=>'Acción', 
                    'headerOptions' => ['width' => '3%'],
                    'template'=>'{view}  {update}',
//                    'buttons'=>[
//                        'view' => function($url,$model,$key){
//                           
//                        $btn = Html::button("<span class='glyphicon glyphicon-eye-open'></span>",[
//                        'value'=>Yii::$app->urlManager->createUrl('factura/view?id='.$key), //<---- here is where you define the action that handles the ajax request
////                        $btn = Html::button("<span class='glyphicon glyphicon-eye-open'></span>",[
////                        'value'=> Url::to(['factura/view']), 'title' => 'Detalle factura', 'class' => 'showModalButton btn btn-success', //<---- here is where you define the action that handles the ajax request
//                        'class'=>'view-modal-click grid-action',
//                        'data-toggle'=>'tooltip',
//                        'data-placement'=>'bottom',
//                        'title'=>'Ver'
//                        ]);
//                        return $btn;
//                        }
//                    ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

<?php


// Modal::begin([
//        'header'=>'<h4>Detalle factura</h4>',
//        'id'=>'view-modal',
//        'size'=>'modal-lg'
//    ]);
//
//    echo "<div id='viewModalContent'></div>";
//
//    Modal::end();
//
//
//  $this->registerJs(
//    "$(function () {
//    $('.view-modal-click').click(function () {
//        $('#view-modal')
//            .modal('show')
//            .find('#viewModalContent')
//            .load($(this).attr('value'));
//    });
//});
//    ");

?> 


</div>