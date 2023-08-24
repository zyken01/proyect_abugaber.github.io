<?php
  include_once("../config/conexion.php");

/**
 * Aqui se puede ocupar una clase para que con funciones se tenga mejor organizado todo
 * si me dan mas tiempo lo puedo implementar
* */
$request = '';

switch ( $_POST["Action"] ) {
    case 'consulta':
        $query = "SELECT * FROM tbl_data_api ORDER BY updated_at DESC";
        $stmt = $conn->query($query);
        $registros = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        if(empty($registros)){
            $request =  "Sin Registros disponibles";
        }else{
            foreach($registros as $fila) :
                $clase = '';
                if($fila->owner_login == 'majimboo'){
                    $clase = 'bg-success ';
                }
                if($fila->owner_login == 'PimpTrizkit'){
                    $clase = 'bg-info';
                }
                $request .= "<tr>
                                <td>$fila->id_api </td>
                                <td>$fila->name</td>
                                <td>$fila->full_name</td>
                                <td class='{$clase}'>$fila->owner_login</td>       
                                <td>$fila->owner_avatar_url</td>
                                <td>$fila->description</td>
                            </tr>";
            endforeach;
            // <td> <button class='button button3' onclick='borrar_campo($fila->id_menu)'>Eliminiar</button> </td> 
        }
    break;

    case 'guardar_data_api':
        if (empty($_POST["id"]) || empty($_POST["name"])) {
            $error = "Error, algunos campos obligatorios están vacíos";
        }else{
            $query = "SELECT * FROM tbl_data_api WHERE id_api = {$_POST["id"]}";
            $stmt = $conn->query($query);
            $registros = $stmt->fetchAll(PDO::FETCH_OBJ);

            //Si entra por aqui es porque se puede ingresar el nuevo registro
            if(empty($registros)){
                $query = "INSERT INTO tbl_data_api( id_api, name, full_name, description, owner_login, owner_avatar_url, created_at, updated_at )
                          VALUES(:id, :name, :full_name, :description, :owner_login, :owner_avatar_url, :created_at, :updated_at )";

                // $fechaActual = date('Y-m-d');
                $stmt = $conn->prepare($query);

                $created_at = str_replace("T"," ", $_POST["created_at"]);
                $created_at = str_replace("Z","", $created_at);

                $updated_at = str_replace("T"," ", $_POST["updated_at"]);
                $updated_at = str_replace("Z","", $updated_at);

                $stmt->bindParam(":id", $_POST["id"], PDO::PARAM_STR);
                $stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
                $stmt->bindParam(":full_name", $_POST["full_name"], PDO::PARAM_STR);
                $stmt->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
                $stmt->bindParam(":owner_login", $_POST["owner_login"], PDO::PARAM_STR);
                $stmt->bindParam(":owner_avatar_url", $_POST["owner_avatar_url"], PDO::PARAM_STR);
                $stmt->bindParam(":created_at", $created_at, PDO::PARAM_STR);
                $stmt->bindParam(":updated_at", $updated_at, PDO::PARAM_STR);

                $resultado = $stmt->execute();

                if ($resultado) {
                    $request = "Registro de nota creado correctamente";
                }else{
                    $request = "Error, no se pudo crear la nota";  
                }
            }else{
                // Si hay un cambio hace un UPDATE
            }
        }
    break;

    case 'eliminar_elemento':
    
    break;
        
    case 'editar_elemento':
    
    break;
        
    default:
        $request = 'Ninguna opcion elegida';
    break;
}

// var_dump( $registros );
// echo json_encode($registros);
echo $request;
?>