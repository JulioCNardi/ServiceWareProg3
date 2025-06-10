<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordem_produtos".
 *
 * @property int $id
 * @property int $idOrdem
 * @property int $idProduto
 * @property int $quantidade
 *
 * @property Ordem $idOrdem0
 * @property Produto $idProduto0
 */
class OrdemProdutos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordem_produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idOrdem', 'idProduto', 'quantidade'], 'required'],
            [['idOrdem', 'idProduto', 'quantidade'], 'integer'],
            [['idOrdem'], 'exist', 'skipOnError' => true, 'targetClass' => Ordem::class, 'targetAttribute' => ['idOrdem' => 'idOrdem']],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['idProduto' => 'idProduto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idOrdem' => 'Id Ordem',
            'idProduto' => 'Id Produto',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[IdOrdem0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrdem0()
    {
        return $this->hasOne(Ordem::class, ['idOrdem' => 'idOrdem']);
    }

    /**
     * Gets query for [[IdProduto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduto0()
    {
        return $this->hasOne(Produto::class, ['idProduto' => 'idProduto']);
    }

}
