<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m191101_123603_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'category_name' => $this->string()->notNull(),
            'category_parent' => $this->integer()->null()
        ]);

        $this->addForeignKey(
            'fk-category_user',
            '{{%category}}',
            'user_id',
            '{{%user}}',
            'id',
            'cascade',
            'cascade'
        );

        $this->addForeignKey(
            'fk-category_parent',
            '{{%category}}',
            'category_parent',
            '{{%category}}',
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
        $this->dropTable('{{%category}}');
    }
}
