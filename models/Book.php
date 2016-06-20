<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $title
 * @property integer $reader_id
 *
 * @property User $reader
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'reader_id'], 'required'],
            [['reader_id'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['reader_id'], 'exist', 'targetClass' => User::className(), 'targetAttribute' => ['reader_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'reader_id' => 'Reader ID',
        ];
    }
    
    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['title'],
            'update' => ['reader_id'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReader()
    {
        return $this->hasOne(User::className(), ['id' => 'reader_id']);
    }
}
