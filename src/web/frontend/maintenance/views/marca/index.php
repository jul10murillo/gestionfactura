<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Marcas';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
        <div class="pull-right">
            <?= Html::button('Agregar Marca',['class'=>'btn btn-success btn-flat','data-toggle'=>'modal','data-target'=>'#marcaModal']) ?>
        </div>

        <?= 
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'descripcion',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Acciones',
                        'template' => '{update} {delete}',
                    ],
                ],
            ]);
        ?>
        
    </div>
    <div class="modal fade" id="marcaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Marca</h4>
                </div>
                <?php $form = ActiveForm::begin() ; ?>
                <div class="modal-body">
                    <p>
                        Agregar datos de la marca
                    </p>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
                            <?= $form->field($model, 'descripcion')->textInput() ?>
                        </div>
                    </div>
                <div class="modal-footer">
                    <?= Html::submitButton("Agregar", ['class' => 'btn btn-success btn-flat'])?>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>

</div>


