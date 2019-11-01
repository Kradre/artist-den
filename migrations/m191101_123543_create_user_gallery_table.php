<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_gallery}}`.
 */
class m191101_123543_create_user_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_gallery}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'gallery_name' => $this->string()->notNull(),
            'gallery_description' => $this->text()->null(),
            'gallery_front_image' => $this->string()->null()
        ]);

        $this->addForeignKey(
            'fk-user-gallery-user-id',
            '{{%user_gallery}}',
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
        $this->dropTable('{{%user_gallery}}');
    }
}
