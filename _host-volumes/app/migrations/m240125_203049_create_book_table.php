<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m240125_203049_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'title' => $this->string(64)->notNull(),
            'description' => $this->string(255),
            'author' => $this->string(64)->notNull(),
            'pages' => $this->integer()->notNull()->unsigned(),
            'reg_date' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('CURRENT_TIMESTAMP')),
        ]);

        $this->addPrimaryKey('book_pk', '{{%book}}', 'title');
        $this->addIndex('author_idx', '{{%book}}', 'author');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
