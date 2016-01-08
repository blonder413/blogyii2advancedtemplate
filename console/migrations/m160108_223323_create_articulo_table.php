<?php

use yii\db\Schema;
use yii\db\Migration;

class m160108_223323_create_articulo_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{articulo}}', [
            'id'                => $this->primaryKey(),
            'numero'            => $this->smallInteger(),
            'titulo'            => $this->string(150)->notNull()->unique(),
            'seo_slug'          => $this->string(150)->notNull(),
            'tema'              => $this->string(100)->notNull(),
            'detalle'           => $this->text()->notNull(),
            'resumen'           => $this->string(300)->notNull(),
            'video'             => $this->string(255)->notNull(),
            'tipo_id'           => $this->integer()->notNull(),
            'descarga'          => $this->string(100),
            'categoria_id'      => $this->integer()->notNull(),
            'etiquetas'         => $this->string(255)->notNull(),
            'estado'            => $this->boolean()->notNull(),
            'numero_visitas'    => $this->integer()->defaultValue(0)->notNull(),
            'curso_id'          => $this->integer(),
            'created_by'        => $this->integer()->notNull(),
            'created_at'        => $this->dateTime()->notNull(),
            'updated_by'        => $this->integer()->notNull(),
            'updated_at'        => $this->dateTime()->notNull(),
        ], $tableOptions);
        
        $this->addForeignKey(
            'categoriaarticulo', 'articulo', 'categoria_id', 'categoria', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'cursoarticulo', 'articulo', 'curso_id', 'curso', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'tipoarticulo', 'articulo', 'tipo_id', 'tipo', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'usuariocreaarticulo', 'articulo', 'created_by', 'user', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'usuariomodificaarticulo', 'articulo', 'updated_by', 'user', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('categoriaarticulo', 'articulo');
        $this->dropForeignKey('cursoarticulo', 'articulo');
        $this->dropForeignKey('tipoarticulo', 'articulo');
        $this->dropForeignKey('usuariocreaarticulo', 'articulo');
        $this->dropForeignKey('usuariomodificaarticulo', 'articulo');
        $this->dropTable('{{articulo}}');
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
