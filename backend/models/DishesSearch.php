<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Dishes;

/**
 * DishesSearch represents the model behind the search form about `backend\models\Dishes`.
 */
class DishesSearch extends Dishes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddish', 'price', 'idcategory'], 'integer'],
            [['dname', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Dishes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'iddish' => $this->iddish,
            'price' => $this->price,
            'idcategory' => $this->idcategory,
        ]);

        $query->andFilterWhere(['like', 'dname', $this->dname])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
