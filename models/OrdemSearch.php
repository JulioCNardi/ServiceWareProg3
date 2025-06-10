<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ordem;

/**
 * OrdemSearch represents the model behind the search form of `app\models\Ordem`.
 */
class OrdemSearch extends Ordem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idOrdem', 'idCliente'], 'integer'],
            [['dataAbertura', 'dataFechamento', 'observacao'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Ordem::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idOrdem' => $this->idOrdem,
            'dataAbertura' => $this->dataAbertura,
            'dataFechamento' => $this->dataFechamento,
            'idCliente' => $this->idCliente,
        ]);

        $query->andFilterWhere(['like', 'observacao', $this->observacao]);

        return $dataProvider;
    }
}
