<?php

namespace app\maintenance;

/**
 * maintenance module definition class
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\maintenance\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
