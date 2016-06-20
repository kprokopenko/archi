<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Book[] $books
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['reader_id' => 'id']);
    }

    /**
     * Статистика самых читающих пользователей.
     *
     * Выводится читатель, взявший больше всего книг.
     * Или несколько, если взяли одинаковое количество книг.
     * @return $this
     */
    public static function findStat()
    {
        $query = self::find()
            ->joinWith('books', true, 'join')
            ->groupBy('reader_id')
            ->orderBy('COUNT(reader_id)')
            ->limit(1);
        
        return $query;
    }
}
