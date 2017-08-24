<?php

namespace app\maintenance\controllers;

use yii\web\Controller;

/**
 * Default controller for the `maintenance` module
 * @author Julio Murillo
 */
class FacturaController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
