<?php

use yii\db\Migration;

/**
 * Handles the creation for table `books`.
 */
class m160617_111145_create_book extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200)->notNull(),
            'reader_id' => $this->integer()->comment('пользователь, взявший книгу'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('book');
    }
}
