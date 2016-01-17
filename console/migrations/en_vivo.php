<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'En Vivo';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="posts col-md-9">

    <div class="row text-center">
        <h1><?= Html::encode($this->title) ?></h1>
        
        <?php if ($en_vivo): ?>
            <h2><?= Html::encode($en_vivo->titulo); ?></h2>
            <div class="video-responsive">
                <?= $en_vivo->embed ?>
            </div>
            
            <p><?= $en_vivo->descripcion ?></p>
        <?php else: ?>
            
            <p>En estos momentos no estamos transmitiendo, pero puede disfrutar de alguna de nuestras transmisiones anteriores.</p>

            <?php if (!empty($articulos[0]->video)): ?>
                <div class="video-responsive">
                    <?= $articulos[0]->video; ?>
                </div>
            <?php endif; ?>

            <p>A continuación otras transmisiones que podrían interesarle.</p>

            <ul>
                <?php foreach ($articulos as $key => $value): ?>
                    <li class="list-style-none">
                        <?=
                        Html::a(
                                $value->titulo, [
                            '/articulo/' . $value->seo_slug
                                ], [
                            'title' => $value->titulo,
                                ]
                        )
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        
        <?php endif; ?>
    </div>
    <div class="clear-fix"></div>
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-12">
            <div>
                <!-- Facebook Comments -->
                <div class="row box style1 ">
                    <div class='12u'>
                        <div id="fb-root"></div>
                        <script>(function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id))
                                    return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                        <div class='facebookComments'>
                            <div class="fb-comments" data-href="http://www.blonder413.com/en-vivo" data-width="100%"></div>
                        </div>
                        
                    </div>
                </div>
                <!-- End Facebook Comments -->
            </div>
        </div>
    </div>

</section>

<aside class="hidden-xs hidden-sm col-md-3">
    <?=
    $this->render(
      '/site/sidebar',
      [
	    'categorias' => $categorias,
	    'mas_visitados' => $mas_visitados,
      ]
    )
    ?>
</aside>