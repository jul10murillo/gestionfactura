<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto_proveedor".
 *
 * @property integer $id_proveedor
 * @property integer $id_tipo_producto
 *
 * @property Proveedor $idProveedor
 * @property TipoProducto $idTipoProducto
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class ProductoProveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto_proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proveedor', 'id_tipo_producto'], 'required'],
            [['id_proveedor', 'id_tipo_producto'], 'integer'],
            [['id_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['id_proveedor' => 'id_proveedor']],
            [['id_tipo_producto'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProducto::className(), 'targetAttribute' => ['id_tipo_producto' => 'id_tipo_producto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proveedor' => 'Id Proveedor',
            'id_tipo_producto' => 'Id Tipo Producto',
        ];
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
}
