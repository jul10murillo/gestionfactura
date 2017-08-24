<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property integer $id_proveedor
 * @property string $nombre
 *
 * @property Factura[] $facturas
 * @property ProductoProveedor[] $productoProveedors
 * @property TipoProducto[] $idTipoProductos
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proveedor' => 'Id Proveedor',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['id_proveedor' => 'id_proveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoProveedors()
    {
        return $this->hasMany(ProductoProveedor::className(), ['id_proveedor' => 'id_proveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoProductos()
    {
        return $this->hasMany(TipoProducto::className(), ['id_tipo_producto' => 'id_tipo_producto'])->viaTable('producto_proveedor', ['id_proveedor' => 'id_proveedor']);
    }
}
