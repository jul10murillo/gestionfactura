<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property integer $id_pago
 * @property integer $id_cuota
 * @property string $monto_pago
 * @property string $fecha_pago
 * @property string $fecha_creacion
 * @property integer $id_usuario
 *
 * @property CondicionPago $idCuota
 * @property User $idUsuario
 * @author Julio Murillo <jmurillo@grudu.org>
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cuota', 'monto_pago', 'fecha_pago', 'fecha_creacion', 'id_usuario'], 'required'],
            [['id_cuota', 'id_usuario'], 'integer'],
            [['monto_pago'], 'number'],
            [['fecha_pago', 'fecha_creacion'], 'safe'],
            [['id_cuota'], 'exist', 'skipOnError' => true, 'targetClass' => CondicionPago::className(), 'targetAttribute' => ['id_cuota' => 'id_cuota']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pago' => 'Id Pago',
            'id_cuota' => 'Id Cuota',
            'monto_pago' => 'Monto Pago',
            'fecha_pago' => 'Fecha Pago',
            'fecha_creacion' => 'Fecha Creacion',
            'id_usuario' => 'Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCuota()
    {
        return $this->hasOne(CondicionPago::className(), ['id_cuota' => 'id_cuota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usuario']);
    }
}
