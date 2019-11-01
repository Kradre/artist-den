<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profile_style}}`.
 */
class m191101_035856_create_profile_style_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profile_style}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'stylesheet' => $this->text()->null()
        ]);

        $this->addForeignKey(
            'fk-profile-style-table',
            '{{%profile_style}}',
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
        $this->dropTable('{{%profile_style}}');
    }
}
