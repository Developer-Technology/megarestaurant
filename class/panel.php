<?php
require_once "class/class.php";
if (isset($_SESSION['acceso'])) {
    if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"] == "cocinero" || $_SESSION["acceso"] == "mesero" || $_SESSION["acceso"] == "cajero") {

        $con = new Login();
        $con = $con->ContarRegistros();

        $config = new Login();
        $config = $config->ConfiguracionPorId();

        $tra = new Login();
        $ses = $tra->ExpiraSession();
        $caja = $tra->VerificaArqueo();

        if (isset($_POST['btn-cliente'])) {
            $reg = $tra->RegistrarClientes();
            exit;
        } elseif (isset($_POST['btn-venta'])) {
            $reg = $tra->RegistrarVentas();
            exit;
        } elseif (isset($_POST['btn-cierramesa'])) {
            $reg = $tra->CerrarMesa();
            exit;
        } elseif (isset($_POST['btn-agregapedidos'])) {
            $reg = $tra->AgregaPedidos();
            exit;
        }

        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="assets/images/favicon.png" rel="icon" type="image">
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- script jquery -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Custom file upload -->
        <script src="assets/plugins/fileupload/bootstrap-fileupload.min.js"></script>
        <script type="text/javascript" src="assets/script/titulos.js"></script>
        <script type="text/javascript" src="assets/script/script2.js"></script>
        <script type="text/javascript" src="assets/script/validation.min.js"></script>
        <script type="text/javascript" src="assets/script/script.js"></script>
        <!-- script jquery -->
        <!-- Calendario -->
        <link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
        <script src="assets/calendario/jquery-ui.js"></script>
        <script src="assets/script/autocompleto.js"></script>
        <!-- Calendario -->
    </head>
    <body onLoad="muestraReloj(); getTime();" class="fixed-left">
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
            <div class="modal-dialog">
                <div class="modal-content p-0 b-0">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
                            <h3 class="panel-title">Nuevo Cliente</h3>
                        </div>
                        <form class="form" method="post"  action="#" name="ventaclientes" id="ventaclientes">
                            <div class="panel-body">
                                <div id="errores">
                                    <!-- error will be shown here ! -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
   <label class="control-label">Documento de Cliente: <span class="symbol required"></span></label>
<input type="text" class="form-control" name="cedcliente" id="cedcliente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Documento de Cliente" required="" aria-required="true">
                                            <i class="fa fa-pencil form-control-feedback"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
   <label class="control-label">Nombre de Cliente: <span class="symbol required"></span></label>
<input type="text" class="form-control" name="nomcliente" id="nomcliente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre de Cliente" required="" aria-required="true">
                                            <i class="fa fa-pencil form-control-feedback"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
    <label class="control-label">Dirección de Cliente: <span class="symbol required"></span></label
<textarea name="direccliente" class="form-control" id="direccliente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Dirección de Cliente" required="" aria-required="true"></textarea>
                                            <i class="fa fa-map-marker form-control-feedback"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
    <label class="control-label">Teléfono de Cliente</label>
<input type="text" class="form-control" name="tlfcliente" id="tlfcliente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Telefono de Cliente">
                                            <i class="fa fa-phone form-control-feedback"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
    <label class="control-label">Correo de Cliente</label>
<input type="text" class="form-control" name="emailcliente" id="emailcliente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Correo de Cliente">
                                            <i class="fa fa-envelope-o form-control-feedback"></i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
<button type="submit" name="btn-cliente" id="btn-cliente" class="btn btn-primary"><span class="fa fa-save"></span> Registrar</button>
<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="panel" class="logo"><img src="assets/images/logo_white_2.png" height="50"></a>
                        <a href="panel" class="logo-sm"><img src="assets/images/logo_sm.png" height="50"></a>
                    </div>
                </div>
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
          <button type="button" class="button-menu-mobile open-left waves-effect waves-light"><i class="ion-navicon"></i> </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input class="form-control search-bar" placeholder="Búsqueda..." type="text">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <!--- MEJORAR DE AQUI ---->
                                <!-- Reloj start-->
                                <li id="header_inbox_bar" class="dropdown hidden-xs">
                                    <a data-toggle="dropdown" class="simple" href="#">
                                    <i class="fa fa-clock-o"></i> <span id="spanreloj"></span>
                                    </a>
                                </li>
                                <!-- Reloj end -->

                                <li class="dropdown hidden-xs">
       <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" title="Notificaciones de Pedidos" aria-expanded="true">
                                <i class="fa fa-bell"></i>
<span class="badge badge-xs badge-danger"><?php echo $con[0]['stockproductos'] + $con[0]['stockingredientes'] + $con[0]['creditosventasvencidos'] + $con[0]['creditoscomprasvencidos']; ?></span>
        </a>

                                <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notificaciones</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="dropdown-toggle waves-effect list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-cart-plus fa-2x text-info"></em>
                                                    </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Productos en Stock Minimo</div>
                                                    <p class="m-0">
    <small>Existen <span class="text-primary"><?php echo $con[0]['stockproductos']; ?></span> Productos en Stock</small>
                                                   </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-cart-arrow-down fa-2x text-primary"></em>
                                                    </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Ingredientes en Stock Minimo</div>
                                                    <p class="m-0">
    <small>Existen <span class="text-primary"><?php echo $con[0]['stockingredientes']; ?></span> Ingredientes en Stock</small>
                                                     </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-truck fa-2x text-info"></em>
                                                    </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Créditos de Compras</div>
                                                    <p class="m-0">
   <small>Existen <span class="text-primary"><?php echo $con[0]['creditoscomprasvencidos']; ?></span> Créditos Vencidos</small>                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-danger"></em>
                                                    </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Créditos de Ventas</div>
                                                    <p class="m-0">
   <small>Existen <span class="text-primary"><?php echo $con[0]['creditosventasvencidos']; ?></span> Créditos Vencidos</small>                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                         </li>
                                    </ul>

                            </li>
                                <!--- MEJORAR DE AQUI ---->
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="fa fa-crosshairs"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                    <?php
if (isset($_SESSION['cedula'])) {
            if (file_exists("fotos/" . $_SESSION['cedula'] . ".jpg")) {
                echo "<img src='fotos/" . $_SESSION['cedula'] . ".jpg?' class='img-circle'>";
            } else {
                echo "<img src='fotos/avatar.jpg' class='img-circle'>";
            }
        } else {
            echo "<img src='fotos/avatar.jpg' class='img-circle'>";
        }
        ?> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
                                        <li><a href="password"><i class="fa fa-edit"></i> Actualizar Password </a></li>
                                        <li><a href="bloqueo"><i class="fa fa-clock-o"></i> Bloquear Sesión</a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 566px;">
                    <div class="user-details">
                        <div class="text-center"> <?php
if (isset($_SESSION['cedula'])) {
            if (file_exists("fotos/" . $_SESSION['cedula'] . ".jpg")) {
                echo "<img src='fotos/" . $_SESSION['cedula'] . ".jpg?' class='img-circle'>";
            } else {
                echo "<img src='fotos/avatar.jpg' class='img-circle'>";
            }
        } else {
            echo "<img src='fotos/avatar.jpg' class='img-circle'>";
        }
        ?></div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php
echo estado($_SESSION['acceso']);
        ?></a>
                                <ul class="dropdown-menu">
                                    <li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
                                    <li><a href="password"><i class="fa fa-edit"></i> Actualizar Password </a></li>
                                    <li><a href="bloqueo"><i class="fa fa-clock-o"></i> Bloquear Sesión</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
                                </ul>
                            </div>
                            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
                        </div>
                    </div>
                    <!--- INICIO DE MENU -->
                    <?php include 'menu.php';?>
                    <!--- FIN DE MENU -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header-title">
                                <h4 class="pull-left page-title"><i class="fa fa-tasks"></i> Gestión de Ventas</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="panel">Inicio</a></li>
                                    <li><a href="ventas">Control</a></li>
                                    <li class="active">Ventas</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>



                    <div class="row">

<div id="cargaform">

     <form class="form" method="post" action="#" name="ventas" id="ventas">

                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-edit"></i> Control de Mesas</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="box-body">
                                                    <div id="error">
                                                        <!-- error will be shown here ! -->
                                                    </div>




<!-- Aquí todo el código para mesas y sillas -->

                                                    <div class="row" id="salas-mesas">

                        <ul class="nav nav-tabs tabs">
    <?php
$sala = new Login();
        $sala = $sala->ListarSalas();
        for ($i = 0; $i < sizeof($sala); $i++) {
            ?>
    <?php if ($i === 0): ?>
    <li class="tab active">
    <?php else: ?>
    <li class="tab">
    <?php endif;?>
        <a href="#<?php echo $sala[$i]['codsala']; ?>" data-toggle="tab" aria-expanded="true" role="tab">
            <span class="visible-xs"><i class="fa fa-building"></i></span>
            <span class="hidden-xs"><?php echo $sala[$i]['nombresala']; ?></span>
        </a>
    </li>
    <?php
}
        ?>
</ul>
<div class="tab-content">
    <?php
$sala = new Login();
        $sala = $sala->ListarSalas();
        for ($i = 0; $i < sizeof($sala); $i++) {
            ?>
    <?php if ($i === 0): ?>
    <div class="tab-pane active" id="<?php echo $sala[$i]['codsala']; ?>">
    <?php else: ?>
    <div class="tab-pane" id="<?php echo $sala[$i]['codsala']; ?>">
    <?php endif;?>
        <?php
$codigo_sala = $sala[$i]['codsala'];
            ?>
        <p>
            <!--AQUI LISTO LAS MESAS -->
        <ul class="users-list clearfix" id="listMesas">
            <?php
$mesa = new Login();
            $mesa = $mesa->ListarMesas();
            for ($ii = 0; $ii < sizeof($mesa); $ii++) {
                ?>
            <?php
if ($mesa[$ii]['codsala'] == $codigo_sala) {
                    ?>
            <li style="display:inline;float: left; margin-right: 4px;">
                <a class="users-list-name codMesa" href="#" onclick="RecibeMesa('<?php
echo base64_encode($mesa[$ii]['codmesa']);
                    ?>')">
                    <div id="<?php
echo $mesa[$ii]['nombremesa'];
                    ?>" style="width: 110px;height: 110px;-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;background:<?php
if ($mesa[$ii]['statusmesa'] == '0') {
                        ?>#5cb85c;<?php
}
                    ?>red" class="miMesa"><img src="assets/images/mesa.png" style="padding:12px;margin:11px;float:left;width:90px;"></div>
                    <center><strong><?php
echo $mesa[$ii]['nombremesa'];
                    ?></strong></center>
                </a>
            </li>
            <?php
}
                ?>
            <?php
}
            ?>
        </ul>
        <!--AQUI LISTO LAS MESAS FIN -->
        </p>
    </div>
    <?php
}
        ?>
</div>
</div>
<!-- Fin de todo el código para mesas y sillas -->


                                                    </div>
                                                </div>
                                          </div>
                                     </div>
                                </div>
                            </div>



                     <div id="recibemesa"></div>


                        </form>
                    </div>
</div>

                <footer class="footer"> <i class="fa fa-copyright"></i> <span class="current-year"></span>. </footer>
            </div>
        </div>
        <script>
            var resizefunc = [];
        </script>
        <!-- jQuery  -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <!-- jQuery  -->
        <script src="assets/pages/jquery.dashboard.js"></script>
        <script src="assets/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>

    </body>
</html>
<?php
} else {
        ?>
<script type='text/javascript' language='javascript'>
    alert('USTED NO TIENE ACCESO A ESTE MODULO, NO ERES EL ADMINISTRADOR DEL SISTEMA')
    document.location.href='panel'

</script>
<?php
}
} else {
    ?>
<script type='text/javascript' language='javascript'>
    alert('USTED NO TIENE ACCESO A ESTA PAGINA, DEBERA DE INICIAR SESION')
    document.location.href='logout'

</script>
<?php
}
?>