<?php
    require_once("class/class.php");
    if (isset($_SESSION['acceso'])) {
        if ($_SESSION["acceso"] == "cocinero") {
            
            $con = new Login();
            $con = $con->ContarRegistros();
    
            
            $tra = new Login();
            $ses = $tra->ExpiraSession();

            
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
    <script type="text/javascript">
    $('document').ready(function() {
    setTimeout(function run() {
        $("#pedidos").load("funciones.php?PedidosMostrador=si");
        setTimeout(run, 2000);
    }, 2000);
                           
});
    </script>
    </head>
    <body onLoad="muestraReloj(); getTime();" class="fixed-left">
        
        
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
    <a data-toggle="dropdown" class="hour" href="#">
      <span id="spanreloj"></span>
    </a>
  </li>
  <!-- Reloj end -->
  
  <li class="dropdown hidden-xs"> 
   <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" title="Notificaciones de Pedidos" aria-expanded="true"> 
    <i class="fa fa-bell"></i> 
    <span class="badge badge-xs badge-danger"><?php echo $con[0]['stockproductos']+$con[0]['stockingredientes']+$con[0]['creditosventasvencidos']+$con[0]['creditoscomprasvencidos']; ?></span> 
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
    
    <span class="dropdown hidden-xs"><abbr title="<?php echo estado($_SESSION['acceso']); ?>"><?php echo $_SESSION['nombres']; ?></abbr></span>
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
    ?> </a> </a>
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
                    <?php include('menu.php'); ?>
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
                                <h4 class="pull-left page-title"><i class="fa fa-tasks"></i> Mostrador de Pedidos</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="panel">Inicio</a></li>
                                    <li><a href="mostrador">Control</a></li>
                                    <li class="active">Mostrador</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

               <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-cutlery"></i> Mostrador de Pedidos</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="box-body">


<div class="panel-body">
<div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">


<div class="row">
<div class="col-sm-12">


       <div id="entrega"></div>

 <div id="pedidos"><div id="div1"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                 <thead>
                                                 <tr role="row">
                                  <th>N°</th>
                                  <th>Código</th>
                                  <th>Sala</th>
                                  <th>Mesa</th>
                                  <th>Cliente</th>
                                  <th>Platillos</th>
                                  <th>Status</th>
                                  <th>Procesar</th>
                              </tr>
                                                 </thead>
                                                 <tbody>
<?php 
$a=1;
$mostrador = new Login();
$reg = $mostrador->ListarMostrador(); 

if($reg==""){

    echo "";      
    
} else {

for($i=0;$i<sizeof($reg);$i++){  
?>
                                               <tr role="row" class="odd">
                                    <td class="sorting_1" tabindex="0"><?php echo $a++; ?></td>
                                    <td><?php echo $reg[$i]['idventa']; ?></td>
                                    <td><?php echo $reg[$i]['nombresala']; ?></td>
                                    <td><?php echo $reg[$i]['nombremesa']; ?></td>
<td><?php echo $cliente = ( $reg[$i]['cliente'] == '0' ? "<span class='label label-warning'> SIN ASIGNAR</span>" : $reg[$i]['nomcliente']); ?></td>

<td><?php echo "<span style='font-size:12px;'><strong>".$reg[$i]['detalles']."</strong></span>"; ?></td>

<td><?php if($reg[$i]['cocinero']== '0') { echo "<span class='label label-success'><i class='fa fa-check'></i> ENTREGADA</span>"; } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> PENDIENTE</span>"; } ?></td>
                                               <td>
<a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="left" title="" data-original-title="Realizar Entrega" onClick="EntregarPedidos('<?php echo base64_encode($reg[$i]["codventa"]) ?>','<?php echo base64_encode($reg[$i]['nombresala']); ?>','<?php echo base64_encode($reg[$i]['nombremesa']); ?>','<?php echo base64_encode("ENTREGASPEDIDOS") ?>')"><i class="fa fa-refresh"></i></a>
</td>
                                               </tr>
                                               <?php } } ?>
                                               </tbody>
</table></div></div></div>
                                                 </div>
                                             </div>
                </div>
        </div>
</div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        
                    </div>
                </div>
                <footer class="footer"> <i class="fa fa-copyright"></i> <span class="current-year"></span>. </footer>
            </div>
        </div>
        <script>
            var resizefunc = [];
        </script>
        <!-- jQuery  -->
        <!-- jQuery  
        <script src="assets/js/jquery.min.js"></script>-->
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
        <script src="assets/plugins/moment/moment.js"></script>
        
        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
        
        <!-- Datatables-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>        

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();
        </script>
        
    </body>
</html>
<?php } else { ?> 
    <script type='text/javascript' language='javascript'>
alert('NO TIENES PERMISO PARA ACCEDER A ESTA PAGINA.\nCONSULTA CON EL ADMINISTRADOR PARA QUE TE DE ACCESO')  
    document.location.href='panel'   
        </script> 
<?php } } else { ?>
    <script type='text/javascript' language='javascript'>
      alert('NO TIENES PERMISO PARA ACCEDER AL SISTEMA.\nDEBERA DE INICIAR SESION')  
    document.location.href='logout'  
        </script> 
<?php } ?>