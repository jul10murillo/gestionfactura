<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PagoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pago-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'search')->label(false) ?>
    <!--<? = $form->field($model, 'id_pago') ?>-->

    <!--<? = $form->field($model, 'id_cuota') ?>-->

    <!--<? = $form->field($model, 'monto_pago') ?>-->

    <!--<? = $form->field($model, 'fecha_pago') ?>-->

    <!--<? = $form->field($model, 'fecha_creacion') ?>-->

    <?php // echo $form->field($model, 'id_usuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <!--<? = Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>-->
    </div>

    <?php ActiveForm::end(); ?>

</div>
