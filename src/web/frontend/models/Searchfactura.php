<?php

namespace app\models;
use yii;
use yii\base\Model;

class Searchfactura extends model{
    public $q;
    
    public function  rules(){
        return[
            ["q","match","pattern"=>'/^[0-9a-záéíóúñ\s]+$/i',"message"=>"Sólo se aceptan letras y números"]
        ];
    }
    
    public function attributeLabels(){
        return[
            'q' =>"Buscar:",
        ];
    }
    
}