<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160617_111808_create_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull()->comment('Имя пользователя'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
