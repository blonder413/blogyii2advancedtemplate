<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_220345_create_categoria_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{categoria}}', [
            'id'            => $this->primaryKey(),
            'categoria'     => $this->string(100)->notNull(),
            'seo_slug'      => $this->string(100)->notNull(),
            'imagen'        => $this->string(50),
            'descripcion'   => $this->string(255),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->dateTime()->notNull(),
            'updated_by'    => $this->integer()->notNull(),
            'updated_at'    => $this->dateTime()->notNull(),
        ], $tableOptions);
        
        $this->addForeignKey(
            'usuariocreacategoria', 'categoria', 'created_by', 'user', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'usuariomodificacategoria', 'categoria', 'updated_by', 'user', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('usuariocreacategoria', 'categoria');
        $this->dropForeignKey('usuariomodificacategoria', 'categoria');
        $this->dropTable('{{categoria}}');
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
