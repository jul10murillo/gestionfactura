<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Pago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pago-form">

    <?php $form = ActiveForm::begin(['options'=>['id'=>'pago-form-id', 'data-pjax'=>true, ] ]); ?>

    <!--<? = $form->field($model, 'id_cuota')->textInput() ?>-->

    <?= $form->field($model, 'monto_pago')->textInput(['maxlength' => true]) ?>

    <!--<? = $form->field($model, 'fecha_pago')->textInput() ?>-->
    
    <?= $form->field($model, 'fecha_pago', [
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

    <!--<? = $form->field($model, 'fecha_creacion')->textInput() ?>-->

    <!--<? = $form->field($model, 'id_usuario')->textInput() ?>-->

    <br><br><div class="division-header"></div><br>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
