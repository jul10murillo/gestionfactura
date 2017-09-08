<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;


$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="site-login">
        <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <div class="row">
        <div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
                <?=
                \yii\bootstrap\Html::img('@web/img/img-dumit/white/LOGO.png',['class'=>'img-responsive login-img'])
                ?>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="">
                <h1><span class="title-login">GESTIÓN DE FACTURAS Y PAGOS</span><br><span class="title2-login">GRUPO DUMIT</span><br></h1>
            </div>

            <!-- /.login-logo -->
            <div class="login-dumit">
                <p class="login-box-msg">Ingrese sus credenciales para iniciar sesión<br></p>

                <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

                <?= $form
                    ->field($model, 'username', $fieldOptions1)
                    ->label(false)
                    ->textInput(['autofocus' => true,'class'=>'form-control'])
                    ->textInput(['placeholder' => $model->getAttributeLabel('usuario')]) ?>

                <?= $form
                    ->field($model, 'password', $fieldOptions2)
                    ->label(false)
                    ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

                <!--<div class="row">-->
        <!--            <div class="col-xs-8">
                        <? = $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>-->
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <?= Html::submitButton('ENTRAR', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                    </div>
                    <!-- /.col -->
                <!--</div>-->


                <?php ActiveForm::end(); ?>


        <!--        <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                        using Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                        in using Google+</a>
                </div>
                 /.social-auth-links 

                <a href="#">I forgot my password</a><br>
                <a href="register.html" class="text-center">Register a new membership</a>-->

            </div>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
</div>
