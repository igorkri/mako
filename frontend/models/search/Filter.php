<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\shop\Product;

/**
 * ProductSearch represents the model behind the search form of `common\models\shop\Product`.
 */
class Filter extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['popular_product', 'status_id', 'category_id', 'producer_id', 'series_id', 'price'], 'safe'],
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

        $sort_price = [];
        if(isset($params['Filter']['sort'][0]) and $params['Filter']['sort'][0] == 1){
            $sort_price = ['defaultOrder'=> ['price' => SORT_ASC]];
        }elseif(isset($params['Filter']['sort'][0]) and $params['Filter']['sort'][0] == 2){
            $sort_price = ['defaultOrder'=> ['price' => SORT_DESC]];
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
//            'sort' => ['defaultOrder'=> ['price' => SORT_ASC]],
            'sort' => $sort_price,
            'pagination' => [
                'pageSize' => 9,
                'forcePageParam' => false,
                'pageSizeParam' => false
            ],
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
            'category_id' => $this->category_id,
            'series_id' => $this->series_id,
            'producer_id' => $this->producer_id,
            'status_id' => $this->status_id,
            'price' => $this->price,
            'popular_product' => $this->popular_product,
        ]);

        return $dataProvider;
    }
}
