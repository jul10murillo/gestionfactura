<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class FacturaSearch extends Factura
{
    public function rules()
    { 
        // only fields in rules() are searchable
        return [
            [['id_marca', 'id_temporada', 'id_mes', 'ano', 'id_proveedor', 'id_tipo_producto', 'nro_factura', 'monto_factura_inicial', 'unidades_factura_inicial', 'fecha_factura_inicial', 'fecha_factura_final', 'id_estatus', 'id_usuario'], 'safe'],
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
        $query        = Factura::find()->where(['not', ['id_factura' => null]]) ;

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider ;
        }

        // adjust the query by adding the filters
        
        $query->andFilterWhere(['like', 'id_marca', $this->id_marca])
                ->andFilterWhere(['like', 'id_temporada', $this->id_temporada])
                ->andFilterWhere(['like', 'id_mes', $this->id_mes])
                ->andFilterWhere(['like', 'ano', $this->ano])
                ->andFilterWhere(['like', 'id_proveedor', $this->id_proveedor])
                ->andFilterWhere(['like', 'id_tipo_producto', $this->id_tipo_producto])
                ->andFilterWhere(['like', 'nro_factura', $this->nro_factura])
                ->andFilterWhere(['like', 'monto_factura_inicial', $this->monto_factura_inicial])
                ->andFilterWhere(['like', 'unidades_factura_inicial', $this->unidades_factura_inicial])
                ->andFilterWhere(['like', 'fecha_factura_inicial', $this->fecha_factura_inicial])
                ->andFilterWhere(['like', 'fecha_factura_final', $this->fecha_factura_final])
                ->andFilterWhere(['like', 'id_estatus', $this->id_estatus])
                ->andFilterWhere(['like', 'id_usuario', $this->id_usuario]) ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => [
                'defaultOrder' => [
                    'id_factura' => SORT_DESC
                ]
            ],
        ]) ;
        return $dataProvider ;
    }

}