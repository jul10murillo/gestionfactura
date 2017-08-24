<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class MarcaSearch extends Marca
{
    public function rules()
    { 
        // only fields in rules() are searchable
        return [
            [['descripcion'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Método para busqueda del filtro gridview
     * @param type $params
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query        = Marca::find()->where(['not', ['id_marca' => null]]) ;
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'descripcion' => SORT_ASC
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
        
        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'descripcion' => SORT_ASC
                ]
            ],
            'pagination' => [
                'pageSize' => 15,
            ],
        ]) ;
        return $dataProvider ;
    }

}