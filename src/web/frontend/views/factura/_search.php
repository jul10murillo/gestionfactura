<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FacturaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'search')->label(false) ?>
    <!--<? = $form->field($model, 'id_factura') ?>-->

    <!--<? = $form->field($model, 'id_marca') ?>-->

    <!--<? = $form->field($model, 'id_temporada') ?>-->

    <!--<? = $form->field($model, 'id_mes') ?>-->

    <!--<? = $form->field($model, 'ano') ?>-->

    <?php // echo $form->field($model, 'id_proveedor') ?>

    <?php // echo $form->field($model, 'id_tipo_producto') ?>

    <?php // echo $form->field($model, 'nro_factura') ?>

    <?php // echo $form->field($model, 'monto_factura_inicial') ?>

    <?php // echo $form->field($model, 'unidades_factura_inicial') ?>

    <?php // echo $form->field($model, 'monto_factura_final') ?>

    <?php // echo $form->field($model, 'unidades_factura_final') ?>

    <?php // echo $form->field($model, 'fecha_produccion') ?>

    <?php // echo $form->field($model, 'fecha_despacho') ?>

    <?php // echo $form->field($model, 'fecha_llegada') ?>

    <?php // echo $form->field($model, 'fecha_almacen') ?>

    <?php // echo $form->field($model, 'fecha_factura_inicial') ?>

    <?php // echo $form->field($model, 'fecha_factura_final') ?>

    <?php // echo $form->field($model, 'id_estatus') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <!--<? = Html::resetButton('Reiniciar', ['class' => 'btn btn-default']) ?>-->
    </div>

    <?php ActiveForm::end(); ?>

</div>
