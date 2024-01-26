<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m240126_032147_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'last_name' => $this->string(64)->notNull(),
            'middle_name' => $this->string(64)->notNull(),
            'about' => $this->text(),
            'birth_data' => $this->date()->notNull(),
            'genre' => $this->string(32)->notNull(),
        ]);

        $this->addIndex('full_name_idx', '{{%author}}', ['last_name', 'name', 'middle_name']);;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
