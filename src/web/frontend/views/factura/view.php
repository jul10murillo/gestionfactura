<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Factura */

$this->title = $model->id_factura;
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_factura], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_factura], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_factura',
            'id_marca',
            'id_temporada',
            'id_mes',
            'ano',
            'id_proveedor',
            'id_tipo_producto',
            'nro_factura',
            'monto_factura_inicial',
            'unidades_factura_inicial',
            'monto_factura_final',
            'unidades_factura_final',
            'fecha_produccion',
            'fecha_despacho',
            'fecha_llegada',
            'fecha_almacen',
            'fecha_factura_inicial',
            'fecha_factura_final',
            'id_estatus',
            'id_usuario',
        ],
    ]) ?>

</div>
