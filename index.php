
<?php
    include_once("vistas/header.php");
?>

<script src='src/jquery.js'></script>
<script src='src/funciones.js'></script>
<script src='src/funcionesIndex.js'></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script> -->
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet"> 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<div class="header">
  <h1>Bienvenido</h1>
</div>

<div class="content">
  <h1>Gestion de menus</h1>
</div>

<ul>
  <li>
    <a class="active" href="#home"> <button class="button button2" onclick="agregar_campo()">Agregar</button></a>
  </li>
</ul>

<table id="tblRegistros"  class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Nombre Completo</th>               
            <th>Login</th>
            <th>URL</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody id='tbl_result' >

    </tbody>   
</table>

<br/>
<br/>

<form >
    <div id='form_agregar' style='display:none'>
        <label for="input_titulo">Titulo del Menu:</label><br>
        <input type="text" id="input_titulo" name="input_titulo" value="Menu"><br>
        <label for="input_descripcion">Descripcion:</label><br>
        <input type="text" id="input_descripcion" name="input_descripcion" value=""><br><br>

        <input type="submit" onclick="guardar_campo()" value="Guardar">
    </div>
</form> 

<?php
    include_once("vistas/footer.php");
?>
