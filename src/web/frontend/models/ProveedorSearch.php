<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class ProveedorSearch extends Proveedor
{
    public function rules()
    { 
        // only fields in rules() are searchable
        return [
            [['nombre'], 'safe'],
        ];
    }
    
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    
    public function search($params) {
        $query        = Proveedor::find()->where(['not', ['id_proveedor' => null]]) ;
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'nombre' => SORT_ASC
                ]
            ],
            'pagination' => [
                'pageSize' => 15,
            ],
        ]) ;
        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider ;
        }

        // adjust the query by adding the filters
        
        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'nombre' => SORT_ASC
                ]
            ],
            'pagination' => [
                'pageSize' => 15,
            ],
        ]) ;
        return $dataProvider ;
    }
}