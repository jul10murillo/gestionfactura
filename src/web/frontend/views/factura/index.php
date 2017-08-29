<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Collapse;
use yii\bootstrap\Modal;

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
                        'title' => '',
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
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            [
            'attribute' => 'nro_factura',
            'format' => 'text',
            'label' => 'Factura',
            ],            
            [
            'attribute' => 'idEstatus.descripcion',
            'format' => 'text',    
            'filter' => Html::activeTextInput($searchModel, 'idEstatus', ['class' => 'form-control']),
            'label' => 'Estatus',
            ],   
            [
            'attribute' => 'monto_factura_inicial',
            'label' => 'Monto Inicial',
            ],
            [
            'attribute' => 'unidades_factura_inicial',
            'label' => 'Unidades Inicial',
            ],
            [
            'attribute' => 'monto_factura_final',
            'label' => 'Monto Final',
            ],
            [
            'attribute' => 'unidades_factura_final',
            'label' => 'Unidades Final',
            ],
            [
            'attribute' => 'idMarca.descripcion',
            'format' => 'text',
            'filter' => Html::activeTextInput($searchModel, 'idMarca', ['class' => 'form-control']),
            'label' => 'Marca',
            ],
            [
            'attribute' => 'idTemporada.descripcion',
            'format' => 'text',
            'filter' => Html::activeTextInput($searchModel, 'idTemporada', ['class' => 'form-control']),
            'label' => 'Temporada',
            ],
            
            [
            'attribute' => 'idMes.descripcion',
            'format' => 'text',
            'filter' => Html::activeTextInput($searchModel, 'idMes', ['class' => 'form-control']),
            'label' => 'Mes',
            ],
            [
            'attribute' =>'ano',
            'label' => 'Año',
            ],
            [
            'attribute' =>'idProveedor.nombre',
            'format' => 'text',
            'filter' => Html::activeTextInput($searchModel, 'idProveedor', ['class' => 'form-control']),
            'label' => 'Proveedor',
            ],
            [
            'attribute' => 'idTipoProducto.descripcion',
            'format' => 'text',
            'filter' => Html::activeTextInput($searchModel, 'idTipoProducto', ['class' => 'form-control']),
            'label' => 'Producto',
            ],
            // 'id_factura',
            // 'id_proveedor',
            // 'id_tipo_producto',
            // 'id_marca',
            // 'nro_factura',
            // 'monto_factura_inicial',
            // 'unidades_factura_inicial',
            // 'monto_factura_final',
            // 'unidades_factura_final',
            // 'fecha_produccion',
            // 'fecha_despacho',
            // 'fecha_llegada',
            // 'fecha_almacen',
            // 'fecha_factura_inicial',
            // 'fecha_factura_final',
            // 'id_estatus',
            // 'id_usuario',

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
