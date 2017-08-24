<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "condicion_pago".
 *
 * @property integer $id_cuota
 * @property integer $id_factura
 * @property string $monto_estimado_pago
 * @property string $fecha_estimada_pago
 * @property integer $porcentaje
 * @property integer $dias_credito
 *
 * @property Factura $idFactura
 * @property Pago[] $pagos
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class CondicionPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'condicion_pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_factura', 'monto_estimado_pago', 'fecha_estimada_pago', 'porcentaje', 'dias_credito'], 'required'],
            [['id_factura', 'porcentaje', 'dias_credito'], 'integer'],
            [['monto_estimado_pago'], 'number'],
            [['fecha_estimada_pago'], 'safe'],
            [['id_factura'], 'exist', 'skipOnError' => true, 'targetClass' => Factura::className(), 'targetAttribute' => ['id_factura' => 'id_factura']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cuota' => 'Id Cuota',
            'id_factura' => 'Id Factura',
            'monto_estimado_pago' => 'Monto Estimado Pago',
            'fecha_estimada_pago' => 'Fecha Estimada Pago',
            'porcentaje' => 'Porcentaje',
            'dias_credito' => 'Dias Credito',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFactura()
    {
        return $this->hasOne(Factura::className(), ['id_factura' => 'id_factura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['id_cuota' => 'id_cuota']);
    }
}
