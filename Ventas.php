<!DOCTYPE html>
<html lang="es" xml:lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jugueteria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="data:;base64,iVBORw0KGgo="> <!-- linea para quitar error favicon.i -->
  <link rel="stylesheet" href="src/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="src/css/estilos.css">
  <link rel="stylesheet" href="src/css/estilosInput.css">
  <link rel="stylesheet" href="src/css/styles.css" />
  <link rel="stylesheet" href="src/css/modales.css" />
</head>

<body>
  <div class="contenedorFlex">
    <?php include_once("Layouts/header.php"); ?>
    <div class="MasterContainer">
      <h1 class="Titulo-seccion" style="font-weight:400; letter-spacing: 2px; background: white; width:98.5%; margin: 0 20px; padding-top: 10px;">Ventas</h1>
      <div class="Header-seccion">
        <input type="text" name="buscarID" id="buscarID" maxlength="30" class="inputText" id="">
        <input type="button" value="Buscar 🔎" id="botonBuscarID" class="boton-primario">
        <input type="button" value="Ver carrito" id="verCarrito" class="boton-mini">
        <input type="button" value="Edit" id="pruebaOBJ" class="boton-mini" style="display:none">
        <!-- <input type="button" value="PruebaModal" id="pruebaModalInput" class="boton-aceptar"> -->

      </div>


      <div class="Container-Elements" id="items">



        <!-- TEMPLATE PARA CADA PRODUCTO -->
        <template id="template-card">
          <div class="producto">
            <h5 class="tituloCard">Nombre</h5>
            <p>ID: <span id="codigo"></span></p>
            <p>Precio sugerido: $<span id="precio"></span></p>
            <p>Almacén: <span id="cantidad"></span> unidades</p>

            <button class="btn btn-dark boton-card" style=" border:none;
        backdrop-filter: blur(25px);
        ">Agregar a carrito</button>
          </div>
        </template>
        <!-- ------------------------------------ -->
        <!-- TEMPLATE PARA mensaje SIN RESULTADOS -->
        <template id="template-sinResultados">
          <div class="producto">
            <h5 style="padding:0; margin:0;"></h5>
          </div>
        </template>
        <!-- ------------------------------------ -->

      </div>
    </div>


  </div>



  <!-- ----------------MODALES-------------------- -->

  <!-- ----------------MODAL CARRITO------------------- -->
  <div class="containerModal" id="modalCarrito">
    <img src="./src/img/bx-x.svg" alt="" class="close-icon" id="close-iconCarrito">


    <div class="contenidoModal" style="overflow-x:auto; background: white!important;;height:80%" id="modalContenidoCarrito">


      <div style="position:sticky; top:0; background:white;">
        <h1>Carrito</h1>
        <!-- TABLA EN CEROS DE CARRITO -->
      </div>
      <table class="table">
        <thead style="position:sticky; top:0; background:white;">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Acción</th>
            <th scope="col">Precio</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>

        <tbody id="cardss"> </tbody>
        <tfoot style="position:sticky; bottom:0; background:#e6e6e6;">
          <tr id="footer">
            <th scope="row" colspan="6">Carrito vacío - comience a comprar!</th>
          </tr>
        </tfoot>
      </table>
      <div style="width:100%; display:flex; justify-content: flex-end; margin-right:15px;">

        <button class="btn btn-success btn-sm mb-3" id="confirmar-compra" disabled style="cursor:not-allowed;">

          Confirmar compra
        </button>
      </div>
    </div>
  </div>


  <hr />
  <!-- FIN TABLA EN CEROS DE CARRITO -->

  <!-- TEMPLATES PARA ELEMENTOS DEL CARRITO -->
  <template id="template-elementos-carrito">
    <tr>
      <th scope="row" id="idEnCart">Id</th>
      <td id="nombreEnCart">Café</td>
      <td id="cantidadEnCart">1</td>
      <td>
        <button class="btn btn-info btn-sm" id="boton-addCantidad">
          +
        </button>
        <button class="btn btn-danger btn-sm" id="boton-restarCantidad">
          -
        </button>
      </td>
      <td>$ <span id="precioEnCart">500</span></td>
      <td>$ <span id="Subtotal">500</span></td>
    </tr>
  </template>

  <template id="template-footer">
    <th scope="row" colspan="2">Total productos</th>
    <td>10</td>
    <td>
      <button class="btn btn-danger btn-sm" id="vaciar-carrito">
        vaciar todo
      </button>
    </td>

    <td class="font-weight-bold" style="text-align: right;" colspan="2">TOTAL $ <span>5000</span></td>

  </template>
  <!-- TEMPLATES PARA ELEMENTOS DEL CARRITO -->

  <!-- ----------------MODAL añadir a carrito------------------- -->

  <div class="containerModal" id="modalComprar">
    <img src="./src/img/bx-x.svg" alt="" class="close-icon" id="close-iconComprar">
    <div class="contenidoModal modalComprar" style="overflow-x:auto; height:80%" id="contenidoModalComprar">
      <div class="container1">
        <h1>Añadir a carrito</h1><br>
        <div>
          <label>Cantidad a añadir</label><br>
          <input type="text" name="inputCantidad" maxlength="6" id="inputCantidad" class="inputText"><br><br>
        </div>
        <div>
          <label>Precio de venta final</label><br>
          <input type="text" name="inputPrecio" id="inputPrecio" class="inputText" maxlength="6"><br><br>
          <div style="display:flex; justify-content:center; align-items: center;">
            <input type="button" value="Añadir" class="btn btn-success" id="AñadirCompra">
          </div>
        </div>
      </div>

      <div class="container2">
        <h1>Producto</h1>
        <div id="cardenModal"></div>

      </div>

    </div>
  </div>
  
  <?php include_once("Layouts/modalGastos.php"); ?>

          <div class="position-fixed bottom-0 end-0 p-3" style="z-index:10;">
            <div id="toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Ventas</strong>
                    
                    <button type="button" data-bs-dismiss="toast" aria-label="Cerrar notificación" class="btn-close"></button>
                </div>
                <div class="toast-body">
                    Venta realizada con éxito
                </div>
            </div>
          </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="src/js/modales.js"></script>
  <script src="src/js/script.js"></script>
  <script src="src/js/gastos.js"></script> 

</body>

</html>