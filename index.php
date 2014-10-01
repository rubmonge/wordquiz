<?php require 'src/controller.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Vamos a jugar a un juego Quique e Irene...</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet">
        <link href="assets/colorbox/colorbox.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Ganaros el regalo</a>
                </div>
                <div class="collapse navbar-collapse pull-right">
                    <ul class="nav navbar-nav">                        
                        <li><a href="#" data-toggle="modal" data-target="#instructions">Instrucciones</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#clues">Pistas</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <? if (!$data['end_of_game']): ?>
            <div class="container" id='content'>
                <? if (isset($data['hit'])): ?>
                    <div class='row'>
                        <div class="alert alert-success col-lg-12" role="alert"><?= $data['hit'] ?></div>
                    </div>
                <? endif ?>
                <? if (isset($data['validation'])): ?>
                    <div class='row'>
                        <div class="alert alert-danger col-lg-12" role="alert"><?= $data['validation'] ?></div>
                    </div>
                <? endif ?>
                <? if (isset($data['new_clue']) && $data['new_clue']): ?>
                    <? if (count($data['clues']) < count($clues[$data['level']])): ?>
                        <div class='row'>
            
                            <div class="alert alert-success col-lg-12" role="alert">
                                ¡Habéis desbloqueado una nueva <a href='#' data-toggle="modal" data-target="#clues">pista</a>!                                
                                <br/>
                                <strong><?=$data['current_clue']?></strong>
                            </div>
                        </div>
                    <? else: ?>
                        <div class='row'>
                            <div class="alert alert-info col-lg-12" role="alert">Tocaría una pista... pero ¿sabes qué? No tenemos más :( </div>
                        </div>
                    <? endif ?>
                <? endif ?>
                <div class='row'>
                    <div class="col-lg-6">
                        <div class="jumbotron">               
                            <h2>Quique, Irene <br/> juguemos a un juego</h2>
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label  class="sr-only" for="word">Email address</label>
                                    <input autofocus='true'  onpaste="return false" name="word" type="text" class="form-control" id="word" placeholder="Escribid algo">
                                </div>

                                <button type="submit" class="btn btn-default">Probar</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6">                                                            
                        <figure>
                            <img src='<?= $data['image'] ?>' class="img-responsive desaturate "/>
                            <figcaption>Inhalated random pic</figcaption>
                        </figure>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">                            
                        <h4>Cómo vas:</h4>
                        <p>Lleváis <strong><?= $data['tries'] ?></strong> intentos y estáis en el nivel <strong><?= $data['level']+1 ?>: </strong> <em><?= $data['message'] ?></em></p>
                        <? if (is_array($data['words']) && count($data['words'])): ?>
                            <p>
                                Ya has probado con: 
                                <? foreach ($data['words'] as $word): ?>
                                    <span class="label label-default"><?= $word ?></span>
                                <? endforeach ?>
                            </p>
                        <? endif ?>
                    </div>
                </div>
                <div class="footer">
                    <p>&copy; Hecho con 'amor' por los Inhalaos para un 4 de Octubre. 
                        | <a href='#' data-toggle="modal" data-target="#instructions">Instrucciones</a>
                        | <a href='#' data-toggle="modal" data-target="#clues">Pistas</a>
                    </p>
                </div>

            </div> <!-- /container -->
        <? else: ?>
            <div class="container" id='content'>
                <div class="row">
                    <h2>Habéis ganao! perfect! <br/><?= $data['hit'] ?></h2>
                </div>
                <div class="row">
                    <? $images = RandImage::images() ?>
                    <? foreach ($images as $image): ?>
                        <div class="col-xs-6 col-md-3">
                            <a href="<?= $image ?>" class="thumbnail">
                                <img src="<?= $image ?>" class="img-responsive img-rounded desaturate">
                            </a>
                        </div>
                    <? endforeach ?>
                </div>
            </div>
        <? endif ?>

        <div class="modal fade" id="clues">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Pistas del nivel actual</h4>
                    </div>
                    <div class="modal-body">
                        <? if (is_array($data['clues']) && count($data['clues'])): ?>
                            <ol>
                                <? foreach ($data['clues'] as $k => $clue): ?>
                                    <? if ($k != count($data['clues']) - 1): ?>
                                        <li><?= $clue ?></li>
                                    <? else: ?>
                                        <li><strong><?= $clue ?></strong></li>
                                    <? endif ?>
                                <? endforeach ?>
                            </ol>
                        <? else: ?>
                            <p>De momento no habéis desbloqueado ninguna pista para este nivel.</p>
                        <? endif ?>
                    </div>                   
                </div>
            </div>
        </div><!-- /.modal -->
        <div class="modal fade" id="instructions">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Instrucciones</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            La cosa no tiene mucho secreto:<br/>
                            <strong>Acertar escribiendo lo correcto</strong>.<br/>
                            <br/>
                            Tendréis que acertar varias veces pues el juego tiene varios niveles.<br/>
                            Para daros un poco de cancha cada 25 intentos (aproximadamente... tampoco os vamos a mentir) se os dará una pista inhalada, marca de la casa.<br/>
                            Cada vez que paséis de nivel, ¡lo sabremos! 'uuuuuuh magia!<br/>
                            Si llegáis al final, ¡lo sabremos! (¡uuuuuh magia! 2) y nos pondremos en contacto con vosotros para comunicarios el siguiente paso a realizar. <br/>                         
                            <br/>
                            Eso es todo por el momento.<br/><br/>
                            Que comience el juego.

                        </p>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->


        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/colorbox/jquery.colorbox-min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
