<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html ;
use yii\bootstrap\ActiveForm ;

$this->title                   = 'Login' ;
$this->params['breadcrumbs'][] = $this->title ;
?>

<div class="login-back">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper log-box" style="padding-top: 10%">
        <div id="login" class="animate form">
            <section class="login_content">
                <?php $form = ActiveForm::begin(['id' => 'login-form']) ; ?>
                <h1>Backend Gestión de Facturas y Pagos</h1>
                <div class="col-lg-2 col-lg-offset-5 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                
                    <?= $form->field($model, 'password')->passwordInput() ?>
                
                <?= Html::submitButton('Entrar', ['class' => 'btn btn-success btn-grudu', 'name' => 'login-button']) ?>
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <div class="clearfix"></div>
                    <br />
                    <div>
                        <h1><?= Html::img('@web/img/LOGO_HOME_B.png') ?></h1>
                    </div>
                </div>
                <?php ActiveForm::end() ; ?>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
    </div>
</div>
