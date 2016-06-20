<?php

use yii\db\Migration;

class m160617_113000_fk_book_reader extends Migration
{
    public function safeUp()
    {
        $this->createIndex('idx-book-reader_id', 'book', 'reader_id');

        $this->addForeignKey(
            'fk-book-reader_id',
            'book',
            'reader_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-book-reader_id', 'book');
        $this->dropIndex('idx-book-reader_id', 'book');
    }
}
