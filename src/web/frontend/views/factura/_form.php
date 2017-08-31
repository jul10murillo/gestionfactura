<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;


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
        
        <?= $form->field($model, 'fecha_proforma', [
                'template' => "<label class=''>{label}</label><div class=''>{input}</div>\n{hint}\n{error}"
                ])->widget(DatePicker::classname(),[
                'options' => ['placeholder' => 'Seleccione una fecha'],
                'value' => date('Y-m-d'),
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'readonly' => true,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                 ]
              ]);
       ?>

       <?= $form->field($model, 'monto_factura_inicial')->textInput(['maxlength' => true]) ?>

       <?= $form->field($model, 'unidades_factura_inicial')->textInput() ?>

       <div class="division-header"></div><br><br>
        
       <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
       </div>

    <?php ActiveForm::end(); ?>

</div>
