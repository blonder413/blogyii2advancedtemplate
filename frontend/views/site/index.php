    <?php
    use frontend\models\Helper;
    use yii\helpers\Html;
    use yii\helpers\HtmlPurifier;
    use yii\widgets\Breadcrumbs;
    use yii\widgets\LinkPager;
    /* @var $this yii\web\View */
    $this->title = 'Mi Blog';
    setlocale(LC_TIME, 'es_CO.UTF-8');
    ?>

    <section class="posts col-md-9">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?php foreach ($articulos as $key => $value): ?>
            <article class="post clear-fix">
                <?= Html::a(
                    Html::img(
                        '@web/img/categories/' . $value->categoria->seo_slug . '.png',
                        [
                            // 'class' => 'img-circle',
                            'alt'   => $value->categoria->categoria,
                            'class' => 'img-thumbnail',
                        ]
                    ),
                    ['/categoria/' . Html::encode("{$value->categoria->seo_slug}")],
                    [
                        'class' => 'thumb pull-left',
                    ]
                );
                ?>

                <h3 class="post-title">
                    <?= Html::a(
                        Html::encode("{$value->titulo}"),
                        ['/articulo/' . Html::encode("{$value->seo_slug}")],
                        [
                            'title' => Html::encode("{$value->titulo}"),
                        ]
                    ) ?>
                </h3>

                <div class="post-date">
                    <span class="glyphicon glyphicon-user">&nbsp;</span><span class="post-author"><?= ucWords(HTml::encode("{$value->createdBy->name}")) ?></span>
                    &nbsp;|
                    <span class="glyphicon glyphicon-calendar">&nbsp;</span><?= strftime("%c", strtotime($value->created_at)) ?>
                </div>

                <p class="post-content">
                    <?php
                    if (empty($value->resumen)) {
                        echo HtmlPurifier::process(Helper::myTruncate($value->detalle, 300, " ", "..."));
                    } else {
                        echo $value->resumen;
                    }
                    ?>
                </p>

                <div class="container-buttons">
                    <?= Html::a(
                        'Ver Más &raquo;',
                        ['/articulo/' . Html::encode("{$value->seo_slug}")],
                        [
                            'class' => 'btn btn-primary',
                            'title' => 'Ver artículo completo',
                        ]
                    ) ?>
                    <?= Html::a(
                        "Comentarios <span class='badge'>$value->totalComentarios</span>",
                        ['/articulo/' . Html::encode("{$value->seo_slug}") . '#comments'],
                        [
                            'class' => 'btn btn-success',
                            'title' => 'Ver Comentarios',
                        ]
                    ) ?>
                </div>
            </article>
        <?php endforeach; ?>

        <div class="row text-center"><?php echo LinkPager::widget(['pagination'=>$pagination]); ?></div>

    </section>

    <aside class="hidden-xs hidden-sm col-md-3">
        <?= $this->render(
            '/site/sidebar',
            [
                'categorias'    => $categorias,
                'mas_visitados'  => $mas_visitados,
            ]
        ) ?>
    </aside>