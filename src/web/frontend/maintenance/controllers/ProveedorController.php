<?php

namespace app\maintenance\controllers;

use yii\web\Controller;
use app\models\ProveedorQuery;

/**
 * Default controller for the `maintenance` module
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class ProveedorController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $proveedorSearch = new ProveedorQuery();
        return $this->render('index');
    }
}
