<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordem".
 *
 * @property int $idOrdem
 * @property string|null $dataAbertura
 * @property string|null $dataFechamento
 * @property string|null $observacao
 * @property int|null $idCliente
 *
 * @property Cliente $idCliente0
 * @property OrdemProduto[] $ordemProdutos
 */
class Ordem extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dataAbertura', 'dataFechamento', 'observacao', 'idCliente'], 'default', 'value' => null],
            [['dataAbertura', 'dataFechamento'], 'safe'],
            [['idCliente'], 'integer'],
            [['observacao'], 'string', 'max' => 500],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['idCliente' => 'idCliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idOrdem' => 'Código da Ordem',
            'dataAbertura' => 'Data de abertura',
            'dataFechamento' => 'Data de fechamento',
            'observacao' => 'Observação',
            'idCliente' => 'Código do Cliente',
        ];
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Cliente::class, ['idCliente' => 'idCliente']);
    }

    /**
     * Gets query for [[OrdemProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdemProdutos()
    {
        return $this->hasMany(OrdemProduto::class, ['idOrdem' => 'idOrdem']);
    }

}
