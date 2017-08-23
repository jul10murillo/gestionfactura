<?php
namespace common\components;

use Yii;

class GDhelper{
    
    /**
     * Return Username
     * @return string
     */
//    private $_model;
    
    public static function getUsername() {
        $identity = Yii::$app->user->getIdentity();
        return $identity['username'];
    }
    
    /**
     * Return Department
     * @return string
     */
    public static function getDepartamento(){
         $identity = Yii::$app->user->identity->username;
         $user[] = \Yii::$app->ad->search()->findBy('sAMAccountname', $identity);
         foreach ($user as $item){
           $department = !is_null($item->getDepartment())?$item->getDepartment():"";
         }
        return $department;
    }
    /**
     * Return Name
     * @return string
     */
    public static function getName() {
        $identity = Yii::$app->user->identity->username;
        $user[] = \Yii::$app->ad->search()->findBy('sAMAccountname', $identity);
        foreach ($user as $item){
           $firstname = !is_null($item->getFirstName())?$item->getFirstName():"";
           $lastname=!is_null($item->getLastName())?$item->getLastName():"";
           $name=$firstname.' '.$lastname;
        }
        return $name;
    }
    
    /**
     * Return Fecha Inicio
     * @return string
     */
    public static function getDate() {
        $identity = Yii::$app->user->identity->username;
        $user[] = \Yii::$app->ad->search()->findBy('sAMAccountname', $identity);
        foreach ($user as $item){
           $date=!is_null($item->getFinicio())?$item->getFinicio():"";
        }
        return $date;
    }
}