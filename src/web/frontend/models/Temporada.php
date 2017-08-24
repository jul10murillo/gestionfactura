<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temporada".
 *
 * @property integer $id_temporada
 * @property string $descripcion
 *
 * @property Factura[] $facturas
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class Temporada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temporada';
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
            'id_temporada' => 'Id Temporada',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['id_temporada' => 'id_temporada']);
    }
}
