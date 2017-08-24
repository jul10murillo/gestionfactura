<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = 'Facturas';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="">
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['create'], ['class' => 'btn btn-success btn-factura']) ?>
    </p>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn'],
                'nro_factura',
                'id_estatus',
                'monto_factura_inicial',
                'unidades_factura_inicial',
                'monto_factura_final',
                'unidades_factura_final',
                'id_marca',
                'id_temporada',
                'id_mes',
                'id_proveedor',
                'id_tipo_producto',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
</div>