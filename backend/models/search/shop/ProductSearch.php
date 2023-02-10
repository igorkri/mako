<?php

namespace backend\models\search\shop;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\shop\Product;

/**
 * ProductSearch represents the model behind the search form of `common\models\shop\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'published', 'category_id', 'delivery_id', 'series_id', 'status_id', 'popular_product'], 'integer'],
            [['name', 'description', 'indication', 'producer'], 'safe'],
            [['price'], 'number'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'published' => $this->published,
            'category_id' => $this->category_id,
            'delivery_id' => $this->delivery_id,
            'series_id' => $this->series_id,
            'status_id' => $this->status_id,
            'popular_product' => $this->popular_product,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'indication', $this->indication])
            ->andFilterWhere(['like', 'producer', $this->producer]);

        return $dataProvider;
    }
}
