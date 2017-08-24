<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estatus_factura".
 *
 * @property integer $id_estatus
 * @property string $cod_estatus
 * @property string $descripcion
 *
 * @property Factura[] $facturas
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class EstatusFactura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estatus_factura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_estatus', 'descripcion'], 'required'],
            [['cod_estatus'], 'string', 'max' => 20],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estatus' => 'Id Estatus',
            'cod_estatus' => 'Cod Estatus',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['id_estatus' => 'id_estatus']);
    }
}
