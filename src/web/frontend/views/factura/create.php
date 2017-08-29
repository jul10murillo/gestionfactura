<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Factura */

$this->title = 'Registro de Factura inicial';
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factura-create">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    
    <div class="header-registrofac"><span class="glyphicon glyphicon-list-alt"></span><h1 class="modal-title"><?= Html::encode($this->title) ?><br></h1></div>

    <div class="division-header"></div>
    <br><br>
    
    <?= $this->render('_form', [
        'model' => $model,
        'itemsMarca' => $itemsMarca,
        'itemsTemporada'=>$itemsTemporada,
        'itemsMes'=>$itemsMes,
        'itemsProveedor'=>$itemsProveedor,
        'itemsProducto'=>$itemsProducto,
    ]) ?>

</div>
