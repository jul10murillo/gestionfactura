<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model common\models\Factura */

//$this->title = $model->id_factura;
$this->title = 'Factura N° '.$model->nro_factura;
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factura-view">

    <!--<h1><? = Html::encode($this->title) ?></h1>-->

    <p>
        <!--<? = Html::a('Actualizar', ['update', 'id' => $model->id_factura], ['class' => 'btn btn-primary']) ?>-->
        <!--<? = Html::a('Eliminar', ['delete', 'id' => $model->id_factura], [-->
<!--            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>-->
    </p>
    
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           <span class="glyphicon glyphicon-list-alt"></span> Datos Factura
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?= DetailView::widget([
               'model' => $model,
               'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-','thousandSeparator' => '.','decimalSeparator' => ',','currencyCode' => '$'],
               'attributes' => [
                   'idEstatus.descripcion',
                   'idMarca.descripcion',
                   'idTemporada.descripcion',
                   'idMes.descripcion',
                   'ano',
                   'idProveedor.nombre',
                   'idTipoProducto.descripcion',
                   'monto_factura_inicial:currency',
                   'unidades_factura_inicial',
                   'monto_factura_final:currency',
                   'unidades_factura_final',
               ],
           ]) ?>
          
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <span class="glyphicon glyphicon-calendar"></span> Fechas Producción / Tráfico
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">   
            <?= DetailView::widget([
            'model' => $model,
            'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-','dateFormat' => 'dd-MM-Y'],
            'attributes' => [
                'fecha_proforma:date',
                'fecha_produccion:date',
                'fecha_despacho:date',
                'fecha_llegada:date',
                'fecha_almacen:date',
            ],
        ]) ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <span class="glyphicon glyphicon-tasks"></span> Condiciones de Pago
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
            <?= GridView::widget([
               'dataProvider' => $dataProvider,
               'summary'=>"",
               'formatter' => ['class' => 'yii\i18n\Formatter','dateFormat' => 'dd-MM-Y','thousandSeparator' => '.','decimalSeparator' => ',','currencyCode' => '$'],
               'columns' => [
                   [
                    'attribute' => 'porcentaje',
                    'label' => '%',
                    ],  
                   [
                    'attribute' => 'monto_estimado_pago',
                    'label' => 'Monto a pagar',
                    'format' => 'currency',
                    ], 
                    [
                    'attribute' => 'fecha_pago',
                    'label' => 'Día de Pago',
                    'format' => 'date',
                    ], 
                    [
                    'attribute' => 'dias_credito',
                    'label' => 'Días de Crédito',
                    ],
                   [
                    'attribute' =>'fecha_estimada_pago',
                    'label' => 'Fecha de pago Crédito',
                    'format' => 'date',
                    ],
                   [
                    'attribute' =>'idEstatusPago.descripcion_pago',
                    'label' => 'Estatus Cuota',
                    ],
               ],
           ]); ?>
      </div>
    </div>
  </div>
</div>   
   
</div>
