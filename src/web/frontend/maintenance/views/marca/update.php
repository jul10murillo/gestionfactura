<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Actualizar Marcas';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
        <?php $form = ActiveForm::begin() ; ?>
        
        <?= $form->field($model, 'descripcion')->textInput() ?>
        
        <?= Html::submitButton("Agregar", ['class' => 'btn btn-success btn-flat'])?>
        
        <?php ActiveForm::end() ?>
    </div>
</div>