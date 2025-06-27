<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $idProduto
 * @property string $nome
 * @property float $valor
 *
 * @property OrdemProduto[] $ordemProdutos
 */
class Produto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'valor'], 'required'],
            [['valor'], 'number'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProduto' => 'Código do Produto',
            'nome' => 'Nome',
            'valor' => 'Valor de venda',
        ];
    }

    /**
     * Gets query for [[OrdemProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdemProdutos()
    {
        return $this->hasMany(OrdemProduto::class, ['idProduto' => 'idProduto']);
    }

}
