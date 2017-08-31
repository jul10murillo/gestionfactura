<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estatus_pago".
 *
 * @property integer $id_estatus_pago
 * @property string $cod_estatus_pago
 * @property string $descripcion_pago
 *
 * @property CondicionPago[] $condicionPagos
 */
class EstatusPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estatus_pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_estatus_pago', 'descripcion_pago'], 'required'],
            [['cod_estatus_pago'], 'string', 'max' => 20],
            [['descripcion_pago'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estatus_pago' => 'Id Estatus Pago',
            'cod_estatus_pago' => 'Cod Estatus Pago',
            'descripcion_pago' => 'Descripcion Pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCondicionPagos()
    {
        return $this->hasMany(CondicionPago::className(), ['id_estatus_pago' => 'id_estatus_pago']);
    }
}
