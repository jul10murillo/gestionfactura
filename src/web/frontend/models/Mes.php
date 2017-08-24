<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mes".
 *
 * @property integer $id_mes
 * @property string $cod_mes
 * @property string $descripcion
 *
 * @property Factura[] $facturas
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class Mes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_mes', 'descripcion'], 'required'],
            [['cod_mes'], 'string', 'max' => 10],
            [['descripcion'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mes' => 'Id Mes',
            'cod_mes' => 'Cod Mes',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['id_mes' => 'id_mes']);
    }
}
