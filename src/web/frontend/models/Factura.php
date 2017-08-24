<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factura".
 *
 * @property integer $id_factura
 * @property integer $id_marca
 * @property integer $id_temporada
 * @property integer $id_mes
 * @property integer $ano
 * @property integer $id_proveedor
 * @property integer $id_tipo_producto
 * @property string $nro_factura
 * @property string $monto_factura_inicial
 * @property integer $unidades_factura_inicial
 * @property string $monto_factura_final
 * @property integer $unidades_factura_final
 * @property string $fecha_produccion
 * @property string $fecha_despacho
 * @property string $fecha_llegada
 * @property string $fecha_almacen
 * @property string $fecha_factura_inicial
 * @property string $fecha_factura_final
 * @property integer $id_estatus
 * @property integer $id_usuario
 *
 * @property CondicionPago[] $condicionPagos
 * @property Marca $idMarca
 * @property Temporada $idTemporada
 * @property Mes $idMes
 * @property Proveedor $idProveedor
 * @property TipoProducto $idTipoProducto
 * @property EstatusFactura $idEstatus
 * @property User $idUsuario
 */
class Factura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_marca', 'id_temporada', 'id_mes', 'ano', 'id_proveedor', 'id_tipo_producto', 'nro_factura', 'monto_factura_inicial', 'unidades_factura_inicial', 'fecha_factura_inicial', 'fecha_factura_final', 'id_estatus', 'id_usuario'], 'required'],
            [['id_marca', 'id_temporada', 'id_mes', 'ano', 'id_proveedor', 'id_tipo_producto', 'unidades_factura_inicial', 'unidades_factura_final', 'id_estatus', 'id_usuario'], 'integer'],
            [['monto_factura_inicial', 'monto_factura_final'], 'number'],
            [['fecha_produccion', 'fecha_despacho', 'fecha_llegada', 'fecha_almacen', 'fecha_factura_inicial', 'fecha_factura_final'], 'safe'],
            [['nro_factura'], 'string', 'max' => 200],
            [['id_marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['id_marca' => 'id_marca']],
            [['id_temporada'], 'exist', 'skipOnError' => true, 'targetClass' => Temporada::className(), 'targetAttribute' => ['id_temporada' => 'id_temporada']],
            [['id_mes'], 'exist', 'skipOnError' => true, 'targetClass' => Mes::className(), 'targetAttribute' => ['id_mes' => 'id_mes']],
            [['id_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['id_proveedor' => 'id_proveedor']],
            [['id_tipo_producto'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProducto::className(), 'targetAttribute' => ['id_tipo_producto' => 'id_tipo_producto']],
            [['id_estatus'], 'exist', 'skipOnError' => true, 'targetClass' => EstatusFactura::className(), 'targetAttribute' => ['id_estatus' => 'id_estatus']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_factura' => 'Id Factura',
            'id_marca' => 'Id Marca',
            'id_temporada' => 'Id Temporada',
            'id_mes' => 'Id Mes',
            'ano' => 'Ano',
            'id_proveedor' => 'Id Proveedor',
            'id_tipo_producto' => 'Id Tipo Producto',
            'nro_factura' => 'Nro Factura',
            'monto_factura_inicial' => 'Monto Factura Inicial',
            'unidades_factura_inicial' => 'Unidades Factura Inicial',
            'monto_factura_final' => 'Monto Factura Final',
            'unidades_factura_final' => 'Unidades Factura Final',
            'fecha_produccion' => 'Fecha Produccion',
            'fecha_despacho' => 'Fecha Despacho',
            'fecha_llegada' => 'Fecha Llegada',
            'fecha_almacen' => 'Fecha Almacen',
            'fecha_factura_inicial' => 'Fecha Factura Inicial',
            'fecha_factura_final' => 'Fecha Factura Final',
            'id_estatus' => 'Id Estatus',
            'id_usuario' => 'Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCondicionPagos()
    {
        return $this->hasMany(CondicionPago::className(), ['id_factura' => 'id_factura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMarca()
    {
        return $this->hasOne(Marca::className(), ['id_marca' => 'id_marca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTemporada()
    {
        return $this->hasOne(Temporada::className(), ['id_temporada' => 'id_temporada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMes()
    {
        return $this->hasOne(Mes::className(), ['id_mes' => 'id_mes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProveedor()
    {
        return $this->hasOne(Proveedor::className(), ['id_proveedor' => 'id_proveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoProducto()
    {
        return $this->hasOne(TipoProducto::className(), ['id_tipo_producto' => 'id_tipo_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstatus()
    {
        return $this->hasOne(EstatusFactura::className(), ['id_estatus' => 'id_estatus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usuario']);
    }
}
