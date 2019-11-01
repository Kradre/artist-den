<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%follow_user}}`.
 */
class m191101_133630_create_follow_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%follow_user}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'following_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk-follow_user_user',
            '{{%follow_user}}',
            'user_id',
            '{{%user}}',
            'id',
            'cascade',
            'cascade'
        );

        $this->addForeignKey(
            'fk-follow_user_following',
            '{{%follow_user}}',
            'following_id',
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
        $this->dropTable('{{%follow_user}}');
    }
}
