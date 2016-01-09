<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="<?= Yii::getAlias('@web') ?>/css/blue/style.css" rel="stylesheet" type="text/css">
    <link href="<?= Yii::getAlias('@web') ?>/img/favicon.png" rel="icon" type="image/vnd.microsoft.icon"/>
    <!--<link rel="image_src" href="<?php //echo Yii::$app->homeUrl . 'web/img/' . $this->image_src . '.png' ?>">-->
    
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
<body>
    
<?php $this->beginBody() ?>
    <header>
        <?php
            NavBar::begin([
                // 'brandLabel' => 'Blonder413 - Aprendizaje Dinámico',
                // 'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-blue navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-brand'],
                'items' => [
                    Html::img('@web/img/logo.png', ['class'=>'img-responsive', 'width'=>'30px'])
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    ['label' => 'Blonder413 - Aprendizaje Dinámico', 'url' => Yii::$app->homeUrl],
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Inicio', 'url' => Yii::$app->homeUrl],
                    ['label' => 'Portafolio', 'url' => ['/site/portfolio']],
                    ['label' => 'Acerca', 'url' => ['/site/about']],
                    ['label' => 'En Vivo', 'url' => ['/site/streaming']],
                    ['label' => 'Contacto', 'url' => ['/site/contact']],
                    // ['label' => 'Signup', 'url' => ['/site/signup']],
                    
                    Yii::$app->user->isGuest ?
                        '' :
                        [
                            'label' => 'Admin',
                            'items' => [
                                ['label' => 'Article', 'url' => ['/article/index']],
                                ['label' => 'Category', 'url' => ['/category/index']],
                                ['label' => 'Comment', 'url' => ['/comment/index']],
                                ['label' => 'Streaming', 'url' => ['/streaming/index']],
                                [
                                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                    'url' => ['/site/logout'],
                                    'linkOptions' => ['data-method' => 'post']
                                ],
                            ]
                        ],      
                ],
            ]);
            NavBar::end();
        ?>
    </header>

    <section class="jumbotron">
        <div class="container">
            <h1 class="title-blog">
              <?= Html::img('@web/img/logo.png', ['alt' => 'logo Blonder413', 'width'=>'70']) ?>
              Blonder413
            </h1>
            <p>Aprendizaje dinámico</p>
        </div>
    </section>

    <section class="main container">
      <div class="row">

            <!-- Google Adsense -->
            <div class="col-sm-12 col-md-12">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- bannerresponsive -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-2208995637216263"
                     data-ad-slot="1780166723"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <br>
            </div>
            <!-- End Google Adsense -->
            
            <div class="col-sm-12 col-md-12">
                <?php
                $numDia = date('N');
                
                switch ($numDia) {
                    case 1: // lunes
                        $img = '@web/img/bannerphpcapa8.png';
                        $alt = 'php';
                        break;
                    case 2: // martes
                        $img = '@web/img/banneryii2capa8.png';
                        $alt = 'yii2';
                        break;
                    case 3: // miércoles
                        $img = '@web/img/bannerjavacapa8.png';
                        $alt = 'java';
                        break;
                    case 4: // jueves
                        $img = '@web/img/banneringlescapa8.png';
                        $alt = 'inglés';
                        break;
                    default:
                        $img = '@web/img/bannerphpcapa8.png';
                        $alt = 'php';
                }
                ?>
            <?= Html::a(
                Html::img($img, ['class'=>'img-responsive center-block', 'alt' => $alt]),
                'http://www.capa8.tv/en-vivo',
                [ 'target' => '_blank', 'title'=>'ver la clase' ]
            ) ?>
            </div>
          
          <!-- Google Search -->
          <div class="col-sm-12">
                <script>
                (function() {
                  var cx = '009014689535229426168:oaz4ieig01w';
                  var gcse = document.createElement('script');
                  gcse.type = 'text/javascript';
                  gcse.async = true;
                  gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                      '//cse.google.com/cse.js?cx=' + cx;
                  var s = document.getElementsByTagName('script')[0];
                  s.parentNode.insertBefore(gcse, s);
                })();
              </script>
              <gcse:search></gcse:search>
            </div>
          <!-- End Google Search -->
          
          <?php
        //Ip del visitante
        if ($_SERVER['REMOTE_ADDR']=='::1') $ipuser= ''; else $ipuser= $_SERVER['REMOTE_ADDR'];

        $geoPlugin_array = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ipuser) );

        //Obtener el continente
    //    echo 'Continente: '.$geoPlugin_array['geoplugin_continentCode'];

        //Obtener el pais
        $_SESSION['country'] = $geoPlugin_array['geoplugin_countryName'];

        if ($_SESSION['country'] == 'Venezuela') {
        ?>
          <div class="col-sm-12 col-md-12 text-center btn btn-danger">
            <h2>En estos momentos estamos en mantenimiento, por favor regrese más tarde</h2>
          </div>
          
        <?php
        } else {
        ?> 
            <?= $content ?>
        <?php
        }
        //Obtener moneda del pais
    //    echo ' Moneda: '.$geoPlugin_array['geoplugin_currencyCode'];
        ?>
          
          

      </div>
    </section>

    <footer class="text-center">
            <hr>
            <a rel="license" href="http://creativecommons.org/licenses/by-sa/2.5/co/">
                <img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/2.5/co/88x31.png" />
            </a>
            <br>

            <!--
            <a href="http://www.w3.org/html/logo/">
                    <img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics">
            </a>
            <br>
            -->

            <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title" class="negrita">Blonder413 - Aprendizaje dinámico</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.blonder413.com" property="cc:attributionName" rel="cc:attributionURL">Jonathan Morales Salazar</a> <br>se encuentra bajo una Licencia <a rel="license" href="http://creativecommons.org/licenses/by-sa/2.5/co/">Creative Commons Atribución-CompartirIgual 2.5 Colombia</a>.
            <br>2011 - <?php echo date("Y"); ?>
        </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
