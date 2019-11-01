<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image_index}}`.
 */
class m191101_123640_create_image_index_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image_index}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'image_name' => $this->string()->notNull(),
            'image_description' => $this->text()->null(),
            'image_src' => $this->string()->notNull()
        ]);

        $this->addForeignKey(
            'fk-image_index_user',
            '{{%image_index}}',
            'user_id',
            '{{%user}}',
            'id',
            'cascade',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image_index}}');
    }
}
