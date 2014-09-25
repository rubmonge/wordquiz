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
                    <a class="navbar-brand" href="#">BodaPresentKey</a>
                </div>
                <div class="collapse navbar-collapse pull-right">
                    <ul class="nav navbar-nav">                        
                        <li><a href="#" data-toggle="modal" data-target="#clues"> Pistas</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#instructions">Instrucciones</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <div class="container" id='content'>
            <div class='row'>
                <div class="col-lg-6">
                    <div class="jumbotron">               
                        <h2>Quique, Irene <br/> juguemos a un juego</h2>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label  class="sr-only" for="word">Email address</label>
                                <input name="word" type="text" class="form-control" id="word" placeholder="Escribe algo">
                            </div>

                            <button type="submit" class="btn btn-default">Probar</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">                                                            
                    <figure>
                        <img src='http://lorempixel.com/g/555/315/' class="img-responsive"/>
                        <figcaption>Inhalated random pic</figcaption>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">                            
                    <h4>Cómo vas:</h4>
                    <p>Ya has probado con: (Aquí se mostrarán las palabras ya usadas). <span class="label label-default">zapato</span></p>
                    <p>Llevas <strong>N</strong> intentos <em>##mesage-like-deberias-ir-resolviendolo-ya....##</em></p>
                </div>
            </div>
            <div class="footer">
                <p>&copy; Hecho con 'amor' por los Inhalaos para un 4 de Octubre. 
                    | <a href='#' data-toggle="modal" data-target="#instructions">Instrucciones</a>
                </p>
            </div>

        </div> <!-- /container -->

        <div class="modal fade" id="clues">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Pistas (ya desbloqueadas)</h4>
                    </div>
                    <div class="modal-body">
                        <p>Aqui se mostrarán las pistas ya desbloqueadas</p>
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
                        <p>Aqui se explicarán las instrucciones</p>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->


        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
