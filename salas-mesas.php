<?php
require_once("class/class.php");
?>
<script type="text/javascript" src="assets/script/script2.js"></script>


<?php if (isset($_GET['salas_mesas'])): ?>
<ul class="nav nav-tabs tabs">
    <?php
    $sala = new Login();
    $sala = $sala->ListarSalas();
    if($sala==""){ echo "";      
    } else {
    for ($i = 0; $i < sizeof($sala); $i++) {
    ?>
    <?php if ($i === 0): ?>
    <li class="tab active">
    <?php else: ?>
    <li class="tab">
    <?php endif; ?>
        <a href="#<?php echo $sala[$i]['codsala'];?>" data-toggle="tab" aria-expanded="true" role="tab">
            <span class="visible-xs"><i class="fa fa-building"></i></span>
            <span class="hidden-xs"><?php echo $sala[$i]['nombresala'];?></span>
        </a>
    </li>
    <?php
        }
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
    <div class="tab-pane active" id="<?php echo $sala[$i]['codsala'];?>">
    <?php else: ?>
    <div class="tab-pane" id="<?php echo $sala[$i]['codsala'];?>">
    <?php endif; ?>
        <?php
            $codigo_sala = $sala[$i]['codsala'];
            ?>
        <p>
            <!--AQUI LISTO LAS MESAS--> 
        <ul class="users-list clearfix" id="listMesas">
            <?php
                $mesa = new Login();
                $mesa = $mesa->ListarMesas();
                if($sala==""){ echo "";      
                } else {
                for ($ii = 0; $ii < sizeof($mesa); $ii++) {
                ?>
            <?php
                if ($mesa[$ii]['codsala'] == $codigo_sala) {
                ?>
            <li style="display:inline;float: left; margin-right: 4px;">
<div class="users-list-name codMesa" title="<?php echo $mesa[$ii]['nombremesa']; ?>" style="cursor:pointer;" onclick="RecibeMesa('<?php echo base64_encode($mesa[$ii]['codmesa']); ?>')">
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
                </div>
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
    }
        ?>
</div>
<?php endif; ?>





<?php if (isset($_GET['prod_categorias'])): ?>

<div class="tabs-vertical-env">

     <!--AQUI LISTO LAS CATEGORIAS -->
<div class="scroll col-sm-3">
    <ul class="nav tabs-vertical">

    <?php
                    $categoria = new Login();
                    $categoria = $categoria->ListarCategorias();
                    if($categoria==""){ echo "";      
                    } else {
                    for ($i = 0; $i < sizeof($categoria); $i++) {
                    ?>
                    <?php if ($i === 0): ?>
                    <li class="active">
                    <?php else: ?>
                    <li class="">
                    <?php endif; ?>
<a href="#<?php echo $categoria[$i]['codcategoria'];?>" data-toggle="tab" title="<?php echo $categoria[$i]['nomcategoria'];?>" aria-expanded="false">
<span class="visible-xs"><i class="fa fa-building"></i></span>
<span class="hidden-xs"><?php echo $categoria[$i]['nomcategoria'];?></span>
                        </a>
                    </li>
                    <?php
                        }
                }
                        ?>
   </ul>
</div>
<div class="tab-content scroll col-sm-9">
     <?php
                        $categoria = new Login();
                        $categoria = $categoria->ListarCategorias();
                        if($categoria==""){ echo "";      
                        } else {
                        for ($i = 0; $i < sizeof($categoria); $i++) {
                        ?>
                    <?php if ($i === 0): ?>
                    <div class="tab-pane active" id="<?php echo $categoria[$i]['codcategoria'];?>">
                    <?php else: ?>
                    <div class="tab-pane" id="<?php echo $categoria[$i]['codcategoria'];?>">
                    <?php endif; ?>
            <?php $codigo_cate = $categoria[$i]['codcategoria']; ?>
                        <p>
                            <!--AQUI LISTO LOS PRODUCTOS -->
                            <div class="row">
                                <?php
                                $producto = new Login();
                                $producto = $producto->ListarProductos();
                                for ($ii = 0; $ii < sizeof($producto); $ii++) {

if ($producto[$ii]['codcategoria'] == $codigo_cate && $producto[$ii]['existencia'] > 0) {
                                ?>
<div class="col-md-2 mb" style="width:130px;cursor:pointer;" ng-click="afterClick()" ng-repeat="product in ::getFavouriteProducts()" OnClick="DoAction('<?php echo $producto[$ii]['codproducto']; ?>','<?php echo $producto[$ii]['producto']; ?>','<?php echo $producto[$ii]['codcategoria']; ?>','<?php echo $precioconiva = ( $producto[$ii]['ivaproducto'] == 'SI' ? $producto[$ii]['preciocompra'] : "0.00"); ?>','<?php echo $producto[$ii]['preciocompra']; ?>','<?php echo $producto[$ii]['precioventa']; ?>','<?php echo $producto[$ii]['ivaproducto']; ?>','<?php echo $producto[$ii]['existencia']; ?>');">
<div class="darkblue-panel pn" title="<?php echo $producto[$ii]['producto'];?>">
                                            <div class="darkblue-header">
<h5><?php echo getSubString($producto[$ii]['producto'],12);?></h5>
                                            </div>
<p><?php if (file_exists("./fotos/".$producto[$ii]["codproducto"].".jpg")){

echo "<img src='fotos/".$producto[$ii]['codproducto'].".jpg?' class='img-circle' style='width:60px;height:60px;'>"; 

} else {

echo "<img src='fotos/producto.png' class='img-circle' style='width:60px;height:60px;'>";  } ?></p>
    <h5>$ <?php echo $producto[$ii]['precioventa'];?></h5>
<h5><i class="fa fa-bars"></i> <?php echo $producto[$ii]['existencia'];?></h5><br>
                                        </div><br>
                                    </div>
                                <?php
                                    }
                                    }
                                ?>
                            </div>
                            <!--FIN LISTO LOS PRODUCTOS -->
                        </p>
                    </div>
                    <?php
                        }
                }
                        ?>
</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<?php endif; ?>




















<!--<?php if (isset($_GET['salas_mesa8uus'])): ?>
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
    <?php endif; ?>
        <a href="#<?php echo $sala[$i]['codsala'];?>" data-toggle="tab" aria-expanded="true" role="tab">
            <span class="visible-xs"><i class="fa fa-building"></i></span>
            <span class="hidden-xs"><?php echo $sala[$i]['nombresala'];?></span>
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
    <div class="tab-pane active" id="<?php echo $sala[$i]['codsala'];?>">
    <?php else: ?>
    <div class="tab-pane" id="<?php echo $sala[$i]['codsala'];?>">
    <?php endif; ?>
        <?php
            $codigo_sala = $sala[$i]['codsala'];
            ?>
        <p>
            <!--AQUI LISTO LAS MESAS 
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
        <!--AQUI LISTO LAS MESAS FIN 
        </p>
    </div>
    <?php
        }
        ?>
</div>
<?php endif; ?>-->