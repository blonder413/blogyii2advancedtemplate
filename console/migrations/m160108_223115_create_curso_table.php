<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_223115_create_curso_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{curso}}', [
            'id'            => $this->primaryKey(),
            'curso'         => $this->string(100)->notNull()->unique(),
            'seo_slug'      => $this->string(100)->notNull(),
            'descripcion'   => $this->text()->notNull(),
            'imagen'        => $this->string(50)->notNull(),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->dateTime()->notNull(),
            'updated_by'    => $this->integer()->notNull(),
            'updated_at'    => $this->dateTime()->notNull(),
        ], $tableOptions);
        
        $this->addForeignKey(
            'usuariocreacurso', 'curso', 'created_by', 'user', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'usuariomodificacurso', 'curso', 'updated_by', 'user', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('usuariocreacurso', 'curso');
        $this->dropForeignKey('usuariomodificacurso', 'curso');
        $this->dropTable('{{curso}}');
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
