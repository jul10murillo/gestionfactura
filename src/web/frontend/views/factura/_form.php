<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Factura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-form">

    <?php $form = ActiveForm::begin(['id'=>'create'],'post',['class' => 'form-horizontal']); ?>
    
    <?= $form->field($model, 'id_marca')->dropDownList($itemsMarca,['prompt'=>'Seleccione']) ?>

    <?= $form->field($model, 'id_temporada')->dropDownList($itemsTemporada,['prompt'=>'Seleccione']) ?>
    
    <?= $form->field($model, 'id_mes')->dropDownList($itemsMes,['prompt'=>'Seleccione']) ?>

    <?= $form->field($model, 'ano')->textInput() ?>

    <?= $form->field($model, 'id_proveedor')->dropDownList($itemsProveedor,['prompt'=>'Seleccione']) ?>

    <?= $form->field($model, 'id_tipo_producto')->dropDownList($itemsProducto,['prompt'=>'Seleccione']) ?>
    
    <div class="division-header"></div>
    <br><br>

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
        <div class="division-header"></div><br><br>
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
