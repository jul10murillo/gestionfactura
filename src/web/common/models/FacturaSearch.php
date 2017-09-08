<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Factura;

/**
 * FacturaSearch represents the model behind the search form about `common\models\Factura`.
 */
class FacturaSearch extends Factura
{
    public $search;
    /**
     * @inheritdoc
     */
    
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['idMarca'], ['idTemporada'],['idMes'],['idProveedor'],['idTipoProducto'],['idEstatus'] );
       
    }
    public function rules()
    {
        return [
            [['id_factura', 'id_marca', 'id_temporada', 'id_mes', 'ano', 'id_proveedor', 'id_tipo_producto', 'unidades_factura_inicial', 'unidades_factura_final', 'id_estatus', 'id_usuario'], 'integer'],
            [['nro_factura', 'fecha_produccion', 'fecha_despacho', 'fecha_llegada', 'fecha_almacen', 'fecha_factura_inicial', 'fecha_factura_final','search'], 'safe'],
            [['idMarca','idTemporada','idMes','idProveedor','idTipoProducto','idEstatus'], 'safe'],
            [['monto_factura_inicial', 'monto_factura_final'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Factura::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pageSize' => 20,
            ],
        ]);
        
        // add extra sort attributes
        $addSortAttributes = ['idMarca.descripcion','idTemporada.descripcion','idMes.descripcion','idProveedor.nombre','idTipoProducto.descripcion','idEstatus.descripcion'];
        foreach ($addSortAttributes as $addSortAttribute) {
            $dataProvider->sort->attributes[$addSortAttribute] = [
                'asc' => [$addSortAttribute => SORT_ASC],
                'desc' => [$addSortAttribute => SORT_DESC],
                'label' => $this->getAttributeLabel($addSortAttribute),
            ];
        }

        $query->joinWith(['idMarca' => function($query) { $query->from(['idMarca' => 'marca']); }]);
        $query->joinWith(['idTemporada' => function($query) { $query->from(['idTemporada' => 'temporada']); }]);
        $query->joinWith(['idMes' => function($query) { $query->from(['idMes' => 'mes']); }]);
        $query->joinWith(['idProveedor' => function($query) { $query->from(['idProveedor' => 'proveedor']); }]);
        $query->joinWith(['idTipoProducto' => function($query) { $query->from(['idTipoProducto' => 'tipo_producto']); }]);
        $query->joinWith(['idEstatus' => function($query) { $query->from(['idEstatus' => 'estatus_factura']); }]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_factura' => $this->id_factura,
            'id_marca' => $this->id_marca,
            'id_temporada' => $this->id_temporada,
            'id_mes' => $this->id_mes,
            'ano' => $this->ano,
            'id_proveedor' => $this->id_proveedor,
            'id_tipo_producto' => $this->id_tipo_producto,
            'nro_factura' => $this->nro_factura,
            'monto_factura_inicial' => $this->monto_factura_inicial,
            'unidades_factura_inicial' => $this->unidades_factura_inicial,
            'monto_factura_final' => $this->monto_factura_final,
            'unidades_factura_final' => $this->unidades_factura_final,
            'fecha_produccion' => $this->fecha_produccion,
            'fecha_despacho' => $this->fecha_despacho,
            'fecha_llegada' => $this->fecha_llegada,
            'fecha_almacen' => $this->fecha_almacen,
            'fecha_factura_inicial' => $this->fecha_factura_inicial,
            'fecha_factura_final' => $this->fecha_factura_final,
            'id_estatus' => $this->id_estatus,
            'id_usuario' => $this->id_usuario,
            'idMarca.descripcion' => $this->idMarca,
            'idTemporada.descripcion' => $this->idTemporada,
            'idMes.descripcion'=> $this->idMes,
            'idProveedor.nombre'=> $this->idProveedor,
            'idTipoProducto.descripcion'=> $this->idTipoProducto,
            'idEstatus.descripcion'=> $this->idEstatus,
        ]);

//        $query->andFilterWhere(['like', 'nro_factura', $this->nro_factura]);
        $query->andFilterWhere(['like', 'nro_factura', $this->search]);
        $query->orFilterWhere(['like', 'ano', $this->search]);
        $query->orFilterWhere(['like', 'monto_factura_inicial', $this->search]);
        $query->orFilterWhere(['like', 'unidades_factura_inicial', $this->search]);
        $query->orFilterWhere(['like', 'monto_factura_final', $this->search]);
        $query->orFilterWhere(['like', 'unidades_factura_final', $this->search]);
        $query->orFilterWhere(['like', 'idMarca.descripcion', $this->search]);
        $query->orFilterWhere(['like', 'idTemporada.descripcion', $this->search]);
        $query->orFilterWhere(['like', 'idMes.descripcion', $this->search]);
        $query->orFilterWhere(['like', 'idProveedor.nombre', $this->search]);
        $query->orFilterWhere(['like', 'idTipoProducto.descripcion', $this->search]);
        $query->orFilterWhere(['like', 'idEstatus.descripcion', $this->search]);
        
        return $dataProvider;
    }
}
