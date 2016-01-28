<?php
use yii\helpers\Html;
?>

    <div>
        <h4>Mis Redes Sociales</h4>
        <?= Html::a(
            Html::img("@web/img/google-plus-c.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi perfil en Google+']),
            '@google+',
            ['target' => '_blank', 'title'  => 'Mi perfil en Google+']
        ) ?>
        
        <?= Html::a(
            Html::img("@web/img/twitter-c.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi perfil en Twitter']),
            '@twitter',
            ['target' => '_blank', 'title'  => 'Mi perfil en Twitter']
        ) ?>
        
        <?= Html::a(
            Html::img("@web/img/facebook-c.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi biografía en Facebook']),
            '@facebook',
            ['target' => '_blank', 'title'  => 'Mi perfil en Facebook']
        ) ?>
        
        <?= Html::a(
            Html::img("@web/img/youtube-c.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi perfil en Youtube']),
            '@youtube',
            ['target' => '_blank', 'title'  => 'Mi perfil en Youtube']
        ) ?>
        <br>
        <?= Html::a(
            Html::img("@web/img/vimeo-c.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi perfil en Vimeo']),
            '@vimeo',
            ['target' => '_blank', 'title'  => 'Mi perfil en Vimeo']
        ) ?>
        
        <?= Html::a(
            Html::img("@web/img/github-c.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi repositorio en Github']),
            '@github',
            ['target' => '_blank', 'title'  => 'Mi repositorio en Github']
        ) ?>
        
        <?= Html::a(
            Html::img("@web/img/linked-in-c.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi perfil en LinkedIn']),
            '@linkedin',
            ['target' => '_blank', 'title'  => 'Mi perfil en LinkedIn']
        ) ?>
        
        <?= Html::a(
            Html::img("@web/img/delicious-c.png", ['class'=>'img-thumbnail','width' => '50', 'alt' => 'Mi enlaces en Delicious']),
            '@delicious',
            ['target' => '_blank', 'title'  => 'Mi enlaces en Delicious']
        ) ?>
    </div>

  <div class="list-group">
    <h4>Categorías</h4>
      <?php foreach( $categorias as $key => $value ): ?>
        <?= Html::a(
            Html::img("@web/img/categorias/$value->seo_slug.png", ['alt' => $value->categoria, 'width' => '40']) . " " . $value->categoria,
            ['/categoria/' . $value->seo_slug],
            [
                'class' => 'list-group-item',
                'title' => $value->categoria,
            ]
        ) ?>
      <?php endforeach; ?>

  </div>

   <div class="list-group">
      <h4>Chat</h4>

    <script id="sid0010000038030679890">(function() {
                    function async_load() {
                        s.id = "cid0010000038030679890";
                        s.src = 'http://st.chatango.com/js/gz/emb.js';
                        s.style.cssText = "width:100%;height:500px;";
                        s.async = true;
                        s.text = '{"handle":"Blonder413Hall","styles":{"a":"ffffff","b":60,"c":"4E4B58","d":"002255","f":50,"l":"AAAACC","m":"002255","n":"FFFFFF","q":"999999","r":100,"s":1,"w":0}}';
                        var ss = document.getElementsByTagName('script');
                        for (var i = 0, l = ss.length; i < l; i++) {
                            if (ss[i].id == 'sid0010000038030679890') {
                                ss[i].id += '_';
                                ss[i].parentNode.insertBefore(s, ss[i]);
                                break;
                            }
                  }
              }
              var s = document.createElement('script');
              if (s.async == undefined) {
                  if (window.addEventListener) {
                      addEventListener('load', async_load, false);
                  } else if (window.attachEvent) {
                      attachEvent('onload', async_load);
                  }
              } else {
                  async_load();
              }
    })();</script>

  </div>

  <div class="list-group">
    <h4>Artículos Populares</h4>

    <?php foreach ($mas_visitado as $key => $value): ?>

    <a href="/articulo/<?= $value->seo_slug ?>" class="list-group-item">
      <h4 class="list-group-item-heading"><?php echo $value->titulo; ?></h4>
      <p class="list-group-item-text">
        <?php echo $value->abstract; ?>
      </p>
        <p>
            <small><span class="glyphicon glyphicon-eye-open">&nbsp;</span><?= $value->numero_visitas ?> visitas</small>
        </p>
    </a>
    <?php endforeach; ?>

  </div>

<div class="list-group">
    <h4>Webs Amigas</h4>
    <div class="list-group">

        <?= Html::a(
            Html::img("@web/img/webs/asieslinux.png", ['width' => '20']) . " Así es Linux",
            'http://asieslinux.blogspot.com/',
            [
                'class'     => 'list-group-item',
                'target'    => '_blank',
            ]
        ) ?>

        <?= Html::a(
            Html::img("@web/img/webs/cesarcancino.png", ['width' => '20']) . " WebMaster César Cancino",
            'http://www.cesarcancino.com/',
            [
                'class'     => 'list-group-item',
                'target'    => '_blank',
            ]
        ) ?>

        <?= Html::a(
            Html::img("@web/img/webs/oscar-gomez.png", ['width' => '20']) . " Oscar Gómez",
            'http://www.oscar-gomez.net',
            [
                'class'     => 'list-group-item',
                'target'    => '_blank',
            ]
        ) ?>

        <?= Html::a(
            Html::img("@web/img/webs/keyphercom.png", ['width' => '20']) . " Keyphercom",
            'http://www.keyphercom.com/',
            [
                'class'     => 'list-group-item',
                'target'    => '_blank',
            ]
        ) ?>

        <?= Html::a(
            Html::img("@web/img/webs/tecnodidactas.png", ['width' => '20']) . " Tecnodidactas",
            'http://www.tecnodidactas.com/',
            [
                'class'     => 'list-group-item',
                'target'    => '_blank',
            ]
        ) ?>

        <?= Html::a(
            Html::img("@web/img/webs/midas-ingenieria.png", ['width' => '20']) . " Midas Ingeniería",
            'http://midasingenieria.com/',
            [
                'class'     => 'list-group-item',
                'target'    => '_blank',
            ]
        ) ?>

        <?= Html::a(
            Html::img("@web/img/webs/directorio-ladorada.png", ['width' => '20']) . " Directorio La Dorada Caldas",
            'http://www.directorioladorada.com/',
            [
                'class'     => 'list-group-item',
                'target'    => '_blank',
            ]
        ) ?>
        
        <?= Html::a(
            Html::img("@web/img/webs/capa8.png", ['width' => '20']) . " Capa8 tv",
            'http://www.capa8.tv/',
            [
                'class'     => 'list-group-item',
                'target'    => '_blank',
            ]
        ) ?>

    </div>
</div>

<div class="list-group">
    <h4>Twitter @blonder413</h4>
    <div class="list-group">
        <a class="twitter-timeline"  href="https://twitter.com/blonder413" data-widget-id="245510889955008512">Tweets por el @blonder413.</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
</div>
