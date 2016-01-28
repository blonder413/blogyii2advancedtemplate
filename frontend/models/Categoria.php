<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $id
 * @property string $categoria
 * @property string $seo_slug
 * @property string $imagen
 * @property string $descripcion
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property Articulo[] $articulos
 * @property User $createdBy
 * @property User $updatedBy
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria', 'seo_slug', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['categoria', 'seo_slug'], 'string', 'max' => 100],
            [['imagen'], 'string', 'max' => 50],
            [['descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria' => 'Categoria',
            'seo_slug' => 'Seo Slug',
            'imagen' => 'Imagen',
            'descripcion' => 'Descripcion',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulo::className(), ['categoria_id' => 'id']);
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
}
