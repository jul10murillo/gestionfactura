<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_producto".
 *
 * @property integer $id_tipo_producto
 * @property string $descripcion
 *
 * @property Factura[] $facturas
 * @property ProductoProveedor[] $productoProveedors
 * @property Proveedor[] $idProveedors
 */
class TipoProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_producto' => 'Id Tipo Producto',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['id_tipo_producto' => 'id_tipo_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoProveedors()
    {
        return $this->hasMany(ProductoProveedor::className(), ['id_tipo_producto' => 'id_tipo_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProveedors()
    {
        return $this->hasMany(Proveedor::className(), ['id_proveedor' => 'id_proveedor'])->viaTable('producto_proveedor', ['id_tipo_producto' => 'id_tipo_producto']);
    }
}
