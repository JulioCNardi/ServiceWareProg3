<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veiculos".
 *
 * @property int $idVeiculo
 * @property string $placa
 * @property string $modelo
 * @property string $ano
 * @property string $marca
 */
class Veiculo extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'veiculos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['placa', 'modelo', 'ano', 'marca'], 'required'],
            [['placa', 'modelo', 'ano', 'marca'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idVeiculo' => 'Id Veiculo',
            'placa' => 'Placa',
            'modelo' => 'Modelo',
            'ano' => 'Ano',
            'marca' => 'Marca',
        ];
    }

}
