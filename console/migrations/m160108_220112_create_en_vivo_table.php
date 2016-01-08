<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_220112_create_en_vivo_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{en_vivo}}', [
            'id'            => $this->primaryKey(),
            'titulo'        => $this->string(100)->notNull(),
            'descripcion'   => $this->text()->notNull(),
            'embed'         => $this->string(255),
            'inicio'        => $this->dateTime()->notNull(),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->dateTime()->notNull(),
            'updated_by'    => $this->integer()->notNull(),
            'updated_at'    => $this->dateTime()->notNull(),
        ], $tableOptions);
        
        $this->addForeignKey(
            'usuariocreaenvivo', 'en_vivo', 'created_by', 'user', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'usuariomodificaenvivo', 'en_vivo', 'updated_by', 'user', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('usuariocreaenvivo', 'en_vivo');
        $this->dropForeignKey('usuariomodificaenvivo', 'en_vivo');
        $this->dropTable('{{en_vivo}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
