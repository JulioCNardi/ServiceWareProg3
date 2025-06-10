<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $idCliente
 * @property string $nome
 * @property string $cpf
 * @property string $endereco
 * @property string $email
 * @property string|null $telefone
 * @property string|null $cidade
 * @property string $numero
 *
 * @property Ordem[] $ordems
 */
class Cliente extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telefone', 'cidade'], 'default', 'value' => null],
            [['nome', 'cpf', 'endereco', 'email', 'numero'], 'required'],
            [['nome', 'cpf', 'endereco', 'cidade', 'numero'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 250],
            [['telefone'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'endereco' => 'Endereco',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'cidade' => 'Cidade',
            'numero' => 'Numero',
        ];
    }

    /**
     * Gets query for [[Ordems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdems()
    {
        return $this->hasMany(Ordem::class, ['idCliente' => 'idCliente']);
    }

}
