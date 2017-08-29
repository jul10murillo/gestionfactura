<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Factura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_marca')->textInput() ?>

    <?= $form->field($model, 'id_temporada')->textInput() ?>

    <?= $form->field($model, 'id_mes')->textInput() ?>

    <?= $form->field($model, 'ano')->textInput() ?>

    <?= $form->field($model, 'id_proveedor')->textInput() ?>

    <?= $form->field($model, 'id_tipo_producto')->textInput() ?>

    <?= $form->field($model, 'nro_factura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monto_factura_inicial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unidades_factura_inicial')->textInput() ?>

    <!--<? = $form->field($model, 'monto_factura_final')->textInput(['maxlength' => true]) ?>-->

    <!--<? = $form->field($model, 'unidades_factura_final')->textInput() ?>-->

    <!--<? = $form->field($model, 'fecha_produccion')->textInput() ?>-->

    <!--<? = $form->field($model, 'fecha_despacho')->textInput() ?>-->

    <!--<? = $form->field($model, 'fecha_llegada')->textInput() ?>-->

    <!--<? = $form->field($model, 'fecha_almacen')->textInput() ?>-->

    <!--<? = $form->field($model, 'fecha_factura_inicial')->textInput() ?>-->

    <!--<? = $form->field($model, 'fecha_factura_final')->textInput() ?>-->

    <!--<? = $form->field($model, 'id_estatus')->textInput() ?>-->

    <!--<? = $form->field($model, 'id_usuario')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
