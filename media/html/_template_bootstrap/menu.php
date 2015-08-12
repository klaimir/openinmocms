		<div class="navbar navbar-default navbar-fixed-top" role="navigation">

            <div class="container">
                <div class="navbar-header">

                    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo  URL_EMPRESA; ?>">
                        <!--<img src="<?php echo  $_SESSION['rutaimg']; ?>cabecera.png" alt="<?php echo  NOMBRE_EMPRESA; ?>" /><span>--><span class="glyphicon glyphicon-home"></span> <?php echo  NOMBRE_EMPRESA; ?></span>
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li <?php if($seccion=="buscador") {echo 'active';}?>>
                            <a href="<?php echo  $_SESSION['rutaraiz']; ?>app/buscador/index.php" title="<?php echo  $textos['buscador']; ?>"><?php echo  $textos['buscador']; ?></a>
                        </li>
                        <li <?php if($seccion=="noticias") {echo 'active';}?>>
                            <a href="<?php echo  $_SESSION['rutaraiz']; ?>app/noticias/rss.php" title="<?php echo  $textos['noticias']; ?>"><?php echo  $textos['noticias']; ?></a>
                        </li>
                        <li <?php if($seccion=="certificacion_energetica") {echo 'active';}?>>
                            <a href="<?php echo  $_SESSION['rutaraiz']; ?>app/certificacion_energetica/index.php" title="<?php echo  $textos['certificacion_energetica']; ?>"><?php echo  $textos['certificacion_energetica']; ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>