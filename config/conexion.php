<?php
    include_once('global.php');
    //Configurar datos de acceso a la BD
    $DSN = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;

    try {
        $conn= new PDO($DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        // $conn = new PDO($dsn);

        //Mostrar mensaje si la conexión es correcta
        if ($conn) {
            // echo "Conectado a la DB correctamente";

            // $query = "SELECT id, email, nombre, telefono, password, es_admin FROM usuario WHERE email=:email AND password=:password";
            // $stmt = $conn->prepare($query);
            // $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            // $stmt->bindParam(":password", $pass, PDO::PARAM_STR);
        }

    } catch (PDOException $e) {
        //Si hay error en la conexión mostrarlo
        echo $e->getMessage();
    }

