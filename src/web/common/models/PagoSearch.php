<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pago;
use common\models\Factura;
use common\models\CondicionPago;

/**
 * PagoSearch represents the model behind the search form about `common\models\Pago`.
 */
class PagoSearch extends Pago
{
    public $search;
    /**
     * @inheritdoc
     */
    
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(),['idFactura'],['idProveedor'],['idPorcentaje'],['idCredito'],['idMonto'],['idFecha'],['idEstatusPago']);
       
    }
    
    public function rules()
    {
        return [
            [['id_pago', 'id_cuota', 'id_usuario'], 'integer'],
            [['monto_pago'], 'number'],
            [['fecha_pago', 'fecha_creacion'], 'safe'],
            [['idFactura','idProveedor','idPorcentaje','idCredito','idMonto','idFecha','idEstatusPago','search'], 'safe'],
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
        $query = Pago::find();
//        $query->joinWith(['idCuota' => function($query) { $query->from(['idCuota' => 'condicion_pago']); }]);
        $query->innerJoin("condicion_pago", "condicion_pago.id_cuota=pago.id_cuota");
        $query->innerJoin("factura", "condicion_pago.id_factura=factura.id_factura");
        $query->innerJoin("estatus_pago", "condicion_pago.id_estatus_pago=estatus_pago.id_estatus_pago");
        $query->innerJoin("proveedor", "factura.id_proveedor=proveedor.id_proveedor");
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pageSize' => 20,
            ],
        ]);
        
        
         // add extra sort attributes
//        $addSortAttributes = ['idCuota.porcentaje','idCuota.id_factura','idCuota.monto_estimado_pago','idCuota.dias_credito','idCuota.fecha_estimada_pago','idCuota.id_estatus_pago'];
//        foreach ($addSortAttributes as $addSortAttribute) {
//            $dataProvider->sort->attributes[$addSortAttribute] = [
//                'asc' => [$addSortAttribute => SORT_ASC],
//                'desc' => [$addSortAttribute => SORT_DESC],
//                'label' => $this->getAttributeLabel($addSortAttribute),
//            ];
//        }
       
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pago' => $this->id_pago,
            'id_cuota' => $this->id_cuota,
            'monto_pago' => $this->monto_pago,
//            'fecha_pago' => $this->fecha_pago,
            'fecha_creacion' => $this->fecha_creacion,
            'id_usuario' => $this->id_usuario,
            'nro_factura' => $this->idFactura,
            'porcentaje'=> $this->idPorcentaje,
            'dias_credito'=> $this->idCredito,
            'monto_estimado_pago'=> $this->idMonto,
            'fecha_estimada_pago'=> $this->idFecha,
            'descripcion_pago'=> $this->idEstatusPago,
            'nombre'=> $this->idProveedor,
        ]);

        $query->andFilterWhere(['like', 'nro_factura', $this->search]);
        $query->orFilterWhere(['like', 'monto_pago', $this->search]);
//        $query->orFilterWhere(['like', 'fecha_pago', $this->search]);
        $query->orFilterWhere(['like', 'porcentaje', $this->search]);
        $query->orFilterWhere(['like', 'dias_credito', $this->search]);
        $query->orFilterWhere(['like', 'monto_estimado_pago', $this->search]);
        $query->orFilterWhere(['like', 'fecha_estimada_pago', $this->search]);
        $query->orFilterWhere(['like', 'descripcion_pago', $this->search]);
        $query->orFilterWhere(['like', 'nombre', $this->search]);
        
        return $dataProvider;
    }
}
