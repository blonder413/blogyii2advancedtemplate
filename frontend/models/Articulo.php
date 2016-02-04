<?php

namespace frontend\models;

use app\models\Comentario;
use Yii;

/**
 * This is the model class for table "articulo".
 *
 * @property integer $id
 * @property integer $numero
 * @property string $titulo
 * @property string $seo_slug
 * @property string $tema
 * @property string $detalle
 * @property string $resumen
 * @property string $video
 * @property integer $tipo_id
 * @property string $descarga
 * @property integer $categoria_id
 * @property string $etiquetas
 * @property boolean $estado
 * @property integer $numero_visitas
 * @property integer $curso_id
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property Categoria $categoria
 * @property Curso $curso
 * @property Tipo $tipo
 * @property User $createdBy
 * @property User $updatedBy
 * @property Comentario[] $comentarios
 */
class Articulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'tipo_id', 'categoria_id', 'numero_visitas', 'curso_id', 'created_by', 'updated_by'], 'integer'],
            [['titulo', 'seo_slug', 'tema', 'detalle', 'resumen', 'video', 'tipo_id', 'categoria_id', 'etiquetas', 'estado', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['detalle'], 'string'],
            [['estado'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['titulo', 'seo_slug'], 'string', 'max' => 150],
            [['tema', 'descarga'], 'string', 'max' => 100],
            [['resumen'], 'string', 'max' => 300],
            [['video', 'etiquetas'], 'string', 'max' => 255],
            [['titulo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero' => 'Numero',
            'titulo' => 'Titulo',
            'seo_slug' => 'Seo Slug',
            'tema' => 'Tema',
            'detalle' => 'Detalle',
            'resumen' => 'Resumen',
            'video' => 'Video',
            'tipo_id' => 'Tipo ID',
            'descarga' => 'Descarga',
            'categoria_id' => 'Categoria ID',
            'etiquetas' => 'Etiquetas',
            'estado' => 'Estado',
            'numero_visitas' => 'Numero Visitas',
            'curso_id' => 'Curso ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'curso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id' => 'tipo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['articulo_id' => 'id']);
    }

    /**
     *
     * @return Integer número de comentarios
     */
    public function getTotalComentarios()
    {
        return $this->hasMany(Comentario::className(), ['articulo_id' => 'id'])
            ->where('estado = true')
            ->count('id');
    }
}
