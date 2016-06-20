<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

class BookSearch extends Model
{
    public $reader_id;

    public function rules()
    {
        return [
            [['reader_id'], 'integer'],
        ];
    }

    public function search($params)
    {
        $query = Book::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, '');

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['reader_id' => $this->reader_id]);

        return $dataProvider;
    }
}