<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_223803_create_comentario_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{comentario}}', [
            'id'                => $this->primaryKey(),
            'nombre'            => $this->string(150)->notNull(),
            'correo'            => $this->string(100)->notNull(),
            'web'               => $this->string(100),
            'rel'               => $this->string(20),
            'comentario'        => $this->text()->notNull(),
            'fecha'             => $this->dateTime()->notNull(),
            'articulo_id'       => $this->integer()->notNull(),
            'estado'            => $this->boolean()->defaultValue(false)->notNull(),
            'ip_cliente'        => $this->string(15),
            'puerto_cliente'    => $this->string(5),
            'pais'              => $this->string(100),
        ], $tableOptions);
        
        $this->addForeignKey(
            'articulocomentario', 'comentario', 'articulo_id', 'articulo', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('articulocomentario', 'comentario');
        $this->dropTable('{{comentario}}');
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
