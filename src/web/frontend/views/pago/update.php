<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pago */

$this->title = 'Pago de factura: ' . $model2->nro_factura.' / Cuota: ' . $model3->porcentaje .' %';
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pago, 'url' => ['view', 'id' => $model->id_pago]];
$this->params['breadcrumbs'][] = 'Modificar';

?>
<div class="pago-update">

    <h1 class="modal-title"><?= Html::encode($this->title) ?></h1>
    <div class="division-header"></div>
    <br><br>
    
    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
        'model3' => $model3,
    ]) ?>

</div>
