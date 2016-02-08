<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Articulo;

/**
 * ArticuloSearch represents the model behind the search form about `backend\models\Articulo`.
 */
class ArticuloSearch extends Articulo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'numero', 'tipo_id', 'categoria_id', 'numero_visitas', 'curso_id', 'created_by', 'updated_by'], 'integer'],
            [['titulo', 'seo_slug', 'tema', 'detalle', 'resumen', 'video', 'descarga', 'etiquetas', 'created_at', 'updated_at'], 'safe'],
            [['estado'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Articulo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'numero' => $this->numero,
            'tipo_id' => $this->tipo_id,
            'categoria_id' => $this->categoria_id,
            'estado' => $this->estado,
            'numero_visitas' => $this->numero_visitas,
            'curso_id' => $this->curso_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'seo_slug', $this->seo_slug])
            ->andFilterWhere(['like', 'tema', $this->tema])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
            ->andFilterWhere(['like', 'resumen', $this->resumen])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'descarga', $this->descarga])
            ->andFilterWhere(['like', 'etiquetas', $this->etiquetas]);

        return $dataProvider;
    }
}
